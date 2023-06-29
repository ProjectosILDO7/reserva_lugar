<?php

namespace App\Http\Controllers;

use App\Models\reserva;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportToWordComprovativoController extends Controller
{
    //
    public function exportWord($id){

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('Africa/Luanda');
        
        $reserva=reserva::with('transportes', 'clientes')->where('id', $id)->get();

        foreach ($reserva as  $value) {
            # code...
            $valor_pago=number_format(substr($value->transportes->preco_por_lugar, 0, -2), 2,",",".");
            # code...
            $dataHoraRegister= strftime('%A, %d de %B de %Y', strtotime($value->created_at));
            
            $templateProcessor = new TemplateProcessor('word-template/comprovativo.docx');
            $templateProcessor->setValue('data', ucwords($dataHoraRegister));
            $templateProcessor->setValue('nome', $value->clientes->name);
            $templateProcessor->setValue('transporte', $value->transportes->transporte);
            $templateProcessor->setValue('modelo', $value->transportes->modelo);
            $templateProcessor->setValue('assento', $value->transportes->total_lugares);
            $templateProcessor->setValue('procedencia', $value->transportes->procedencia);
            $templateProcessor->setValue('destino', $value->transportes->destino);
            $templateProcessor->setValue('valor_pagamento', $valor_pago);

            $templateProcessor->saveAs('comprovativo.docx');
            return response()->download( 'comprovativo.docx')->deleteFileAfterSend(true);
            //return response()->openssl_csr_export_to_file( 'comprovativo.docx')->deleteFileAfterSend(true);
        
        }
            //faz a coversao do formato e remove os dois ultimos algarismo do banco
            
    }
}
