<template>
    <div>
        <div class="container">
            <br>
            <footer class="footer border-top mt-4">
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 mr-auto text-align-sm-logo">
                        {{ hoje }}-<b>Gestão de reserva de lugar</b>, Inc  
                    </div>
                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 text-align-sm text-md-end">
                        <ul>
                            <li>
                                <router-link class="link" to="#" title="Facebook">
                                    <i class="fa-brands fa-facebook fa-lg text-primary"></i>
                                </router-link>
                            </li>
                            <li>
                                <router-link class="link" to="#" title="Whatsapp">
                                    <i class="fa-brands fa-whatsapp fa-lg text-success"></i>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>
<script>
    export default{
        name:"Rodape",
        data(){
            return {
                hoje:""
            }
        },
        created(){
            let ano = new Date()
            this.hoje=ano.getFullYear()
        }
    }
</script>

<style scoped>
    ul li{
        display: inline;
        margin-left: 3px;
        list-style: none;

    }
    .link{
        text-decoration: none;
    }

    /* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .text-align-sm{
        text-align: center !important;
    }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    .text-align-sm{
        text-align: end !important;
    }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .text-align-sm{
        text-align: end !important;
    }
}

    /* Extra small logo devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .text-align-sm-logo{
        text-align: center !important;
    }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    .text-align-sm-logo{
        text-align: start !important;
    }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .text-align-sm-logo{
        text-align: start !important;
    }
}

</style>