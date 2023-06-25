import BaseService from "../base.service"

export default class categoriaService extends BaseService{

    static async getCategorias(){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get('/categorias')
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

    static async updateFormCategoria(id){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/getCategoria/${id}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async updateCategoria(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put(`/updateCategoria/${params.id}`, params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async apagarCategoria(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/apagarCategoria/${params}`)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro))
        })
    }

    static async addCategoria(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .post('/registerCategoria', params)
                .then((resp)=>resolve(resp))
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

    static async detalhes(params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .get(`/detalhesCategoria/${params}`)
                .then((resp)=>{
                    //console.log(resp.data)
                    resolve(resp)
                })
                .catch((erro)=>reject(erro.response.data.errors))
        })
    }

}