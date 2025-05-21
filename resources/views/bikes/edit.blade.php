@extends('layout')

@section('title', 'Редактировать: ' . $bike->model)

@section('content')
    <div class="container">
        <h1 class="mb-4">Редактирование: {{ $bike->model }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bikes.update', $bike->id) }}" method="POST" class="mt-3">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="model" class="form-label">Модель:</label>
                <input type="text" class="form-control @error('model') is-invalid @enderror"
                       id="model" name="model" value="{{ old('model', $bike->model) }}">
                @error('model')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bike_type_id" class="form-label">Тип:</label>
                <select class="form-select @error('bike_type_id') is-invalid @enderror"
                        id="bike_type_id" name="bike_type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('bike_type_id', $bike->bike_type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('bike_type_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price_per_hour" class="form-label">Цена/час:</label>
                <input type="number" step="0.01" class="form-control @error('price_per_hour') is-invalid @enderror"
                       id="price_per_hour" name="price_per_hour"
                       value="{{ old('price_per_hour', $bike->price_per_hour) }}">
                @error('price_per_hour')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check form-switch">
                <input type="hidden" name="is_available" value="0">
                <input type="checkbox" class="form-check-input"
                       id="is_available" name="is_available" value="1"
                    @checked(old('is_available', $bike->is_available))>
                <label class="form-check-label" for="is_available">Доступен</label>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Обновить</button>
                <a href="{{ route('bikes.index') }}" class="btn btn-secondary">Отмена</a>
            </div>
        </form>
    </div>
@endsection
