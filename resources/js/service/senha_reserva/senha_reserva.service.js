import BaseService from "../base.service"

export default class cursosService extends BaseService{

    static async getSenhaEstudantes(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/reserva_senha_aluno')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
}