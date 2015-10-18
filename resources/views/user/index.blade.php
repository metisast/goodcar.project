
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index page</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/user-res/styles/reset.css">
    <link rel="stylesheet" href="/user-res/styles/style.css">
    <script src="/user-res/js/modernizr.custom.js"></script>
</head>
<body>
<div class="wrapper">
    <!-- Top-links -->
    <div id="top-links">
        <div class="top-links-left">
            <a href="#"><img src="/user-res/img/ico/facebook.png" alt="facebook" title="facebook"></a>
            <a href="#"><img src="/user-res/img/ico/rss.png" alt="rss" title="rss"></a>
            <a href="#"><img src="/user-res/img/ico/gplus.png" alt="gplus" title="gplus"></a>
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
            <a href="#"><img src="/user-res/img/ico/logo.png" alt="logo" title="12VOLT"></a>
        </div>
        <div class="slogan">
            <p>Все для авто <br> по <strong>адекватным ценам</strong></p>
        </div>
        <div class="work-time">
            <p class="work-time-tel">8 775 994 19 63</p>
            <p class="work-time-title">РЕЖИМ РАБОТЫ<span>Пн-Пт 9:00-18:00</span></p>
        </div>
        <div class="user-int">
            <a href="#"><img src="/user-res/img/ico/search.png" alt="search"></a>
            <a href="#"><img src="/user-res/img/ico/user.png" alt="account"></a>
            <a href="#" class="store-count">
                <img src="/user-res/img/ico/backet.png" alt="backet">
                <div>99</div>
            </a>
        </div>
    </div>
    <!-- Top-menu -->
    <div id="top-menu">
        <ul class="top-menu">
            <li><a href="#">Дневные ходовые огни</a></li>
            <li><a href="#">Диодные ленты</a></li>
            <li><a href="#">Крипяжи</a></li>
            <li><a href="#">Брелки</a></li>
            <li><a href="#">Спортивные гайки</a></li>
            <li><a href="#">Диодовые лампочки</a></li>
        </ul>
    </div>
    <!-- Slider -->
    <div id="slider">
        <div id="cbp-fwslider" class="cbp-fwslider">
            <ul>
                <li><a href="#"><img src="/user-res/img/1.jpg" alt="img01"/></a></li>
                <li><a href="#"><img src="/user-res/img/2.jpg" alt="img02"/></a></li>
                <li><a href="#"><img src="/user-res/img/3.jpg" alt="img03"/></a></li>
                <li><a href="#"><img src="/user-res/img/4.jpg" alt="img04"/></a></li>
                <li><a href="#"><img src="/user-res/img/5.jpg" alt="img05"/></a></li>
            </ul>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script defer src="/user-res/js/jquery.cbpFWSlider.min.js"></script>
        <script>
            $('document').ready(function(){
                // init slider
                $('#cbp-fwslider').cbpFWSlider();

                /**
                 Set a 3 seconds interval
                 if next button is visible (so is not the last slide) click next button
                 else it finds first dot and click it to start from the 1st slide
                 **/
                setInterval( function(){
                    if($('.cbp-fwnext').is(":visible"))
                    {
                        $('.cbp-fwnext').click();

                    }
                    else{
                        $('.cbp-fwdots').find('span').click();
                    }
                } ,5000 );
            });
        </script>
    </div>
    <!-- Info-block -->
    <div id="info-block">
        <div class="info-block one">
            <p><strong>Бесплатная</strong> доставка <br>по Астане</p>
            <article>при заказе от 5000 т.</article>
        </div>
        <div class="info-block two">
            <p>Действительно <br><strong>низкие</strong> цены</p>
        </div>
        <div class="info-block three">
            <p>Отправка <strong>в любые</strong> <br>регионы Казахстана</p>
        </div>
    </div>
    <!-- New products -->
    <div id="offers">
        <div class="offers-title">
            <p>Новинки</p>
        </div>
        <div class="offers-blocks">
            <div>
                <div class="offers-img">
                    <a href="#"><img src="/user-res/img/light.png" alt=""></a>
                </div>
                <div class="offers-info">
                    <p>
                        <a href="#">Светодиодные фанари водонепроницаймые</a>
                    </p>
                </div>
                <div class="offers-price">
                    <p class="offers-new-price">1500 тг.</p>
                    <p class="offers-old-price">2000 тг.</p>
                </div>
                <div class="offers-buttons">
                    <button class="offers-buy">купить</button>
                    <button class="offers-detals">детали</button>
                </div>
            </div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Best products -->
    <div id="offers">
        <div class="offers-title">
            <p>Хит продаж</p>
        </div>
        <div class="offers-blocks">
            <div>
                <div class="offers-img">

                </div>
            </div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
</body>
</html>