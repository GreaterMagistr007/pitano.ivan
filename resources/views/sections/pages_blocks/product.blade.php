<div class="ps-product--detail ps-product--box">
    <div class="ps-product__header ps-product__box">
        <div class="ps-product__thumbnail" data-vertical="true">
            <figure>
                <div class="ps-wrapper">
                    <div class="ps-product__gallery" data-arrow="true">
                        <div class="item"><a href="/{{$this_item['image']}}"><img src="/{{$this_item['image']}}" alt=""></a></div>
{{--                        <div class="item"><a href="/img/products/detail/fullwidth/2.jpg"><img src="/img/products/detail/fullwidth/2.jpg" alt=""></a></div>--}}
{{--                        <div class="item"><a href="/img/products/detail/fullwidth/3.jpg"><img src="/img/products/detail/fullwidth/3.jpg" alt=""></a></div>--}}
                    </div>
                </div>
            </figure>
{{--            <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">--}}
{{--                <div class="item"><img src="/img/products/detail/fullwidth/1.jpg" alt=""></div>--}}
{{--                <div class="item"><img src="/img/products/detail/fullwidth/2.jpg" alt=""></div>--}}
{{--                <div class="item"><img src="/img/products/detail/fullwidth/3.jpg" alt=""></div>--}}
{{--                <div class="item"><img src="/img/products/detail/fullwidth/4.jpg" alt=""></div>--}}
{{--            </div>--}}
        </div>
        <div class="ps-product__info">
            <h1>{{$this_item['title']}}</h1>
            <div class="ps-product__desc">
                <p>Категория:<a href="/catalog/{{$parent_item['uri']}}"><strong> {{$parent_item['title']}}</strong></a></p>
            </div>
                {!! $this_item['description'] !!}
            <div class="ps-product__shopping">
                <a class="ps-btn" href="/order">
                    Заказать
                </a>
            </div>
        </div>
    </div>
</div>
