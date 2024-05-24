@if(isset($Main->catalog_slider_images) && $Main->catalog_slider_images && count($Main->catalog_slider_images))
<div class="ps-carousel--nav-inside owl-slider"
     data-owl-auto="true"
     data-owl-loop="true"
     data-owl-speed="5000"
     data-owl-gap="0"
     data-owl-nav="true"
     data-owl-dots="true"
     data-owl-item="1"
     data-owl-item-xs="1"
     data-owl-item-sm="1"
     data-owl-item-md="1"
     data-owl-item-lg="1"
     data-owl-duration="1000"
     data-owl-mousedrag="on">
    @foreach($Main->catalog_slider_images as $image)
    <a href="#">
        <img src="/{{$image}}" alt="">
    </a>
    @endforeach
{{--    <a href="/shop-default.html">--}}
{{--        <img src="/img/slider/shop-sidebar/2.jpg" alt="">--}}
{{--    </a>--}}
</div>
<style>
    .owl-carousel .owl-item img {
        margin: 0 auto;
    }
</style>
@endif
