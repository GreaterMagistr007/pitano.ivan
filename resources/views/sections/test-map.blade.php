<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">

</script>


<input type="text" id="searcher" style="margin-bottom: 10px;" value="байкальская 105"><button id="search">search</button>

<input type="text" id="suggest" style="border: 1px solid; width: 300px;" ><button id="button">button</button>
<div id="message" style="min-height: 50px; width: 100%;border: 1px solid"></div>
<div id="notice" style="min-height: 50px; width: 100%;border: 1px solid"></div>


<div id="map" style="width: 100%; height: 80%"></div>



<script>



    ymaps.ready(init);

    let coordinatesArray = [
        [52.25730841, 104.17970143],
        [52.25252844, 104.18629949],
        [52.25725478, 104.19531421],
        // [52.26104234, 104.19075327],
        [52.24669468, 104.21341638],
        [52.25380925, 104.22234544],
        [52.25258356, 104.22231603],
        [52.25180865, 104.22343815],
        [52.25188767, 104.22498847],
        [52.25132467, 104.22509039],
        [52.24972532, 104.22545598],
        [52.24976483, 104.22715114],
        [52.25282481, 104.22703616],
        [52.24878277, 104.23761101],
        [52.25101006, 104.24156008],
        [52.24850673, 104.24511658],
        [52.24840796, 104.24651670],
        [52.24948700, 104.24954011],
        [52.25012904, 104.24949183],
        [52.24915793, 104.25302744],
        [52.25032384, 104.25497412],
        [52.24833282, 104.26309624],
        [52.24974541, 104.26575622],
        [52.25185369, 104.26345719],
        [52.25481131, 104.26332376],
        [52.25580791, 104.25386052],
        [52.26361433, 104.24138537],
        [52.26503474, 104.23865828],
        [52.26671128, 104.23752237],
        [52.26733662, 104.24011875],
        [52.27239209, 104.23479068],
        [52.27035559, 104.22842163],
        [52.26827577, 104.22637783],
        [52.26833501, 104.22294460],
        [52.26767558, 104.21293099],
        [52.26859466, 104.20851017],
        [52.26997070, 104.20601388],
        [52.26815158, 104.20417921],
        [52.26832272, 104.20275227],
        [52.26758655, 104.20123048],
        [52.26789591, 104.20060821],
        [52.26706654, 104.19693894],
        [52.26550982, 104.19505856],
        [52.26266603, 104.19485471],
        [52.26004076, 104.18540235],
    ];

    function init(){
        console.log('Загрузились карты');
        var suggestView1 = new ymaps.SuggestView('suggest'),
            map,
            placemark;

        $('#button').bind('click', function (e) {
            geocode();
        });

        function geocode() {
            // Забираем запрос из поля ввода.
            var request = $('#suggest').val();
            // Геокодируем введённые данные.
            ymaps.geocode(request,{'ll': '52.26555659, 104.22625018','spn': '3,3','rspn':'1','bbox':'52.18926550, 104.07721269~52.35459249, 104.35360375'}).then(function (res) {
                var obj = res.geoObjects.get(0),
                    error, hint;

                if (obj) {
                    // Об оценке точности ответа геокодера можно прочитать тут: https://tech.yandex.ru/maps/doc/geocoder/desc/reference/precision-docpage/
                    switch (obj.properties.get('metaDataProperty.GeocoderMetaData.precision')) {
                        case 'exact':
                            break;
                        case 'number':
                        case 'near':
                        case 'range':
                            error = 'Адрес не найден, требуется уточнение';
                            hint = 'Уточните номер дома';
                            break;
                        case 'street':
                            error = 'Неполный адрес, требуется уточнение';
                            hint = 'Уточните номер дома';
                            break;
                        case 'other':
                        default:
                            error = 'Неточный адрес, требуется уточнение';
                            hint = 'Уточните адрес';
                    }
                } else {
                    error = 'Адрес не найден';
                    hint = 'Уточните адрес';
                }

                // Если геокодер возвращает пустой массив или неточный результат, то показываем ошибку.
                if (error) {
                    showError(error);
                    showMessage(hint);
                } else {
                    showResult(obj);
                }
            }, function (e) {
                console.log(e)
            })

        }
        function showResult(obj) {
            // Удаляем сообщение об ошибке, если найденный адрес совпадает с поисковым запросом.
            $('#suggest').removeClass('input_error');
            $('#notice').css('display', 'none');

            var mapContainer = $('#map'),
                bounds = obj.properties.get('boundedBy'),
                // Рассчитываем видимую область для текущего положения пользователя.
                mapState = ymaps.util.bounds.getCenterAndZoom(
                    bounds,
                    [mapContainer.width(), mapContainer.height()]
                ),
                // Сохраняем полный адрес для сообщения под картой.
                address = [obj.getCountry(), obj.getAddressLine()].join(', '),
                // Сохраняем укороченный адрес для подписи метки.
                shortAddress = [obj.getThoroughfare(), obj.getPremiseNumber(), obj.getPremise()].join(' ');
            // Убираем контролы с карты.
            mapState.controls = [];

            // console.log(obj);
            // Создаём карту.
            createMap(mapState, shortAddress);
            // Выводим сообщение под картой.
            showMessage(address);
        }

        function showError(message) {
            $('#notice').text(message);
            $('#suggest').addClass('input_error');
            $('#notice').css('display', 'block');
            // Удаляем карту.
            if (map) {
                map.destroy();
                map = null;
            }
        }

        function createMap(state, caption) {
            // Если карта еще не была создана, то создадим ее и добавим метку с адресом.
            if (!map) {
                map = new ymaps.Map('map', state);
                placemark = new ymaps.Placemark(
                    map.getCenter(), {
                        iconCaption: caption,
                        balloonContent: caption
                    }, {
                        preset: 'islands#redDotIconWithCaption'
                    });
                map.geoObjects.add(placemark);

                var myPlacemark1 = new ymaps.Placemark([52.26555659, 104.22625018], {
                    balloonContentHeader: '',
                    balloonContentBody: '',
                    balloonContentFooter: '',
                    hintContent: ''
                });

                var myPlacemark = new ymaps.Placemark([52.26555659, 104.22625018], {
                    balloonContentHeader: '',
                    balloonContentBody: '<img src="img/logo.svg" alt="alt"><br/>Зона доставки',
                    balloonContentFooter: '',
                    hintContent: 'Пинза Pitano'
                });





                map.events.add('click', function (e) {
                    var coords = e.get('coords');

                    // Если метка уже создана – просто передвигаем ее.
                    if (myPlacemark1) {
                        myPlacemark1.geometry.setCoordinates(coords);
                        console.log(myPlacemark1);
                    }
                    // Если нет – создаем.
                    else {
                        myPlacemark1 = createPlacemark(coords);
                        map.geoObjects.add(myPlacemark1);
                        // Слушаем событие окончания перетаскивания на метке.
                        myPlacemark1.events.add('dragend', function () {
                            getAddress(myPlacemark1.geometry.getCoordinates());
                        });
                    }
                    getAddress(coords);
                });

                // Создание метки.
                function createPlacemark(coords) {
                    return new ymaps.Placemark(coords, {
                        iconCaption: 'поиск...'
                    }, {
                        preset: 'islands#violetDotIconWithCaption',
                        draggable: true
                    });
                }

                // Определяем адрес по координатам (обратное геокодирование).
                function getAddress(coords) {
                    myPlacemark1.properties.set('iconCaption', 'поиск...');
                    ymaps.geocode(coords).then(function (res) {
                        var firstGeoObject = res.geoObjects.get(0);

                        myPlacemark1.properties
                            .set({
                                // Формируем строку с данными об объекте.
                                iconCaption: [
                                    // Название населенного пункта или вышестоящее административно-территориальное образование.
                                    firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                                    // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                                    firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                                ].filter(Boolean).join(', '),
                                // В качестве контента балуна задаем строку с адресом объекта.
                                balloonContent: firstGeoObject.getAddressLine()
                            });
                    });
                }





                let circle = new ymaps.Circle([[52.26555659, 104.22625018], 2000], null);

                map.geoObjects.add(circle);
                map.geoObjects.add(myPlacemark);
                map.geoObjects.add(myPlacemark1);




                // Если карта есть, то выставляем новый центр карты и меняем данные и позицию метки в соответствии с найденным адресом.
            } else {
                map.setCenter(state.center, state.zoom);
                placemark.geometry.setCoordinates(state.center);
                placemark.properties.set({iconCaption: caption, balloonContent: caption});
            }
        }


        function showMessage(message) {
            $('#messageHeader').text('Данные получены:');
            $('#message').text(message);
        }

        $("#suggest").val('Россия, Иркутск, улица Сергеева, 3 ');
        $('#button').click();
    }
</script>

<script>

</script>

