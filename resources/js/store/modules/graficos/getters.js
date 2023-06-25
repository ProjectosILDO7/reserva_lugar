const getters = {
    graficoDeBarra(state){
        console.log(state)
        return state.items.filter(graf =>graf.mes)
    },
}

export default getters