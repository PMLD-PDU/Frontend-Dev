<!doctype html>
<html>
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

    <!-- Internal CSS and JS-->
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    @vite('resources/css/app.css')

    <title>Dashboard | {{ $rigName }} - {{ $companyName }}</title>
  </head>
  <body>
    <nav class="flex flex-row justify-between items-center bg-orange-300">
      <div class="">
        text
      </div>
      
      <ul class="flex flex-row space-x-4">
        <li><p class="text-white">Home</p></li>
        <li><p class="text-white">About</p></li>
        <li><p class="text-white">Services</p></li>
      </ul>

      <div class="bg-gray-500">
        text
      </div>

    </nav>
    <main>

    </main>
  </body>
</html>
