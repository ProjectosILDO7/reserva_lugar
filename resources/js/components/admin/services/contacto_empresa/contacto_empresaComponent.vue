<template>
    <div class="container mt-4">

        <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon"
            @buscar-curso-id="cleanForm" />

        <br>

        <div class="form-group col-12 text-start mb-2">
            <span class="text-secondary">Total de contacto:</span> <span class="fw-bold">( {{ totalDeContacto_empresa }}
                )</span>
        </div>

        <form class="d-flex" role="search" v-if="totalDeContacto_empresa >= 6">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input class="form-control form-control-sm" v-model="filter" type="search" placeholder="Pesquisar"
                    aria-label="Search">
            </div>
        </form>

        <div class="row" v-if="Contacto_empresas == ''">
            <div class="form-group col-12 text-danger text-center fw-bold">
                De momento não tens nenhum Contacto_empresa cadastrado...
            </div>
        </div>

        <div class="card mt-2 shadow" v-for="dep in Contacto_empresas" :key="dep.id">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-12 col-md-1 col-lg-1 d-flex justify-content-start">
                        <span class="text-secondary">
                            <div class="dropdown">
                                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                            @click="updateContacto_empresaForm(dep.id)"><i
                                                class="fa-regular fa-pen-to-square text-success"></i> Alterar</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteConfirm" @click="deleteContacto_empresa(dep.id)"><i
                                                class="fa-solid fa-trash text-danger"></i> Apagar</a></li>
                                </ul>
                            </div>
                        </span>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <label class="text-success">Empresa</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-home text-secondary"></i> {{
                            dep.empresa
                        }}
                        </p>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <label class="text-success">E-mail</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-envelope-circle-check text-danger"></i> {{
                            dep.email
                        }}
                        </p>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <label class="text-success">Facebook</label>
                        <p class="text-secondary h6"><i class="fa-brands fa-facebook text-primary"></i> {{
                            dep.facebook
                        }}
                        </p>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <label class="text-success">Whatsapp</label>
                        <p class="text-secondary h6"><i class="fa-brands fa-square-whatsapp text-success"></i> {{
                            dep.whatsapp
                        }}
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
            <ul class="pagination pagination-sm" v-if="Contacto_empresas.last_page > 1">
                <li class="page-item" v-if="Contacto_empresas.current_page != 1">
                    <a class="page-link" href="#"
                        @click.prevent="loadingContacto_empresa(Contacto_empresas.current_page - 1)">{{ '<<' }}</a>
                </li>

                <li :class="['page-item', { 'active': Contacto_empresas.current_page == page }]" aria-current="page"
                    v-for="page in Contacto_empresas.last_page" :key="page.id">
                    <a class="page-link" href="#" @click.prevent="loadingContacto_empresa(page)">{{ page }}</a>
                </li>

                <li class="page-item" v-if="Contacto_empresas.current_page < Contacto_empresas.last_page">
                    <a class="page-link" href="#"
                        @click.prevent="loadingContacto_empresa(Contacto_empresas.current_page + 1)">{{ '>>'
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
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-square-phone"></i> Cadastre
                            novo Contacto_empresa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.empresa">{{ erros.empresa[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Nome da empresa</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo empresa" v-model="items.empresa">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.email">{{ erros.email[0] }}</span>
                                    <label for="" class="text-secodary col-12">E-mail</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Informe novo email"
                                        v-model="items.email">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.facebook">{{ erros.facebook[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Facebook</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo facebook" v-model="items.facebook">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.whatsapp">{{ erros.whatsapp[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Whatsapp</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo whatsapp" v-model="items.whatsapp">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.telemovel">{{ erros.telemovel[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Telemóvel</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo whatsapp" v-model="items.telemovel">
                                </div>

                                <!-- <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.cobranca">{{ erros.cobranca[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">(Opcional) valor da cobrança</label> -->
                                <!-- <input type="text" class="form-control form-control-sm" placeholder="Cobrança"
                                        v-model="items.cobranca"> -->
                                <!-- <VueNumberFormat class="form-control form-control-sm" v-model:value="items.cobranca"
                                        :options="{ precision: 2, prefix: '', suffix: ' ', isInteger: true, acceptNegative: false, masked: false }">
                                    </VueNumberFormat>
                                </div> -->
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" @click="cleanForm" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <span>
                                <i class="fa-solid fa-circle-xmark"></i> Fechar
                            </span>
                        </button>
                        <button @click.prevent="registerContacto_empresa" type="button" class="btn btn-sm btn-success">
                            <span v-if="loading">
                                <i class="fa-regular fa-floppy-disk"></i> Tentando salvar...
                            </span>
                            <span v-else>
                                <i class="fa-regular fa-floppy-disk"></i> Cadastrar
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal cadastrar -->

        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-pen-to-square"></i> Alterar
                            Contacto_empresa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form action="">

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.empresa">{{ erros.empresa[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Nome da empresa</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo empresa" v-model="items.empresa">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.email">{{ erros.email[0] }}</span>
                                    <label for="" class="text-secodary col-12">E-mail</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Informe novo email"
                                        v-model="items.email">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.facebook">{{ erros.facebook[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Facebook</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo facebook" v-model="items.facebook">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.whatsapp">{{ erros.whatsapp[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Whatsapp</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo whatsapp" v-model="items.whatsapp">
                                </div>

                                <div class="form-group col-12 mb-2">
                                    <span class="text-danger small col-12" v-if="erros.telemovel">{{ erros.telemovel[0]
                                    }}</span>
                                    <label for="" class="text-secodary col-12">Telemóvel</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Informe novo whatsapp" v-model="items.telemovel">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" @click="cleanForm" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
                            <span>
                                <i class="fa-solid fa-circle-xmark"></i> Fechar
                            </span>
                        </button>
                        <button @click.prevent="updateContacto_empresa(items.id)" type="button"
                            class="btn btn-sm btn-success">
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
        <!-- End Modal Edit -->

        <!-- Modal Confirm Delete -->
        <div class="modal fade" id="modalDeleteConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-trash text-danger"></i>
                            Apagar o
                            Contacto_empresa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-12 text-center">
                                <span class="text-primary">
                                    <h6>Tens a certeza que desejas apagar este Contacto_empresa...?</h6>
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
                        <button @click.prevent="apagarContacto_empresa(deleteContacto_empresaId)" type="button"
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

        <!-- Înfo Canvas - informações a direita -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">

                <div class="form-group col-9 text-end text-info">
                    <h5 id="offcanvasRightLabel text-center">DETALHES DO Contacto_empresa</h5>
                </div>
                <div class="form-group col-3 text-end">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

            </div>
            <div class="offcanvas-body">
                <div class="row">
                    <div class="form-group col-12 text-center">
                        <h1><i class="fa fa-graduation-cap fs-lg text-success"></i></h1>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="form-group col-12 text-center">
                        <div class="card shadow">
                            <h4><span class="text-danger">{{ info.Contacto_empresa }}</span></h4>
                        </div>
                    </div>

                    <!-- <div class="form-group col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Cobrança: <span class="text-secondary text-success">{{ vueNumberFormat(info.cobranca,
                                    { isInteger: true }) }}</span></h5>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-success">Data de registo:</p>
                                <p class="text-secondary topoMargin"><span> {{ formatoDeData }} </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

            </div>
        </div>

    </div>
</template>

<script>
import { notify } from '@kyvg/vue3-notification'
import dateFormat from '@vue-formily/date-format';
import topoPageComponent from '../partials/topoPageComponent.vue'

export default {
    name: "Contacto_empresa-component",

    data() {
        return {
            items: { empresa: '', email: '', facebook: '', whatsapp: '', telemovel: '' },
            erros: { empresa: '', email: '', facebook: '', whatsapp: '', telemovel: '' },
            deleteContacto_empresaId: '',
            filter: '',
            info: [],
            fomatoData: '',
            namePage: 'Contacto - Empresa',
            nameButto: 'Adicionar contacto',
            pageTopoIcon: 'fa-solid fa-square-phone',
            loading: false
        }
    },
    created() {
        this.loadingContacto_empresas(1)
    },

    computed: {

        Contacto_empresas() {
            return this.$store.getters.todosContacto_empresas(this.filter)
        },

        totalDeContacto_empresa() {
            return this.$store.getters.todosContacto_empresaCount
        },
        params() {
            return {
                page: this.Contacto_empresas.current_page
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

        detalhes(id) {
            this.info = []
            this.$store.dispatch('detalhes', id)
                .then((response) => {
                    console.log(response)
                    this.info = response
                    //console.log(this.info)
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
            this.items = { Contacto_empresa: '' },
                this.erros = []
        },

        loadingContacto_empresas() {
            //var store = useStore()
            this.$store.dispatch('loadingContacto_empresas')
        },

        registerContacto_empresa() {

            this.$store.dispatch('createContacto_empresa', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: "O Contacto_empresa foi registado com sucesso",
                        type: 'success'
                    })
                    this.loadingContacto_empresas()
                    this.cleanForm()
                })
                .catch((error) => {
                    this.erros = error
                    notify({
                        title: 'Erro',
                        text: "Ocorreu um erro durante o processo de cadastro! ou, só pode inserir uma informação no sistema",
                        type: 'warn'
                    })

                })
        },
        updateContacto_empresaForm(id) {
            this.cleanForm()
            this.$store.dispatch('updateFormContacto_empresa', id)
                .then((response) => {
                    this.items = response.data
                })
                .catch((error) => {
                    notify({
                        title: 'Não encotrado',
                        text: 'O Contacto_empresa que pretendes localizar não existe',
                        type: 'warn'
                    })
                })
        },

        updateContacto_empresa() {
            this.$store.dispatch('updateContacto_empresa', this.items)
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: 'O Contacto_empresa foi actualizado com sucesso..!',
                        type: 'success'
                    })
                    this.loadingContacto_empresas()
                    this.cleanForm()
                })
                .catch((error) => {
                    notify({
                        title: 'Erro',
                        text: 'Não foi possível actualizar este Contacto_empresa',
                        type: 'warn'
                    })
                    this.erros = error.response.data.errors
                })
        },

        deleteContacto_empresa(id) {
            this.deleteContacto_empresaId = id;
        },

        apagarContacto_empresa(id) {
            this.$store.dispatch('apagarContacto_empresa', id)
                .then((response) => {
                    notify({
                        title: 'Sucesso',
                        text: response.data.message,
                        type: 'success'
                    })
                    this.loadingContacto_empresas()
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

<style scoped>.topoMargin {
    margin-top: -5% !important;
}</style>