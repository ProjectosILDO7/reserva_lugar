<template>
    <div class="container mt-4">
        <div class="card shadow animate__animated animate__bounce">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h4 class="text-secondary"><i class="fa-solid fa-folder-tree"></i> Minhas reservas</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mt-2" v-if="items!=0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Transporte</th>
                                <th>Modelo</th>
                                <th>Cadeira - nº</th>
                                <th>Data da solicitação</th>
                                <th>Bilheteria</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr v-for="item, index in items" :key="index">
                                    <td>{{ item.transportes.transporte }}</td>
                                    <td>{{ item.transportes.modelo }}</td>
                                    <td>{{ item.transportes.total_lugares }}</td>
                                    <td>{{ item.data }}</td>
                                    <td>
                                        <router-link class="btn btn-sm btn-success" to="#">
                                            <i class="fa-solid fa-ticket"></i> Comprar bilhete
                                        </router-link>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 text-center mt-2" v-else>
            <span class="text-danger"><strong>De momento não solicitou nenhuma reserva...!</strong></span>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return {
                items:[],
            }
        },

        created(){
            this.minhas_reservas()
        },

        computed:{
            todasMinhasReservas(){
                return this.$store.getters.todasMinhasReservas
            }
        },

        methods:{
            minhas_reservas(){
                this.$store.dispatch('loadingMinhasReservas')
                            .then((response)=>{
                                console.log(response)
                                this.items=response
                            })
            }
        }
    }
</script>