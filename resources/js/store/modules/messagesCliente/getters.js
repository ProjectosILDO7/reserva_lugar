const getters = {
    todasMensagensCliente:(state)=>(filter)=>{
        console.log(state)
        return state.items.filter(msm => msm.email.includes(filter))
    },
    
    loagingMessagesCliente(state){
        return state.items
    },

    todosNomesMensagensCliente(state){
        console.log(state)
        return state.items.filter(msm =>msm.email)
    },

    todasMensagensClienteCount(state, getters){
        var total= getters.todosNomesMensagens.length
        return total
    },

}

export default getters