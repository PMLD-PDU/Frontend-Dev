<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Login PDU</title>

    @vite('resources/css/login.css')
    @vite('resources/js/login.js')
</head>
    <body style="background-image: url('img_background.jpg');">
    <div class="container pdu-form">
        <div class="pdu-image">
            <img src="img_pdu.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle shadow p-1"/>
        </div>
        <form class="p-lg-5" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-1 login-title">
                <i class="fa fa-sign-in" aria-hidden="true"></i>
                Login
            </div>

            <div class="mb-1 login-content">
                Username
            </div>

            <div class="mb-2">
                <input type="text" class="form-control" id="Username" name="email" aria-describedby="emailHelp" placeholder="Your email">
            </div>

            <div class="mb-1 login-content">
                Password
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>
