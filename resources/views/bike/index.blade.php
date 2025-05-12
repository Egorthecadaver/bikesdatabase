<!DOCTYPE html>
<html>
<head>
    <title>Все велосипеды</title>
</head>
<body>
<h1>Каталог велосипедов</h1>
<ul>
    @foreach ($bikes as $bike)
        <li>
            <a href="{{ route('bike.show', $bike->id) }}">
                {{ $bike->model }} ({{ $bike->type->name }})
            </a>
            - {{ $bike->price_per_hour }} ₽/час
        </li>
    @endforeach
</ul>
</body>
</html>
