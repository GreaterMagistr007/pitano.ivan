@if(count($Dessert)>0)
<section class="cards" id="desserts">
    <div class="container">
        <div class="head">
            <h2 class="h2 white">ДЕСЕРТЫ</h2>
        </div>
        <div class="row" style="justify-content: center;">
            <?
            $k=count($Dessert);
            if($k<3){$l=6;}
            if($k==3){$l=4;}
            if($k>=4){$l=3;}
            ?>
            @foreach($Dessert as $oneDessert)
                    @if(!$oneDessert->show_on_site)
                        @continue
                    @endif
                <div data-id="{{$oneDessert->product_id}}" class="col-sm-6 col-md-{{$l}} productBlock" style="margin-bottom: 60px;">
                    <div class="card card--big">
                        <div class="card__image">
                            <img class="productBlockImage" src="{{$oneDessert->image}}" alt="alt">
                        </div>
                        <div class="card__content">
                            <div class="card__content-header">
                                <div class="card__content-head productBlockTitle">{{$oneDessert->title}}</div>
                                <div class="card__content-price productBlockPrice">{{$oneDessert->price}} р.</div>
                            </div>
                            <p>{{$oneDessert->text}}</p>
                            <a href="#" class="btn btn--orange addCartButton">Добавить в корзину</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
