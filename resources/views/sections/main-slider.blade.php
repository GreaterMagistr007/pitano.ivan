<section class="main-slider">
    <?$i=0;?>
    @foreach($Slider as $oneSlider)
        <section class="main-screen main-banner-{{$i}} set_display_block" @if($i!=0) style="display: none;" @endif>
            <img src="{{$oneSlider->image}}" alt="alt" class="desktop" >
            <img src="{{$oneSlider->mobile_image}}" alt="alt" class="mobile">
        </section>
        <?$i++;?>
    @endforeach

</section>
<script>
    window.addEventListener('load',function(){
        document.querySelectorAll('.set_display_block').forEach(function(el){
            el.style.display = 'block';
        });
    });
</script>
<?$i=0;?>
@foreach($Slider as $oneSlider)

<style>
    .main-banner-{{$i}}{
        /*background:url({{$oneSlider->mobile_image}}) no-repeat;

        -webkit-background-size: 100%;
        background-size: 100%;*/
    }
    .main-screen .mobile {
            display: none;
        }
    @media (max-width:576px) {
        /*.main-banner-{{$i}} {
            background: url({{$oneSlider->image}}) no-repeat;

            -webkit-background-size: 100%;
            background-size: 100%;
        }*/
        .main-screen .desktop {
            display: none;
        }
        .main-screen .mobile {
            display: block;
        }
    }

</style>
{{--<script>console.log(document.querySelector('.main-banner-{{$i}}'));</script>--}}
<?$i++;?>
@endforeach



