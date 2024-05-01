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
    {{-- NAVBAR --}}
    <nav class="flex flex-row items-center bg-orange-300 justify-between max-h-24">
      <div class="flex flex-row items-center">
        <div class="flex items-center bg-pdu-orange rounded-r-2xl">
          <div class="m-4">
            text text text
          </div>
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
    <main class="flex flex-row p-16 justify-between">
    {{-- DASHBOARD SECTION KIRI --}}
      <div class="flex flex-col w-1.6/12 space-y-9">
        {{-- bit depth --}}
        <div class="flex flex-row bg-slate-300 w-full h-28">
          <div></div>
          <div></div>
        </div>
        {{-- Tank Volume --}}
        <div class="flex flex-col w-full h-fit space-y-6">
          <h2 class="text-pdu-orange text-xl font-sans font-extrabold">Tank Volume</h2>
          <div class="flex flex-col w-full bg-slate-300 rounded-xl shadow-md shadow-black/25 h-72">
          </div>
        </div>
        {{-- SPM --}}
        <div class="flex flex-col w-full h-fit space-y-6">
          <h2 class="text-pdu-orange text-xl font-sans font-extrabold">SPM</h2>
          <div class="flex flex-col w-full bg-slate-300 rounded-xl shadow-md shadow-black/25 h-72">
          </div>
        </div>
      </div>
    {{-- DASHBOARD SECTION TENGAH --}}
      <div class="flex flex-col w-7.5/12 space-y-7">
        <h2 class="text-pdu-orange text-2xl font-sans font-extrabold">Realtime Monitoring</h2>
        {{-- Status Highlight --}}
        <div class="w-full bg-slate-300 rounded-xl shadow-md shadow-black/25 h-96">

        </div>
        {{-- graph --}}
        <div class="w-full bg-slate-300 rounded-xl shadow-md shadow-black/25 h-96">

        </div>
      </div>
    {{-- REPORT SECTION --}}
      <div class="flex flex-col w-2/12 space-y-6">
        <h2 class="text-pdu-orange text-2xl font-sans font-extrabold">Report</h2>
        <div class="w-full bg-slate-300 rounded-xl shadow-md shadow-black/25 h-72">

        </div>
      </div>
    </main>
  </body>
</html>
