<template>
    <div class="box">

        <div class="card-header text-light text-center">
            <span class="">
                <b id="topTextCount">Criar uma conta</b>
            </span>
        </div>

        <div class="card-body">
            <form @submit.prevent="salvarUsuario">


                <div class="inputBox">
                    <input type="text" name="text" required onkeyup="this.setAttribute('value', this.value);"
                        v-model="name">
                    <label>Nome completo</label>
                </div>
                <div class="inputBox">
                    <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);"
                        v-model="email">
                    <label>E-mail</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required onkeyup="this.setAttribute('value', this.value);"
                        v-model="password">
                    <label>Palavra chave</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password_confirme" required onkeyup="this.setAttribute('value', this.value);"
                        v-model="password_confirmation">
                    <label>Confirmar palavra chave</label>
                </div>

                <!-- <span class="small text-danger" v-if="erros.name">{{ erros.name[0] }}</span>
                <div class="input-group flex-nowrap mb-3 has-validation">

                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="text" name="name" :class="['form-control', { 'is-invalid': erros.name }]" placeholder="Nome"
                        v-model="name" aria-label="Nome" aria-describedby="addon-wrapping">
                </div> -->

                <!-- <span class="small text-danger" v-if="erros.email">{{ erros.email[0] }}</span>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="email" name="email" :class="['form-control', { 'is-invalid': erros.email }]" v-model="email"
                        placeholder="E-mail" aria-label="E-mail" aria-describedby="addon-wrapping">
                </div> -->

                <!-- <span class="small text-danger" v-if="erros.password">{{ erros.password[0] }}</span>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" name="password" :class="['form-control', { 'is-invalid': erros.password }]"
                        v-model="password" placeholder="Senha" aria-label="Senha" aria-describedby="addon-wrapping">
                </div> -->

                <!-- <span class="small text-danger" v-if="erros.password_confirmation">{{ erros.password_confirmation[0]
                }}</span>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" name="password_confirmation" v-model="password_confirmation"
                        :class="['form-control', { 'is-invalid': erros.password_confirmation }]" placeholder="Repetir senha"
                        aria-label="Repetir senha" aria-describedby="addon-wrapping">
                </div> -->

                <div class="d-grid gap-2">
                    <button :class="[
                        'btn', 'btn-info', 'text-light',
                        loading ? 'loading' : ''
                    ]" type="submit">
                        <span v-if="loading">
                            <i class="fa-solid fa-spinner"></i> Carregar...
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-right-to-bracket"></i> Criar conta
                        </span>
                    </button>
                </div>
                <div class="form-group text-md-center text-align-sm mb-0">
                    <ul>
                        <li><router-link class="text-secondary mt-2 text-light" :to="{ name: 'home.reset' }">
                                Esqueci minha senha
                            </router-link></li>
                        <li>
                            <router-link class="text-secondary text-light" :to="{ name: 'home.login' }">
                                Ja tenho uma conta
                            </router-link>
                        </li>
                    </ul>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import { useStore } from 'vuex'
import router from '../../router/'
import { notify } from "@kyvg/vue3-notification";
import regiteruser from "../../service/register.user.service.js"


export default {
    name: 'RegisterUser',
    setup() {
        const store = useStore()
        const name = ref("")
        const email = ref("")
        const password = ref("")
        const password_confirmation = ref("")
        const loading = ref(false)
        const erros = ref('')

        const salvarUsuario = () => {
            loading.value = true
            regiteruser.register({
                name: name.value,
                email: email.value,
                password: password.value,
                password_confirmation: password_confirmation.value
            }).then(() => {
                notify({
                    title: 'Sucesso',
                    text: 'Conta criada com sucesso',
                    type: 'success'
                })
                router.push({ name: 'admin.home' })
            }).catch((error) => {
                erros.value = error.data.errors
            }).finally(() => loading.value = false)
        }
        return {
            erros,
            salvarUsuario,
            name,
            email,
            password,
            password_confirmation,
            loading
        }
    },
}

</script>

<style scoped>
.box {
    position: absolute !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    width: 25rem !important;
    padding: 0.3rem !important;
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
    color: #f2f4f5 !important;
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
    background-color: #1cb1f5 !important;
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
    color: rgb(147, 147, 150) !important
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
        text-align: center !important;
    }
}

ul li {
    list-style: none;
    color:#fff
}

ul li a {
    list-style: none;
    text-decoration: none;
}

ul li a:hover {
    list-style: none;
    text-decoration: none;
    color: rgb(162, 162, 163) !important
}

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .text-align-sm {
        text-align: center !important;
    }
div span b #topTextCount{
        color:#fff !important
    }
}</style>
