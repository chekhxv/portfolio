<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
</head>
<body>
    
    <div class="container mt-9">
        <h2 class="text-center mb-4">Корзина</h2>
        
        <!-- Отображение элементов корзины -->
        <ul class="list-group mb-4">
            @foreach(Cart::content() as $row)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $row->name }} - {{ $row->price }}
                    <form action="{{ route('cart.remove', $row->rowId) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </li>
            @endforeach
        </ul>
        
        <!-- Форма для выбора автомобиля и оформления заказа -->
        <form action="{{ route('cart.checkout') }}" method="POST" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="car" class="form-label">Выберите автомобиль, если необходимо:</label>
                <select name="car" class="form-select" id="car">
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->make }} {{ $car->model }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <p>Общая стоимость: {{ Cart::total() }}</p>
            </div>
            <button type="submit" class="btn btn-primary">Оформить заказ</button>
        </form>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <a class="btn btn-primary" href="{{route('tuning-center.index') }}" class="header-navigation__list-item">главная</a>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGSLf2xlYtvJ8U2Q4U+9cuEnJoa3a" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
