import BaseService from "../base.service"

export default class notifyService extends BaseService{

    static async getNotificacoes(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/notificacoes')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    
    }

    static async getNotificacoesReed(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/notificacoesReed')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    
    }
    static async getNotificacoesUser(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/notify/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
}