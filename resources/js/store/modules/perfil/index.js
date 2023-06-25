import perfilService from "@/service/perfil.service.js"

export default {
    state:{
        items:[],
        loading:false
    },
    mutations:{
        SET_LOADING(state, loading){
            state.loading = loading
        }
    },
    actions:{
        perfilupadate(_, params){
           perfilService.perfilUpdate(params)
        }
    },
    getters:{
        me(state){
            return state.items.filter(me=>me.name)
        }
    }
}