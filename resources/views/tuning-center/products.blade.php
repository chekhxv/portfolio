<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
</head>
<body>
    @include('includes.header')


    @include('includes.header')

    <section class="products-section">
        <div class="container">
            <nav class="products__navigation-bar">
                <ul class="products__navigation-bar_list">
                    <li><a href="##" class="products-list__item active">Диски</a></li>
                    <li><a href="##" class="products-list__item">Системы выхолпа</a></li>
                </ul>
            </nav>
            <div class="flex-box pt-60px wheels">
                @foreach($products as $product)
                    <ul class="products__list">
                        <li><img src="{{ asset($product->image) }}" class="prod-img"></li>
                        <li>
                            <h4 class="title-four">
                                {{ $product->name }}
                            </h4>
                        </li>
                        <li>
                            <p class="prod-description">
                                {{ $product->description }}
                            </p>
                            <p class="prod-count">
                                {{ $product->price }}р
                            </p>
                        </li>
                        <li>
                            <!-- Форма для добавления продукта в корзину -->
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <button type="submit" class="btn-lrn-more btn-size-one color-btn-one">Добавить в корзину</button>
                            </form>
                        </li>
                    </ul>
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
    </footer>
    <script src="/js/index.js"></script>
</body>
</html>