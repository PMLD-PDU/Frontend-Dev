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

    <title>Mainscreen PDU</title>
    <style>
    body {
        background-image: url('img_background.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-family: 'Montserrat';
    }

    .card{
        border-radius: 10%;
    }

    .login-title{
        color: #E75C33;
        font-weight: 800;
        font-size: 28px;
    }
    
    .login-content{
        font-weight: 500;
    }

    .btn{
        font-weight: 700;
    }

    .form-control{
        background-color: #FCEBE7;
    }

    .btn-color{
        background-color: #E75C33;
        color: #fff;
    }

    .pdu-form{
        background: #fff;
        margin-top: 5%;
        margin-bottom: 5%;
        width: 50%;
        border-radius: 10%;
    }

    /* .pdu-form .form-control{
        border-radius:1rem;
    } */

    .pdu-image{
        text-align: center;
    }
    
    .pdu-image img{
        width: 11%;
        margin-top: -4%;
    }
    </style>
  </head>
  <body>
    {{-- <div class="container d-flex flex-column min-vh-100">

        <div class="col d-flex justify-content-center">

            <div class="card text-center" style="width: 18rem; height: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    
    </div> --}}

    <div class="container pdu-form">

      <div class="pdu-image">
        <img src="img_pdu.jpg" class="img-fluid profile-image-pic img-thumbnail rounded-circle shadow p-1"/>
      </div>
      <form class="card-body p-lg-5">
    
        <div class="mb-1 login-title">
            <i class="fa fa-desktop"></i>
            Real Time Monitoring
        </div>

        <div class="form-group row my-2">
          <label for="staticEmail" class="col-sm-3 col-form-label">Company</label>
          <div class="form-group col-sm-9">
            <select id="inputState" class="form-control">
              <option selected>- Select -</option>
              <option>...</option>
            </select>
          </div>
        </div>

        <div class="form-group row my-2">
          <label for="inputPassword" class="col-sm-3 col-form-label">Well</label>
          <div class="form-group col-sm-9">
            <select id="inputState" class="form-control">
              <option selected>- Select -</option>
              <option>...</option>
            </select>
          </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end my-3">
          <button class="btn btn-color" type="button">View Studio</button>
        </div>

      </form>
      </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>