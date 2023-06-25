const getters = {
    todosClientes:(state)=>(filter)=>{
        return state.items.filter(todos => 
            todos.name.toUpperCase().includes(filter.toUpperCase()) ||
            todos.numBI.toUpperCase().includes(filter.toUpperCase()) ||
            todos.departamentos["departamento"]
              .toUpperCase()
              .includes(filter.toUpperCase()))
    },

    contarClientes(state){
        return state.items.filter(todos =>todos.name)
    },

    todosClientesCount(state, getters){
        var total= getters.contarClientes.length
        return total
    },

}

export default getters