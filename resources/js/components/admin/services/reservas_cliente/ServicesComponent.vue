<template>
    <div class="container mt-2">
        <div class="card shadow m-auto text-center mb-4">
            <div class="container py-4"><strong>SOLICITAR RESERVA</strong></div>
        </div>

        <form class="d-flex" role="search" v-if="totalDeTransportes >= 6">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input class="form-control form-control-sm" v-model="filter" type="search" placeholder="Pesquisar"
                    aria-label="Search">
            </div>
        </form>

        <div class="row" v-if="transportes==''">
            <div class="col-12 text-danger m-auto text-center">
                <strong>De momento não existe transporte desponível</strong>
            </div>
        </div>
       
        <div class="card mt-2 shadow" v-for="transporte in transportes" :key="transporte.id" v-else>
            <div class="card-body">
                <div class="row">
                    <!-- 
                    <div class="form-group col-xs-12 col-sm-12 col-md-2 col-lg-2 d-flex justify-content-start">
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
                    </div> -->

                    <div class="form-group col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <p class="text-secondary h6">
                            <img :src="url_no_image" alt="Sem_imagem" class="rounded-circle rounded-3 tamanhoUserImage" />
                        </p>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <label class="text-success">Transporte</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-train"></i> {{
                            transporte.transporte
                        }}
                        </p>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <label class="text-success">Routar de procedência</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-train"></i> {{
                            transporte.procedencia
                        }}
                        </p>
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <label class="text-success">Routa de destino</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-train"></i> {{
                            transporte.destino
                        }}
                        </p>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <label class="text-success">Cobrança por lugar</label>
                        <p class="text-secondary h6"><i class="fa-solid fa-cart-shopping"></i>
                            {{ vueNumberFormat(transporte.preco_por_lugar, { isInteger: true }) }}
                        </p>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-1 col-lg-1">
                        <label class="text-success">Reservar</label>
                        <p class="text-secondary h6">
                            <button class="btn btn-sm btn-success" @click="criar_reserva(transporte.id)">
                                <i class="fa fa-send"></i>Solicitar
                            </button>
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

            <!-- <div class="form-group col-12">
                <form>
                    <input type="text" class="form-control form-control-sm shadow bg-light" placeholder="Pesquisar pelo nome completo"
                        v-model="search">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-sm btn-primary mt-2 shadow" @click="procurar"
                            v-if="search != ''">
                            <span v-if="loading">...</span>
                            <span v-else>Procurar</span>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary disabled mt-2 shadow" @click="procurar"
                            v-else>
                            <span v-if="loading">...</span>
                            <span v-else>Procurar</span>
                        </button>
                    </div>
                </form>
            </div> -->
        </div>

        <!-- <div class="card shadow" v-if="statusDeBusca">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered bordered-success">
                        <thead>
                            <tr>
                                <th>Nome Completo</th>
                                <th>Nº do documento</th>
                                <th>Departamento</th>
                                <th>Data da assinatura</th>
                                <th>Assinatura</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(user, index) in data" :key="index">
                                <td>{{ user.name }}</td>
                                <td>{{ user.numBI }}</td>
                                <td>{{ user.departamentos.departamento }}</td>
                                <td>{{ dataAssinatura }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" v-if="user.status == 'Activo'"
                                        @click="assinar(user.id)">
                                        <span v-if="loadingAssinatura"><i class="fa fa-edit"></i>Assinar ...</span>
                                        <span v-else><i class="fa fa-edit"></i> Assinar presença</span>
                                    </button>
                                    <button class="btn btn-sm btn-danger disabled" v-else>
                                        <i class="fa fa-edit"></i> Não autorizado
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
    </div>-->

        <!-- <preloading v-if="loading == true"></preloading> -->


    </div>
</template>
<script>
import { notify } from '@kyvg/vue3-notification'
import { URL_API } from '../../../../configs'
import axios from 'axios'
import preloading from "../../../preloading/preloading-carregando.vue"

export default {
    name: 'Seviços-componente',

    data() {
        return {
            url_no_image: window.url + "image/trein.jpg",
            items: { transporte: '', modelo: '', total_lugares: '', preco_por_lugar: '' },
            search: '',
            data: [],
            url2: 'searchFuncionario',
            statusDeBusca: false,
            loading: false,
            loadingAssinatura: false,
            filter: ''
        }
    },

    created() {
        this.statusDeBusca = false,
        this.loading = false
        this.loadingTransportes()
    },

    computed: {
        transportes() {
            return this.$store.getters.todosTransportes(this.filter)
        },
        dataAssinatura() {
            const data = new Date();
            //dateFormat.options.locales = ['enUS'];
            return new Intl.DateTimeFormat("pt-BR", {
                dateStyle: "full",
                timeStyle: "short",
                timeZone: "Africa/luanda",
            }).format(data);
            //dateFormat.format('DDDD-MMMM-YYYY', data)
        },
    },

    methods: {
        loadingTransportes() {
            //var store = useStore()
            this.$store.dispatch('loadingTransportes')
        },

        criar_reserva(transporte_id) {
            this.$store.dispatch('criar_reserva', transporte_id)
                .then((response) => {
                   // console.log(response)
                    this.$swal.fire({
                        title: 'Sucesso',
                        text: response,
                        icon: 'success',
                        timer: 15000
                    })
                    this.loadingTransportes()
                })
                .catch((erro) => {
                    this.$swal.fire({
                        title: 'Erro',
                        text: erro,
                        icon: 'info',
                        timer: 15000
                    })
                    this.loadingTransportes()
                })
        },
        procurar() {
            if (this.search != '') {
                this.loading = true
                axios.post(`${URL_API}/${this.url2}/${this.search}`)
                    .then((response) => {
                        if (response.data.user == '') {
                            notify({
                                title: 'Não econtrado',
                                text: 'Não foi possível localizar este funcionário',
                                type: 'warn'
                            })
                            return { ...this.statusDeBusca = false, ...this.loading = false }
                        } else {
                            this.data = response.data.user
                            this.statusDeBusca = true
                        }

                    })
                    .catch((error) => console.log(error))
                    .finally(() => {
                        this.loading = false
                    })
            }
        },

        assinar(id) {
            this.loadingAssinatura = true
            axios.post(`${URL_API}/assinatura/${id}`)
                .then((response) => {
                    console.log(response)
                    this.$swal.fire({
                        title: 'Sucesso',
                        text: response.data.mensagem,
                        icon: 'success',
                        timer: 15000
                    })
                })
                .catch((erro) => {
                    this.$swal.fire({
                        title: 'Erro',
                        text: erro.response.data.mensagem,
                        icon: 'info',
                        timer: 15000
                    })
                })
                .finally(() => this.loadingAssinatura = false)
        },
    },

    components: {
        preloading
    }
}
</script>

<style scoped>
img {
    width: 150px;
    height: 150px;
    object-fit: fill;
}

.tamanhoUserImage {
    width: 60px !important;
    height: 60px !important;
}
</style>