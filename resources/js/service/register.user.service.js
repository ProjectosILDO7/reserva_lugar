import BaseService from "./base.service"

export default class RegisterUser extends BaseService {

    static async register (params) {
        return new Promise((resolve, reject) => {
            this.request()
                .post('/registerUser', params)
                .then(response => resolve(response))
                .catch(error => reject(error.response))
        })
    }
}