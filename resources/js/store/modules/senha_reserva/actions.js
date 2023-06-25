import reservaSenhaDeEstudante from '../../../service/senha_reserva/senha_reserva.service.js'
import reservaSenhaDeFuncionario from '../../../service/senha_reserva/senha_reserva_func.service.js'

const actions = {
    
    loadingReservaSenhaEstudante({commit}){
        return reservaSenhaDeEstudante.getSenhaEstudantes()
                        .then(response =>commit('ADD_ALL_SENHA_ESTUDANTES', response.data))
                        .catch(error=>console.log(error))
    },

    loadingReservaSenhaFuncionario({commit}){
        return reservaSenhaDeFuncionario.getSenhaFuncionario()
                        .then(response =>commit('ADD_ALL_SENHA_FUNCIONARIO', response.data))
                        .catch(error=>console.log(error))
    },
}

export default actions