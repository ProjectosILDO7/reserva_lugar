import BaseService from "./base.service"

export default class perfilUpdate extends BaseService {
    static async perfilUpdate (params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put('/updateuser', params)
                .then((resp)=>resolve(resp.data.message))
                .catch((erro)=>reject(erro.response))
        })
    }
}