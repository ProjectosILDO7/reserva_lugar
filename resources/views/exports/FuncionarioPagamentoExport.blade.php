<table>
    <thead>
        <tr>
            <th>Nº</th>
            <th>Nome completo</th>
            <th>Nº do Bilhete</th>
            <th>Área de trabalho</th>
            <th>Categoria</th>
            <th>Salário Base</th>
            <th>Total de falta</th>
            <th>Vencimento</th>
            <th>Assinatura</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($funcionarios as $f)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $f['name'] }}</td>
            <td>{{ $f['numBI'] }}</td>
            <td>{{ $f->departamentos->departamento }}</td>
            <td>{{ $f->categorias->categoria }}</td>
            <td>@php
                echo number_format($f->categorias->remoneracao,2,",",".");
            @endphp</td>
            <td align="center"> @php
                $assinatura=DB::table('assinaturas')->where('user_id', $f->id)->get();
                $total_presenca=count($assinatura);
                $diasW=22-$total_presenca;

                if ($diasW == 22 ) {
                    echo $diasW;
                }else{
                    echo $diasW;
                }
                @endphp
            </td>
            <td align="left">
                @php
                
                    if ($diasW == 22 ) {
                        //echo number_format($f->categorias->remoneracao, 2, ",",".");
                        $assinatura=DB::table('assinaturas')->where('user_id', $f->id)->get();
                        $total_presenca=count($assinatura);
                        $diasW=22-$total_presenca;

                        $valor_pago=$f->categorias->remoneracao;
                        //salario divido por 22 dias
                        $valorPorDia=$valor_pago/22;
                        $valo2 =$desconto=$valorPorDia*$diasW;
                        $valo1 = $f->categorias->remoneracao-$valo2;
                        $vencimento=$valo1;
                        echo number_format($vencimento,2,",",".");
                    }else{
                        $assinatura=DB::table('assinaturas')->where('user_id', $f->id)->get();
                        $total_presenca=count($assinatura);
                        $diasW=22-$total_presenca;

                        $valor_pago=$f->categorias->remoneracao;
                        //salario divido por 22 dias
                        $valorPorDia=$valor_pago/22;
                        $valo2 =$desconto=$valorPorDia*$diasW;
                        $valo1 = $f->categorias->remoneracao-$valo2;
                        $vencimento=$valo1;
                        echo number_format($vencimento,2,",",".");
                    }
                @endphp
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
