export default{
    state:{
        preloading:false
    },
    mutations:{
        PRELOADING(state, status){
            state.preloading = status
        }
    }
}