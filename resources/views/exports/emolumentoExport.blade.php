<table>
    <thead>
    <tr>
        <th>Emolumento</th>
        <th>Cobrança</th>
    </tr>
    </thead>
    <tbody>
    @foreach($emolumentos as $emolumento)
        <tr>
            <td>{{ $emolumento->emolumento }}</td>
            <td>{{ $emolumento->cobranca }}</td>
        </tr>
    @endforeach
    </tbody>
</table>