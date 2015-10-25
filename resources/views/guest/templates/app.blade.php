{{-- Main app guest template --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('pageTitle', 'Добро пожаловать!')</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/admin-res/styles/simple-line-icons.css"/>
    <link rel="stylesheet" href="/guest-res/styles/reset.css">
    <link rel="stylesheet" href="/guest-res/styles/style.css">
    <script src="/guest-res/js/modernizr.custom.js"></script>
</head>
<body>
<div class="wrapper">
    <!-- Top-links -->
    <div id="top-links">
        <div class="top-links-left">
            <a href="#"><img src="/guest-res/img/ico/facebook.png" alt="facebook" title="facebook"></a>
            <a href="#"><img src="/guest-res/img/ico/rss.png" alt="rss" title="rss"></a>
            <a href="#"><img src="/guest-res/img/ico/gplus.png" alt="gplus" title="gplus"></a>
        </div>
        <div class="top-links-right">
            <ul class="top-links-nav">
                <li><a href="#">Доставка</a></li>
                <li><a href="#">Адреса</a></li>
                <li><a href="#">Как купить</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>
    </div>
    <!-- Logo -->
    <div id="logo">
        <div class="logo">
            <a href="/"><img src="/guest-res/img/ico/logo.png" alt="logo" title="12VOLT"></a>
        </div>
        <div class="slogan">
            <p>Все для авто <br> по <strong>адекватным ценам</strong></p>
        </div>
        <div class="work-time">
            <p class="work-time-tel">8 775 994 19 63</p>
            <p class="work-time-title">РЕЖИМ РАБОТЫ<span>Пн-Пт 9:00-18:00</span></p>
        </div>
        <div class="user-int">
            <a href="#"><img src="/guest-res/img/ico/search.png" alt="search"></a>

            @if(Auth::check())
                <a href="#"><img src="/guest-res/img/ico/user.png" alt="account"></a>
            @endif

            <a href="#" class="store-count">
                <img src="/guest-res/img/ico/backet.png" alt="backet">
                <div>99</div>
            </a>
        </div>
    </div>
    <!-- Top-menu -->
    @include('guest.templates.top_menu')
    <!-- Middle blocks -->
    @yield('middleBlocks')

     <!-- Footer -->
    <div id="footer">
        <div class="footer-top">
            <div class="footer-best-catalog">
                <h3>Популярные категории</h3>
                <ul>
                    @foreach($compCatalogs as $catalog)
                        <li><a href="{{ route('guest.catalogs.show', $catalog->id) }}">{{ $catalog->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-links">
                <h3>Информация</h3>
                <ul>
                    <li><a href="#">Доставка</a></li>
                    <li><a href="#">Адреса</a></li>
                    <li><a href="#">Как купить</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>
            <div class="footer-big-info">
                <div class="footer-work">
                    <p class="footer-work-number">8 775 994 19 63</p>
                    <p class="footer-work-time">Звоните<span>Пн-Пт 9:00-18:00</span></p>
                </div>
                <div class="subscribe">
                    <form action="">
                        <input type="text" placeholder="Введите E-mail">
                        <button>подписаться</button>
                    </form>
                </div>
                <div class="footer-news-message">
                    <p><strong>Подпишитесь!</strong> Новинки, скидки, предложения!</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-left">
                <a href="/"><img src="/guest-res/img/ico/logo-bottom.png" alt="12Volt"></a>
            </div>
            <div class="footer-bottom-center">
                <a href="http://astana.systems">astana-systems, 2015</a>
            </div>
            <div class="footer-bottom-right">
                <a href="#"><img src="/guest-res/img/ico/facebook-bottom.png" alt=""></a>
                <a href="#"><img src="/guest-res/img/ico/rss-bottom.png" alt=""></a>
                <a href="#"><img src="/guest-res/img/ico/gplus-bottom.png" alt=""></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>