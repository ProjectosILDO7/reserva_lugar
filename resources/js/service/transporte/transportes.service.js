import BaseService from "../base.service"

export default class transportesService extends BaseService{

    static async getTransportes(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/transportes')
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

    static async updateFormTransporte(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getTransporte/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateTransporte(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateTransporte/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarTransporte(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarTransporte/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addTransporte(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerTransporte', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesTransporte/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }
}