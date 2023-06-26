<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\reserva;
use Illuminate\Support\Facades\Auth;

class notifyMessagesController extends Controller
{
    //
    private $user_id;
    private $reserva;
    private $messages;
    private $email;
    private $smsReed;

    public function __construct(reserva $reserva, Message $message)
    {
        $this->user_id = Auth()->user()->id; 
        $this->email = Auth()->user()->email; 
        $this->reserva=$reserva;
        $this->messages=$message;   
    }

    public function notificacoes(){
        $total = $this->reserva->where('user_id', "!=", $this->user_id)->where('status', "!=", 0)->orderBy('data','desc')->get();
        return response()->json($total);
    }

    public function notificacoesReed(){
        $notify = $this->reserva->with('transportes', 'clientes')->orderBy('data','desc')->where('user_id', "!=", $this->user_id)->where('status', "!=", 0)->get();
        return response()->json($notify);
    }

    public function allSms(){
        $contar = $this->messages->where('email', "!=", $this->email)->orderBy('created_at','desc')->get();
        return response()->json($contar);
    }

    public function allSmsReed(){
        $this->smsReed = $this->messages->where('email', "!=", $this->email)->orderBy('created_at','desc')->get();
        return response()->json($this->smsReed);
    }

    public function smsLida($id){
        $smsDelete = $this->messages->find($id)->delete();
        if(isset($smsDelete)){
            $this->smsReed = $this->messages->where('email', "!=", $this->email)->orderBy('created_at','desc')->get();
            return response()->json($this->smsReed);
        }else{
            return response()->json([
                'erro'=>'Erro técnico'
            ],402);
        }

    }

    public function notifyInativo($id){

        $statusUpdateReserva = $this->reserva->find($id);
        $statusUpdateReserva->status=0;
        $statusUpdateReserva->update();
        
        if(isset($statusUpdateReserva)){
            $notify = $this->reserva->with('transportes', 'clientes')->orderBy('data','desc')->where('user_id', "!=", $this->user_id)->where('status', "!=", 0)->get();
        return response()->json($notify);
        }else{
            return response()->json([
                'erro'=>'Erro técnico'
            ],402);
        }

    }
}
