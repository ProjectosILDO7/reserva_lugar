<template>
    <!-- <div class="card col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto mt-4 shadow">

        <div class="card-header text-center">
            <span class="">
                <b>Propy-x: Redefinir senha</b>
            </span>
        </div>
        <br>
        <div class="card-body">
            <p class="text-muted">
                <b>Esqueceu sua senha?</b>
            </p>
            <p><span class="text-muted mb-4">Sem problema coisas assim acotecem. Informe-nos seu e-mail na caixa abaixo,
                    de seguida enviarémos um link de redefinição de senha</span> </p>


            <form action="" method="post">

                <span class="small text-danger" v-if="erro.email">{{ erro.email[0] }}</span>
                <div class="input-group flex-nowrap mb-3 has-validation">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="text" :class="['form-control', {'is-invalid':erro.email}]" placeholder="E-mail" v-model="email" aria-label="E-mail"
                        aria-describedby="addon-wrapping">
                </div>

                <div class="d-grid gap-2">
                    <button 
                    :class="[
                        'btn','btn-info', 'text-light',
                        loading ? 'loading':''
                    ]" 
                    type="button" @click.prevent="resetPassword">
                        <span v-if="loading">
                            <i class="fa-solid fa-rotate"></i> Enviar pedido...
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-rotate"></i> Enviar pedido de redefinição de senha
                        </span>
                    </button>
                </div>
                <br>
                <hr>
                <div class="form-group text-md-center text-align-sm">
                    <ul>
                        <li><router-link class="text-secondary" :to="{ name: 'home.register' }">
                                Criar uma conta
                            </router-link></li>
                        <li>
                            <router-link class="text-secondary" :to="{ name: 'home.login' }">
                                Ja tenho uma conta
                            </router-link>
                        </li>
                    </ul>
                </div>

            </form>
        </div>
    </div> -->

    <div class="box">

        <div class="col-12 text-light text-center mt-0 mb-2">
            <p>
                <b>Esqueceu sua senha?</b>
            </p>
            <p>
                Informe-nos seu e-mail,
                de seguida enviarémos um link de redefinição da senha
            </p>
        </div>
        <form action="" method="post">
            <span class="text-danger" v-if="erro.email">{{ erro.email[0] }}</span>
            <div class="inputBox">
                <input type="text" :class="['form-controls', { 'is-invalid': erro.email }]"
                    onkeyup="this.setAttribute('value', this.value);" v-model="email" aria-label="E-mail"
                    aria-describedby="addon-wrapping">
                <label>E-mail</label>
            </div>
            <!-- <div class="inputBox">
                <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);" v-model="email">
                <label>Utilizador</label>
            </div> -->
            <div class="d-grid gap-2">
                <button :class="[
                    'btn', 'btn-info', 'text-light',
                    loading ? 'loading' : ''
                ]" type="button" @click.prevent="resetPassword">
                    <span v-if="loading">
                        <i class="fa-solid fa-rotate"></i> Enviar pedido...
                    </span>
                    <span v-else>
                        <i class="fa-solid fa-rotate"></i> Enviar pedido de redefinição de senha
                    </span>
                </button>
            </div>
            <br>
            <hr>
            <div class="form-group text-center mr-2">
                <ul>
                    <li>
                        <router-link class="text-light" :to="{ name: 'home.login' }">
                            Ja tenho uma conta
                        </router-link>
                    </li>
                    <!-- <li>
                            <router-link class="text-light" :to="{ name: 'home.register' }">
                                Criar uma conta
                            </router-link>
                        </li> -->
                </ul>
            </div>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue'
import { useStore } from 'vuex'
import { notify } from "@kyvg/vue3-notification";

export default {

    setup() {
        const email = ref("")
        const store = useStore()
        const loading = ref(false)
        const erro = ref('')

        const resetPassword = () => {
            loading.value = true
            store.dispatch('forgetPassword', { email: email.value })
                .then(() => notify({
                    title: 'Sucesso',
                    text: 'Enviamos um link de redefinição da sua senha no seu e-mail',
                    type: 'success'
                }))
                .catch((error) => erro.value = error.data.errors)
                .finally(() => loading.value = false)
        }

        return {
            erro,
            email,
            resetPassword,
            loading
        }
    }
}

</script>

<style scoped>
.box {
    position: absolute !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    width: 25rem !important;
    padding: 2.5rem !important;
    box-sizing: border-box !important;
    background: rgba(0, 0, 0, 0.6) !important;
    border-radius: 0.625rem !important;
}

.box h2 {
    margin: 0 0 1.875rem !important;
    padding: 0 !important;
    color: #fff !important;
    text-align: center !important;
}

.box .inputBox {
    position: relative !important;
}

.box .inputBox input {
    width: 100% !important;
    padding: 0.625rem 0 !important;
    font-size: 1rem !important;
    color: #fff !important;
    letter-spacing: 0.062rem !important;
    margin-bottom: 1.875rem !important;
    border: none !important;
    border-bottom: 0.065rem solid #fff !important;
    outline: none !important;
    background: transparent !important;
}

.box .inputBox label {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    padding: 0.625rem 0 !important;
    font-size: 1rem !important;
    color: #fff !important;
    pointer-events: none !important;
    transition: 0.5s !important;
}

.box .inputBox input:focus~label,
.box .inputBox input:valid~label,
.box .inputBox input:not([value=""])~label {
    top: -1.125rem !important;
    left: 0 !important;
    color: #03a9f4 !important;
    font-size: 0.75rem !important;
}

.box input[type="submit"] {
    border: none !important;
    outline: none !important;
    color: #fff !important;
    background-color: #03a9f4 !important;
    padding: 0.625rem 1.25rem !important;
    cursor: pointer !important;
    border-radius: 0.312rem !important;
    font-size: 1rem !important;
}

.box input[type="submit"]:hover {
    background-color: #1cb1f5;
}

ul li {
    list-style: none;
}

ul li a {
    list-style: none;
    text-decoration: none;
}

ul li a:hover {
    list-style: none;
    text-decoration: none;
    color: rgb(144, 144, 175) !important
}

ul li {
    list-style: none;
}

ul li a {
    list-style: none;
    text-decoration: none;
}

ul li a:hover {
    list-style: none;
    text-decoration: none;
    color: rgb(144, 144, 175) !important
}

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .text-align-sm {
        text-align: center !important;
    }
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
    .text-align-sm {
        text-align: end !important;
    }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .text-align-sm {
        text-align: end !important;
    }
}
</style>
