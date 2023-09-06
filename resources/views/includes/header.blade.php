<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
    @php
    use Illuminate\Support\Facades\Auth;
    @endphp
    <header class="header">
        
        <nav class="header-navigation">
            <button class="btn__menu-burger">
                <img src="/img/burger.svg" class="menu__icon">
            </button>
            @if (Auth::check())
            <div class="wrapper-sign">
                <a href="/profile" class="btn__lk">
                    <span class="btn__lk-text">{{ Auth::user()->name }}</span>
                    <img src="/img/lk__icon.svg" class="menu__icon">
                </a>
            </div>
            <a href="{{ route('cart.show') }}">Корзина</a>
            @else
            <a href="/register" class="btn__lk">
                <span class="btn__lk-text">личный кабинет</span>
                <img src="/img/lk__icon.svg" class="menu__icon">
            </a>
            @endif
            <div class="header-navigation__wrapper">
                <ul class="header-navigation__list">
                    <li><a href="{{route('tuning-center.index') }}" class="header-navigation__list-item">главная</a></li>
                    <li><a href="{{ route('services') }}" class="header-navigation__list-item">услуги</a></li>
                    <li><a href="{{ route ('products') }}" class="header-navigation__list-item">продукция</a></li>
                    <li><a href="{{ route('about') }}" class="header-navigation__list-item">о нас</a></li>
                    <li><a href="{{ route('contacts') }}" class="header-navigation__list-item">контакты</a></li>
                </ul>
            </div>
            <div class="form-wrapper">
                <form class="sign-in form-lk">
                    <h3 class="form-title">
                        Вход
                    </h3>
                    <input type="text" class="form-input" placeholder="Номер телефона">
                    <input type="password" class="form-input" placeholder="Пароль">
                    <button class="btn-log btn-size-two color-btn-one btn-lrn-more" required>вход</button>
                    <p class="form-text">нет аккаунта? <a href="##" class="btn-sign-up" required>Зарегистрироваться</a></p>
                </form>
                <form class="sign-up form-lk">
                    <h3 class="form-title">
                        Регистрация
                    </h3>
                    <input type="text" class="form-input" placeholder="Имя" required onkeydown="return (event.keyCode < 48 || event.keyCode > 57)">
                    <input type="text" class="form-input" placeholder="Фамилия" required onkeydown="return (event.keyCode < 48 || event.keyCode > 57)" >
                    <input type="text" class="form-input" placeholder="Отчество" required onkeydown="return (event.keyCode < 48 || event.keyCode > 57)" >
                    <input type="tel" class="form-input" placeholder="Номер телефона" required onkeydown="return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode === 8">
                    <input type="password" class="form-input" placeholder="Пароль" required>
                    <input type="password" class="form-input" placeholder="Подтверждение пароля" required>
                    <button class="btn-log btn-size-two color-btn-one btn-lrn-more">Зарегистрироваться</button>
                    <p class="form-text">нет аккаунта? <a href="##" class="btn-sign-in">Зарегистрироваться</a></p>
                </form>
            </div>
        </nav>
        
    </header>

</body>
</html>