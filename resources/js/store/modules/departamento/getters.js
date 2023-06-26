const getters = {
    todosDepartamentos:(state)=>(filter)=>{
        return state.items.filter(dep => dep.departamento.includes(filter))
    },

    loadingDepartamentos(state){
        console.log(state)
        return state.items
    },

    todosNomesDepartamentos(state){
        return state.items
    },

    todosDepartamentoCount(state, getters){
        var total= getters.todosNomesDepartamentos.length
        return total
    },

}

export default getters