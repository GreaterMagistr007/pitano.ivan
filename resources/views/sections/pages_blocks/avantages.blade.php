@if(($About->advantage_1_text && $About->advantage_1_icon) ||
    ($About->advantage_2_text && $About->advantage_2_icon) ||
    ($About->advantage_3_text && $About->advantage_3_icon) ||
    ($About->advantage_4_text && $About->advantage_4_icon)
)
    <div class="ps-section__content">
        <div class="row">
            @for($i=1;$i<5;$i++)
                @if($About['advantage_'.$i.'_text'] && $About['advantage_'.$i.'_icon'])
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                        <div class="ps-block--icon-box">
                            <i class="fa {{$About['advantage_'.$i.'_icon']}}"></i>
                            <p>{{$About['advantage_'.$i.'_text']}}</p>
                        </div>
                    </div>
                @endif
            @endfor
{{--            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">--}}
{{--                <div class="ps-block--icon-box"><i class="icon-store"></i>--}}
{{--                    <h4>1.8M</h4>--}}
{{--                    <p>Sellers Active on Martfury</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">--}}
{{--                <div class="ps-block--icon-box"><i class="icon-bag2"></i>--}}
{{--                    <h4>30.6M</h4>--}}
{{--                    <p>Buyer active on Martfury</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">--}}
{{--                <div class="ps-block--icon-box"><i class="icon-cash-dollar"></i>--}}
{{--                    <h4>$2.46M</h4>--}}
{{--                    <p>Annual gross merchandise sales</p>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endif
