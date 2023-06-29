<?php

namespace App\Http\Controllers;

use App\Models\NotifyCliente;
use Illuminate\Http\Request;

class NotifyClienteController extends Controller
{
    private $user_id;
    private $NotifyClienteModel;

    public function __construct(NotifyCliente $notifyCliente)
    {
        $this->user_id = Auth()->user()->id; 
        $this->NotifyClienteModel=$notifyCliente; 
    }

    public function notificacoesCliente(){
        $total = $this->NotifyClienteModel->where('cliente_id', $this->user_id)->where('status', "!=", 0)->orderBy('created_at','desc')->get();
        return response()->json($total);
    }

    public function notificacoesReedCliente(){
        $notify = $this->NotifyClienteModel->where('cliente_id', $this->user_id)->orderBy('created_at','desc')->get();
        return response()->json($notify);
    }

    public function sendNotificationForClient(Request $request){
        if($request->conteudo==''){
            return response()->json([
                'erro'=>'Não é possível enviar uma notificação vazia para seu cliente',
            ],402);
        }

        $notifyCliente=NotifyCliente::create([
            'cliente_id'=>$request->cliente_id,
            'user_id'=>$this->user_id,
            'conteudo'=>$request->conteudo,
            'status'=>1
        ]);

        if(isset($notifyCliente)){
            return response()->json(['success'=>'Notificação enviada com sucesso para o cliente...!'],200);
        }
    }

    public function notifyInativoCliente($id){

        $statusUpdateNotifyInativo = $this->NotifyClienteModel->find($id);
        $statusUpdateNotifyInativo->status=0;
        $statusUpdateNotifyInativo->update();
        
        if(isset($statusUpdateNotifyInativo)){
            $total = $this->NotifyClienteModel->where('cliente_id', $this->user_id)->where('status', "!=", 0)->orderBy('created_at','desc')->get();
            return response()->json($total);
        }else{
            return response()->json([
                'erro'=>'Erro técnico'
            ],402);
        }

    }


}
