<?php

namespace App\Http\Controllers;

use App\Models\Contacto_empresa;
use Illuminate\Http\Request;

class contacto_empresaOflineController extends Controller
{
    //
    protected $contacto;

    public function __construct(Contacto_empresa $contacto_empresa)
    {
        $this->contacto=$contacto_empresa;
    }
    public function index(){
        $show = $this->contacto->all();
        return response()->json($show);
    }
}
