@extends('layout')

@section('title', $bike->model)

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ $bike->model }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Тип:</strong> {{ $bike->type->name }}</p>
            <p><strong>Цена:</strong> {{ $bike->price_per_hour }} ₽/час</p>
            <p><strong>Статус:</strong>
                <span class="badge bg-{{ $bike->is_available ? 'success' : 'danger' }}">
                    {{ $bike->is_available ? 'Доступен' : 'Занят' }}
                </span>
            </p>

            <div class="mt-4">
                <a href="{{ route('bikes.index') }}" class="btn btn-secondary">Назад к списку</a>
                <a href="{{ route('bikes.edit', $bike->id) }}" class="btn btn-primary">Редактировать</a>
            </div>
        </div>
    </div>
@endsection
