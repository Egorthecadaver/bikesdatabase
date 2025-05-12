<!DOCTYPE html>
<html>
<head>
    <title>Типы велосипедов</title>
</head>
<body>
<h1>Все типы велосипедов</h1>
<ul>
    @foreach ($bikeTypes as $type)
        <li>
            <a href="{{ route('bike_type.show', $type->id) }}">
                {{ $type->name }} ({{ $type->bikes->count() }} шт.)
            </a>
        </li>
    @endforeach
</ul>
</body>
</html>
