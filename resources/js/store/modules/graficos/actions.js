import graficos from '../../../service/graficos/graficos.service.js'

const actions = {
    
    loadingGraficoDeBarra({commit}){
        commit('PRELOADING', true)
        return graficos.getGraficoBarra()
                        .then(response =>response/*commit('ADD_ALL_GRAFICOS', response.data.gBarra)*/)
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    // createCategoria(_, params){
    //     return graficos.addCategoria(params)
    // },

    // updateFormCategoria({commit}, id){
    //     commit('PRELOADING', true)
    //     return graficos.updateFormCategoria(id)
    //                          .finally(()=>commit('PRELOADING', false))
    // },

    // updateCategoria({commit}, params){
    //     commit('PRELOADING', true)
    //     return graficos.updateCategoria(params)
    //                          .finally(()=>commit('PRELOADING', false))
    // },

    // apagarCategoria({commit}, params){
    //     commit('PRELOADING', true)
    //     return graficos.apagarCategoria(params)
    //                          .finally(()=>commit('PRELOADING', false))
    // },

    // detalhesCategoria({commit}, params){
    //     commit('PRELOADING', true)
    //     return graficos.detalhes(params)
    //                          .finally(()=>commit('PRELOADING', false))
    // }
}

export default actions