@extends('layout')

@section('title', 'Типы велосипедов')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-bicycle me-2"></i>Типы велосипедов</h1>
            @auth
                <a href="{{ route('bike_type.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-1"></i>Добавить тип
                </a>
            @endauth
        </div>

        <div class="list-group">
            @foreach ($bikeTypes as $type)
                <a href="{{ route('bike_type.show', $type->id) }}"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">{{ $type->name }}</h5>
                        <small class="text-muted">{{ $type->description }}</small>
                    </div>
                    <span class="badge bg-primary rounded-pill">{{ $type->bikes->count() }} шт.</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
