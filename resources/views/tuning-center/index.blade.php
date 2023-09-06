<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
</head>
<body>

    @include('includes.header')

    <section class="hero">
        <div class="container">
            <div class="hero-box">
                <div class="hero-box__left-description">
                    <img src="{{ asset('img/logo.svg')}}" class="logo">
                    <h1 class="first-title">
                        <span class="span__sub-title">
                            BUBNOV-TUNING 
                        </span>
                        <span class="span__sub-title">
                            Это в первую очередь 
                            качество
                        </span>
                    </h1>
                    <p class="p-style-1 p__paragraph hero__p">
                        лучший тюнинг центр в россии
                    </p>
                </div>
                <img src="{{ asset('img/car-gen.png')}}" class="hero__img">
            </div>
        </div>
    </section>

    <section class="sales-hits">
        <div class="container-2">
            <h2 class="title-secondury ml-90px">
                Хиты продаж
            </h2>
            <div class="slider">
                <nav class="products__navigation-bar">
                    <ul class="products__navigation-bar_list">
                        <li><a href="##" class="products-list__item active">Диски</a></li>
                        <li><a href="##" class="products-list__item">Системы выхолпа</a></li>
                    </ul>
                </nav>

                <div class="slider-body">
                    <div class="wheels flex-box">
                        <div class="products-card">
                            <img src="{{ asset('img/wheels.png')}}" class="card-img">
                            <div class="products-card__description">
                                <h3 class="products-card__title">
                                    Sunday Wheels
                                </h3>
                                <p class="products-card__p">
                                    Каждая деталь колеса тщательно продумана и изготовлена с использованием самых передовых технологий.
                                </p>
                                <a href="/products.html" class="btn-lrn-more btn-size-one color-btn-one">подробнее</a>
                            </div>
                        </div>
                        <div class="products-card card-2">
                            <img src="{{ asset('img/wheels.png')}}" class="card-img">
                            <div class="products-card__description">
                                <h3 class="products-card__title">
                                    Sunday Wheels
                                </h3>
                                <p class="products-card__p">
                                    Каждая деталь колеса тщательно продумана и изготовлена с использованием самых передовых технологий.
                                </p>
                                <a href="/products.html" class="btn-lrn-more btn-size-one color-btn-one">подробнее</a>
                            </div>
                        </div>
                    </div>

                    <div class="exhaust flex-box">
                        <div class="products-card">
                            <img src="{{ asset('img/exhaust-one.png')}}" class="card-img">
                            <div class="products-card__description">
                                <h3 class="products-card__title">
                                    Boston 35G4S
                                </h3>
                                <p class="products-card__p">
                                    Каждая деталь колеса тщательно продумана и изготовлена с использованием самых передовых технологий.
                                </p>
                                <a href="/products.html" class="btn-lrn-more btn-size-one color-btn-one">подробнее</a>
                            </div>
                        </div>
                        <div class="products-card">
                            <img src="{{ asset('img/exhaust-two.png')}}" class="card-img">
                            <div class="products-card__description">
                                <h3 class="products-card__title">
                                    WOLUMAR 115FL
                                </h3>
                                <p class="products-card__p">
                                    Каждая деталь колеса тщательно продумана и изготовлена с использованием самых передовых технологий.
                                </p>
                                <a href="/products.html" class="btn-lrn-more btn-size-one color-btn-one">подробнее</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="c">
                <a href="" class="btn-lrn-more btn-size-two color-btn-one c">к продуктам</a>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <h2 class="title-secondury">
                Услуги
            </h2>
            <div class="flex-box">
                <ul class="servisec-card__list">
                    <li><img src="{{ asset('img/services-1.png')}}" class="servisec-card__list-img"></li>
                    <li class="padding-list">
                        <h4 class="title-four">
                            Спорт. выхлопные системы
                        </h4>
                    </li>
                    <li class="padding-list">
                        <p class="servisec-card__list-description">
                            Установка и настройка спортивных выхлопных систем.
                        </p>
                    </li>
                </ul>

                <ul class="servisec-card__list">
                    <li><img src="{{ asset('img/services-2.png')}}" class="servisec-card__list-img"></li>
                    <li class="padding-list">
                        <h4 class="title-four">
                            Чип-тюнинг для повышения производительности
                        </h4>
                    </li>
                    <li class="padding-list">
                        <p class="servisec-card__list-description">
                            Максимизируйте мощность вашего автомобиля.
                        </p>
                    </li>
                </ul>

                <ul class="servisec-card__list">
                    <li><img src="{{ asset('img/services-3.png')}}" class="servisec-card__list-img"></li>
                    <li class="padding-list">
                        <h4 class="title-four">
                            Электронные системы для комфорта и развлечения
                        </h4>
                    </li>
                    <li class="padding-list">
                        <p class="servisec-card__list-description">
                            Установка и настройка систем навигации, мультимедиа и аудио.
                        </p>
                    </li>
                </ul>
            </div>
            <div class="btn-box c pt-30px">
                <a href="" class="btn-lrn-more btn-size-two color-btn-two">к продуктам</a>
            </div>
        </div>
    </section>
    <section class="about-us-section">
        <div class="container">
            <h2 class="title-secondury mb-60px about">
                О нас
            </h2>
            <p class="style_p about-us__description mb-10px">
                <strong>Мы</strong> - команда профессионалов в автомобильном тюнинге.
            </p>
            <p class="style_p about-us__description">
                Стремимся достичь идеального сочетания стиля, производительности и индивидуальности для вашего автомобиля. С долголетним опытом и страстью к автомобилям, мы готовы превратить вашу машину в произведение искусства на дороге.
            </p>
            <div class="what-do">
                <h1 class="first-title color-black">
                    <span class="span__sub-title  c">
                        Уже обслужили 
                    </span>
                </h1>
                <img src="{{ asset('img/what-do.jpg')}}" class="what-do__img">
                <div class="btn-box c">
                    <a href="" class="btn-lrn-more btn-size-two color-btn-one">подробнее</a>
                </div>
            </div>
        </div>
    </section>

    <section class="partners">
        <div class="container">
            <h2 class="title-secondury">
                Партнеры
            </h2>
            <img src="{{ asset('img/partners.png')}}" class="partners__img">
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
                <a href="#"><img src="{{ asset('img/free-icon-telegram-2111646.png')}}"  class="footer-icon"></a>
                <a href="#"><img src="{{ asset('img/free-icon-vkontakte-4494517.png')}}" class="footer-icon"></a>
                <a href="#"><img src="{{ asset('img/free-icon-instagram-2111463.png')}}"  class="footer-icon"></a>
            </div>
        </div>
        <script src="{{asset('js/index.js')}}"></script>
    </footer>
</body>
</html>