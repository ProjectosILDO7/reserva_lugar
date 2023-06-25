import BaseService from "../base.service"

export default class messagesService extends BaseService{

    static async getMensagens(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/mensages')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    
    }

    static async getMensagensReed(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/mensagesReed')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    
    }
    static async getMensagesUser(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/mensages/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
    
    static async lida(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/smsLida/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
}