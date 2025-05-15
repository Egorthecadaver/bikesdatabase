<!DOCTYPE html>
<html>
<head>
    <title>{{ $bike->model }}</title>
</head>
<body>
<h1>{{ $bike->model }}</h1>
<p>Тип: {{ $bike->type->name }}</p>
<p>Цена: {{ $bike->price_per_hour }} ₽/час</p>
<p>Статус: {{ $bike->is_available ? 'Доступен' : 'Занят' }}</p>

<a href="{{ route('bikes.index') }}">Назад</a>
</body>
</html>
