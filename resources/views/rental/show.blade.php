<!DOCTYPE html>
<html>
<head>
    <title>Аренда #{{ $rental->id }}</title>
</head>
<body>
<h1>Аренда велосипеда</h1>
<p>Пользователь: {{ $rental->user->name }}</p>
<p>Велосипед: {{ $rental->bike->model }}</p>
<p>Начало: {{ $rental->start_time }}</p>
<p>Окончание: {{ $rental->end_time ?? 'Ещё в аренде' }}</p>
<p>Сумма: {{ $rental->total_price }} ₽</p>

<a href="{{ route('rental.index') }}">Назад</a>
</body>
</html>
