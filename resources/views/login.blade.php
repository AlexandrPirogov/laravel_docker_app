<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
    <main>
        <div class="row">
            <div class="colm-logo">
                <img src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" alt="Logo">
                <h2>Самый большой автопарк России.</h2>
            </div>
            <div class="colm-form">
                <div class="form-container">

                    {{ csrf_field() }}
                <form action="/signin" method="post" enctype="multipart/form-data">   
                    {{ csrf_field() }}
                    <input type="email" name="email" placeholder="Email address or phone number">

                    {{ csrf_field() }}
                    <input type="password" name="password" placeholder="Password">
                    <button class="btn-login">Login</button>
                  </form>
                </div>
                <p><a href="#"><b>Create a Page</b></a> for a celebrity, brand or business.</p>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-contents">
            <ol>
                <li>English (UK)</li>
                <li><a href="#">മലയാളം</a></li>
                <li><a href="#">தமிழ்</a></li>
                <li><a href="#">తెలుగు</a></li>
                <li><a href="#">বাংলা</a></li>
                <li><a href="#">اردو</a></li>
                <li><a href="#">हिन्दी</a></li>
                <li><a href="#">ಕನ್ನಡ</a></li>
                <li><a href="#">Español</a></li>
                <li><a href="#">Português (Brasil)</a></li>
                <li><a href="#">Français (France)</a></li>
                <li><button>+</button></li>
           
            
               
                
                
            </ol>
            <small>Facebook © 2022</small>
        </div>
    </footer>
</body>
</html>