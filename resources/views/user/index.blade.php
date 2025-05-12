<!DOCTYPE html>
<html>
<head>
    <title>Пользователи</title>
</head>
<body>
<h1>Все пользователи</h1>
<ul>
    @foreach ($users as $user)
        <li>
            <a href="{{ route('user.show', $user->id) }}">
                {{ $user->name }} ({{ $user->email }})
            </a>
        </li>
    @endforeach
</ul>
</body>
</html>
