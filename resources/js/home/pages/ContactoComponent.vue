<template>
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row mt-4">
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 py-4 text-center">
                <h1>Contacto</h1>
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 border-start py-4">
                <ul>
                    <li>Ildo Marques Cuema</li>
                    <li><i class="fa-brands fa-facebook fa-lg text-primary"></i> Ildocuema</li>
                    <li><i class="fa-brands fa-whatsapp fa-lg text-success"></i> +244 921 923 232</li>
                </ul>
            </div>

            <div class="form-group col-12">
                <h4>Envie-nos um e-mail</h4>
                <form>
                    <div class="input-group mb-3">
                        
                        <span class="text-danger small col-12" v-if="erros.email">{{ erros.email[0] }}</span>
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" v-model="items.email" placeholder="E-mail" aria-label="E-mail"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="text-danger small col-12" v-if="erros.telemovel">{{ erros.telemovel[0] }}</span>
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="tel" class="form-control" v-model="items.telemovel" placeholder="Tel." aria-label="Tel"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="form-floating">
                        <span class="text-danger small col-12" v-if="erros.comentario">{{ erros.comentario[0] }}</span>
                        <textarea class="form-control" v-model="items.comentario" placeholder="Leave a comment here"
                            id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comentario</label>
                    </div>
                </form>

                <div class="d-grid gap-2 mt-4" v-if="loading">
                    <button class="btn btn-primary text-light" type="button" @click="enviar">
                        <i class="fa-solid fa-paper-plane"></i>
                        Enviando seu email ...
                    </button>
                </div>
                <div class="d-grid gap-2 mt-4" v-else>
                    <button class="btn btn-primary text-light" type="button" @click="enviar">
                        <i class="fa-solid fa-paper-plane"></i>
                        Enviar e-mail
                    </button>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

import axios from "axios"
import { URL_API } from "../../configs/index.js"

export default {
    name: 'contacto-page',
    data() {
        return {
            erros:[ { email:'', telemovel:'', comentario:''} ],
            items: { email: '', telemovel: '', comentario: '' },
            axiosConfig : { headers: {'Content-Type': 'application/json;charset=UTF-8', "Access-Control-Allow-Origin": "*",}},
            loading: false
        }
    },

    methods: {
        enviar() {
            this.loading=true
            axios.post(`${URL_API}/sendEmail`, this.items, this.axiosConfig)
                .then((response) => {
                    this.$swal.fire({
                        title: 'Sucesso',
                        text: response.data.success,
                        icon: 'success',
                        timer: 15000
                    })
                    
                })
                .catch((erro) => {
                    console.log(erro)
                    this.erros=erro.response.data.errors
                })
                .finally(()=>{
                    this.loading=false,
                    this.items = { email: '', telemovel: '', comentario: '' }
                })
        }
    }
}
</script>