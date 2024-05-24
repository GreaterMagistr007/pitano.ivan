@if(count($Soup)>0)
<section class="cards" id="soups">
    <div class="container">
        <div class="head">
            <h2 class="h2 white">СУПЫ</h2>
        </div>
        <div class="row" style="justify-content: center;">
            <?
            $k=count($Soup);
            if($k<3){$l=6;}
            if($k==3){$l=4;}
            if($k>=4){$l=3;}
            ?>
            @foreach($Soup as $oneSoup)
                @if(!$oneSoup->show_on_site)
                    @continue
                @endif
                <div data-id="{{$oneSoup->product_id}}" class="col-lg-{{$l}} col-sm-6 productBlock" style="margin-bottom: 60px;">
                    <div class="card">
                        <div class="card__image">
                            <img class="productBlockImage" src="{{$oneSoup->image}}" alt="alt">
                        </div>
                        <div class="card__content">
                            <div class="card__content-header">
                                <div class="card__content-head productBlockTitle">{{$oneSoup->title}}</div>
                                <div class="card__content-price productBlockPrice">{{$oneSoup->price}} р.</div>
                            </div>
                            <p>{{$oneSoup->text}}</p>
                            <a href="#" class="btn btn--orange addCartButton">В корзину</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endif
