<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div class="form-group">
            <label for="carMake">Выберите автомобиль:</label>
            <select wire:model="carMake" id="carMake" class="form-control">
                <option value="">Выберите автомобиль</option>
                <!-- Здесь добавьте опции с марками автомобилей -->
            </select>
        </div>
    
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">Имя пользователя</th>
                    <th scope="col">Автомобиль</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @foreach ($user->orders as $order)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $order->car->make }} {{ $order->car->model }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>