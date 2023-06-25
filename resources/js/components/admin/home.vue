<template>
    <div>
        <div v-if="acesso=='super_Admin_Cuema' || acesso=='RF'">
            <side-bar-component :rota="rota"/>
        </div>
        <div v-else>
            {{ totalNotify }}
            <navBarComponent :acesso="acesso"/>
        </div>
    </div>
</template>

<script>
import navBarComponent from './navBarComponent.vue';
import sideBarComponent from './sideBarComponent.vue';
//import RodapeComponent from '../../home/partials/RodapeComponent.vue';

    export default{
        name:'home-componente',
        data(){
            return{
                rota:false,
                acesso:'',
            }
        },
        created(){
            //this.refresh();
            this.routas();
            this.me();
        },

        methods:{
            routas() {
            if (this.$router.currentRoute._value.name == 'admin.dashboard') {
               this.rota = true
            } else{
               this.rota = false
            }
        },
        me(){
           this.$store.dispatch('getMeSemLoading')
                                .then((resp)=>this.acesso=resp.acesso)
        },
        },

        components:{
            navBarComponent,
            sideBarComponent,
            //RodapeComponent
        }

    }
</script>