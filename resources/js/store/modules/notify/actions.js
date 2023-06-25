import notificacaoService from '../../../service/notify/notify.service.js'

const actions = {
    
    loadingNotificacoes({commit}){
        commit('PRELOADING', true)
        return notificacaoService.getNotificacoes()
                        .then((response)=>commit('ADD_ALL_NOTIFY', response.data))
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    loadingNotificacoesReed({commit}){
        commit('PRELOADING', true)
        return notificacaoService.getNotificacoesReed()
                        .then((response)=>response)
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

}

export default actions