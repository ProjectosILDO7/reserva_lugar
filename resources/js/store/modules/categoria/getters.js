const getters = {
    todasCategorias:(state)=>(filter)=>{
        return state.items.filter(category => category.categoria.includes(filter))
    },

    todosNomesCategoria(state){
        return state.items.filter(category =>category.categoria)
    },

    todasCategoriasCount(state, getters){
        var total= getters.todosNomesCategoria.length
        return total
    },

}

export default getters