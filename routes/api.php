<?php

//use App\Http\Controllers\Api\Auth\AlterarPasswordController;

use App\Http\Controllers\Api\Auth\RegisterControllerUser;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactoEmpresaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\funcionarioController;
use App\Http\Controllers\graficosController;
use App\Http\Controllers\notifyMessagesController;
use App\Http\Controllers\reserva_senha_control;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\serachFuncionariosPresenca;
use App\Http\Controllers\TransporteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//routas free


//fim de routas free


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});
// Route::post('/auth', [AuthApiController::class, 'auth']);
// Route::get('/me', [AuthApiController::class, 'me'])->middleware('auth:sanctum');
// Route::get('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/forget-password', [ResetPasswordController::class, 'sendResetLink'])->middleware('guest');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->middleware('guest');
Route::post('/registerUser', [RegisterControllerUser::class, 'crear']);
Route::put('/updateuser', [RegisterControllerUser::class, 'updateUser'])->middleware('api');

Route::get('/departamentos', [DepartamentoController::class, 'index'])->middleware('api');
Route::post('/filter', [DepartamentoController::class, 'filter'])->middleware('api');
Route::post('/registerDepartamento', [DepartamentoController::class, 'store'])->middleware('api');
Route::get('/getDepartamento/{id}', [DepartamentoController::class, 'edit'])->middleware('api');
Route::put('/updateDepartamento/{id}', [DepartamentoController::class, 'update'])->middleware('api');
Route::get('/apagarDepartamento/{id}', [DepartamentoController::class, 'destroy'])->middleware('api');
Route::get('/detalhesDepartamento/{id}', [DepartamentoController::class, 'show'])->middleware('api');

Route::post('/searchFuncionario/{search}', [serachFuncionariosPresenca::class, 'pesquisar'])->middleware('api');
Route::post('/assinatura/{id}', [serachFuncionariosPresenca::class, 'assinatura'])->middleware('api');
 
Route::get('/transportes', [TransporteController::class, 'index'])->middleware('api');
Route::post('/filter', [TransporteController::class, 'filter'])->middleware('api');
Route::post('/registerTransporte', [TransporteController::class, 'store'])->middleware('api');
Route::get('/getTransporte/{id}', [TransporteController::class, 'edit'])->middleware('api');
Route::put('/updateTransporte/{id}', [TransporteController::class, 'update'])->middleware('api');
Route::get('/apagarTransporte/{id}', [TransporteController::class, 'destroy'])->middleware('api');
Route::get('/detalhesTransporte/{id}', [TransporteController::class, 'show'])->middleware('api');
Route::get('/ExportToExcelTransporte/{user}', [ExportExcelController::class, 'exportTransporte'])->middleware('api');
 

Route::get('/funcionarios', [funcionarioController::class, 'index'])->middleware('api');
Route::post('/filter', [funcionarioController::class, 'filter'])->middleware('api');
Route::post('/registerFuncionario', [funcionarioController::class, 'store'])->middleware('api');
Route::get('/getFuncionario/{id}', [funcionarioController::class, 'edit'])->middleware('api');
Route::put('/updateFuncionario/{id}', [funcionarioController::class, 'update'])->middleware('api');
Route::get('/apagarFuncionario/{id}', [funcionarioController::class, 'destroy'])->middleware('api');
Route::put('/inativar/{id}', [funcionarioController::class, 'inativar'])->middleware('api');
Route::put('/activo/{id}', [funcionarioController::class, 'activo'])->middleware('api');
Route::get('/detalhesFuncionarioRF/{id}', [funcionarioController::class, 'show'])->middleware('api');
Route::get('/detalhesFuncionario/{id}', [funcionarioController::class, 'detalhesClientes'])->middleware('api');
Route::get('/reserva_senha_funcionario', [reserva_senha_control::class, 'show'])->middleware('api');
Route::get('/getFuncionarioPagamento/{id}', [funcionarioController::class, 'show'])->middleware('api');
Route::get('/ExportToExcelListaPagamento/{user}', [ExportExcelController::class, 'exportListaPagamento'])->middleware('api');

Route::get('/clientes', [funcionarioController::class, 'getClientes'])->middleware('api');
Route::get('/reservas', [funcionarioController::class, 'getReservas'])->middleware('api');
Route::get('/minhas_reservas', [funcionarioController::class, 'getMinhas_Reservas'])->middleware('api');
Route::get('/criar_reserva/{id}', [funcionarioController::class, 'criar_reserva'])->middleware('api');


//Pagamentos
Route::post('/pag_mensalidade', [pagamentosController::class, 'mensalidade'])->middleware('api');
Route::get('/ExportToWordComprovativo/{id}', [mensalidadeController::class, 'exportWord'])->middleware('api');

Route::get('/getGraficoBarra', [graficosController::class, 'graficoDeBarra'])->middleware('api');
Route::get('/notify/{id}', [notifyMessagesController::class, 'notify'])->middleware('api');
Route::get('/notificacoes', [notifyMessagesController::class, 'notificacoes'])->middleware('api');
Route::get('/notificacoesReed', [notifyMessagesController::class, 'notificacoesReed'])->middleware('api');
Route::get('/mensages', [notifyMessagesController::class, 'allSms'])->middleware('api');
Route::get('/mensagesReed', [notifyMessagesController::class, 'allSmsReed'])->middleware('api');
Route::get('/smsLida/{id}', [notifyMessagesController::class, 'smsLida'])->middleware('api');


Route::post('/sendEmail', [SendMessageController::class, 'send']);

Route::get('/Contacto_empresas', [ContactoEmpresaController::class, 'index'])->middleware('api');
Route::post('/registerContacto_empresa', [ContactoEmpresaController::class, 'store'])->middleware('api');
Route::get('/getContacto_empresa/{id}', [ContactoEmpresaController::class, 'edit'])->middleware('api');
Route::put('/updateContacto_empresa/{id}', [ContactoEmpresaController::class, 'update'])->middleware('api');
Route::get('/apagarContacto_empresa/{id}', [ContactoEmpresaController::class, 'destroy'])->middleware('api');

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});
