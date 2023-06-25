<template>
  <div class="container mt-4">
    <topo-page-component :namePage="namePage" :nameButton="nameButto" :pageTopoIcon="pageTopoIcon"
      @buscar-curso-id="buscaClienteID" />

    <br />

    <!-- Área de impressão -->
    <div class="row">
      <div class="form-group col-6 text-start mb-2" v-if="todosClientesCount != 0">
        <!-- Export Excel file -->
        <download-excel class="btn btn-sm btn-outline-success" :data="Clientes" :fields="fields"
          :json_meta="json_meta" type="xls" worksheet="Meus Clientes" name="Lista de funcionários.xls">
          <i class="fa-solid fa-file-excel"></i> Exportar Excel
        </download-excel>

        <!-- <a class="btn btn-sm btn-primary ml-2" :href="`${urlExport}${meID}`">
          <i class="fa-solid fa-bag-shopping text-warning"></i>
          Folha de pagamento
        </a> -->

        <!-- Exportar no plugin xlsx -->
        <!-- <button class="btn btn-sm btn-outline-success" @click="exportExcel">
          <i class="fa-solid fa-file-excel"></i> Exportar para Excel
        </button> -->

      </div>

      <div class="form-group col-6 text-end mb-2" v-if="todosClientesCount != 0">
        <span class="rext-secondary">Total de Clientes:</span>
        <span class="rext-secondary fw-bold"> ( {{ todosClientesCount }} )</span>
      </div>

      <div class="form-group col-12 text-end mb-2" v-else>
        <span class="rext-secondary">Total de funcionários:</span>
        <span class="rext-secondary fw-bold"> ( {{ todosClientesCount }} )</span>
      </div>
    </div>
    <!-- Înput search -->
    <form class="d-flex" role="search" v-if="todosClientesCount >= 10">
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
        <input class="form-control form-control-sm" v-model="filter" type="search" placeholder="Pesquisar"
          aria-label="Search" />
      </div>
    </form>
    <!-- End input search -->

    <div class="row" v-if="Clientes == ''">
      <div class="form-group col-12 text-danger text-center fw-bold">
        Nenhum registo econtrado...
      </div>
    </div>

    <div class="card mt-2 shadow" v-for="Cliente in Clientes" :key="Cliente.id">
      <div class="card-body">
        <div class="row">
          <div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1 d-flex justify-content-start">
            <span class="text-secondary">
              <div class="dropdown">
                <button class="btn btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                      @click="updateClienteForm(Cliente.id)"><i
                        class="fa-regular fa-pen-to-square text-success"></i>
                      Alterar</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm"
                      @click="deleteCliente(Cliente.id)"><i class="fa-solid fa-trash text-danger"></i> Apagar</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                      aria-controls="offcanvasRight" @click="detalhes(Cliente.id)">
                      <i class="fa-solid fa-eye"></i> Vêr Detalhes
                    </a>
                  </li>
                  <li v-if="Cliente.status == 'Inativo'">
                    <a class="dropdown-item cursor" @click="activo(Cliente.id)">
                      <i class="fa-solid fa-lock-open text-primary"></i> Activar
                    </a>
                  </li>
                  <li v-else>
                    <a class="dropdown-item cursor" @click="inativo(Cliente.id)">
                      <i class="fa-solid fa-user-lock text-warning"></i> Inativar
                    </a>
                  </li>
                  <!-- <li>
                    <router-link class="dropdown-item" :to="{ name:'admin.pagamentos', params:{id:Cliente.id} }">
                      <i class="fa-solid fa-credit-card"></i>
                      Efectuar pagamentos
                    </router-link>
                  </li> -->
                </ul>
              </div>
            </span>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <p class="text-secondary h6">
              <span v-show="Cliente.image">
                <router-link :to="`${url}${Cliente.image}`" target="_blank">
                  <img :src="`${url}${Cliente.image}`" alt="image"
                    class="rounded-circle rounded-3 tamanhoUserImage" />
                </router-link>
                {{ Cliente.name }}</span>
              <span v-show="!Cliente.image"><img :src="url_no_image" alt="Sem_imagem"
                  class="rounded-circle rounded-3 tamanhoUserImage" />
                {{ Cliente.name }}</span>
            </p>
          </div>

          <div class="form-group col-xs-2 col-sm-2 col-md-3 col-lg-3">
            <label class="text-success">Pertence ao Departamento de:</label>
            <p class="text-secondary h6">
              <i class="fa-solid fa-book"></i>
              {{ Cliente.departamentos.departamento }}
            </p>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <label class="text-success">Nº do Documento</label>
            <p class="text-secondary h6">
              <i class="fa-regular fa-address-book"></i>
              {{ Cliente.numBI }}
            </p>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label class="text-success">Status</label>
            <p class="text-secondary h6" v-if="Cliente.status == 'Activo'">
              <i class="fa-sharp fa-solid fa-circle text-success"></i>
              {{ Cliente.status }}
            </p>
            <p class="text-secondary h6" v-else>
              <i class="fa-sharp fa-solid fa-circle text-warning"></i>
              {{ Cliente.status }}
            </p>
          </div>

        </div>
      </div>

      <!-- Listagem em tabela
                 <div class="card-body">

                <div class="row">

                    <div class="form-group col-12">
                        <div class="table-responsive">

                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Cod.</th>
                                        <th>graduacaos</th>
                                        <th>Cobrança</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="graduacao in graduacoes.data" :key="graduacao.id">
                                        <td>{{ graduacao.id }}</td>
                                        <td>{{ graduacao.graduacaos }}</td>
                                        <td>{{ vueNumberFormat(graduacao.cobranca, { isInteger: true }) }}</td>
                                        <td>
                                            <button @click="updategraduacaoForm(graduacao.id)"
                                                class="btn btn-sm btn-outline-success mr-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit" to="#">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger mr-2" data-bs-toggle="modal"
                                                data-bs-target="#modalDeleteConfirm" @click="deleteGraduac(graduacao.id)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 

                           

                            <nav aria-label="paginate">
                                <ul class="pagination pagination-sm" v-if="graduacoes.last_page > 1">
                                    <li class="page-item" v-if="graduacoes.current_page != 1">
                                        <a class="page-link" href="#"
                                            @click.prevent="loadingGraduac(graduacoes.current_page - 1)">{{ '<<' }}</a>
                                    </li>

                                    <li :class="['page-item', { 'active': graduacoes.current_page == page }]" aria-current="page"
                                        v-for="page in graduacoes.last_page" :key="page.id">
                                        <a class="page-link" href="#" @click.prevent="loadingGraduac(page)">{{ page }}</a>
                                    </li>

                                    <li class="page-item" v-if="graduacoes.current_page < graduacoes.last_page">
                                        <a class="page-link" href="#"
                                            @click.prevent="loadingGraduac(graduacoes.current_page + 1)">{{ '>>' }}</a>
                                    </li>
                                </ul>
                            </nav>


                        </div>
                    </div>
                </div>
            </div> -->
    </div>
    <br />
    <!-- paginate -->
    <nav aria-label="paginate mt-4">
      <ul class="pagination pagination-sm" v-if="Clientes.last_page > 1">
        <li class="page-item" v-if="Clientes.current_page != 1">
          <a class="page-link" href="#" @click.prevent="loadingClientes(Clientes.current_page - 1)">{{ "<<" }}</a>
        </li>

        <li :class="['page-item', { active: Clientes.current_page == page }]" aria-current="page"
          v-for="page in Clientes.last_page" :key="page.id">
          <a class="page-link" href="#" @click.prevent="loadingClientes(page)">{{ page }}</a>
        </li>

        <li class="page-item" v-if="Clientes.current_page < Clientes.last_page">
          <a class="page-link" href="#" @click.prevent="loadingClientes(Clientes.current_page + 1)">{{ ">>" }}</a>
        </li>
      </ul>
    </nav>

    <!-- Modal cadastrar e editar-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              <i class="fa-solid fa-user-tie"></i> 
              <span v-if="btnSaveVariavel">Cadastre novo funcionário</span>
              <span v-else>Alterar dados do funcionário</span>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <form action="">
                <!-- Componente de upload de imagem -->
                <div class="form-group col-12 text-center">
                  <label for="file-upload" class="text-secondary col-12 cursor">(Opcional) Selecione uma foto</label>
                  <span class="text-danger small col-12" v-if="erros.image">{{
                    erros.image[0]
                  }}</span>

                  <div class="file-upload-section mb-0" v-if="btnSaveVariavel">

                    <label id="preview" for="file-upload">
                      <img v-if="items.imgPreview" :src="items.imgPreview == null ? url_no_image : items.imgPreview"
                        class="rounded-start border border-2 cursor mb-0" />
                      <img v-else :src="url_no_image" class="rounded-start border border-2 cursor mb-0" />
                    </label>

                    <div class="file-upload">
                      <input type="file" id="file-upload" class="form-control form-control-sm invisivel"
                        @change="onFileChange" enctype="multpart/form-data" />
                    </div>

                    <div v-if="items.imgPreview" class="col-12 d-grid gap-2">
                      <span class="cursor" @click.prevent="removeImage()">
                        <i class="fa-solid fa-trash-can h3 text-danger"></i>
                      </span>
                    </div>

                  </div>

                  <div class="file-upload-section mb-0" v-else>
                    <label id="preview" for="file-upload" v-show="editImage">
                      <img v-if="`${url}${items.image}`" :src="`${url}${items.image}`"
                        class="rounded-start border border-2 cursor mb-0" />
                    </label>

                    <label id="preview" for="file-upload">
                      <img v-if="items.imgPreview" :src="items.imgPreview"
                        class="rounded-start border border-2 cursor mb-0" />
                    </label>
                    <!-- `${url}${items.image}`===null ? url_no_image:`${url}${items.image}` -->
                    <div class="file-upload">
                      <input type="file" id="file-upload" class="form-control form-control-sm invisivel"
                        @change="onFileChangeEdit" enctype="multipart/form-data" />
                    </div>
                    <div v-if="`${url}${items.image}`" class="col-12 text-center" v-show="editImage">
                      <span class="cursor" @click.prevent="removeImageEdit()">
                        <i class="fa-solid fa-trash-can h3 text-danger"></i>

                      </span>
                    </div>

                    <div v-else class="col-12 mt-2 text-center">
                      <span class="cursor" @click.prevent="removeImage()">
                        <i class="fa-solid fa-trash-can h3 text-danger"></i>

                      </span>
                    </div>
                  </div>
                </div>

                <div class="form-group col-12 mb-2">
                  <span class="text-danger small col-12" v-if="erros.name">{{
                    erros.name[0]
                  }}</span>
                  <label for="" class="text-secodary col-12">Nome completo</label>
                  <input type="text" class="form-control form-control-sm fw-bold" placeholder="Informe nome completo"
                    v-model="items.name" />
                </div>

                <div class="row">
                  <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6 mb-2">
                    <span class="text-danger small" v-if="erros.numBI">{{
                      erros.numBI[0]
                    }}</span>
                    <label for="" class="text-secodary">Nº do Bilhete</label>
                    <input type="text" class="form-control form-control-sm fw-bold" placeholder="Informe nº do Bilhete"
                      v-model="items.numBI" />
                  </div>
                  <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6 mb-2">
                    <span class="text-danger small" v-if="erros.dataValidadeBI">{{
                      erros.dataValidadeBI[0]
                    }}</span>
                    <label for="" class="text-secodary">Data de caducidade</label>
                    <Datepicker v-model="items.picked" class="form-control form-control-sm fw-bold col-6"
                      :inputFormat="inputFormat" :locale="locale" />
                  </div>
                </div>

                <div class="form-group col-12 mb-2">
                  <span class="text-danger small col-12" v-if="erros.departamento_id">{{ erros.departamento_id[0]
                  }}</span>
                  <label for="" class="text-secodary col-12">Associa-lo(a) a um departamento:</label>
                  <select class="form-control form-control-sm fw-bold" v-model="items.departamento_id">
                    <option disabled class="selected" value="">
                      Selessione um departamento
                    </option>
                    <option :value="departamento.id" v-for="departamento in getDepartamentoID" :key="departamento.id">
                      {{ departamento.departamento }}
                    </option>
                  </select>
                </div>

                <div class="form-group col-12 mb-2" v-if="btnSaveVariavel">
                  <span class="text-danger small col-12" v-if="erros.email">{{
                    erros.email[0]
                  }}</span>
                  <label for="" class="text-secodary col-12">E-mail</label>
                  <input type="email" class="form-control form-control-sm fw-bold" placeholder="Informe o e-amil"
                    v-model="items.email" />
                </div>
              </form>
            </div>
          </div>

          <div class="modal-footer" v-if="btnSaveVariavel">
            <button type="submit" @click="cleanForm" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
              <span> <i class="fa-solid fa-circle-xmark"></i> Fechar </span>
            </button>
            <button @click.prevent="registerCliente" type="button" class="btn btn-sm btn-success">
              <span v-if="loading">
                <i class="fa-regular fa-floppy-disk"></i>
                Tentando salvar...
              </span>
              <span v-else>
                <i class="fa-regular fa-floppy-disk"></i>
                Cadastrar
              </span>
            </button>
          </div>

          <div class="modal-footer" v-else>
            <button type="submit" @click="cleanForm" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
              <span> <i class="fa-solid fa-circle-xmark"></i> Fechar </span>
            </button>
            <button @click.prevent="updateCliente" type="button" class="btn btn-sm btn-success">
              <span v-if="loading">
                <i class="fa-regular fa-floppy-disk"></i>
                salvando a alteração...
              </span>
              <span v-else>
                <i class="fa-regular fa-floppy-disk"></i> Salvar
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal cadastrar e editar-->

    <!-- Modal Confirm Delete -->
    <div class="modal fade" id="modalDeleteConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              <i class="fa-solid fa-trash text-danger"></i> Apagar Cliente
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-12 text-center">
                <span class="text-primary">
                  <h6>Tens a certeza que desejas apagar este funcionário...?</h6>
                </span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">
              <span> <i class="fa-solid fa-circle-xmark"></i> Fechar </span>
            </button>
            <button @click.prevent="apagarCliente(deleteClienteId)" type="button" class="btn btn-sm btn-danger">
              <span v-if="loading">
                <i class="fa-regular fa-floppy-disk"></i>
                Apagando o estudante...
              </span>
              <span v-else>
                <i class="fa-regular fa-floppy-disk"></i> Apagar
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal Confirm Delete -->

    <!-- Înfo Canvas - informações a direita -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <div class="form-group col-9 text-end text-info">
          <h5 id="offcanvasRightLabel text-center">DETALHES DO CLIENTE</h5>
        </div>
        <div class="form-group col-3 text-end">
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
      </div>
      <div class="offcanvas-body">
        <div class="row">
          <div class="form-group col-12 text-center">
            <span v-show="info.image">
              <router-link :to="`${url}${info.image}`" target="_blank">
                <img :src="`${url}${info.image}`" alt="image" class="rounded-circle rounded-3"
                  style="width: 60px !important; height: 60px !important" />
              </router-link>
            </span>
            <span v-show="!info.image"><img :src="url_no_image" alt="Sem_imagem" class="rounded-circle rounded-3"
                style="width: 60px !important; height: 60px !important" /></span>
          </div>
        </div>

        <hr />

        <div class="row">
          <div class="form-group col-12 text-center">
            <div class="card shadow">
              <h4>
                <span class="text-danger">{{ info.name }}</span>
              </h4>
            </div>
          </div>

          <div class="form-group col-12 mt-4">
            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">Nº do documento pessoal:</p>
                <p class="text-secondary mt-0 fw-bold topoMargin">
                  {{ info.numBI }}
                </p>
              </div>
            </div>

            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">E-mail:</p>
                <p class="text-secondary mt-0 fw-bold topoMargin">
                  {{ emailInfo }}
                </p>
              </div>
            </div>
            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">Departamento:</p>
                <p class="text-primary mt-0 fw-bold topoMargin">
                  {{ departamentoInfo }}
                </p>
              </div>
            </div>

            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">Transporte de viagem:</p>
                <p class="text-primary mt-0 fw-bold topoMargin small" v-for="res, index in reserva" :key="index">
                  {{ res.transportes.transporte }} <span class="text-secondary">- Assento nº:</span> {{ res.transportes.total_lugares }}
                  <span class="text-secondary">- Valor:</span>{{ vueNumberFormat(res.transportes.preco_por_lugar, {
                                    isInteger: true,
                                    suffix: ' Kz'
                                }) }}
                </p>
              </div>
            </div>

            <div class="card mt-2">
              <div class="card-body">
                <p class="text-success">Data de registo:</p>
                <p class="text-secondary topoMargin">
                  <span> {{ formatoDeData }} </span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { notify } from "@kyvg/vue3-notification";
import dateFormat from "@vue-formily/date-format";
import topoPageComponent from "../partials/topoPageComponent.vue";
import Datepicker from "vue3-datepicker"
import { pt, eo, ru } from 'date-fns/locale'
import { URL_API } from '../../../../configs/index.js'

export default {
  name: "Cliente-component",
  emits: ["cleanForm", "buscaClienteID"],
  data() {
    return {
      urlExport: URL_API + '/ExportToExcelListaPagamento/',
      url: window.url + "storage/image/clientes/",
      url_no_image: window.url + "image/no-Image.jpg",
      editImage: false,
      meID:'',
      locale: pt,
      btnSaveVariavel: false,
      items: {
        user_id: "",
        departamento_id: "",
        numBI: "",
        email: "",
        image: null,
        imgPreview: null,
        name: "",
        picked: new Date(),
      },
      reserva:{},
      data: [
        {
          name: "",
          numBI: "",
          departamentos: {
            departamento: "",
          },
        },
      ],
      json_meta: [
        [
          {
            key: "charset",
            value: "utf-8",
          },
        ],
      ],
      fields: {
        "Nome completo": "name",
        "Nº do Bilhete": "numBI",
        "Departamentos": "departamentos.departamento",
        "E-mail": "email",
      },
      erros: [],
      deleteClienteId: "",
      filter: "",
      info: [],

      departamentoInfo: "",
      categoriaInfo:"",
      remoneracaoInfo:"",
      emailInfo: "",
      adminInfo: "",
      senhaReservaInfo: "",
      inputFormat: "dd-MM-yyyy",

      fomatoData: "",
      namePage: "Meus clientes",
      //nameButto: "Novo cliente",
      pageTopoIcon: "fa-solid fa-users-line",
      loading: false,

    };
  },

  created() {
    this.loadingClientes();
    this.loadingDepartamentos();
    //this.loadingReservasSenhas();
    this.me()
  },

  computed: {
    Clientes() {
      //return this.$store.state.estudantes.items.filter(estudante =>toUpperCase(estudante.nome.includes(toUpperCase(this.filter))))
      return this.$store.getters.todosClientes(this.filter);
    },

    todosClientesCount() {
      return this.$store.getters.todosClientesCount;
    },

    getDepartamentoID() {
      return this.$store.getters.todosDepartamentos(this.filter);
    },

    getReservaSenha() {
      return this.$store.state.senha_reserva.items;
    },
    params() {
      return {
        page: this.Clientes.current_page,
      };
    },

    formatoDeData() {
      if (this.info != "") {
        const data = new Date(this.info.created_at);
        //dateFormat.options.locales = ['enUS'];
        return new Intl.DateTimeFormat("pt-BR", {
          dateStyle: "full",
          timeStyle: "short",
          timeZone: "Africa/luanda",
        }).format(data);
        //dateFormat.format('DDDD-MMMM-YYYY', data)
      }
    },
  },

  methods: {
    me(){
           this.$store.dispatch('getMeSemLoading')
                                .then((resp)=>this.meID=resp.id)
        },

    exportExcel() {
      import('../../../../plugins/Export2Excel').then(excel => {
        this.$store.dispatch('loadingClientesExcel')
          .then((response) => {
            console.log(response.data)
            const OBJ = response.data;

            const Header = ["Nome completo", "Nº do Bilhete", "Departamentos", "Area de acesso", "E-mail"];

            const field = ["name", "numBI", "departamentos.departamento", "users.admin", "users.email"];

            const Data = this.formatJSON(field, OBJ);
            excel.export_json_to_excel({
              header: Header,
              data: Data,
              sheetName: "Funcionários",
              filename: "Lista de funcionários",
              autoWidth: true,
              bookType: "xlsx"
            })
          })
      })
    },

    formatJSON(FilterData, JsonData) {
      return JsonData.map((v) => FilterData.map((j) => {
        return v[j];
      }))
    },
    // Uplodd Image for Save
    onFileChange(e) {
      let file = e.target.files[0];
      this.items.imgPreview = URL.createObjectURL(file);
      let reader = new FileReader();
      reader.onloadend = () => {
        this.items.image = reader.result;
      };
      reader.readAsDataURL(file);
    },
    removeImage() {
      this.items.image = null;
      this.items.imgPreview = null;
    },

    // Upload Image for Update

    onFileChangeEdit(e) {
      this.editImage = false;
      let file = e.target.files[0];
      this.items.imgPreview = URL.createObjectURL(file);

      let reader = new FileReader();
      reader.onloadend = () => {
        this.items.image = reader.result;
      };
      reader.readAsDataURL(file);
    },
    removeImageEdit() {
      this.editImage = false;
      this.items.image = null;
      this.items.imgPreview = this.url_no_image;
    },

    getClienteFind(pesquisa) {
      this.wordFind = this.$store.getters.getClienteFind(pesquisa);
    },

    buscaClienteID() {
      this.cleanForm();
      this.btnSaveVariavel = true;
    },
    detalhes(id) {
      this.info = [];
      this.$store
        .dispatch("detalhesCliente", id)
        .then((response) => {
          console.log(response.data.user1)
          this.info = response.data.user1;
          this.departamentoInfo = this.info.departamentos.departamento;
          this.emailInfo = this.info.email;
          
          this.reserva=response.data.reserva
        })
        .catch((error) => {
          notify({
            title: "Erro de localização",
            text: error,
            type: "warn",
          });
        });
    },

    cleanForm() {
      this.items = {
        user_id: "",
        departamento_id: "",
        numBI: "",
        email: "",
        image: null,
        imgPreview: null,
        name: "",
      },
        this.erros = [];
      this.btnSaveVariavel = false
    },

    loadingClientes() {
      //var store = useStore()
      this.$store.dispatch("loadingClientes");
    },
    loadingDepartamentos() {
      //var store = useStore()
      this.$store.dispatch("loadingDepartamentos");
    },

    // loadingReservasSenhas() {
    //   this.$store.dispatch("loadingReservaSenhaCliente");
    // },

    registerCliente() {
      this.$store.dispatch("createClientes", this.items)
        .then(() => {
          notify({
            title: "Sucesso",
            text: "Registado com sucesso",
            type: "success",
          });
          this.loadingClientes();

          this.cleanForm();
          this.erros = [];
        })
        .catch((error) => {
          this.erros = error;
          notify({
            title: "Erro",
            text: "Ocorreu um erro durante o processo de cadastro!",
            type: "warn",
          });
        });
    },
    updateClienteForm(id) {
      this.btnSaveVariavel = false;
      this.editImage = true;
      this.cleanForm();
      this.$store
        .dispatch("updateFormCliente", id)
        .then((response) => { console.log(response.data.getCliente), (this.items = response.data.getCliente) })
        .catch((error) => {
          notify({
            title: "Não encotrado",
            text: "O funcionário que pretendes localizar não existe",
            type: "warn",
          });
        });
    },

    updateCliente() {
      this.$store
        .dispatch("updateCliente", this.items)
        .then((response) => {
          notify({
            title: "Sucesso",
            text: response.data.message,
            type: "success",
          });
          this.loadingClientes();
          this.cleanForm();
          this.erros = [];
        })
        .catch((error) => {
          this.erros = error.response.data.errors;
          console.log(this.erros)
          notify({
            title: "Erro",
            text: "Erro durante a actualização",
            type: "warn",
          });
        });
    },

    deleteCliente(id) {
      this.deleteClienteId = id;
    },

    inativo(id) {
      this.$store.dispatch('inativo', id)
        .then((response) => {
          notify({
            title: 'Sucesso',
            text: response.data.message,
            type: 'success'
          })
          this.loadingClientes();
        })
        .catch((erro) => notify({
          title: 'Erro',
          text: 'Erro ao Inactivar o Funcionário',
          type: 'warn'
        }))
    },

    activo(id) {
      this.$store.dispatch('activo', id)
        .then((response) => {
          notify({
            title: 'Sucesso',
            text: response.data.message,
            type: 'success'
          })
          this.loadingClientes();
        })
        .catch((erro) => notify({
          title: 'Erro',
          text: 'Erro ao Activar o Funcionário',
          type: 'warn'
        }))
    },

    apagarCliente(id) {
      this.$store
        .dispatch("apagarCliente", id)
        .then((response) => {
          notify({
            title: "Sucesso",
            text: response.data.message,
            type: "success",
          });
          this.loadingClientes();
        })
        .catch((error) => {
          notify({
            title: "Erro",
            text: error.data.erro,
            type: "warn",
          });
        });
    },

  },

  components: {
    topoPageComponent,
    Datepicker,
  },
};
</script>

<style scoped>
.topoMargin {
  margin-top: -5% !important;
}

.cursor {
  cursor: pointer;
}

img {
  width: 150px;
  height: 150px;
  object-fit: fill;
}

.cursor {
  cursor: pointer !important;
}

.invisivel {
  visibility: hidden;
}

.tamanhoUserImage {
  width: 60px !important;
  height: 60px !important;
}
</style>
