<?php

namespace App\Exports;

use App\Models\Disciplina;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class Disciplinas_cursosExport implements ShouldAutoSize, FromView//, WithColumnFormatting
{
    protected $idUser;

    public function __construct($id)
    {
        $this->idUser=$id;
    }
    
    public function view(): View
    {
        return view('exports.Export_disciplinas_cursos', [
            'disciplinas' => Disciplina::with('cursos')->where('user_id', $this->idUser)->get()
        ]);
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         'C' => NumberFormat::FORMAT_NUMBER_00
    //     ];
    // }
    
}
