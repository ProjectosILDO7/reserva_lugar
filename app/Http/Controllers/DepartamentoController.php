<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Repositories\Departamento\DepartamentoRepository;
class DepartamentoController extends Controller
{
     
    private $entety;

    public function __construct(DepartamentoRepository $dep)
    {
        $this->entety=$dep;
    }

    public function index()
    {
     //
        return $this->entety->getDepartamentos();
    }

    public function store(StoreDepartamentoRequest $request)
    {
        return $this->entety->create($request);
    }


    public function show($id)
    {
        //
        return $this->entety->detalhes($id);
    }

    public function edit($id)
    {

        return $this->entety->getDepartamento($id);
    }

    public function update(UpdateDepartamentoRequest $request, $id)
    {
        //
       return $this->entety->updateDepartamento($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
