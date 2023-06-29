import BaseService from "../base.service"

export default class notifyService extends BaseService{

    static async getNotificacoesCliente(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/notificacoesCliente')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    
    }

    static async getNotificacoesReedCliente(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/notificacoesReedCliente')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    
    }
    static async getNotificacoesClienteUser(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/notify/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
    static async notifyInativoCliente(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/notifyInativoCliente/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
}