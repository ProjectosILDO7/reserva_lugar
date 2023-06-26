<?php

namespace App\Repositories\Transporte;

use App\Models\Transporte;
use Illuminate\Support\Facades\Auth;

class transporteRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(Transporte $transporte)
    {
        $this->ententy = $transporte;
        //$this->userID = Auth()->user()->id;
    }

    public function getTransportes()
    {
        $transporte = $this->ententy::orderBy('transporte', 'asc')->get();
        if (asset($transporte)) {
            return response()->json($transporte);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Não foi possível carregar...!'
            ], 401);
        }
    }

    public function create($data)
    {

        $saveTransporte = $this->ententy::create([
            'transporte' => $data['transporte'],
            'modelo' => $data['modelo'],
            'total_lugares' => $data['total_lugares'],
            'preco_por_lugar' => $data['preco_por_lugar'],
            'procedencia' => $data['procedencia'],
            'destino' => $data['destino'],
        ]);

        if (asset($saveTransporte)) {
            return response()->json([
                'status' => 'Sucesso',
                'Transporte' => $saveTransporte,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar... deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function geTransporte($id)
    {
        //dd($id);
        $getTransporte = $this->ententy::find($id);
        if (asset($getTransporte)) {
            return response()->json([
                'getTransporte' => $getTransporte
            ], 200);
        } else {
            return response()->json([
                'message' => 'Transporte não encontrado..!'
            ], 401);
        }
    }

    public function updateTransporte($request, $id)
    {
        $updateTransporte = $this->ententy::find($id);
        $data = $request->all();
        $updateTransporte->update($data);


        if (asset($updateTransporte)) {
            return response()->json(['message' => 'Informação de transporte actualizado com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar...!'], 401);
        }
    }

    public function apagar($id)
    {

        $deleteTransporte = $this->ententy::find($id);
        $deleteTransporte->delete();

        if (asset($deleteTransporte)) {
            return response()->json(['message' => 'Informação de transporte apagado com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Não foi possível apagar...!'], 401);
        }
    }

    public function detalhes($id)
    {
        $detalhes = $this->ententy::find($id);
        if (asset($detalhes)) {
            return response()->json($detalhes);
        } else {
            return response()->json(['erro' => 'Não foi possível carregar os detalhes']);
        }
    }

}
