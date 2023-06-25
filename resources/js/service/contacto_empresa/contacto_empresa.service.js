import BaseService from "../base.service"

export default class contacto_empresaService extends BaseService{

    static async getContacto_empresas(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/Contacto_empresas')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async filter(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/filter', {params})
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response))
        })
    }

    static async updateFormContacto_empresa(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getContacto_empresa/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateContacto_empresa(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateContacto_empresa/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarContacto_empresa(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarContacto_empresa/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addContacto_empresas(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerContacto_empresa', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesContacto_empresa/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

}