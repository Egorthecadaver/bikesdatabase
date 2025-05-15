<!DOCTYPE html>
<html>
<head>
    <title>Редактировать велосипед</title>
</head>
<body>
<h1>Редактирование: {{ $bike->model }}</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('bikes.update', $bike->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Модель:
        <input type="text" name="model" value="{{ old('model', $bike->model) }}">
    </label><br>

    <label>Тип:
        <select name="bike_type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}"
                    {{ old('bike_type_id', $bike->bike_type_id) == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </label><br>

    <label>Цена/час:
        <input type="number" name="price_per_hour" step="0.01"
               value="{{ old('price_per_hour', $bike->price_per_hour) }}">
    </label><br>

    <div class="form-check">
        <input type="hidden" name="is_available" value="0"> <!-- Отправляет 0 если чекбокс не отмечен -->
        <input type="checkbox"
               class="form-check-input"
               id="is_available"
               name="is_available"
               value="1"
            @checked(old('is_available', $bike->is_available))>
        <label class="form-check-label" for="is_available">Доступен</label>
    </div>

    <button type="submit">Обновить</button>
</form>
</body>
</html>
