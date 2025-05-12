<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->name }}</title>
</head>
<body>
<h1>Пользователь: {{ $user->name }}</h1>
<h2>Арендованные велосипеды:</h2>
<ul>
    @foreach ($user->rentedBikes as $bike)
        <li>
            {{ $bike->model }}
            (с {{ $bike->pivot->start_time }} по {{ $bike->pivot->end_time ?? 'ещё в аренде' }})
        </li>
    @endforeach
</ul>

<a href="{{ route('user.index') }}">Назад</a>
</body>
</html>
