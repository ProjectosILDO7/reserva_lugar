<template>
    <div class="container mt-4">
        <span class="text-secondary h3">
            <i class="fa-solid fa-bell fw"></i> <strong>Mensagens</strong>
        </span>

        <hr>
        <div v-if="all_sms != ''">
            <div class="alert alert-info mt-2 shadow" role="alert" v-for="sms, index in all_sms" :key="index">
                <p>E-mail: <strong class="text-danger">{{ sms.email }}</strong></p>
                <p id="margem-topo" class="mt-0">Contacto: <strong>{{ sms.telemovel }}</strong></p>
                <hr>
                <p id="margem-topo">Comentario:</p>
                <textarea id="margem-topo" class="form-control disabled text-start bg-light mb-2" cols="12" rows="4" disabled v-model="sms.comentario"></textarea>

                <p id="mt-2" class="d-flex justify-content-end">
                    <button class="btn btn-sm btn-success" @click="marcar(sms.id)">
                        <i class="fa-solid fa-check"></i> Marcar como lida
                    </button>
                </p>
            </div>
        </div>

        <div v-else>
            <div class="mt-2 text-danger text-center">
                <strong>De momento não tens nenhuma mensagem</strong>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            acesso: '',
            mensagensReed: [],
        }
    },

    created() {
        this.mensagens()
    },
    methods: {
        me() {
            this.$store.dispatch('getMeSemLoading')
                .then((resp) => this.acesso = resp.acesso)
        },

        mensagens() {
            this.$store.dispatch('loadingMensagensReed')
        },
        marcar(id){
             this.$store.dispatch('marcar_como_lida', id)
                        // .then((response)=>{
                        //     console.log(response)
                        //     this.mensagens()
                        // })
                        // .catch((erro)=>console.log(erro))
        }
    },

    computed:{
        all_sms(){
            return this.$store.getters.loagingMessages
        }
    }
}
</script>
<style scoped>
    #margem-topo{
        margin-top: -1% !important;
    }
</style>