<section class="contacts">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contacts-content tl-center">
                    <h2 class="h2 h2--small">{{$Contacts->blockTitle}}</h2>
                    <p>{!! $Contacts->text !!}</p>
                    <form action="/" class="form form-contacts" onsubmit="ym(55182217, 'reachGoal', 'quest'); ga('send', 'event', 'lead', 'quest');">
                        <input type="text" style="display: none" name="Тип" value="Подписка">
                        <div class="form-row">
                            <input type="text" name="Имя" class="form-input" required minlength="3" maxlength="15" placeholder="Михаил">
                        </div>
                        <div class="form-row">
                            <input type="text" name="Телефон" class="form-input form__phone" required minlength="12" placeholder="+7(924)000-00-00">
                        </div>
                        <div class="form-row">
                            <button class="btn btn--bg">Отправить</button>
                        </div>
                        <div class="form-row messageBox">
                            <p>Поле "Я согласен с условиями договора оферты" не отмечено!</p>
                        </div>
                        <div class="form-row">
                            <div class="form__checkbox">
                                <input type="checkbox" checked id="policy">
                                <label for="policy">Я согласен с условиями <a class="btn-modal" href="#oferta" data-effect="mfp-zoom-out">договора оферты</a></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {!! $MainSettings->mapSRC !!}
{{--    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ade1b9e280248ca00930d2d7e90027b518cab849d7627c390f38a2f10f2a9d485&amp;width=1145&amp;height=720&amp;lang=ru_RU&amp;scroll=true"></script>--}}
</section>

<script>
{{--    window.addEventListener('load',function(){--}}
{{--        setTimeout(function() {--}}
{{--            let text = `{!! $MainSettings->mapSRC !!}`;--}}

{{--            let sctipt = document.createElement('script');--}}
{{--            // console.log()--}}
{{--            sctipt.type = 'text/javascript';--}}
{{--            sctipt.charset = 'utf-8';--}}
{{--            sctipt.setAttribute('async',true);--}}
{{--            sctipt.src = 'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Abe4e703e92ba11ee585a2ed585c541a36c0c7e2775d6123713bc78321031cd6a&width=500&height=400&lang=ru_RU&scroll=true';--}}
{{--            document.querySelector('section.contacts').appendChild(sctipt);--}}
{{--        }, 1000);--}}
{{--    });--}}
</script>
