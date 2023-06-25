<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransporteRequest;
use App\Http\Requests\UpdateTransporteRequest;
use App\Repositories\Transporte\transporteRepository;

class TransporteController extends Controller
{
    
    private $entety;

    public function __construct(transporteRepository $transporte)
    {
        $this->entety=$transporte;
    }

    public function index()
    {
     //
        return $this->entety->getTransportes();
    }

    public function store(StoreTransporteRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        return $this->entety->detalhes($id);
    }

    public function edit($id)
    {

        return $this->entety->geTransporte($id);
    }

    public function update(UpdateTransporteRequest $request, $id)
    {
        //
       return $this->entety->updateTransporte($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
