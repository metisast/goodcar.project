@extends('guest.templates.app')

@section('pageTitle', $catalog->title)

@section('middleBlocks')
    <div id="catalog-title">
        <h3>{{ $catalog->title }}</h3>
    </div>
    <div id="products-search">
        <div class="products-search">
            <div class="products-search-title">
                <p>Фильтр</p>
            </div>
            <div class="products-search-select">
                <form action="" id="filter">
                    <input type="text" name="title" placeholder="введите название товара">
                    <button name="submit" class="icon-magnifier" title="найти"></button>
                </form>
            </div>
        </div>
    </div>
    <ul id="products-show">
        @foreach($products as $product)
                <li class="product-show">
                    <div class="product-show-img">
                        <a href="#"><img src="/guest-res/img/light.png" alt=""></a>
                    </div>
                    <div class="product-show-content">
                        <h3>{{ $product->title }}</h3>
                    </div>
                    <div class="product-show-feature">
                        <p><strong>Вес:</strong> 20г.</p>
                        <p><strong>Цвет:</strong> белый</p>
                        <p><strong>Количество в комплекте:</strong> 2шт.</p>
                    </div>
                    <div class="product-show-price">
                        <span class="product-show-price-new">{{ $product->price }} тг.</span>
                        <span class="product-show-price-old">{{ $product->old_price }} тг.</span>
                    </div>
                    <div class="product-show-buttons">
                        <a href="#" class="buy">купить</a>
                        <a href="{{ route('guest.products.show', $product->id) }}" class="more">детали</a>
                    </div>
                </li>
        @endforeach
    </ul>
@stop