<table>
    <thead>
        <tr>
            <th>Disciplinas</th>
            <th>Cursos</th>
            <th>Cobraça</th>
        </tr>
    </thead>
    <tbody>
        @foreach($disciplinas as $disciplina)
        <tr>
            <td>{{ $disciplina->cadeira }}</td>
            <td>
                @foreach ($disciplina['cursos'] as $cursos)
                     <p>{{ $cursos->cursos }}</p>
                @endforeach
            </td>
            <td>
                @foreach ($disciplina['cursos'] as $cursos)
                     <p>{{ $cursos->cobranca }}</p>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>