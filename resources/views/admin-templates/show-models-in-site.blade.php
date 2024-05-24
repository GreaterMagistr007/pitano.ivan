{{--@if(false)--}}
    <?
    $model_show_on_site = \App\MainSettings::get__model_show_on_site();
//    dd($model_show_on_site);
    ?>
    <div class="form-elements">
        <h3>Выводить на сайте:</h3>
        @foreach($model_show_on_site as $model=>$settings)
            <?$k=($settings->show)?1:0;?>
            <div class="form-group form-element-checkbox ">
                <div class="checkbox">
                    <label>
                        <input name='model_show_on_site[{{$model}}]' type="checkbox" value="{{$k}}" @if($k) checked="checked" @endif>
                        {{$settings->title}}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
{{--@endif--}}
