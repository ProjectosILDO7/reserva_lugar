<?php

namespace App\Http\Controllers;

use App\Models\Contacto_empresa;
use App\Http\Requests\StoreContacto_empresaRequest;
use App\Http\Requests\UpdateContacto_empresaRequest;

class ContactoEmpresaController extends Controller
{
    protected $empresa;

    public function __construct(Contacto_empresa $empresa)
    {
        $this->empresa = $empresa;
    }

    public function index()
    {
        //
        $contactos = $this->empresa->all();
        return response()->json($contactos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContacto_empresaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContacto_empresaRequest $request)
    {
        //
        $existe=$this->empresa->all();
        if(count($existe)!=0){
            return response()->json(['total'=>$existe],402);
        }else{
            
            $empresa = $this->empresa->create([
                "empresa" => $request->empresa,
                "email" => $request->email,
                "facebook" => $request->facebook,
                "whatsapp" => $request->whatsapp,
                "telemovel" => $request->telemovel
            ]);
        }
        
        if(isset($empresa)){
            return response()->json($empresa);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacto_empresa  $contacto_empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto_empresa $contacto_empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacto_empresa  $contacto_empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit=$this->empresa->find($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContacto_empresaRequest  $request
     * @param  \App\Models\Contacto_empresa  $contacto_empresa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContacto_empresaRequest $request, $id)
    {
        //
        $findEmpresa = $this->empresa->find($id);
        $update=$findEmpresa->update($request->all());
        return response()->json($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacto_empresa  $contacto_empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $apagar=$this->empresa->find($id)->delete();
        if(isset($apagar)){
            return response()->json(['message'=>'Contacto de empresa apagada com sucesso!']);
        }
       
    }
}
