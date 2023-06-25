<template>
    <div class="container mt-4">
        <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon" />
        <br>
        <div class="card shadow">
            <div class="card-body">

                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card border-secondary mb-3 shadow">
                            <div class="card-header">PLANO TRIMESTRAL</div>
                            <div class="card-body text-secondary">
                                <h4 class="card-title fw-bold text-center">{{ vueNumberFormat('2500000 ', {
                                    isInteger: true,
                                    suffix: ' Kz'
                                }) }} <span class="small">/ 3 mêses</span></h4>
                                <p class="card-text"><i class="fa-solid fa-circle-check"></i> Acesso Ilimitdo</p>
                                <p class="card-text"><i class="fa-solid fa-circle-check"></i> Suporte Individual</p>

                                <div class="d-grid gab-2">
                                    <button class="btn btn-secondary btn-sm"><i class="fa-solid fa-cart-shopping"></i> Efectuar  a assinatura</button>
                                </div>

                            </div>

                        </div>


                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card border-primary mb-3 shadow">
                            <div class="card-header">PLANO SEMESTRAL</div>
                            <div class="card-body text-primary">
                                <h4 class="card-title fw-bold text-center">{{ vueNumberFormat('4500000 ', {
                                    isInteger: true,
                                    suffix: ' Kz'
                                }) }} <span class="small">/ 6 mêses</span></h4>
                                <p class="card-text"><i class="fa-solid fa-circle-check"></i> Acesso Ilimitdo</p>
                                <p class="card-text"><i class="fa-solid fa-circle-check"></i> Suporte Individual</p>

                                <div class="d-grid gab-2">
                                    <button class="btn btn-primary btn-sm"><i class="fa-solid fa-cart-shopping"></i> Efectuar  a assinatura</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card border-success mb-3 shadow">
                            <div class="card-header">PLANO ANUAL <span class="text-danger fw-bold">(100% recomendado)</span>
                            </div>
                            <div class="card-body text-success">
                                <h4 class="card-title fw-bold text-center">{{ vueNumberFormat('6500000 ', {
                                    isInteger: true,
                                    suffix: ' Kz'
                                }) }} <span class="small">/ Anual</span></h4>
                                <p class="card-text"><i class="fa-solid fa-circle-check"></i> Acesso Ilimitdo</p>
                                <p class="card-text"><i class="fa-solid fa-circle-check"></i> Suporte Individual</p>

                                <div class="d-grid gab-2">
                                    <button class="btn btn-success btn-sm"><i class="fa-solid fa-cart-shopping"></i> Efectuar  a assinatura</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</template>

<script>
import topoPageComponent from '../partials/topoPageComponent.vue';

export default {
    name: 'pageAssinatura',
    data() {
        return {
            namePage: 'Assinatura',
            nameButton: 'Nova ssinatura',
            pageTopoIcon: 'fa-solid fa-bag-shopping text-warning'
        }
    },
    components: {
        topoPageComponent
    }
}
</script>