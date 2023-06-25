import BaseService from "../base.service"

export default class ClientesService extends BaseService{

    static async getClientes(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/clientes')
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

    static async addReserva(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/criar_reserva/${params}`)
                .then((resp)=>resolve(resp.data.message))
                .catch((erro)=>reject(erro.response.data.message))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesFuncionario/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

}