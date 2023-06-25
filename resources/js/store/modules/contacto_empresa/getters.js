const getters = {
    todosContacto_empresas:(state)=>(filter)=>{
        return state.items.filter(empresa => empresa.empresa.includes(filter))
    },

    loadingContacto_empresa(state){
        return state.items
    },

    todosNomesContacto_empresas(state){
        return state.items.filter(empresa =>empresa.empresa)
    },

    todosContacto_empresaCount(state, getters){
        var total= getters.todosNomesContacto_empresas.length
        return total
    },

}

export default getters