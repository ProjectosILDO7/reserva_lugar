<table>
    <thead>
        <tr>
            <th>Cursos</th>
            <th>Valor de cobrança</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tccs as $t)
            <tr>
                <td>
                    @foreach ($t['cursos'] as $item)
                        <p>{{ $item->cursos }}</p>
                    @endforeach
                </td>
                <td>{{ $t->cobranca }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
