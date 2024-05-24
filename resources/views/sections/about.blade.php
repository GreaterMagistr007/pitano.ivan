@if($Description)
<section class="about">
    <div class="about-top" style="    padding-top: 70px;">
        <div class="container">
            <div class="logo">
                <img src="img/logo.svg" alt="alt">
            </div>
        </div>
    </div>
    <div class="about-content">
        @if($Description->image)
        <img src="{{$Description->image}}" alt="alt" class="about-content__image" style="max-width: 669px;height: auto;">
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    {!! $Description->content !!}
{{--                    <p>Идеальная пицца — сытная, но легкая пища.</p>--}}
{{--                    <p>Основа у неё тонкая, а начинка — обильная и деликатесная. Никаких дрожжей в тесте. Только традиционная домашняя закваска.</p>--}}
{{--                    <p>Тесто для пиццы готовится исключительно из итальянской муки. Все детали важны! Только лучшие продукты и кулинарные секреты дают максимально вкусный результат =)</p>--}}
                </div>
            </div>
        </div>
    </div>
</section>
@endif
