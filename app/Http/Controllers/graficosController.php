<?php

namespace App\Http\Controllers;

use App\Models\Assinatura;
use App\Models\totalPresenca;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class graficosController extends Controller
{
    public function graficoDeBarra(){
        $presencas = Assinatura::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        
        $meses = Assinatura::select(DB::raw("Month(created_at) as mes"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('mes');
        
        $data = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach ($meses as $index => $month) {
            # code...
            $data[$month]=$presencas[$index];
        }

        return response()->json($data);
    }
}
