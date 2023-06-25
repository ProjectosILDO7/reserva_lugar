const getters = {
    todosDepartamentos:(state)=>(filter)=>{
        return state.items.filter(dep => dep.departamento.includes(filter))
    },

    todosNomesDepartamentos(state){
        return state.items.filter(dep =>dep.departamento)
    },

    todosDepartamentoCount(state, getters){
        var total= getters.todosNomesDepartamentos.length
        return total
    },

}

export default getters