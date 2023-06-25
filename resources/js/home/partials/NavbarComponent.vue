<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
            <div class="container">
                <router-link class="navbar-brand text-light" to="/">
                    <i class="fa-solid fa-home"></i>
                    RL </router-link>
                <button class="navbar-toggler btn-sm" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link active text-light" aria-current="page"
                                :to="{ name: 'home.contacto' }">
                                <i class="fa-solid fa-phone"></i> Contactos</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link text-light" :to="{ name: 'home.sobre' }">
                                <i class="fa-solid fa-circle-info"></i> Sobre</router-link>
                        </li>
                    </ul>

                    <ul class="navbar-nav text-end mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link text-light" :to="{ name: 'home.login' }">
                                <i class="fa-solid fa-right-to-bracket"></i> Conectar-se</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link text-light" :to="{ name: 'home.register' }">
                                <i class="fa-solid fa-user"></i> Criar conta</router-link>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <banner/>
        
    </div>
</template>

<script>
import banner from './bannerComponent.vue'
export default{
    name:'Navbar-banner',

    components:{
        banner
    }

}

</script>