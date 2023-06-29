const getters = {
    // Lado Cliente
    todasNotificacoesCliente:(state)=>(filter)=>{
        return state.items.filter(notify => notify.conteudo.includes(filter))
    },

    todosNomesNotificacoesCliente(state){
        console.log(state);
        return state.items
    },

    todasNotificacoesClienteCount(state, getters){
        var total= getters.todosNomesNotificacoesCliente.length
        return total
    },

}

export default getters