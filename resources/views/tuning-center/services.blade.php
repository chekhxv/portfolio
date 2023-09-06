<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
</head>
<body>
    @include('includes.header')


    <section class="services">
        <div class="container">
            <h2 class="title-secondury">
                Услуги
            </h2>
            <div class="flex-box wrap">
                @foreach($services as $service)
                    <div class="simple-box">
                        <ul class="servisec-card__list">
                            <li><img src="{{ asset($service->image) }}" class="servisec-card__list-img"></li>
                            <li class="padding-list">
                                <h4 class="title-four">
                                    {{ $service->name }}
                                </h4>
                            </li>
                            <li class="padding-list">
                                <p class="servisec-card__list-description">
                                    {{ $service->description }}
                                </p>
                            </li>
                        </ul>
                        <p class="prod-count mt-mb">{{ $service->price }}р</p>
                        
                        <!-- Здесь добавляем форму для добавления услуги в корзину -->
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <input type="hidden" name="price" value="{{ $service->price }}">
                            <button type="submit" class="btn-lrn-more btn-size-one color-btn-two">Добавить в корзину</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p class="adress">Адрес</p>
            <p class="adress-street">
                г. Москва, Нахимовский пр.
            </p>
            <p class="adress-street">
                г. Москва, ул. Нежинская 7
            </p>
            <p class="adress">Соцсети</p>
            <div class="social-box">
                <a href="#"><img src="/img/free-icon-telegram-2111646.png"  class="footer-icon"></a>
                <a href="#"><img src="/img/free-icon-vkontakte-4494517.png" class="footer-icon"></a>
                <a href="#"><img src="/img/free-icon-instagram-2111463.png"  class="footer-icon"></a>
            </div>
        </div>
        <script src="/js/index.js"></script>
    </footer>
</body>
</html>