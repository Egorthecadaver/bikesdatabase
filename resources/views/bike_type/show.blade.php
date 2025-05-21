@extends('layout')

@section('title', $bikeType->name)

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mb-0">{{ $bikeType->name }}</h1>
                    @auth
                        <div>
                            <a href="{{ route('bike_type.edit', $bikeType->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Редактировать
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $bikeType->description }}</p>

                <h4 class="mt-4">Велосипеды этого типа:</h4>
                @if($bikeType->bikes->isEmpty())
                    <div class="alert alert-info">Нет велосипедов этого типа</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Модель</th>
                                <th>Цена/час</th>
                                <th>Статус</th>
                                @auth
                                    <th>Действия</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bikeType->bikes as $bike)
                                <tr>
                                    <td>{{ $bike->model }}</td>
                                    <td>{{ $bike->price_per_hour }} ₽</td>
                                    <td>
                                        <span class="badge bg-{{ $bike->is_available ? 'success' : 'danger' }}">
                                            {{ $bike->is_available ? 'Доступен' : 'Занят' }}
                                        </span>
                                    </td>
                                    @auth
                                        <td>
                                            <a href="{{ route('bikes.edit', $bike->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    @endauth
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="mt-4">
                    <a href="{{ route('bike_type.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Назад к списку типов
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
