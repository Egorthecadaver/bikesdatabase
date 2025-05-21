@extends('layout')

@section('title', 'Все велосипеды')

@section('content')
    <h1 class="mb-4">Велосипеды</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Модель</th>
                <th>Тип</th>
                <th>Цена/час</th>
                <th>Доступен</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bikes as $bike)
                <tr>
                    <td>{{ $bike->model }}</td>
                    <td>{{ $bike->type->name }}</td>
                    <td>{{ $bike->price_per_hour }} ₽</td>
                    <td>
                            <span class="badge bg-{{ $bike->is_available ? 'success' : 'danger' }}">
                                {{ $bike->is_available ? 'Да' : 'Нет' }}
                            </span>
                    </td>
                    <td class="actions">
                        <a href="{{ route('bikes.edit', $bike->id) }}" class="btn btn-info">
                             Редактировать
                        </a>
                        <form action="{{ route('bikes.destroy', $bike->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить этот велосипед?')">
                                Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="paginate">
        {{ $bikes->withQueryString()->links() }}
    </div>
@endsection
