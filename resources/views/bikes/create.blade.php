@extends('layout')

@section('Добавить велосипед')

@section('content')
    <div class="container mt-4">
        <h1>Добавить новый велосипед</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bikes.store') }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="model" class="form-label">Модель:</label>
                <input type="text" class="form-control @error('model') is-invalid @enderror"
                       id="model" name="model" value="{{ old('model') }}">
                @error('model')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bike_type_id" class="form-label">Тип велосипеда:</label>
                <select class="form-select @error('bike_type_id') is-invalid @enderror"
                        id="bike_type_id" name="bike_type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('bike_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('bike_type_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price_per_hour" class="form-label">Цена за час (₽):</label>
                <input type="number" step="0.01" class="form-control @error('price_per_hour') is-invalid @enderror"
                       id="price_per_hour" name="price_per_hour" value="{{ old('price_per_hour') }}">
                @error('price_per_hour')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="{{ route('bikes.index') }}" class="btn btn-secondary">Отмена</a>
        </form>
    </div>
@endsection
