<!DOCTYPE html>
<html>
<head>
    <title>{{ $bikeType->name }}</title>
</head>
<body>
<h1>{{ $bikeType->name }}</h1>
<p>{{ $bikeType->description }}</p>

<h2>Велосипеды:</h2>
<ul>
    @foreach ($bikeType->bikes as $bike)
        <li>{{ $bike->model }} - {{ $bike->price_per_hour }} ₽/час</li>
    @endforeach
</ul>

<a href="{{ route('bike_type.index') }}">Назад</a>
</body>
</html>
