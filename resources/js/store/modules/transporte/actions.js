import transportesService from '../../../service/transporte/transportes.service.js'

const actions = {
    
    loadingTransportes({commit}){
        commit('PRELOADING', true)
        return transportesService.getTransportes()
                        .then(response =>commit('ADD_ALL_TRANSPORTES', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createTransporte(_, params){
        return transportesService.addTransporte(params)
    },

    updateFormTransporte({commit}, id){
        commit('PRELOADING', true)
        return transportesService.updateFormTransporte(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateTransporte({commit}, params){
        commit('PRELOADING', true)
        return transportesService.updateTransporte(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarTransporte({commit}, params){
        commit('PRELOADING', true)
        return transportesService.apagarTransporte(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesTransporte({commit}, params){
        commit('PRELOADING', true)
        return transportesService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    },
}

export default actions