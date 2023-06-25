<table>
    <thead>
    <tr>
        <th>Transporte</th>
        <th>Cobrança</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transportes as $transporte)
        <tr>
            <td>{{ $transporte->descricao }}</td>
            <td>{{ $transporte->cobranca }}</td>
        </tr>
    @endforeach
    </tbody>
</table>