<template>
    <div class="main-container d-flex">
        <!-- <div class="sidebar bg-success" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4">
                    <span class="bg-success rounded border border-white px-2 py-2">
                        <i class="fa-solid fa-circle-dollar-to-slot fa-lg text-white"></i>
                    </span>
                    <span class="text-white">
                        Propy-x
                    </span>
                </h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                        class="fa-solid fa-bars"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <li class="active"><router-link :to="{ name: 'admin.dashboard' }" class="text-decoration-none d-block"><i
                            class="fa-solid fa-house ml-2"></i> Painel de controle</router-link> </li>
                <li>
                    <router-link :to="{ name: 'admin.perfil' }" class="text-decoration-none d-block"><i
                            class="fa-solid fa-user ml-2"></i> Perfil
                    </router-link>
                </li>
                <li>
                    <router-link to="#" class="text-decoration-none d-block dropdown-btn" @click="clickServiceDrop">
                        <i class="fa-solid fa-list ml-2"></i> Serviços / Pagamentos <i class="fa fa-caret-down"></i>
                    </router-link>
                    <div class="dropdown-container">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </li>
            </ul>
            <hr class="h-color max-2">
            <ul class="list-unstyled px-2">
                <li>
                    <router-link :to="{ name: 'admin.message' }"
                        class="text-decoration-none d-block d-flex justify-content-between mt-2">
                        <span><i class="fa-solid fa-envelope-open-text ml-2"></i> Mensagens</span>
                        <span class="bg-dark rounded-pill text-white py-0 px-2 small">02</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'admin.notify' }"
                        class="text-decoration-none d-block d-flex justify-content-between mt-2">
                        <span><i class="fa-solid fa-bell ml-2"></i> Notificações</span>
                        <span class="bg-dark rounded-pill text-white py-0 px-2 small">20</span>
                    </router-link>
                </li>
                <li>
                    <a href="#" class="text-decoration-none d-block mt-2">
                        <i class="fa-solid fa-chart-line ml-2"></i> Relatório
                    </a>
                </li>
            </ul>
        </div> -->
        <sidebar-menu :menu="menu" :theme="theme" :width="width" :widthCollapsed="widthCollapsed" :collapsed="collapsed"
            :rtl="rtl" :relative="relative" :hideToggle="hideToggle" :showOneChild="showOneChild" :showChild="showChild" />

        <div class="content">
            <navbar-component />         
            <dashboard-component-vuem v-if="rota" />
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import NavbarComponent from './navBarComponent.vue'
import RodapeComponent from '@/home/partials/RodapeComponent.vue'
import dashboardComponentVue from './dashboardComponent.vue'
//import DashboardComponent from './dashboardComponent.vue'

export default {
    props: {
        // Sidebar menu (required)
        //   menu: {
        //     type: Array,
        //     required: true
        //   },

        // Sidebar Collapse state (v-model:collapsed to enable two-way data binding)
        collapsed: {
            type: Boolean,
            default: true
        },
        // Sidebar width (expanded)
        width: {
            type: String,
            default: '290px'
        },

        // Sidebar width (collapsed)
        widthCollapsed: {
            type: String,
            default: '65px'
        },

        // Keep only one child opened at a time (first level only)
        showOneChild: {
            type: Boolean,
            default: true
        },

        // Keep all child open
        showChild: {
            type: Boolean,
            default: false
        },

        // Sidebar right to left
        rtl: {
            type: Boolean,
            default: false
        },

        // Make sidebar relative to the parent (by default the sidebar is relative to the viewport)
        relative: {
            type: Boolean,
            default: false
        },

        // Hide toggle collapse btn
        hideToggle: {
            type: Boolean,
            default: false
        },

        // Sidebar theme (available themes: 'white-theme')
        theme: {
            type: String,
            default: 'white'
        },

        // Disable hover on collapse mode
        disableHover: {
            type: Boolean,
            default: false
        },

        // The name of the custom link component (must be registered globally and define item as a prop)
        linkComponentName: {
            type: String,
            default: undefined
        }
    },

    data() {
        return {
            menu: [
                {
                    header: 'MENU DE NAVEGAÇÃO',
                    hiddenOnCollapse: true
                },
                {
                    href: { path: '/admin' },
                    title: 'RESERVA',
                    icon: 'fa-solid fa-users-gear'
                },
                {
                    href: '#',
                    title: 'Usuário',
                    icon: 'fa-solid fa-circle-user',
                    child: [
                        {
                            href: { name: 'admin.perfil' },
                            title: 'Perfil',
                            icon: 'fa-regular fa-user'
                        },
                        {
                            href: { name: 'admin.notify' },
                            title: 'Notificação',
                            icon: 'fa-solid fa-users-gear'
                        },
                        {
                            href: { name: 'admin.message' },
                            title: 'Mensagem',
                            icon: 'fa-solid fa-users-gear'
                        },
                    ]
                },
                {
                    href: '#',
                    title: 'Registo de serviços',
                    icon: 'fa fa-database',
                    child: [
                        {
                            href: { name: 'admin.departamento' },
                            title: 'Departamentos',
                            icon: 'fa-solid fa-address-book'
                        },

                        {
                            href: { name: 'admin.funcionarios' },
                            title: 'Funcionários',//<i class="fa-solid fa-address-book"></i>
                            icon: 'fa-solid fa-user-tie'
                        },

                        {
                            href: { name: 'admin.transporte' },
                            title: 'Transportes',//<i class="fa-solid fa-address-book"></i>
                            icon: 'fa-solid fa-user-tie'
                        },

                    ]
                },
                {
                    href: "#",
                    title: 'Relatório',
                    icon: 'fa fa-chart-line'
                }
            ],
        }
    },

    created() {
        //admin.dashboard 
    },

    computed: {
        
    },

    components: {
        NavbarComponent,
        RodapeComponent,
        dashboardComponentVue
    }




}

</script>


<style scoped>
body {
    background: #eee
}

#side_nav {
    background: #000;
    min-width: 250px;
    max-width: 250px;
    transition: all 0.3s
}

#side_nav ul li a,
.dropdown-btn {
    text-decoration: none;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
}

.dropdown-container {
    display: none;
    background-color: #ffffff;
    padding-left: 8px;
}

.content {
    min-height: 100vh;
    width: 100%;
}

hr .h-color {
    background: #fff;
}

.sidebar li.active {
    background: #fff;
    border-radius: 8px;
}

.sidebar li.active a,
.sidebar li.active a:hover {
    color: #000;
}

.sidebar li a {
    color: #fff
}

@media(max-width: 767px) {
    #side_nav {
        margin-left: -250px;
        position: fixed;
        min-height: 100vh;
        z-index: 1;
    }

    #side_nav.active {
        margin-left: 0;
    }

}
</style>