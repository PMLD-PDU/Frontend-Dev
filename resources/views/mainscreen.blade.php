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
   
    @vite('resources/css/mainscreen.css')

  </head>
  <body>
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
                    <select id="inputCompany" class="form-control">
                        <option selected>- Select -</option>
                    </select>
                </div>
            </div>
            <div class="form-group row my-2">
                <label for="inputPassword" class="col-sm-3 col-form-label">Well</label>
                <div class="form-group col-sm-9">
                    <select id="inputWell" class="form-control">
                        <option selected>- Select -</option>
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end my-3">
                <button class="btn btn-color" type="button">View Studio</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    @vite('resources/js/mainscreen.js')
    
</body>
</html>