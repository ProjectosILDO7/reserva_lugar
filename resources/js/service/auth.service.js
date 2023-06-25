import BaseService from "./base.service"
import { TOKEN_NAME } from '@/configs'
export default class AuthService extends BaseService {
    static async auth (params) {
        return new Promise((resolve, reject) => {
            this.request()
                .post('/auth/login', params)
                .then(response => {
                    localStorage.setItem(TOKEN_NAME, response.data.token)
                    resolve(response)
                })
                .catch(error =>{ 
                    if(error.response.status!=429){
                        if(error.response.status==500){
                            reject(error.response.status)
                        }else{
                            reject(error.response.data.error)
                        }
                        
                    }else{
                        reject(error.response.data.message+', try again later')
                    }
                })
        })
    }

    static async getMe () {
        const token = await localStorage.getItem(TOKEN_NAME)

        if (!token) {
            return Promise.reject('Token não encontrado')
        }

        return new Promise((resolve, reject) => {
            this.request({auth: true})
                .get('/auth/me')
                .then(response => resolve(response.data))
                .catch(error => {
                    localStorage.removeItem(TOKEN_NAME)
                    reject(error.response)
                })
        })
    }

    static async updatePefil (params) {
        const token = await localStorage.getItem(TOKEN_NAME)

        if (!token) {
            return this.$router.push({name:'home.login'})
        }

        return new Promise((resolve, reject) => {
            this.request({auth: true})
                .put('/updateuser', params)
                .then(response =>resolve(response))
                .catch(error => reject(error))
        })
    }


    static async forgetPassword (params) {
        return new Promise((resolve, reject) => {
            this.request()
                .post('/forget-password', params)
                .then(response => resolve(response))
                .catch(error => reject(error.response))
        })
    }
    
    static async userSave (params) {
        return new Promise((resolve, reject)=>{
            this.request()
                .post('/registerUser', params)
                .then(response => resolve(response))
                .catch(error=>reject(error.response.data))
        })
    }

    static async logout () {
        return new Promise((resolve, reject) => {
            this.request({auth:true})
                .get('/auth/logout')
                .then(() => {
                    localStorage.removeItem(TOKEN_NAME)
                    resolve('Ok')
                })
                .catch(error => reject(error.response))
        })
    }

    static async perfilUpdate (params){
        return new Promise((resolve, reject)=>{
            this.request({auth:true})
                .put('/updateuser', params)
                .then((resp)=>resolve(resp.data.message))
                .catch((erro)=>reject(erro.response))
        })
    }

}