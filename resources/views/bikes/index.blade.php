<!DOCTYPE html>
<html>
<head>
    <title>Все велосипеды</title>
</head>
<body>
<h1>Велосипеды</h1>
<a href="{{ route('bikes.create') }}">Добавить новый</a>

<table border="1">
    <tr>
        <th>Модель</th>
        <th>Тип</th>
        <th>Цена/час</th>
        <th>Доступен</th>
        <th>Действия</th>
    </tr>
    @foreach ($bikes as $bike)
        <tr>
            <td>{{ $bike->model }}</td>
            <td>{{ $bike->type->name }}</td>
            <td>{{ $bike->price_per_hour }} ₽</td>
            <td>{{ $bike->is_available ? 'Да' : 'Нет' }}</td>
            <td>
                <a href="{{ route('bikes.edit', $bike->id) }}">Редактировать</a>
                <form action="{{ route('bikes.destroy', $bike->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<div class="paginate">
    {{ $bikes->withQueryString()->links() }}
</div>
</body>
</html>
