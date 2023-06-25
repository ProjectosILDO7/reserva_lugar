const getters = {
    todosFuncionarios:(state)=>(filter)=>{
        return state.items.filter(todos => 
            todos.name.toUpperCase().includes(filter.toUpperCase()) ||
            todos.numBI.toUpperCase().includes(filter.toUpperCase()) ||
            todos.departamentos["departamento"]
              .toUpperCase()
              .includes(filter.toUpperCase()))
    },

    contarFuncionarios(state){
        return state.items.filter(todos =>todos.name)
    },

    todosFuncionariosCount(state, getters){
        var total= getters.contarFuncionarios.length
        return total
    },

}

export default getters