<?php

namespace App\Http\Controllers;

use App\Models\Emolumento;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelEmolumentoController extends Controller
{
    public function exportEmolumento($user) 
    {

        return Excel::download(new Emolumento, 'Lista de emolumentos.xlsx');
    }
}
