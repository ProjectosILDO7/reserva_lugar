import BaseService from "../base.service"

export default class messagesClienteService extends BaseService{

    static async getMensagensCliente(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/mensagesCliente')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    
    }

    static async getMensagensReedCliente(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/mensagesReedCliente')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    
    }
    static async getMensagesUserCliente(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/mensagesCliente/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
    
    static async lidaCliente(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/smsLidaCliente/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
}