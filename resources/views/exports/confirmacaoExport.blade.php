<table>
    <thead>
        <tr>
            <th>Cursos</th>
            <th>Valor de multa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($confirmacaos as $confirmacao)
            <tr>
                <td>
                    @foreach ($confirmacao['graduacoes'] as $item)
                        <p>{{ $item->grade }}</p>
                    @endforeach
                </td>
                <td>{{ $confirmacao->cobranca }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
