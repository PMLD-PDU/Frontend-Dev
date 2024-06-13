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

    <title>Well PDU</title>

    @vite('resources/css/mainscreen.css')
  </head>
  <body style="background-image: url('{{ asset('img_background.jpg') }}');">

    <div class="container pdu-form">

      <div class="pdu-image">
        <img src="{{ asset('img_pdu.jpg') }}" class="img-fluid profile-image-pic img-thumbnail rounded-circle shadow p-1"/>
      </div>
      <form class="card-body p-lg-5" action="{{ route('dashboard') }}">
    
        <div class="mb-5 login-title">
            <i class="fa fa-desktop"></i>
            Real Time Monitoring
        </div>

        <div class="form-group row my-2">
          <label for="staticEmail" class="col-sm-3 col-form-label">Well</label>
          <div class="form-group col-sm-9">
            <div class="input-group mb-3 col-sm-9">
              <select id="inputState" class="form-control" name='well_id'>
                <option selected>- Select -</option>
                @foreach ($well as $item)
                  <option value="{{ $item->id }}" >{{$item->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end my-3">
          <button class="btn btn-color" type="submit">Submit</button>
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