import BaseService from "../base.service"

export default class departamentoService extends BaseService{

    static async getDepartamentos(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/departamentos')
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

    static async updateFormDepartamento(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getDepartamento/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateDepartamento(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateDepartamento/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarDepartamento(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarDepartamento/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addDepartamentos(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerDepartamento', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesDepartamento/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

}