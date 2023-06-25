import Home from "../home/index.vue"
import Admin from "../components/admin/home.vue"

const routes = [
    
    // Routas admin precisa estar autenticado
    {
        path:'/admin',
        name:'admin.home',
        component:Admin,
        meta: { auth: true },
        children:[
            {
                path:'',
                name:'admin.dashboard',
                component:()=>import('../components/admin/dashboardComponent.vue'),
            },
            {
                path:'perfil',
                name:'admin.perfil',
                component:()=>import('../components/admin/perfil/perfil.vue')
            },

            {
                path:'notify',
                name:'admin.notify',
                component:()=>import('../components/admin/notify/notify.vue')
            },

            {
                path:'message',
                name:'admin.message',
                component:()=>import('../components/admin/message/message.vue')
            },

            {
                path:'users',
                name:'admin.users',
                component:()=>import('../components/admin/users/users.vue')
            },

            {
                path:'departamentos',
                name:'admin.departamento',
                component:()=>import('../components/admin/services/departamento/departamentoComponentes.vue')
            },

            {
                path:'funcionarios',
                name:'admin.funcionarios',
                component:()=>import('../components/admin/services/funcionarios/funcionariosComponent.vue')
            },
            {
                path:'clientes',
                name:'admin.meus_clientes',
                component:()=>import('../components/admin/services/clientes/clientesComponent.vue')
            },

            {
                path:'contacto_empresa',
                name:'admin.contacto_empresa',
                component:()=>import('../components/admin/services/contacto_empresa/contacto_empresaComponent.vue')
            },

            {
                path:'transporte',
                name:'admin.transporte',
                component:()=>import('../components/admin/services/transporte/transporteComponent.vue')
            },

            {
                path:'/services',
                name:'admin.service',
                component:()=>import('../components/admin/services/reservas_cliente/ServicesComponent.vue')
            },

            {
                path:'/minhas_reservas',
                name:'admin.minhas_reservas',
                component:()=>import('../components/admin/services/minhas_reservas/MinhasReservasComponent.vue')
            },

            
        ]
    },

    {
        path:'/',
        name:"home",
        component: Home,
        children:[
            {
                path:'',
                name:'home.login',
                component:()=>import('../home/pages/LoginComponent.vue')
            },

            {
                path:'/register',
                name:'home.register',
                component:()=>import('../home/pages/RegisterComponent.vue')
            },

            {
                path:'/reset',
                name:'home.reset',
                component:()=>import('../home/pages/ResetComponent.vue')
            },

            {
                path:'/api/resetPassword/:token',
                name:'auth.resetPassword',
                component:()=>import('../home/pages/resetPassword.vue'),
                props:true
            },

            {
                path:'/contacto',
                name:'home.contacto',
                component:()=>import('../home/pages/ContactoComponent.vue')
            },
            {
                path:'/sobre',
                name:'home.sobre',
                component:()=>import('../home/pages/SobreComponent.vue')
            }
        ]
    },
]

export default routes