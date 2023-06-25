import BaseService from "../base.service"

export default class EstudantesService extends BaseService{

    static async getFuncionarios(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/funcionarios')
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

    static async updateFormFuncionario(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getFuncionario/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateFuncionario(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateFuncionario/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async inativo(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/inativar/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
    static async activo(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/activo/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarFuncionario(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarFuncionario/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addFuncionario(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerFuncionario', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesFuncionarioRF/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

}