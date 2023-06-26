<template>
    <div class="container mt-4">
        <span class="text-secondary h3">
            <i class="fa-solid fa-bell fw"></i> <strong>Notificações</strong>
        </span>

        <hr>
        <download-excel class="btn btn-sm btn-outline-success" :data="all_notify" :fields="fields" :json_meta="json_meta"
            type="xls" worksheet="Meus clientes" name="Lista de reservas.xls">
            <i class="fa-solid fa-file-excel"></i> Exportar lista dos clientes
        </download-excel>

        <div v-if="all_notify != ''">
            <div class="alert alert-info mt-2 shadow" role="alert" v-for="notify, index in all_notify" :key="index">

                <div class="row">
                    <div class="col-6 mt-1">Cliente: <strong class="text-danger">{{ notify.clientes.name }}</strong> </div>
                    <div class="col-6 text-end"><button @click="notifyInativo(notify.id)" class="btn btn-sm btn-danger"> <i class="fa-solid fa-check-double"></i> Marcar como lida</button></div>
                </div>

                <table class="table table-sm table-bordered">
                    <tr>
                        <td>Transporte solicitado: <strong>{{ notify.transportes.transporte }} </strong> </td>
                        <td>Modelo: <strong>{{ notify.transportes.modelo }} </strong></td>
                        <td>Assento reservado nº: <strong>{{ notify.transportes.total_lugares }}</strong></td>
                        <td>Rota de origem: <strong>{{ notify.transportes.procedencia }}</strong></td>
                        <td>Rota de destino: <strong>{{ notify.transportes.destino }}</strong></td>
                    </tr>
                </table>
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

            data: [
                {
                    clientes: {
                        name:'',
                        numBI:''
                    },
                    transportes: {
                        transporte: "",
                        total_lugares: "",
                        procedencia: "",
                        destino: "",
                    },
                },
            ],
            json_meta: [
                [
                    {
                        key: "charset",
                        value: "utf-8",
                    },
                ],
            ],
            fields: {
                "Nome completo": "clientes.name",
                "Nº do documento": "clientes.numBI",
                "Transporte solicitado": "transportes.transporte",
                "Nº do assento": "transportes.total_lugares",
                "Origem": "transportes.procedencia",
                "destino": "transportes.destino",
            },
        }
    },

    created() {
        this.notificacoes()
    },
    methods: {
        notifyInativo(id){
            this.$store.dispatch('notifyInativo', id)
        },
        me() {
            this.$store.dispatch('getMeSemLoading')
                .then((resp) => this.acesso = resp.acesso)
        },

        notificacoes() {
            this.$store.dispatch('loadingNotificacoesReed')
                // .then((response) => {
                //     console.log(response.data);
                //     this.notification = response.data
                // })
                // .catch((erro) => console.log(erro))
        },

        // mensagens() {
        //     this.$store.dispatch('loadingMensagensReed')
        //         .then((response) => {
        //             this.totalMensages = response.data
        //         })
        //         .catch((erro) => console.log(erro))
        // },
    },

    computed:{
        all_notify(){
            return this.$store.getters.todosNomesNotificacoes
        } 
    }
}
</script>
<style scoped>
#margem-topo {
    margin-top: -1% !important;
}
</style>