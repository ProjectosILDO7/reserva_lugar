<template>
    <div class="container mt-4">
        <div v-if="acesso != 'RC'">
            <h3 class="text-secondary">Painel de controle</h3>
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card text-white bg-light mb-3 shadow">
                        <div class="card-body">
                            <div class="row mb-0">
                                <div class="col-12 text-muted text-center mb-2">
                                    Funcionários
                                </div>
                                <div class="form-group col-4 m-auto">
                                    <span>
                                        <router-link to="#" class="btn btn-primary btn-rounded shadow">
                                            <i class="fa-solid fa-user-tie"></i>
                                        </router-link>
                                    </span>
                                </div>
                                <div class="form-group col-4 m-auto text-secondary">
                                    <span class="fw-bold h6">
                                        {{ todosFuncionariosCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card text-white bg-light mb-3 shadow">
                        <div class="card-body">
                            <div class="row mb-0">
                                <div class="col-12 text-muted text-center mb-2">
                                    Departamentos
                                </div>
                                <div class="form-group col-4 m-auto">
                                    <span>
                                        <router-link to="#" class="btn btn-warning btn-rounded shadow">
                                            <i class="fa-solid fa-address-book"></i>
                                        </router-link>
                                    </span>
                                </div>
                                <div class="form-group col-4 m-auto text-secondary">
                                    <span class="fw-bold h6">
                                        {{ totalDeDepartamento }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card text-white bg-light mb-3 shadow">
                        <div class="card-body">
                            <div class="row mb-0">
                                <div class="col-12 text-muted text-center mb-2">
                                    Clientes registados
                                </div>
                                <div class="form-group col-4 m-auto">
                                    <span>
                                        <router-link to="#" class="btn btn-success btn-rounded shadow">
                                            <i class="fa-solid fa-users-viewfinder"></i>
                                        </router-link>
                                    </span>
                                </div>
                                <div class="form-group col-4 m-auto text-secondary">
                                    <span class="fw-bold h6">
                                        {{ todosClientesCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card text-white bg-light mb-3 shadow">
                        <div class="card-body">
                            <div class="row mb-0">
                                <div class="col-12 text-muted text-center mb-2">
                                    Reservas solicitadas
                                </div>
                                <div class="form-group col-4 m-auto">
                                    <span>
                                        <router-link to="#" class="btn btn-info btn-rounded shadow">
                                            <i class="fa-solid fa-filter"></i>
                                        </router-link>
                                    </span>
                                </div>
                                <div class="form-group col-4 m-auto text-secondary">
                                    <span class="fw-bold h6">
                                        {{ todasReservasCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- Charts (Gráficos) -->

                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <!-- <line-chart-vue/> -->
                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            Reservas registadas durante os mêses
                        </div>
                        <div class="card-body">
                            <Bar :stats="garficoBarra" />
                        </div>
                    </div>

                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <!-- <doughnut-chart-vue/> -->
                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            Reservas registadas semanais
                        </div>
                        <div class="card-body">
                            <Pie />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Bar from '../admin/services/reports/charts/barChart/barChartComponenent.vue'
import Pie from '../admin/services/reports/charts/pieChart/pieChartComponent.vue'
export default {

    data() {
        return {
            garficoBarra: [],
            acesso:''
        }
    },
    components: { Bar, Pie },

    created() {
        this.loadingFuncionarios();
        this.loadingDepartamentos();
        this.loadingClientes();
        this.loadingGraficoDeBarra();
        this.loadingReservas();
        this.me()
    },
    computed: {
        presencaMensal() {
            return this.$store.getters.graficoDeBarra
        },

        todosClientesCount() {
            return this.$store.getters.todosClientesCount;
        },

        todasReservasCount() {
            return this.$store.getters.todasReservasCount;
        },

        todosFuncionariosCount() {
            return this.$store.getters.todosFuncionariosCount;
        },

        totalDeDepartamento() {
            return this.$store.getters.todosDepartamentoCount
        },
    },

    methods: {

        loadingClientes() {
            //var store = useStore()
            this.$store.dispatch("loadingClientes");
        },

        loadingReservas() {
            //var store = useStore()
            this.$store.dispatch("loadingReservas");
        },

        loadingDepartamentos() {
            //var store = useStore()
            this.$store.dispatch('loadingDepartamentos')
        },
        loadingFuncionarios() {
            //var store = useStore()
            this.$store.dispatch("loadingFuncionarios");
        },

        loadingGraficoDeBarra() {
            this.$store.dispatch("loadingGraficoDeBarra")
                .then((response) => {
                    this.garficoBarra = response.data
                })
        },
        me(){
           this.$store.dispatch('getMeSemLoading')
                                .then((resp)=>this.acesso=resp.acesso)
        },

    },

}
</script>

<style scoped>
.btn-rounded {
    font-size: 200%;
    border-radius: 30%;
}
</style>

