import reservas from '../../../service/reservas/reservas.service'

const actions = {
    
    loadingReservas({_, commit}){
        commit('PRELOADING', true)
        return reservas.getReservas()
                        .then((response) =>{
                            commit('ADD_ALL_RESERVAS', response.data)
                        })
                        .catch((error)=>console.log(error))
                        .finally(()=>commit('PRELOADING', false))
    },
    
    // loadingFuncionariosExcel({_, commit}){
    //     commit('PRELOADING', true)
    //     return FuncionariosService.getFuncionarios()
    //                     .catch((error)=>console.log(error))
    //                     .finally(()=>commit('PRELOADING', false))
    // },
    // inativo({commit}, params){
    //     commit('PRELOADING', true)
    //     return FuncionariosService.inativo(params)
    //                                 .finally(()=>commit('PRELOADING', false))
    // },
    // activo({commit}, params){
    //     commit('PRELOADING', true)
    //     return FuncionariosService.activo(params)
    //                                 .finally(()=>commit('PRELOADING', false))
    // },

    // all_funcionarios(){
    //     return FuncionariosService.getFuncionarios()
                                
    // },

    // updateFormFuncionario({commit}, id){
    //     commit('PRELOADING', true)
    //     return FuncionariosService.updateFormFuncionario(id)
    //                          .finally(()=>commit('PRELOADING', false))
    // },

    // updateFuncionario({commit}, params){
    //     commit('PRELOADING', true)
    //     return FuncionariosService.updateFuncionario(params)
    //                          .finally(()=>commit('PRELOADING', false))
    // },

    // apagarFuncionario({commit}, params){
    //     commit('PRELOADING', true)
    //     return FuncionariosService.apagarFuncionario(params)
    //                          .finally(()=>commit('PRELOADING', false))
    // },

    // detalhesFuncionario({commit}, params){
    //     commit('PRELOADING', true)
    //     return FuncionariosService.detalhes(params)
    //                          .finally(()=>commit('PRELOADING', false))
    // }
}

export default actions