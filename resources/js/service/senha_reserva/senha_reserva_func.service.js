import BaseService from "../base.service"

export default class cursosService extends BaseService{

    static async getSenhaFuncionario(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/reserva_senha_funcionario')
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }
}