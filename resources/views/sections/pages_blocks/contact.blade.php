<div class="ps-contact-info">
    <div class="container">
        <div class="ps-section__header">
            <h3>Если остались вопросы, свяжитесь с нами:</h3>
        </div>

        <div class="ps-section__content">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                    <div class="ps-block--contact-info">
                        <h4>Телефон</h4>
                        @for($i=1;$i<=3;$i++)
                            @if(isset($Contacts['phone_'.$i]) && $Contacts['phone_'.$i])
                            <p>
                                <a href="tel:{{$Contacts['phone_'.$i]}}">
                                    <span class="">{{$Contacts['phone_'.$i]}}</span>
                                </a>
                            </p>
                            @endif
                        @endfor
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                    <div class="ps-block--contact-info">
                        <h4>email</h4>
                        <p>
                            <a href="mail:{{$Contacts['email']}}">
                                <span class="">{{$Contacts['email']}}</span>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                    <div class="ps-block--contact-info">
                        <h4>Адрес</h4>
                        <p>
                            <span>{{$Contacts['address']}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            {!! $Contacts['map_src'] !!}
        </div>
    </div>
</div>
<div class="ps-contact-form">
    <div class="container">
        <form class="ps-form--contact-us">
            <h3>Задать вопрос</h3>
            <div class="row">
                <input type="text" style="display: none" name="Тема" value="Задать вопрос">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                    <div class="form-group">
                        <input class="form-control" required name="Имя" type="text" placeholder="Имя *">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                    <div class="form-group">
                        <input class="form-control" required name="Телефон" type="text" placeholder="Телефон *">
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="form-group">
                        <textarea class="form-control" required name="Текст сообщения" rows="5" placeholder="Текст сообщения"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group submit">
                <button class="ps-btn">Отправить</button>
            </div>
        </form>
    </div>
</div>
