export default{
    state:{
        loading:false
    },
    mutations:{
        PRELOADING_CARREGAR(state, status){
            state.loading = status
        }
    }
}