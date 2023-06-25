<template>
    <!-- <div class="card col-xs-12 col-sm-12 col-md-4 col-lg-4 m-auto mt-4 shadow">

        <div class="card-header text-center">
            <span class="">
                <b>Propy-x: Actualização de senha</b>
            </span>
        </div>
        <br>
        <div class="card-body">
            <form method="">

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-at"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Utilizador" aria-label="Utilizador"
                        aria-describedby="addon-wrapping" v-model="email">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fa-solid fa-user-lock"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Senha" aria-label="Senha"
                        aria-describedby="addon-wrapping" v-model="password">
                </div>

                <div class="d-grid gap-2">
                    <button :class="[
                        'btn', 'btn-info', 'text-light',
                        loading ? 'loading' : ''
                    ]" type="button" @click.prevent="auth">
                        <span v-if="loading">
                            <i class="fa-solid fa-spinner"></i> Actualizando...
                        </span>
                        <span v-else>
                            <i class="fa-solid fa-right-to-bracket"></i> Alterar a senha
                        </span>
                    </button>
                </div>
                <br>
                <hr>
                <div class="form-group text-md-center text-align-sm">
                    <ul>
                        <li>
                            <router-link class="text-secondary" :to="{ name: 'home.register' }">
                                Criar uma conta
                            </router-link>
                        </li>
                    </ul>
                </div>

            </form>
        </div>
    </div> -->
    <div class="box">

        <div class="col-12 text-light text-center mt-0 mb-2">
            <b>Actualização de senha</b>
        </div>

        <form>
            <div class="inputBox">
                <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);" v-model="email">
                <label>Utilizador</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required v-model="password"
                    onkeyup="this.setAttribute('value', this.value);" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                <label>Palavra chave</label>
            </div>
            <div class="d-grid gap-2">
                <button :class="[
                    'btn', 'btn-info', 'text-light',
                    loading ? 'loading' : ''
                ]" type="button" @click.prevent="auth">
                    <span v-if="loading">
                        <i class="fa-solid fa-spinner"></i> Actualizando...
                    </span>
                    <span v-else>
                        <i class="fa-solid fa-right-to-bracket"></i> Alterar a senha
                    </span>
                </button>
            </div>
            <br>
            <hr>
            <div class="form-group text-center mr-2">
                <ul>
                    <li><router-link class="text-light" :to="{ name: 'home.reset' }">
                            Esqueci minha senha
                        </router-link></li>
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
import router from '../../router/'
import { notify } from "@kyvg/vue3-notification";
import ResetPasswordService from '@/service/reset.password.service.js'

export default {
    name: "resetPassword",
    props: {
        token: {
            require: true,
        }
    },
    setup(props) {
        const email = ref("")
        const password = ref("")
        const loading = ref(false)

        const auth = () => {
            loading.value = true
            ResetPasswordService.reset({
                email: email.value,
                password: password.value,
                token: props.token,
            })
                .then(() => {
                    notify({
                        title: 'Sucesso',
                        text: 'A sua senha foi actualizada com sucesso',
                        type: 'success'
                    })
                    router.push({ name: 'home.login' })
                })
                .catch((error) => {
                    console.log(error)
                    let msmErro = 'Falha na actualização de senha'
                    if (error.status == 422) msmErro = 'Dados inválidos'
                    if (error.status == 404) msmErro = 'Usuário não encontrado'

                    notify({
                        title: "Falha na actualização",
                        text: msmErro,
                        type: "warn"
                    });
                })
                .finally(() => loading.value = false)
        }
        return {
            auth,
            email,
            password,
            loading

        }
    },
    created() {

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
    color: blue !important
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
