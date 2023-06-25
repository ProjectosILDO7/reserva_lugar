<table>
    <thead>
        <tr>
            <th>Disciplinas</th>
            <th>Valor de cobrança</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($provas as $p)
            <tr>
                <td>
                    @foreach ($p['disciplinas'] as $item)
                        <p>{{ $item->cadeira }}</p>
                    @endforeach
                </td>
                <td>{{ $p->cobranca }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
