@include('sections.head')
{{--@dd($MainSettings["model_show_on_site"])--}}
<body>
@include('sections.metrika')
@include('sections.header')
<main class="main">
    @include('sections.main-slider')

    <section class="main-content" style="padding-bottom: 0px;">
        @if($MainSettings["model_show_on_site"]->Sets->show)
            @include('sections.sets')
        @endif
        @if($MainSettings["model_show_on_site"]->Pasta->show)
            @include('sections.pasta')
        @endif
        @if($MainSettings["model_show_on_site"]->Pinza->show)
            @include('sections.pinza')
        @endif
        @if($MainSettings["model_show_on_site"]->Salat->show)
            @include('sections.salads')
        @endif
        @if($MainSettings["model_show_on_site"]->Soup->show)
            @include('sections.soups')
        @endif
        @if($MainSettings["model_show_on_site"]->Makaron->show)
            @include('sections.makarons')
        @endif
        @if($MainSettings["model_show_on_site"]->Hot->show)
            @include('sections.hot')
        @endif
        @if($MainSettings["model_show_on_site"]->Dessert->show)
            @include('sections.desserts')
        @endif



{{--        @include('sections.soups')--}}
{{--        Временно скрытые наборы--}}




    </section>
    @include('sections.about')
    @include('sections.contacts')
</main>

@include('sections.footer')



{{--Карта Антона:--}}
{{--<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Adc0a5f9e068fe43064b5c1a785645292f00482562fa629c236b6941da781189c&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>--}}


@include('sections.foot')

<script>
    // let reboot = 0;
    // console.log(localStorage.getItem("alarm"));
    // $.ajax({
    //     type: "POST",
    //     url: "/getNewOrders",
    //     headers: {"X-CSRF-TOKEN": $("meta[name=`csrf-token`]").attr("content")},
    //     success: function (data) {
    //         console.log(localStorage.getItem("alarm"));

    //         if (data == "alarm") {
    //             if (reboot > 2) {
    //                 reboot = 0;
    //                 window.location.reload()
    //             } else {
    //                 reboot++
    //             }
    //             if (localStorage.getItem("alarm") == 1) {
    //                 alarm()
    //             } else {
    //                 localStorage.setItem("alarm", 1);
    //                 window.location.reload()
    //             }
    //         } else {
    //             localStorage.setItem("alarm", 0);
    //             reboot = 0
    //         }

    //     },
    //     error: function (data) {
    //         if (reboot > 2) {
    //             reboot = 0;
    //             window.location.reload();
    //         } else {
    //             reboot++;
    //         }
    //     }
    // });

    // document.querySelector("#statusSelector").querySelector("[stat='"+decodeURI(window.location.href.split("?")[1].split("=")[1].split("&")[0])+"']").setAttribute("selected",true);

</script>

