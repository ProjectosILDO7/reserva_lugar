<?php

namespace App\Http\Controllers\Pagamentos;

use App\Http\Controllers\Controller;
use App\Models\curso;
use App\Models\Disciplina;
use App\Models\graduacao;
use App\Models\Pagamentos\pag_mensalidade;
use PhpOffice\PhpWord\TemplateProcessor;

class mensalidadeController extends Controller
{
    public function exportWord($pagamentoID){

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('Africa/Luanda');
        
        $pag=pag_mensalidade::with('estudante')->where('id', $pagamentoID)->get();

        foreach ($pag as $value) {

            $cursoID=$value->estudante->curso_id;
            $gradeID=$value->estudante->grade_id;
            //faz a coversao do formato e remove os dois ultimos algarismo do banco
            $valor_pago=number_format(substr($value->valor_mensalidade, 0, -2), 2,",",".");
            # code...
            $dataHoraRegister= strftime('%A, %d de %B de %Y', strtotime($value->created_at));
            $dataPagamento= strftime('%d de %B de %Y', strtotime($value->created_at));
            
            $templateProcessor = new TemplateProcessor('word-template/comprovativo.docx');
            $templateProcessor->setValue('data', ucwords($dataHoraRegister));
            $templateProcessor->setValue('data_pagamento', ucwords($dataPagamento));
            $templateProcessor->setValue('valor_pagamento', $valor_pago);
            $templateProcessor->setValue('nome', $value->estudante->nome);

            $curso=curso::find($cursoID);
            $grade=graduacao::find($gradeID);

            $infoCurso=$curso->cursos;
            $infoGrade=$grade->grade;

            $templateProcessor->setValue('curso', $infoCurso);
            $templateProcessor->setValue('classe', $infoGrade);
            $templateProcessor->saveAs('comprovativo.docx');
            return response()->download( 'comprovativo.docx')->deleteFileAfterSend(true);
            //return response()->openssl_csr_export_to_file( 'comprovativo.docx')->deleteFileAfterSend(true);

        }
        
    }
}
