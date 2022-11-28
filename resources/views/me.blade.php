<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/me.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="avatar-flip">
          <img src="http://media.idownloadblog.com/wp-content/uploads/2012/04/Phil-Schiller-headshot-e1362692403868.jpg" height="150" width="150">
          <img src="http://i1112.photobucket.com/albums/k497/animalsbeingdicks/abd-3-12-2015.gif~original" height="150" width="150">
        </div>
        <h2>{{$manager[0]["name"]}}</h2>
        <h4>HOVER OVER CONTAINER</h4>
        
        <p>Connec dolore ipsum faucibus mollis interdum. Donec ullamcorper nulla non metus auctor fringilla.</p>

        
      </div>
      <div class="cars">
      <div class="container">
        <form action="{{ route('me.enterprises') }}" method="GET">
            {{method_field('GET')}}
            {{ csrf_field() }}
            <button>Предприятия</button> 
        </form>
      </div>
      </div>
</body>
</html>