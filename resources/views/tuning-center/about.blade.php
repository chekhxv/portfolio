<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
</head>
<body>
    @include('includes.header')

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
                <img src="/img/what-do.jpg" class="what-do__img">
                <h2 class="title-secondury mb-60px about">
                    Наши сотрудники
                </h2>
                <img src="/img/staff.png" class="staff__img">
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
                <a href="#"><img src="./assets/img/free-icon-telegram-2111646.png"  class="footer-icon"></a>
                <a href="#"><img src="./assets/img/free-icon-vkontakte-4494517.png" class="footer-icon"></a>
                <a href="#"><img src="./assets/img/free-icon-instagram-2111463.png"  class="footer-icon"></a>
            </div>
        </div>
        <script src="/js/index.js"></script>
    </footer>
</body>
</html>