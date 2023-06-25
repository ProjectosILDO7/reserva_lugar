const getters = {
    todasReservas:(state)=>(filter)=>{
        return state.items.filter(todos => 
            console.log(todos),
            todos.data.toUpperCase().includes(filter.toUpperCase()))
    },

    contarReservas(state){
        return state.items.filter(todos =>todos.data)
    },

    todasReservasCount(state, getters){
        var total= getters.contarReservas.length
        return total
    },

}

export default getters