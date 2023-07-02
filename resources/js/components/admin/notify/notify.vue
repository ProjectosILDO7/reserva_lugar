<template>
    <div class="container mt-4">
        <span class="text-secondary h3">
            <i class="fa-solid fa-bell fw"></i> <strong>Notificações</strong>
        </span>

        <hr>
        <download-excel v-if="acesso == 'RF' || acesso == 'super_Admin_Cuema'" class="btn btn-sm btn-outline-success"
            :data="all_notify" :fields="fields" :json_meta="json_meta" type="xls" worksheet="Meus clientes"
            name="Lista de reservas.xls">
            <i class="fa-solid fa-file-excel"></i> Exportar lista dos clientes
        </download-excel>

        <div v-if="acesso == 'RF' || acesso == 'super_Admin_Cuema'">
            <div v-if="all_notify != ''">
                <div class="alert alert-info mt-2 shadow" role="alert" v-for="notify, index in all_notify" :key="index">

                    <div class="row">
                        <div class="col-6 mt-1">Cliente: <strong class="text-danger">{{ notify.clientes.name }}</strong>
                        </div>
                    </div>

                    <table class="table table-sm table-bordered">
                        <tr>
                            <td>Transporte solicitado: <strong>{{ notify.transportes.transporte }} </strong> </td>
                            <td>Modelo: <strong>{{ notify.transportes.modelo }} </strong></td>
                            <td>Assento reservado nº: <strong>{{ notify.transportes.total_lugares }}</strong></td>
                            <td>Rota de origem: <strong>{{ notify.transportes.procedencia }}</strong></td>
                            <td>Rota de destino: <strong>{{ notify.transportes.destino }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <textarea class="form-control form-control-sm bg-light mt-2" cols="12" rows="2"
                                    v-model="retornoNotify" placeholder="Envie uma notificação"></textarea>
                            </td>
                        </tr>

                    </table>

                    <div class="row">
                        <div class="col-12 text-end">
                            <button @click="sendNotification(notify.clientes.id)" class="btn btn-sm btn-primary mr-2">
                                <span v-if="loading == false"><i class="fa-solid fa-paper-plane"></i> Enviar
                                    notificão</span>
                                <span v-else><i class="fa-solid fa-share"></i> Enviando ...</span>
                            </button>
                            <button @click="notifyInativo(notify.id)" class="btn btn-sm btn-danger"><i
                                    class="fa-solid fa-check-double"></i> Marcar como lida</button>

                            <a class="btn btn-sm btn-success ml-2" :href="`${urlExport}${notify.id}`">
                                            <i class="fa-solid fa-file-word"></i> Gerar comprovativo
                                        </a>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="mt-2 text-danger text-center">
                    <strong>De momento não tens nenhuma notificação de clientes</strong>
                </div>
            </div>
        </div>

        <div v-else>
            <div v-if="all_notifyCliente != ''">
                <div class="alert alert-info mt-2 shadow" role="alert" v-for="notify, index in all_notifyCliente"
                    :key="index">

                    <div class="row">
                        <div class="col-6 mt-1"><strong><i class="fa-solid fa-comment-dots"></i> Mensagem:</strong></div>
                        <div class="col-12">
                            <textarea class="form-control form-control-sm" cols="12" rows="2" :value="notify.conteudo"
                            disabled></textarea>
                        </div>
                        <div class="col-12 text-end mt-2"><button @click="notifyInativoCliente(notify.id)"
                                class="btn btn-sm btn-danger">
                                <i class="fa-solid fa-check-double"></i> Marcar como lida</button></div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div class="mt-2 text-danger text-center">
                    <strong>De momento não tens nenhuma notificação da operadora</strong>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import { URL_API } from '../../../configs'
export default {
    data() {
        return {
            urlExport: URL_API + '/ExportToWordComprovativo/',
            acesso: '',
            notification: [],
            retornoNotify: '',
            loading: false,

            data: [
                {
                    clientes: {
                        name: '',
                        numBI: ''
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
        this.notificacoesCliente()
        this.me()
    },
    methods: {
        sendNotification(id) {
            this.loading = true
            const items = {
                cliente_id: id,
                conteudo: this.retornoNotify
            }
            this.$store.dispatch('sendNotificationForClient', items)
                .then((response) => {
                    this.$swal.fire({
                        title: 'Sucesso',
                        text: response.data.success,
                        icon: 'info',
                        timer: 15000
                    })
                    this.retornoNotify = '';
                })
                .catch((erro) => {
                    this.$swal.fire({
                        title: 'Erro',
                        text: erro.response.data.erro,
                        icon: 'warning',
                        timer: 15000
                    })
                })
                .finally(() => this.loading = false)
        },
        notifyInativo(id) {
            this.$store.dispatch('notifyInativo', id)
        },

        notifyInativoCliente(id) {
            this.$store.dispatch('notifyInativoCliente', id)
        },
        me() {
            this.$store.dispatch('getMeSemLoading')
                .then((resp) => this.acesso = resp.acesso)
        },

        notificacoes() {
            this.$store.dispatch('loadingNotificacoesReed')
        },

        notificacoesCliente() {
            this.$store.dispatch('loadingNotificacoesCliente')
        },
    },

    computed: {
        all_notify() {
            return this.$store.getters.todosNomesNotificacoes
        },

        all_notifyCliente() {
            return this.$store.getters.todosNomesNotificacoesCliente
        }
    }
}
</script>
<style scoped>#margem-topo {
    margin-top: -1% !important;
}</style>