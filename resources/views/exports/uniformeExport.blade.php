<table>
    <thead>
    <tr>
        <th>Uniforme</th>
        <th>Cobrança</th>
    </tr>
    </thead>
    <tbody>
    @foreach($uniformes as $uniforme)
        <tr>
            <td>{{ $uniforme->descricao }}</td>
            <td>{{ $uniforme->cobranca }}</td>
        </tr>
    @endforeach
    </tbody>
</table>