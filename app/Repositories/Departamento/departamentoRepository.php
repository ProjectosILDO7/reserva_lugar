<?php

namespace App\Repositories\Departamento;

use App\Models\Departamento;
use Illuminate\Support\Facades\Auth;

class DepartamentoRepository
{

    protected $ententy;
    protected $userID;

    public function __construct(Departamento $departamento)
    {
        $this->ententy = $departamento;
        $this->userID=Auth()->user()->id;
    }

    public function getDepartamentos()
    {
        $departamento = $this->ententy::orderBy('departamento', 'asc')->get();
            if (asset($departamento)) {
                return response()->json($departamento);
            } else {
                return response()->json([
                    'status' => 'Erro',
                    'message' => 'Não foi possível carregar os departamentos'
                ], 401);
            }
    }

    public function create($data)
    {

        $savedepartamento = $this->ententy::create([
            'departamento' => $data['departamento'],           
        ]);

        if (asset($savedepartamento)) {
            return response()->json([
                'status' => 'Sucesso',
                'Departamento' => $savedepartamento,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Erro',
                'message' => 'Nao foi possível cadastrar este departamento. deve-se a um problema interno.!'
            ], 401);
        }
    }

    public function getDepartamento($id)
    {
        //dd($id);
        $getDepartamento = $this->ententy::find($id);
        if (asset($getDepartamento)) {
            return response()->json([
                'getDepartamento' => $getDepartamento
            ], 200);
        } else {
            return response()->json([
                'message' => 'Departamento não encontrado..!'
            ], 401);
        }
    }

    public function updateDepartamento($data, $id)
    {
        $updateDepartamento = $this->ententy::find($id);
        
        $updateDepartamento->departamento = $data['departamento'];
        $updateDepartamento->save();

        if (asset($updateDepartamento)) {
            return response()->json(['message' => 'O departamento foi actualizado com sucesso'], 200);
        } else {
            return response()->json(['Erro' => 'Não foi possível actualizar este departamento'], 401);
        }
    }

    public function apagar($id)
    {
        $deleteDepartamento = $this->ententy::find($id);
        $deleteDepartamento->delete();

        if (asset($deleteDepartamento)) {
            return response()->json(['message' => 'Este departamento foi apagadno com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Não foi possível apagar este departamento'], 401);
        }
    }

    public function detalhes($id){
        $detalhes = $this->ententy::find($id);

        if(asset($detalhes)){
            return response()->json($detalhes);
        }else{
            return response()->json(['erro'=>'Não foi possível carregar os detalhes']);
        }
    }
}
