import categoriaService from '../../../service/categoria/categoria.service.js'

const actions = {
    
    loadingCategorias({commit}){
        commit('PRELOADING', true)
        return categoriaService.getCategorias()
                        .then(response =>commit('ADD_ALL_CATEGORIAS', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createCategoria(_, params){
        return categoriaService.addCategoria(params)
    },

    updateFormCategoria({commit}, id){
        commit('PRELOADING', true)
        return categoriaService.updateFormCategoria(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateCategoria({commit}, params){
        commit('PRELOADING', true)
        return categoriaService.updateCategoria(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarCategoria({commit}, params){
        commit('PRELOADING', true)
        return categoriaService.apagarCategoria(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhesCategoria({commit}, params){
        commit('PRELOADING', true)
        return categoriaService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    }
}

export default actions