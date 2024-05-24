<style>
    #myMap{
        height: 400px;
        width: 500px;
    }
</style>
<div id="myMap"></div>

<input type="text" id="textAdress"><a id="getAdress">find</a>
<br>
<textarea id="resultBox" cols="30" rows="10"></textarea>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_kwKysCe_J45B_Ai1zJTYiJK8qLu2QKg&callback=initMap" async defer></script>

<style>
    #getAdress,#textAdress{border: 1px solid black;
        width: 500px;}

    #resultBox{border: 1px solid black;
        width: 500px;}
</style>

<script>
    document.querySelector('#textAdress').addEventListener('click',function(){
        return $.get('http://maps.googleapis.com/maps/api/geocode/json', {
                params: {
                    address: this.value,
                    sensor: false,
                    language: 'ru',
                    components: 'country:ru|administrative_area:Irkutsk'
                }
            }).then(function(res){
                var addresses = [];
                res.forEach(res.data.results, function(item){
                    addresses.push(item.formatted_address);
                });
                return addresses;
            });
    });

    document.querySelector('#getAdress').addEventListener('click',function(){

        geo.geocode({'address':document.querySelector('#textAdress').value},function(result,status){
            if(status != google.maps.GeocoderStatus.OK){return exit();}
            // response(status);
            document.querySelector('#resultBox').textContent='';
            console.log(result);
            for(var i in result){
                // if(result[i].address_components[4].long_name=='Иркутская область' || result[i].address_components[2].long_name=="Иркутск"){
                    document.querySelector('#resultBox').textContent=result[i].formatted_address;
                    response(result);
                // }else{exit();}
            }

        });
    });

    function exit(){
        document.querySelector('#resultBox').textContent='Адрес не найден';
    }
</script>

<script>
    let map;
    let geo;
    let marker;
    let silvermoll = {lat: 52.265047,lng:104.226652};

    function initMap(){


        let opt = {
            center:silvermoll,
            zoom:14
        };
        console.log('Загрузка карты');

        geo = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById("myMap"),opt);
        let info = new google.maps.InfoWindow({
            content: '<h3>pitano</hp>'
        });
        let marker = new google.maps.Marker({
            position: silvermoll,
            map: map,
            //icon: '', <-адрес ПНГ иконки
            //title: '', <-текст по наведению на маркер

        });

        geo.geocode({'address':'Поленова 19'},function(result,status){
            if(status != google.maps.GeocoderStatus.OK){response('Адрес не найден');return false;}
            response(status);
            response(result);
        });

        //добавляем всплывающее окно с информаццией
        // marker.addEventListener('click',function(){
        //     info.open(map,marker);
        // });
    }

    function response(response){
        console.log(response);
    }

    // window.addEventListener('load',function(){console.log('load');console.log(marker)});
</script>

{{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false$key=AIzaSyBFPNPCn-hwEa_fg0PJpgJMFlYFHJ97yW4"></script>--}}
{{--<script>--}}
{{--    function initialize() {--}}
{{--        var myLatlng = new google.maps.LatLng(-34.397, 150.644);--}}
{{--        var myOptions = {--}}
{{--            zoom: 8,--}}
{{--            center: myLatlng,--}}
{{--            mapTypeId: google.maps.MapTypeId.ROADMAP--}}
{{--        }--}}
{{--        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);--}}
{{--    }--}}
{{--</script>--}}

