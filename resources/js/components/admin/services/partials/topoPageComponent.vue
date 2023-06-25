<template>
    <div class="card shadow animate__animated animate__bounce">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h4 class="text-secondary"><i :class="pageTopoIcon"></i> {{ namePage }}</h4>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end" v-if="nameButton">
                    <span class="text-secondary">
                        <router-link class="text-decoration-none text-success btn btn-sm btn-success text-light"
                            type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" to="#"
                            @click="busacaCursoId">
                            <i class="fa-solid fa-square-plus"></i> {{ nameButton }}</router-link>
                    </span>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'topoPage-info',
    props: ['namePage', 'nameButton', 'pageTopoIcon', 'estudantes'],
    methods: {
        busacaCursoId() {
            this.$emit('buscar-curso-id')
        },
    }
}

</script>