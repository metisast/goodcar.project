{{-- Left nav block --}}
<ul class="l-nav">
    <li><a href="{{ route('admin.index') }}"><span class="icon-home"></span>Активность</a><div class="active"></div></li>
    <li><a href="{{ route('admin.buy') }}"><span class="icon-basket-loaded"></span>Покупки</a></li>
    <li><a href="{{ route('admin.products.index') }}"><span class="icon-tag"></span>Товары</a></li>
    <li><a href="{{ route('admin.catalogs.index') }}"><span class="icon-folder-alt"></span>Каталоги</a></li>
    <li><a href="{{ route('admin.features.index') }}"><span class="icon-equalizer"></span>Характеристики</a></li>
    <li><a href="#"><span class="icon-users"></span>Пользователи</a></li>
    <li><a href="#"><span class="icon-settings"></span>Настройки магазина</a></li>
    <li><a href="{{ action('Auth\AuthController@getLogout') }}"><span class="icon-close"></span>Выход</a></li>
</ul>