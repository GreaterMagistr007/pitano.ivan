@if(count($Salat)>0)
<section class="cards" id="salads">
    <div class="container">
        <div class="head">
            <h2 class="h2 white h2--long h2--small">САЛАТЫ</h2>
        </div>
        <div class="row" style="justify-content: center;">
            <?
            $k=count($Salat);
            if($k<3){$l=6;}
            if($k==3){$l=4;}
            if($k>=4){$l=3;}
            ?>
            @foreach($Salat as $oneSalat)
                    @if(!$oneSalat->show_on_site)
                        @continue
                    @endif
                <?
                    $isCesar='';
                    if($oneSalat->title=='ЦЕЗАРЬ'){$isCesar='_cesar';}
                ?>
            <div data-id="{{$oneSalat->product_id}}{{$isCesar}}" class="col-lg-{{$l}} col-sm-6 productBlock" style="margin-bottom: 60px;">
                <div class="card">
                    <div class="card__image">
                        <img class="productBlockImage" src="{{$oneSalat->image}}" alt="alt">
                    </div>
                    <div class="card__content">
                        <div class="card__content-header">
                            <div class="card__content-head productBlockTitle">{{$oneSalat->title}}</div>
                            <div class="card__content-price productBlockPrice"><?if(strlen($isCesar)>0){echo('от ');}?>{{$oneSalat->price}} р.</div>
                        </div>
                        <p>{{$oneSalat->text}}</p>
                        <a href="#" class="btn btn--orange addCartButton{{$isCesar}}" >Добавить в корзину</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
