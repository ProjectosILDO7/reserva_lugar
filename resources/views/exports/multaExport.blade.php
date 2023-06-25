<table>
    <thead>
    <tr>
        <th>Cursos</th>
        <th>Valor de multa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($multas as $multa)
        <tr>
            <td>
                @foreach ($multa['cursos'] as $item)
                    <p>{{ $item->cursos }}</p>
                @endforeach</td>
            <td>{{ $multa->cobranca }}</td>
        </tr>
    @endforeach
    </tbody>
</table>