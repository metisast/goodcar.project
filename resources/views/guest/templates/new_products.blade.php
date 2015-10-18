<div id="offers">
    <div class="offers-title">
        <p>Новинки</p>
    </div>
    <div class="offers-blocks">
        @foreach($compNewProducts as $product)
            <div>
                <div class="offers-img">
                    <a href="#"><img src="/guest-res/img/light.png" alt=""></a>
                </div>
                <div class="offers-info">
                    <p>
                        <a href="#">{{ $product->title }}</a>
                    </p>
                </div>
                <div class="offers-price">
                    <p class="offers-new-price">{{ $product->price }}</p>
                    <p class="offers-old-price">{{ $product->old_price }}</p>
                </div>
                <div class="offers-buttons">
                    <button class="offers-buy">купить</button>
                    <button class="offers-detals">детали</button>
                </div>
            </div>
        @endforeach
            <div class="offers-plus">
                <a href="#" class="icon-plus" title="ЕЩЁ"></a>
            </div>
    </div>
</div>