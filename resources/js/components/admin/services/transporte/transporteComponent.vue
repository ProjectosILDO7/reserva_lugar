<template>
    <div class="container mt-4">

        <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon"
            @buscar-curso-id="novoTransporte"/>
        <br>

        <div class="row">
            <div class="form-group col-6 text-start mb-2">
                <span class="text-secondary">Total de transporte:</span> <span class="fw-bold">( {{ totalDeTransportes }}
                    )</span>
            </div>

            <div class="form-group col-6 text-end mb-2" v-if="totalDeTransportes != 0">
                <a class="btn btn-sm btn-outline-success ml-2" :href="`${urlExport}${meID}`">
                    <i class="fa-solid fa-file-excel fa-lg"></i> Exportar lista de transporte
                </a>
            </div>
        </div>


        <form class="d-flex" role="search" v-if="totalDeTransportes >= 6">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input class="form-control form-control-sm" v-model="filter" type="search" placeholder="Pesquisar"
                    aria-label="Search">
            </div>
        </form>

        <div class="row" v-if="transportes == ''">
            <div class="form-group col-12 text-danger text-center fw-bold">
                De momento não tens nenhum transporte cadastrado...
            </div>
        </div>

        <div class="card mt-2 shadow" v-for="transporte in transportes" :key="transporte.id">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4 d-flex justify-content-start">
                        <span class="text-secondary">
                            <div class="dropdown">
                                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop" @click="updateTransporteForm(transporte.id)"><i
                                                class="fa-regular fa-pen-to-square text-success"></i> Alterar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm" @click="deleteTransporte(transporte.id)"><i
                                                class="fa-solid fa-trash text-danger"></i> Apagar</a></li>
                                </ul>
                            </div>
                        </span>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Transporte</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-train"></i> {{
                            transporte.transporte
                        }}
                        </p>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <label class="text-success">Cobrança por lugar</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-cart-shopping"></i>
                             {{ vueNumberFormat(transporte.preco_por_lugar, {isInteger:true})}}
                        </p>
                    </div>

                </div>
            </div>

            <!-- Listagem em tabela
                 <div class="card-body">

                <div class="row">

                    <div class="form-group col-12">
                        <div class="table-responsive">

                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Cod.</th>
                                        <th>Cursos</th>
                                        <th>Cobrança</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="curso in courses.data" :key="curso.id">
                                        <td>{{ curso.id }}</td>
                                        <td>{{ curso.cursos }}</td>
                                        <td>{{ vueNumberFormat(curso.cobranca, { isInteger: true }) }}</td>
                                        <td>
                                            <button @click="updateCursoForm(curso.id)"
                                                class="btn btn-sm btn-outline-success mr-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit" to="#">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger mr-2" data-bs-toggle="modal"
                                                data-bs-target="#modalDeleteConfirm" @click="deleteCourse(curso.id)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 

                           

                            <nav aria-label="paginate">
                                <ul class="pagination pagination-sm" v-if="courses.last_page > 1">
                                    <li class="page-item" v-if="courses.current_page != 1">
                                        <a class="page-link" href="#"
                                            @click.prevent="loadingCourse(courses.current_page - 1)">{{ '<<' }}</a>
                                    </li>

                                    <li :class="['page-item', { 'active': courses.current_page == page }]" aria-current="page"
                                        v-for="page in courses.last_page" :key="page.id">
                                        <a class="page-link" href="#" @click.prevent="loadingCourse(page)">{{ page }}</a>
                                    </li>

                                    <li class="page-item" v-if="courses.current_page < courses.last_page">
                                        <a class="page-link" href="#"
                                            @click.prevent="loadingCourse(courses.current_page + 1)">{{ '>>' }}</a>
                                    </li>
                                </ul>
                            </nav>


                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <br>
        <!-- paginate -->
        <nav aria-label="paginate mt-4">
            <ul class="pagination pagination-sm" v-if="transportes.last_page > 1">
                <li class="page-item" v-if="transportes.current_page != 1">
                    <a class="page-link" href="#" @click.prevent="loadingTransportes(transportes.current_page - 1)">{{ '<<'
                    }}</a>
                </li>

                <li :class="['page-item', { 'active': transportes.current_page == page }]" aria-current="page"
                    v-for="page in transportes.last_page" :key="page.id">
                    <a class="page-link" href="#" @click.prevent="loadingTransportes(page)">{{ page }}</a>
                </li>

                <li class="page-item" v-if="transportes.current_page < transportes.last_page">
                    <a class="page-link" href="#" @click.prevent="loadingTransportes(transportes.current_page + 1)">{{ '>>'
                    }}</a>
                </li>
            </ul>
        </nav>

        <!-- Modal cadastrar -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            <span class="" v-if="btnSaveVariavel">
                                <i class="fa-solid fa-train"></i> Cadastre novo transporte
                            </span>
                            <span class="" v-else>
                                <i class="fa-solid fa-train"></i> Alter informações do transporte
                            </span>

                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.transporte">{{ erros.transporte[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Transporte</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe o transporte" v-model="items.transporte">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.modelo">{{ erros.modelo[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Modelo</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe o modelo do transporte" v-model="items.modelo">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.total_lugares">{{ erros.total_lugares[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Total de lugar</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Total de lugar" v-model="items.total_lugares">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.preco_por_lugar">{{ erros.preco_por_lugar[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Cobrança por lugar</label>

                                    <VueNumberFormat class="form-control form-control-sm" v-model:value="items.preco_por_lugar"
                                        :options="{ precision: 2, prefix: '', suffix: ' ', isInteger: true, acceptNegative: false, masked: false }">
                                    </VueNumberFormat>
                                </div>
<hr>
                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.procedencia">{{ erros.procedencia[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Procedencia</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Total de lugar" v-model="items.procedencia">
                                </div>
                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.destino">{{ erros.destino[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Destino</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Total de lugar" v-model="items.destino">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer" v-if="btnSaveVariavel">
                        <button type="submit" @click="cleanForm" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <span>
                                <i class="fa-solid fa-circle-xmark"></i> Fechar
                            </span>
                        </button>
                        <button @click.prevent="registerTransporte" type="button" class="btn btn-sm btn-success">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Tentando salvar...
                            </span>
                            <span v-else>
                                <i class="fa-regular fa-floppy-disk"></i> Cadastrar
                            </span>
                        </button>
                    </div>
                    <div class="modal-footer" v-else>
                        <button type="submit" @click="cleanForm" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <span>
                                <i class="fa-solid fa-circle-xmark"></i> Fechar
                            </span>
                        </button>
                        <button @click.prevent="updateTransporte" type="button" class="btn btn-sm btn-success">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Tentando salvar...
                            </span>
                            <span v-else>
                                <i class="fa-regular fa-floppy-disk"></i> Salvar alteração
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal cadastrar -->


        <!-- Modal Confirm Delete -->
        <div class="modal fade" id="modalDeleteConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-trash text-danger"></i>
                            Apagar o transporte</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary">
                                    <h6>Tens a certeza que desejas apagar este transporte...?</h6>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <span>
                                <i class="fa-solid fa-circle-xmark"></i> Fechar
                            </span>
                        </button>
                        <button @click.prevent="apagarTransporte(deleteTransporteId)" type="button"
                            class="btn btn-sm btn-danger">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Apagando o curso...
                            </span>
                            <span v-else>
                                <i class="fa-regular fa-floppy-disk"></i> Apagar
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Confirm Delete -->


    </div>
</template>

<script>
import { notify } from '@kyvg/vue3-notification'
import topoPageComponent from '../partials/topoPageComponent.vue'
import { URL_API } from '../../../../configs/index.js'

export default {
    name: "Emolumento-component",

    data() {
        return {
            urlExport: URL_API + '/ExportToExcelTransporte/',
            meID:'',
            items: { transporte:'', modelo:'', total_lugares:'', preco_por_lugar:'', procedencia:'', destino:'' },
            erros: [],
            deleteTransporteId: '',
            filter: '',
            info: [],
            fomatoData: '',
            namePage: 'Transporte',
            nameButto: 'Novo transporte',
            pageTopoIcon: 'fa-solid fa-user-tie',
            loading: false,
            btnSaveVariavel: false,
        }
    },
    created() {
        this.loadingTransportes()
        this.me()
    },

    computed: {
        transportes() {
            return this.$store.getters.todosTransportes(this.filter)
        },

        totalDeTransportes(){
            return this.$store.getters.todosTransporteCount
        },

        params() {
            return {
                page: this.transportes.current_page
            }
        },


        formatoDeData() {
            if (this.info != '') {
                const data = new Date(this.info.created_at)
                //dateFormat.options.locales = ['enUS'];
                return new Intl.DateTimeFormat('pt-BR', { dateStyle: 'full', timeStyle: 'short', timeZone: 'Africa/luanda' }).format(data)
                //dateFormat.format('DDDD-MMMM-YYYY', data)
            }
        }

    },

    methods: {
        me(){
           this.$store.dispatch('getMeSemLoading')
                                .then((resp)=>this.meID=resp.id)
        },

        novoTransporte() {
            this.btnSaveVariavel = true;
            this.cleanForm();
        },

        detalhes(id) {
            this.info = []
            this.$store.dispatch('detalhesTransporte', id)
                .then((response) => {
                    this.info = response.data
                    console.log(this.info)
                })
                .catch((error) => {
                    notify({
                        title: 'Erro de localização',
                        text: error,
                        type: 'warn'
                    })
                })
        },

        cleanForm() {
            this.items = { descricao: '', cobranca:'' },
            this.erros = []
        },

        loadingTransportes() {
            //var store = useStore()
            this.$store.dispatch('loadingTransportes')
        },

        registerTransporte() {
            this.$store.dispatch('createTransporte', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: "Transporte registado com sucesso",
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingTransportes()
                })
                .catch((error) => {
                    this.erros = error
                    notify({
                        title: 'Erro',
                        text: "Ocorreu um erro durante o processo de cadastro!",
                        type: 'warn'
                    })

                })
        },
        updateTransporteForm(id) {
            this.btnSaveVariavel = false
            this.cleanForm()
            this.$store.dispatch('updateFormTransporte', id)
                .then((response) => this.items = response.data.getTransporte)
                .catch((error) => {
                    notify({
                        title: 'Não encotrado',
                        text: 'O Transporte que pretendes localizar não existe',
                        type: 'warn'
                    })
                })
        },

        updateTransporte() {
            this.$store.dispatch('updateTransporte', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: 'O transporte foi actualizado com sucesso..!',
                        type: 'success'
                    })
                    this.cleanForm()
                    this.loadingTransportes()
                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: 'Não foi possível actualizar este transporte',
                        type: 'warn'
                    })
                    this.erros = error.response.data.errors
                })
        },

        deleteTransporte(id) {
            this.deleteTransporteId = id;
        },

        apagarTransporte(id) {
            this.$store.dispatch('apagarTransporte', id)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingTransportes()
                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: error.data.erro,
                        type: 'warn'
                    })
                })
        }
    },

    components: {
        topoPageComponent,
    }
}
</script>

<style scoped>
.topoMargin {
    margin-top: -5% !important;
}
</style>