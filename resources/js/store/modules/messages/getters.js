const getters = {
    todasMensagens:(state)=>(filter)=>{
        console.log(state)
        return state.items.filter(msm => msm.email.includes(filter))
    },
    
    loagingMessages(state){
        return state.items
    },

    todosNomesMensagens(state){
        console.log(state)
        return state.items.filter(msm =>msm.email)
    },

    todasMensagensCount(state, getters){
        var total= getters.todosNomesMensagens.length
        return total
    },

}

export default getters