<!DOCTYPE html>
<html>
<head>
    <title>История аренд</title>
</head>
<body>
<h1>Все аренды</h1>
<table border="1">
    <tr>
        <th>Пользователь</th>
        <th>Велосипед</th>
        <th>Начало</th>
        <th>Конец</th>
        <th>Сумма</th>
    </tr>
    @foreach ($rentals as $rental)
        <tr>
            <td>{{ $rental->user->name }}</td>
            <td>{{ $rental->bike->model }}</td>
            <td>{{ $rental->start_time }}</td>
            <td>{{ $rental->end_time ?? 'Активна' }}</td>
            <td>{{ $rental->total_price }} ₽</td>
        </tr>
    @endforeach
</table>
</body>
</html>
