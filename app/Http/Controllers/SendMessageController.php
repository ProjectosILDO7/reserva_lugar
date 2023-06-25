<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSendMessageRequest;
use App\Models\Message;

class SendMessageController extends Controller
{
    //
    private $model;
    public function __construct(Message $message)
    {
        $this->model=$message;
    }

    public function send(StoreSendMessageRequest $request){

        $send=$this->model->create([
            'email'=>$request->email,
            'telemovel'=>$request->telemovel,
            'comentario'=>$request->comentario,
            'status'=>1
        ]);
        if(isset($send)){
            return response()->json(['success'=>'A sua mensagem foi enviada com sucesso, aguarde pelo returno no seu e-mail ou por via telemovel']);
        }
    }
}
