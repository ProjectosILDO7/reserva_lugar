<template>
    <div>
        <navbar-component/>
            <router-view/>
        <rodape-component></rodape-component>
    </div>
</template>

<script>
import NavbarComponent from "./partials/NavbarComponent.vue"
import RodapeComponent from "./partials/RodapeComponent.vue"
export default{
    name:"Home",
    components:{
        NavbarComponent,
        RodapeComponent
    }
}
</script>