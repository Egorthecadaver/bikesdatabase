<!DOCTYPE html>
<html>
<head>
    <title>Добавить велосипед</title>
</head>
<body>
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

    <form action="{{ route('bikes.store') }}" method="POST">
        @csrf
        <div class="model.store">
            <label for="model" class="form-label">Модель:</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}">
        </div>

        <div class="type.store">
            <label for="bike_type_id" class="form-label">Тип велосипеда:</label>
            <select class="form-select" id="bike_type_id" name="bike_type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('bike_type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="pph.store">
            <label for="price_per_hour" class="form-label">Цена за час (₽):</label>
            <input type="number" step="0.01" class="form-control" id="price_per_hour"
                   name="price_per_hour" value="{{ old('price_per_hour') }}">
        </div>


        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
</body>
</html>
