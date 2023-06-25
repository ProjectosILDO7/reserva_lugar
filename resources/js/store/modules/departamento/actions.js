import departamentosService from '../../../service/departamento/departamento.service'

const actions = {
    
    loadingDepartamentos({commit}){
        commit('PRELOADING', true)
        return departamentosService.getDepartamentos()
                        .then(response =>commit('ADD_ALL_DEPARTAMENTOS', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createDepartamento(_, params){
        return departamentosService.addDepartamentos(params)
    },

    updateFormDepartamento({commit}, id){
        commit('PRELOADING', true)
        return departamentosService.updateFormDepartamento(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateDepartamento({commit}, params){
        commit('PRELOADING', true)
        return departamentosService.updateDepartamento(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarDepartamento({commit}, params){
        commit('PRELOADING', true)
        return departamentosService.apagarDepartamento(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhes({commit}, params){
        commit('PRELOADING', true)
        return departamentosService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    }
}

export default actions