<template>
    <div class="container mt-4">
        <span class="text-secondary h3">
            <i class="fa-solid fa-bell fw"></i> <strong>Notificações</strong>
        </span>

        <hr>
        <div v-if="notification != ''">
            <div class="alert alert-info mt-2 shadow" role="alert" v-for="notify, index in notification" :key="index">
                <p>Cliente: <strong class="text-danger">{{ notify.clientes.name }}</strong></p>
                <p id="margem-topo" class="mt-0">Transporte Solicitado: <strong>{{ notify.transportes.transporte }}</strong> | Modelo: <strong>{{
                    notify.transportes.modelo }}</strong> | Assento reservado nº: <strong>{{
        notify.transportes.total_lugares }}</strong></p>
            </div>
        </div>

        <div v-else>
            <div class="mt-2 text-danger text-center">
                <strong>De momento não tens nenhuma notificação</strong>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            acesso: '',
            notification: [],
        }
    },

    created() {
        this.notificacoes()
    },
    methods: {
        me() {
            this.$store.dispatch('getMeSemLoading')
                .then((resp) => this.acesso = resp.acesso)
        },

        notificacoes() {
            this.$store.dispatch('loadingNotificacoesReed')
                .then((response) => {
                    console.log(response.data);
                    this.notification = response.data
                })
                .catch((erro) => console.log(erro))
        },

        mensagens() {
            this.$store.dispatch('loadingMensagensReed')
                .then((response) => {
                    this.totalMensages = response.data
                })
                .catch((erro) => console.log(erro))
        },
    }
}
</script>
<style scoped>
    #margem-topo{
        margin-top: -1% !important;
    }
</style>