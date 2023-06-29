import mensagesClienteService from '../../../service/messagesCliente/messages.service'

const actions = {
    
    loadingMensagensCliente({commit}){
        commit('PRELOADING', true)
        return mensagesClienteService.getMensagensCliente()
                        .then((response)=>commit('ADD_ALL_MENSAGENS', response.data))
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    loadingMensagensReedCliente({commit}){
        commit('PRELOADING', true)
        return mensagesClienteService.getMensagensReedCliente()
                        .then((response)=>response)
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    marcar_como_lidaCliente({commit}, params){
        commit('PRELOADING', true)
        return mensagesClienteService.lidaCliente(params)
                        .then((response)=>commit('ADD_ALL_MENSAGENS', response.data))
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

}

export default actions