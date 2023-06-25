import contacto_empresaService from '../../../service/contacto_empresa/contacto_empresa.service'

const actions = {
    
    loadingContacto_empresas({commit}){
        commit('PRELOADING', true)
        return contacto_empresaService.getContacto_empresas()
                        .then(response =>commit('ADD_ALL_CONTACTO_EMPRESA', response.data))
                        .catch(error=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },

    createContacto_empresa(_, params){
        return contacto_empresaService.addContacto_empresas(params)
    },

    updateFormContacto_empresa({commit}, id){
        commit('PRELOADING', true)
        return contacto_empresaService.updateFormContacto_empresa(id)
                             .finally(()=>commit('PRELOADING', false))
    },

    updateContacto_empresa({commit}, params){
        commit('PRELOADING', true)
        return contacto_empresaService.updateContacto_empresa(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    apagarContacto_empresa({commit}, params){
        commit('PRELOADING', true)
        return contacto_empresaService.apagarContacto_empresa(params)
                             .finally(()=>commit('PRELOADING', false))
    },

    detalhes({commit}, params){
        commit('PRELOADING', true)
        return contacto_empresaService.detalhes(params)
                             .finally(()=>commit('PRELOADING', false))
    }
}

export default actions