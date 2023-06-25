<?php

namespace App\Http\Controllers;

use App\Exports\confirmacaoExport;
use App\Exports\Disciplinas_cursosExport;
use App\Exports\emolumentoExport;
use App\Exports\FuncionarioPagamentoExport;
use App\Exports\multaExport;
use App\Exports\Prova_atrasadaExport;
use App\Exports\TccExport;
use App\Exports\transporteExport;
use App\Exports\uniformeExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function export($user) 
    {
        return Excel::download(new Disciplinas_cursosExport($user), 'disciplinas e cursos.xlsx');
    }

    public function exportEmolumento($user) 
    {
        
        return Excel::download(new emolumentoExport($user), 'Lista de emolumentos.xlsx');
    }

    public function exportUniforme($user) 
    {
        
        return Excel::download(new uniformeExport($user), 'Lista de uniformes.xlsx');
    }

    public function exportTransporte($user) 
    {
        
        return Excel::download(new transporteExport($user), 'Lista de transporte.xlsx');
    }

    public function exportMultas($user) 
    {
        
        return Excel::download(new multaExport($user), 'Lista de multas.xlsx');
    }

    public function exportConfirmacao($user) 
    {
        
        return Excel::download(new confirmacaoExport($user), 'Lista de valores de confirmação.xlsx');
    }

    public function exportProva_atrasada($user) 
    {
        
        return Excel::download(new Prova_atrasadaExport($user), 'Lista de valores de provas em atraso.xlsx');
    }

    public function exportTcc($user) 
    {
        
        return Excel::download(new TccExport($user), 'Lista de valores de Tcc.xlsx');
    }

    public function exportListaPagamento($user) 
    {
        
        return Excel::download(new FuncionarioPagamentoExport($user), 'Lista de pagamento de Funcionário.xlsx');
    }

}
