import mensagesService from '../../../service/messages/messages.service.js'

const actions = {
    
    loadingMensagens({commit}){
        commit('PRELOADING', true)
        return mensagesService.getMensagens()
                        .then((response)=>commit('ADD_ALL_MENSAGENS', response.data))
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    loadingMensagensReed({commit}){
        commit('PRELOADING', true)
        return mensagesService.getMensagensReed()
                        .then((response)=>response)
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    marcar_como_lida({commit}, params){
        commit('PRELOADING', true)
        return mensagesService.lida(params)
                        .then((response)=>commit('ADD_ALL_MENSAGENS', response.data))
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

}

export default actions