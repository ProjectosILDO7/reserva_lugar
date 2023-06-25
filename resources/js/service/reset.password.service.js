import BaseService from "./base.service"
import { TOKEN_NAME } from '@/configs'

export default class ResetPasswordService extends BaseService {

    static async reset (params) {
        return new Promise((resolve, reject) => {
            this.request()
                .post('/reset-password', params)
                .then(response => resolve(response))
                .catch(error => reject(error.response))
        })
    }
}