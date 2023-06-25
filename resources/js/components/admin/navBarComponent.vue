<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
            <div class="container">

                <button class="navbar-toggler btn-sm" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-light"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">

                        <li class="nav-item">
                            <div v-if="acesso == 'RC'">
                                <router-link class="nav-link active text-white" aria-current="page" to="#">
                                    <i class="fa-solid fa-gauge-high"></i>
                                    RL
                                </router-link>
                            </div>
                            <div v-else>
                                <router-link class="nav-link active text-white" aria-current="page"
                                    :to="{ name: 'admin.dashboard' }">
                                    <i class="fa-solid fa-gauge-high"></i>
                                    Controle
                                </router-link>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div v-if="acesso == 'RC'">
                                <router-link class="nav-link active text-white" aria-current="page"
                                    :to="{ name: 'admin.service' }">
                                    <i class="fa-solid fa-code-pull-request"></i>
                                    Solicitar reserva
                                </router-link>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div v-if="acesso == 'RC'">
                                <router-link class="nav-link active text-white" aria-current="page" to="#">
                                    <i class="fa-solid fa-ticket"></i>
                                    Comprar bilhete
                                </router-link>
                            </div>
                        </li>


                    </ul>
                </div>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">

                        <li class="nav-item">
                            <router-link router-link :to="{ name: 'admin.notify' }" class="nav-link text-white"
                                title="Reservas">
                                <i class="fa-solid fa-bell"></i><sup><span
                                        class="rounded-pill py-1 px-1 bg-success text-white small" v-if="all_notify!=0">{{ all_notify
                                        }}</span></sup>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link text-white" :to="{ name: 'admin.message' }" title="Mensagens">
                                <i class="fa-solid fa-envelope"></i><sup><span
                                        class="rounded-pill py-1 px-1 bg-success text-white small" v-if="all_messages!=0">{{ all_messages }}</span></sup>
                            </router-link>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span v-if="me.image">
                                    <img v-if="url + me.image" :src="url + me.image" alt="user-image"
                                        class="rounded-circle tamanhoUserImage"> <b>{{ me.name }}</b>!
                                </span>

                                <span v-else>
                                    <img :src="url_no_image" alt="user-image" class="rounded-circle tamanhoUserImage"> Ola!
                                    <b> {{ me.name }}</b>
                                </span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><router-link class="dropdown-item" :to="{ name: 'admin.perfil' }"><i
                                            class="fa-solid fa-user"></i> Perfil</router-link></li>
                                <!-- <li>
                                    <router-link class="dropdown-item" to="#">
                                        <i class="fa-solid fa-users-gear"></i> Usuários</router-link>
                                </li> -->
                                <li>
                                    <div v-if="acesso == 'RC'">
                                        <router-link class="dropdown-item" :to="{ name: 'admin.minhas_reservas' }">
                                            <i class="fa-solid fa-folder-tree"></i> Minhas reservas</router-link>
                                    </div>
                                    <div v-else>
                                        <router-link class="dropdown-item" :to="{ name: 'admin.meus_clientes' }">
                                            <i class="fa-solid fa-users-line"></i> Meus clientes</router-link>
                                    </div>

                                    <div v-if="acesso != 'RC'">
                                        <router-link class="dropdown-item" :to="{ name:'admin.contacto_empresa' }">
                                            <i class="fa-solid fa-square-phone"></i> Contacto empresa</router-link>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" @click.prevent="logout">
                                        <span v-if="loading"><i class="fa-solid fa-right-from-bracket"></i> Saindo...</span>
                                        <span v-else><i class="fa-solid fa-right-from-bracket"></i> Sair</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-link">
                            <a href="#" class="btn btn-sm btn-success" @click.prevent="logout">
                                <span v-if="loading">
                                    <i class="fa-solid fa-right-from-bracket"></i>Terminando...
                                </span>
                                <span v-else>
                                    <i class="fa-solid fa-right-from-bracket"></i>Terminar
                                </span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <router-view />
    </div>
</template>
<script>
import { useStore } from 'vuex'
import { computed, ref } from "vue"
import router from '@/router'

export default {
    name: "NavbarTopo",
    props: ['acesso', 'totalNotify'],
    data() {
        return {
            loading: false,
            store: useStore(),
            url: window.url + "storage/image/funcionarios/",
            url_no_image: window.url + "image/no-Image.jpg",
            totalNotify: '',
            totalMensages: '',
        }
    },

    created() {
        //this.me()
        this.notificacoes();
        this.mensagens();
    },
    methods: {
        logout() {
            this.loading = true
            this.$store.dispatch('logout')
                .then(() => router.push({ name: 'home.login' }))
                .catch((error) => console.log(error))
                .finally(() => loading.value = false)
        },

        notificacoes() {
            this.$store.dispatch('loadingNotificacoes')
                // .then((response) => {
                //     this.totalNotify = response.data
                // })
                // .catch((erro) => console.log(erro))
        },

        mensagens() {
            this.$store.dispatch('loadingMensagens')
                // .then((response) => {
                //     console.log(response.data)
                //     this.totalMensages = response.data
                // })
                // .catch((erro) => console.log(erro))
        },
    },

    computed: {
        me() {
            return this.$store.state.users.user
        },

        all_notify(){
             const n= this.$store.getters.todasNotificacoesCount
             return n
        },

        all_messages(){
           return this.$store.getters.todasMensagensCount
        }
    },
}
</script>

<style scope>
.text-capitalize {
    text-transform: capitalize !important;
}

.tamanhoUserImage {
    width: 30px !important;
    height: 30px !important;
    background-color: #fff;
}
</style>