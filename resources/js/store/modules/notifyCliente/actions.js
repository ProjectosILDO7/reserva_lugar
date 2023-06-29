import notificacaoClienteService from '../../../service/notifyCliente/notifyCliente.service.js'

const actions = {
    // Lado do CLiente
    loadingNotificacoesCliente({commit}){
        commit('PRELOADING', true)
        return notificacaoClienteService.getNotificacoesCliente()
                        .then((response)=>commit('ADD_ALL_NOTIFYCLIENTE', response.data))
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    loadingNotificacoesReedCliente({commit}){
        commit('PRELOADING', true)
        return notificacaoClienteService.getNotificacoesReedCliente()
                        .then((response)=>commit('ADD_ALL_NOTIFYCLIENTE', response.data))
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    notifyInativoCliente({commit}, params){
        commit('PRELOADING', true)
        return notificacaoClienteService.notifyInativoCliente(params)
                        .then((response)=>commit('ADD_ALL_NOTIFYCLIENTE', response.data))
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

}

export default actions