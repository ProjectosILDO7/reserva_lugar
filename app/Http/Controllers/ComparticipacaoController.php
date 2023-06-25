<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComparticipacaoRequest;
use App\Http\Requests\UpdateComparticipacaoRequest;
use App\Repositories\Comparticipacao\comparticipacaoRepository;

class ComparticipacaoController extends Controller
{
    private $entety;

    public function __construct(comparticipacaoRepository $compart)
    {
        $this->entety=$compart;
    }

    public function index()
    {
     //
        return $this->entety->getComparticipacaos();
    }

    public function store(StoreComparticipacaoRequest $request)
    {
        return $this->entety->create($request);
    }

    public function show($id)
    {
        return $this->entety->detalhes($id);
    }

    public function edit($id)
    {

        return $this->entety->getComparticipacao($id);
    }

    public function update(UpdateComparticipacaoRequest $request, $id)
    {
        //
       return $this->entety->updateComparticipacao($request, $id);
    }

    public function destroy($id)
    {
        //
        return $this->entety->apagar($id);
    }
}
