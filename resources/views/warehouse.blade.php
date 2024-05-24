<!DOCTYPE html>
<html style="height: 100%;">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/warehouse.css">
</head>
<body class="h-100 d-flex flex-column justify-content-center align-items-center; ">
<div class="container">
    <div style="margin-bottom: 30px;" class="row d-flex flex-column justify-content-center align-items-center">
        <img src="/logo_p.svg" width="100px" style="margin-bottom: 30px">
        <p class="text-center mt-20">
        <h3 class="warehouse-greeting">Выберите ресторан для доставки или ..</h3>
        <button class="back"  onclick="history.back()">Вернитесь назад</button>
        </p>
    </div>

    <div class="row">
        @forelse($restaurants as $restaurant)
            <a href="/?restaurant={{ $restaurant->id }}" class="col-md-6 col-sm-12 col-xs-12 mb-10">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <img src="{{ $restaurant->image }}" alt="1" class="img-fluid">
                        <p class="card-text text-center" style="margin-top: 20px;">{{ $restaurant->name }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p>Пока что нет ни одного ресторана для доставки</p>
        @endforelse
    </div>
</div>
</body>
</html>
