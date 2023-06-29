import { createStore } from "vuex";
import users from "./modules/users";
import categorias from "./modules/categoria";
import departamentos from "./modules/departamento"
import graficos from "./modules/graficos"
import funcionarios from './modules/funcionarios'
import contacto_empresa from './modules/contacto_empresa'
import clientes from './modules/clientes'
import notificacoes from './modules/notify'
import notificacoesCliente from './modules/notifyCliente'
import mensagens from './modules/messages'
import mensagensCliente from './modules/messagesCliente'
import reservas from './modules/reservas'
import minhas_reservas from './modules/minhas_reservas'
import transporte from './modules/transporte'
import senha_reserva from "./modules/senha_reserva"
import carregar from "./modules/preloading/preloading-carregando.js"
import preloading_simples from "./modules/preloading/preloading-simples.js"
import btn_loading from "./modules/preloading/btn-preloading-black.js"

export default createStore({
    modules:{
        users,
        categorias,
        funcionarios,
        clientes,
        notificacoes,
        notificacoesCliente,
        contacto_empresa,
        mensagensCliente,
        mensagens,
        reservas,
        minhas_reservas,
        departamentos,
        transporte,
        graficos,
        senha_reserva,
        carregar,
        btn_loading,
        preloading_simples
    }
})