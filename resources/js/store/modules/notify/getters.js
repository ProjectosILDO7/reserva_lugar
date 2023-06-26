const getters = {
    todasNotificacoes:(state)=>(filter)=>{
        return state.items.filter(notify => notify.data.includes(filter))
    },

    todosNomesNotificacoes(state){
        return state.items
    },

    todasNotificacoesCount(state, getters){
        var total= getters.todosNomesNotificacoes.length
        return total
    },

}

export default getters