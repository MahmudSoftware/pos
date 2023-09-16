<!DOCTYPE html>
<html>
<head>
    <title>Printable Gazette</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Day</th>
                @foreach ($gazetteListData->groupBy('day') as $day => $gazetteLis)
                    <th>Day {{ $day }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($gazetteListData->groupBy('psl_no') as $pslNo => $gazetteLis)
                <tr>
                    <td>{{ $pslNo }}</td>
                    @foreach ($gazetteLis as $purjeeData)
                        <td>{{ $purjeeData->current_loan }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
