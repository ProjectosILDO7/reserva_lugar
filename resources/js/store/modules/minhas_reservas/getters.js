const getters = {
    todasMinhasReservas:(state)=>(filter)=>{
        return state.items.filter(todos => 
            console.log(todos),
            todos.data.toUpperCase().includes(filter.toUpperCase()))
    },

    contarMinhasReservas(state){
        return state.items.filter(todos =>todos.data)
    },

    todasMinhasReservasCount(state, getters){
        var total= getters.contarReservas.length
        return total
    },

}

export default getters