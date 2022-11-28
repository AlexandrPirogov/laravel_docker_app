<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body class="maintext">
    <h1 style="font-size: 150px">Ваши предприятия</h1>
    <div class="cars">
        
            @foreach ($enterprises as $enterprise)
            <div class="container">

            <div class="container">
                        <p class="carattrs"><b>Company name:</b> {{$enterprise["company_name"]}}</p>
                        <p class="carattrs"><b>Located in:</b> {{$enterprise["located_in"]}}</p>
                        <p class="carattrs"><b>Created at:</b> {{$enterprise["created_at"]}}</p>
                        <p><a href="{{route('me.enterprise.vehicles', ['enterprise' => $enterprise['id']])}}">Автомобили предприятия</a></p>
            </div>
            </div>
            @endforeach
    </div>
</body>
</html>