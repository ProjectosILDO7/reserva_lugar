import AuthService from "@/service/auth.service";

export default {
    state: {
        user: [],
        authorization: false,
    },

    mutations: {
        SET_USER(state, user) {
            state.user = user;
            state.authorization = true;
        },
        LOGOUT(state) {
            state.user = {};
            state.authorization = false;
        },
    },

    actions: {
        auth({ dispatch }, params) {
            return AuthService.auth(params).then(() => dispatch("getMe"));
        },

        getMe({ commit }) {
           commit('PRELOADING', true)
           return AuthService.getMe()
                .then((user) => commit("SET_USER", user))
                .catch((erro)=>erro)
                .finally(()=>commit('PRELOADING', false))
        },

        getMeSemLoading() {
           return AuthService.getMe()
        },

        meuPerfil({commit}) {
           commit('PRELOADING', true)
           return AuthService.getMe((user) => commit("SET_USER", user))
                             .finally(()=>commit('PRELOADING', false))
        },

        logout({ commit }) {
            return AuthService.logout()
                .then(() => commit("LOGOUT"))
        },

        forgetPassword(_, params) {
            return AuthService.forgetPassword(params);
        },

        userSave({commit}, params){
            return AuthService.userSave(params)
                                .then((res)=>console.log(res))
                                .catch((error)=>console.log(error))
        },

        perfilupadate(_, params){
            AuthService.perfilUpdate(params)
         }
    },
    getters:{
        gettersMe(state){
            return state.user
        }
    }
};
