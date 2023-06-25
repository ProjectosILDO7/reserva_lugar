export default{
    state:{
        btn_loading:false
    },
    mutations:{
        BTN_PRELOADING(state, status){
            state.btn_loading = status
        }
    }
}