const getters = {
    todosTransportes:(state)=>(filter)=>{
        return state.items.filter(transporte => transporte.transporte.toUpperCase().includes(filter.toUpperCase()))
    },

    todosNomesTransporte(state){
        return state.items.filter(transporte =>transporte.transporte)
    },

    todosTransporteCount(state, getters){
        var total= getters.todosNomesTransporte.length
        return total
    },

}

export default getters