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
    <nav class="flex flex-row items-center bg-orange-300 justify-between">
      <div class="flex flex-row items-center">
        <div class="m-4">
          text
        </div>
        <div class="p stars-8">
          <ul class="flex flex-row space-x-4">
            <li><p class="text-white px-2 min-w-24">Company Name</p></li>
            <li><p class="text-white px-2 min-w-24">Well Name</p></li>
            <li><p class="text-white px-2 min-w-24">Rig Name</p></li>
            <li><p class="text-white px-2 min-w-24">Rig Activity</p></li>
            <li><p class="text-white px-2 min-w-24">DATE</p></li>
          </ul>
        </div>
      </div>
      <div class="bg-gray-500 m-4 flex items-end">
        text
      </div>
    </nav>
    <main class="flex flex-row p-16">
      <div class="flex flex-col">
        {{-- bit depth --}}
        <div>

        </div>
        {{-- Tank Volume --}}
        <div class="flex flex-col">

        </div>
        {{-- SPM --}}
        <div class="flex flex-col">

        </div>
      </div>
      <div class="flex flex-col">
        <h2>Realtime Monitoring</h2>
        {{-- Status Highlight --}}
        <div>

        </div>
        {{-- graph --}}
        <div>

        </div>
      </div>
      <div class="flex flex-col">
        <h2>Report</h2>
        <div>

        </div>
      </div>
    </main>
  </body>
</html>
