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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
      .charts-container {
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          align-items: center;
          transform: rotate(90deg);
          width: 100%;
          height: 900px;
      }

      .chart-container {
          flex: 1;
          height: 100%;
          width: 100%;
      }
  </style>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/sidebar.js')
    @vite('resources/js/dashboard.js')
    @vite('resources/js/chart/chart1_settings.js')
    @vite('resources/js/chart/chart2_settings.js')
    @vite('resources/js/chart/chart3_settings.js')
    @vite('resources/js/chart/chart4_settings.js')

    {{-- <title>Dashboard | {{ $rigName }} - {{ $companyName }}</title> --}}
  </head>
  <body>
    {{-- NAVBAR --}}
    <nav class="flex flex-row items-center bg-orange-muda justify-between max-h-24">
      <div class="flex flex-row items-center">
        <div class="flex items-center bg-pdu-orange rounded-r-2xl shadow-xl cursor-pointer">
          <div class="my-3 mx-7 flex items-center">
            <img src="wpf_statistics.svg" alt="Sensor Icon" class="h-6 w-6 mr-4">
            <span class="font-semibold text-white" id="open-sidebar">Sensor <br> Status</span>
            {{-- <button class="text-gray-500 hover:text-gray-600" id="open-sidebar"> --}}
          </div>          
        </div>
        <div class="p stars-8 align-baseline">
          <ul class="flex flex-row space-x-4">
            <li class="flex flex-col ml-4">
              <p class="text-black font-bold px-2 min-w-24">Company Name</p>
              <p class="text-orange font-bold px-2 min-w-24" id="companyName">MCG</p>
            </li>
            <li class="flex flex-col">
              <p class="text-black font-bold px-2 min-w-24">Well Name</p>
              <p class="text-orange font-bold px-2 min-w-24" id="wellName">IJN 9-1</p>
            </li>
            <li class="flex flex-col">
              <p class="text-black font-bold px-2 min-w-24">Rig Name</p>
              <p class="text-orange font-bold px-2 min-w-24" id="rigName">EPI-9</p>
            </li>
            <li class="flex flex-col">
              <p class="text-black font-bold px-2 min-w-24">Rig Activity</p>
              <p class="text-orange font-bold px-2 min-w-24" id="rigActivity">Tripping Out</p>
            </li>
            <li class="flex items-center bg-abu rounded-lg">
              <p class="text-white font-bold pl-3 pr-1" id="date">23-08-2023</p>
              <p class="text-orange font-bold pr-3" id="time">16:09:20</p>
            </li>                    
          </ul>
        </div>    
      </div>
      
      <!-- Dropdown -->
      <div class="mx-4 flex items-center justify-between">
        <img src="img_pdu.jpg" alt="Gambar" class="w-12 h-12 rounded-full mr-2">
        <div class="relative">
          <button id="dropdownButton" class="focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          
          <!-- Menu dropdown -->
          <div class="absolute right-0 mt-2">
            <ul id="dropdownMenu" action="{{ route('logout') }}" method="POST" class="bg-orange text-white py-1 px-2 rounded-lg opacity-0 transition duration-300 transform scale-95 origin-top-right focus-within:opacity-100 focus-within:scale-100" style="display: none;">
              <li>
                @csrf
                {{-- <i class="fa fa-sign-out" aria-hidden="true"></i> --}}
                <a href="/login" class="block px-4 py-2">Keluar</a>
              </li>
            </ul>
          </div>
        </div>
      </div>    
    </nav>
    
    <!-- Sidebar -->
    <div class="absolute bg-orange text-white w-1/6 min-h-screen overflow-y-auto transition-transform transform -translate-x-full ease-in-out duration-300 z-20"
      id="sidebar">
      <!-- Your Sidebar Content -->
      <div class="p-4">
          <div class="flex flex-col w-full bg-white rounded-xl shadow-md shadow-black/25 divide-y">
            <div class="flex flex-row">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Bit depth</p>
                <p class="text-pdu-orange ms-1">390.38 m</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Drill Depth</p>
                <p class="text-pdu-orange ms-1">390.38 m</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>

            <div class="flex flex-col">
              <div class="flex flex-row py-2 align-middle font-bold text-base">
                <p class="text-black ms-4">Tank Act</p>
                <p class="text-pdu-orange ms-1">390.38 bbl</p>
              </div> 
            </div>
          </div>
      </div>
    </div>

    <main class="relative">
      <div id="shadow_layer" class="absolute top-0 left-0 w-full h-full bg-black opacity-50 z-10" style="display: none" ></div>
      <div id="main_content" class="flex flex-row p-16 justify-between z-0">
      {{-- DASHBOARD SECTION KIRI --}}
        <div class="flex flex-col w-1.6/12 space-y-9">
          {{-- bit depth --}}
          <div class="flex flex-row bg-white w-full h-28">
            <div class="flex flex-row">
              <img class="px-3 py-2" src="img_logo.png" alt="">
              <div class="flex flex-col py-2 text-2xl justify-center">
                <p class="font-medium">Bit Depth</p>
                <p class="text-pdu-orange font-bold" id="bit_depth">66.93 bbl</p>
              </div> 
              </div>
          </div>
          {{-- Tank Volume --}}
          <div class="flex flex-col w-full h-fit space-y-6">
            <h2 class="text-pdu-orange text-xl font-sans font-extrabold">Tank Volume</h2>
            <div class="flex flex-col w-full bg-white rounded-xl shadow-md shadow-black/25 divide-y">
              <div class="flex flex-row">
              <i class="fa-solid fa-circle fa-2xs p-4 text-pdu-orange content-center"></i>
              <div class="flex flex-col py-2 align-middle font-bold text-base">
                <p>Tank Total Volume</p>
                <p class="text-pdu-orange" id="tank_vol_total">390.38 bbl</p>
              </div> 
              </div>

              <div class="flex flex-row">
              <i class="fa-solid fa-circle fa-2xs p-4 text-pdu-orange content-center"></i>
              <div class="flex flex-col py-2 align-middle font-bold text-base">
                <p>SCFM</p>
                <p class="text-pdu-orange" id="tank_scfm">66.93 bbl</p>
              </div> 
              </div>

              <div class="flex flex-row">
              <i class="fa-solid fa-circle fa-2xs p-4 text-pdu-orange content-center"></i>
              <div class="flex flex-col py-2 align-middle font-bold text-base">
                <p>Mud Condition In</p>
                <p class="text-pdu-orange" id="tank_mud_cond_in">26.05 bbl</p>
              </div> 
              </div>

              <div class="flex flex-row">
              <i class="fa-solid fa-circle fa-2xs p-4 text-pdu-orange content-center"></i>
              <div class="flex flex-col py-2 align-middle font-bold text-base">
                <p>Mud Condition Out</p>
                <p class="text-pdu-orange" id="tank_mud_cond_out">165.73 bbl</p>
              </div> 
              </div>
            </div>
          </div>
          {{-- SPM --}}
          <div class="flex flex-col w-full h-fit space-y-6">
            <h2 class="text-pdu-orange text-xl font-sans font-extrabold">SPM</h2>
            <div class="flex flex-col w-full bg-white rounded-xl shadow-md shadow-black/25 divide-y">
            <div class="flex flex-row">
              <i class="fa-solid fa-circle fa-2xs p-4 text-pdu-orange content-center"></i>
              <div class="flex flex-col py-2 align-middle font-bold text-base">
                <p>SPM Total</p>
                <p class="text-pdu-orange" id="spm_total">0</p>
              </div> 
              </div>

              <div class="flex flex-row">
              <i class="fa-solid fa-circle fa-2xs p-4 text-pdu-orange content-center"></i>
              <div class="flex flex-col py-2 align-middle font-bold text-base">
                <p>Surpress</p>
                <p class="text-pdu-orange" id="spm_surpress">0</p>
              </div> 
              </div>

              <div class="flex flex-row">
              <i class="fa-solid fa-circle fa-2xs p-4 text-pdu-orange content-center"></i>
              <div class="flex flex-col py-2 align-middle font-bold text-base">
                <p>Mud Flow In</p>
                <p class="text-pdu-orange" id="spm_mud_flow_in">0</p>
              </div> 
              </div>

              <div class="flex flex-row">
              <i class="fa-solid fa-circle fa-2xs p-4 text-pdu-orange content-center"></i>
              <div class="flex flex-col py-2 align-middle font-bold text-base">
                <p>CO2</p>
                <p class="text-pdu-orange" id="spm_4">0</p>
              </div> 
              </div>
            </div>
          </div>
        </div>

      {{-- DASHBOARD SECTION TENGAH --}}
        <div class="flex flex-col w-7.5/12 space-y-7">
          <h2 class="text-pdu-orange text-2xl font-sans font-extrabold">Realtime Monitoring</h2>
          {{-- Status Highlight --}}
          <div class="w-full bg-white rounded-xl shadow-md h-auto mt-2 p-4">
            <div class="grid grid-cols-[auto,1fr,1fr,1fr,1fr] gap-4 h-full">
              <!-- Kolom Pertama -->
              <div class="flex items-start">
                <img src="sensor-icon.svg" alt="Icon" class="inline-block">
              </div>
              <!-- Kolom Kedua -->
              <div class="flex items-start flex-col rounded-lg bg-white border border-gray-300 p-3">
                <ul role="list" class="divide-y w-full divide-gray-300">
                  <li class="grid grid-cols-[auto,1fr] pb-2 items-center">
                    <div class="flex min-w-0 inline-block items-center">
                      <svg class="h-4 w-8 flex-initial inline-block">
                        <circle class="items-center" cx="6" cy="6" r="5" fill="#4700DE"/>
                      </svg>
                      <div class="flex-col min-w-0 flex-auto items-center">
                        <p class="text-base truncate font-bold" style="color: #4700DE;">TORQ</p>
                        <p class="mt-1 truncate font-bold text-base text-gray-300">
                          <span id="TORQVal" style="color: #4700DE;">0</span> / <span>30</span>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li class="grid grid-cols-[auto,1fr] py-2 items-center">
                    <div class="flex min-w-0 inline-block items-center">
                      <svg class="h-4 w-8 flex-initial inline-block">
                        <circle class="items-center" cx="6" cy="6" r="5" fill="#60D96C"/>
                      </svg>
                      <div class="flex-col min-w-0 flex-auto items-center">
                        <p class="text-base truncate font-bold" style="color: #60D96C;">Block Position</p>
                        <p class="mt-1 truncate font-bold text-base text-gray-300">
                          <span id="BlockVal" style="color: #60D96C;">15.16</span> / <span>35</span>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li class="grid grid-cols-[auto,1fr] pt-2 items-center">
                    <div class="flex min-w-0 inline-block items-center">
                      <svg class="h-4 w-8 flex-initial inline-block">
                        <circle class="items-center" cx="6" cy="6" r="5" fill="#C9A857"/>
                      </svg>
                      <div class="flex-col min-w-0 flex-auto items-center">
                        <p class="text-base truncate font-bold" style="color: #C9A857;">ROPi</p>
                        <p class="mt-1 truncate font-bold text-base text-gray-300">
                          <span id="ROPiVal" style="color: #C9A857;">0</span> / <span>100</span>
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              
              <!-- Kolom kETIGA -->
              <div class="flex items-start flex-col rounded-lg bg-white border border-gray-300 p-3">
                <ul role="list" class="divide-y w-full divide-gray-300">
                  <li class="grid grid-cols-[auto,1fr] pb-2 items-center">
                    <div class="flex min-w-0 inline-block items-center">
                      <svg class="h-4 w-8 flex-initial inline-block">
                        <circle class="items-center" cx="6" cy="6" r="5" fill="#727CAB"/>
                      </svg>
                      <div class="flex-col min-w-0 flex-auto items-center">
                        <p class="text-base truncate font-bold" style="color: #727CAB;">Flow Out</p>
                        <p class="mt-1 truncate font-bold text-base text-gray-300">
                          <span id="FlowOutVal" style="color: #727CAB;">0</span> / <span>100</span>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li class="grid grid-cols-[auto,1fr] py-2 items-center">
                    <div class="flex min-w-0 inline-block items-center">
                      <svg class="h-4 w-8 flex-initial inline-block">
                        <circle class="items-center" cx="6" cy="6" r="5" fill="#C33AC8"/>
                      </svg>
                      <div class="flex-col min-w-0 flex-auto items-center">
                        <p class="text-base truncate font-bold" style="color: #C33AC8;">Backside Flow</p>
                        <p class="mt-1 truncate font-bold text-base text-gray-300">
                          <span id="BacksideVal" style="color: #C33AC8;">0</span> / <span>1200</span>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li class="grid grid-cols-[auto,1fr] pt-2 items-center">
                    <div class="flex min-w-0 inline-block items-center">
                      <svg class="h-4 w-8 flex-initial inline-block">
                        <circle class="items-center" cx="6" cy="6" r="5" fill="#666E40"/>
                      </svg>
                      <div class="flex-col min-w-0 flex-auto items-center">
                        <p class="text-base truncate font-bold" style="color: #666E40;">Pit Volume Act</p>
                        <p class="mt-1 truncate font-bold text-base text-gray-300">
                          <span id="PitVolumeVal" style="color: #666E40;">817.59</span> / <span>1000</span>
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>

            <!-- Kolom keempat -->
            <div class="flex items-start flex-col rounded-lg bg-white border border-gray-300 p-3">
              <ul role="list" class="divide-y w-full divide-gray-300">
                <li class="grid grid-cols-[auto,1fr] pb-2 items-center">
                  <div class="flex min-w-0 inline-block items-center">
                    <svg class="h-4 w-8 flex-initial inline-block">
                      <circle class="items-center" cx="6" cy="6" r="5" fill="#B10303"/>
                    </svg>
                    <div class="flex-col min-w-0 flex-auto items-center">
                      <p class="text-base truncate font-bold" style="color: #B10303;">MW Out</p>
                      <p class="mt-1 truncate font-bold text-base text-gray-300">
                        <span id="MWOutVal" style="color: #B10303;">8.34</span> / <span>10</span>
                      </p>
                    </div>
                  </div>
                </li>
                <li class="grid grid-cols-[auto,1fr] py-2 items-center">
                  <div class="flex min-w-0 inline-block items-center">
                    <svg class="h-4 w-8 flex-initial inline-block">
                      <circle class="items-center" cx="6" cy="6" r="5" fill="#4188DC"/>
                    </svg>
                    <div class="flex-col min-w-0 flex-auto items-center">
                      <p class="text-base truncate font-bold" style="color: #4188DC;">Temp Out</p>
                      <p class="mt-1 truncate font-bold text-base text-gray-300">
                        <span id="TempOutVal" style="color: #4188DC;">25</span> / <span>100</span>
                      </p>
                    </div>
                  </div>
                </li>
                <li class="grid grid-cols-[auto,1fr] pt-2 items-center">
                  <div class="flex min-w-0 inline-block items-center">
                    <svg class="h-4 w-8 flex-initial inline-block">
                      <circle class="items-center" cx="6" cy="6" r="5" fill="#9D631E"/>
                    </svg>
                    <div class="flex-col min-w-0 flex-auto items-center">
                      <p class="text-base truncate font-bold" style="color: #9D631E;">Temp In</p>
                      <p class="mt-1 truncate font-bold text-base text-gray-300">
                        <span id="TempInVal" style="color: #9D631E;">23.53</span> / <span>100</span>
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            
            <!-- Kolom kelima -->
            <div class="flex items-start flex-col rounded-lg bg-white border border-gray-300 p-3">
              <ul role="list" class="divide-y w-full divide-gray-300">
                <li class="grid grid-cols-[auto,1fr] pb-2 items-center">
                  <div class="flex min-w-0 inline-block items-center">
                    <svg class="h-4 w-8 flex-initial inline-block">
                      <circle class="items-center" cx="6" cy="6" r="5" fill="#771960"/>
                    </svg>
                    <div class="flex-col min-w-0 flex-auto items-center">
                      <p class="text-base truncate font-bold" style="color: #771960;">H2S Shaker</p>
                      <p class="mt-1 truncate font-bold text-base text-gray-300">
                        <span id="H2SShakerVal" style="color: #771960;">0</span> / <span>200</span>
                      </p>
                    </div>
                  </div>
                </li>
                <li class="grid grid-cols-[auto,1fr] py-2 items-center">
                  <div class="flex min-w-0 inline-block items-center">
                    <svg class="h-4 w-8 flex-initial inline-block">
                      <circle class="items-center" cx="6" cy="6" r="5" fill="#3F2E97"/>
                    </svg>
                    <div class="flex-col min-w-0 flex-auto items-center">
                      <p class="text-base truncate font-bold" style="color: #3F2E97;">H2S Cellar</p>
                      <p class="mt-1 truncate font-bold text-base text-gray-300">
                        <span id="H2SCellarVal" style="color: #3F2E97;">0</span> / <span>20</span>
                      </p>
                    </div>
                  </div>
                </li>
                <li class="grid grid-cols-[auto,1fr] pt-2 items-center">
                  <div class="flex min-w-0 inline-block items-center">
                    <svg class="h-4 w-8 flex-initial inline-block">
                      <circle class="items-center" cx="6" cy="6" r="5" fill="#4AC599"/>
                    </svg>
                    <div class="flex-col min-w-0 flex-auto items-center">
                      <p class="text-base truncate font-bold" style="color: #4AC599;">H2S Mud Pond</p>
                      <p class="mt-1 truncate font-bold text-base text-gray-300">
                        <span id="H2SMudPondVal" style="color: #4AC599;">0</span> / <span>200</span>
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        {{-- graph --}}
        <div id="graph_container" class="flex flex-col w-full space-y-5">
          <div class="flex flex-row w-full space-x-5">
            <div class="w-full bg-white rounded-xl shadow-md shadow-black/25">
              <canvas id="chart1" class="m-2" height="750"></canvas>
            </div>
            <div class="w-full bg-white rounded-xl shadow-md shadow-black/25">
              <canvas id="chart2" class="m-2" height="750"></canvas>
            </div>
          </div>
          <div class="flex flex-row w-full jus space-x-5">
            <div class="w-full bg-white rounded-xl shadow-md shadow-black/25">
              <canvas id="chart3" class="m-2" height="750"></canvas>
            </div>
            <div class="w-full bg-white rounded-xl shadow-md shadow-black/25">
              <canvas id="chart4" class="m-2" height="750"></canvas>
            </div>
          </div>
        </div>

      {{-- <div class="mx-2" style="transform: rotate(90deg);">
            {!! $chart->container() !!}
            {!! $chart1->container() !!} --}}
      </div> 

      {{-- REPORT SECTION --}}
        <div class="flex flex-col w-2/12 space-y-6">
          <h2 class="text-pdu-orange text-2xl font-sans font-extrabold">Report</h2>
          <div class="w-full bg-slate-300 rounded-xl shadow-md shadow-black/25 h-72">
            <div class="flex flex-col w-full h-fit space-y-6">
              <div class="flex flex-col w-full bg-white rounded-xl shadow-md shadow-black/25 divide-y">     
                {{-- Repeatable Notification --}}
                <div class="flex flex-row bg-red-500 rounded-t-xl">
                  <i class="fa-solid fa-exclamation-triangle fa-lg p-2.5 text-white content-center"></i>
                  <div class="flex flex-col p-2 align-middle font-bold text-xs text-white">
                    <p>PUMP BACK SIDE F/ COOLING TOWER 380 GPM</p>
                    <p class="text-pdu-white">2024-03-19 15:27:16</p>
                  </div> 
                </div>
                <div class="flex flex-row">
                  <i class="fa-solid fa-circle fa-2xs p-3 text-pdu-orange content-center"></i>
                  <div class="flex flex-col p-2 align-middle font-bold text-xs">
                    <p>PUMP BACK SIDE F/ COOLING TOWER 380 GPM</p>
                    <p class="text-pdu-orange">2024-03-19 15:27:16</p>
                  </div> 
                </div>
                <div class="flex flex-row">
                  <i class="fa-solid fa-circle fa-2xs p-3 text-pdu-orange content-center"></i>
                  <div class="flex flex-col p-2 align-middle font-bold text-xs">
                    <p>PUMP BACK SIDE F/ COOLING TOWER 380 GPM</p>
                    <p class="text-pdu-orange">2024-03-19 15:27:16</p>
                  </div> 
                </div>
                <div class="flex flex-row">
                  <i class="fa-solid fa-circle fa-2xs p-3 text-pdu-orange content-center"></i>
                  <div class="flex flex-col p-2 align-middle font-bold text-xs">
                    <p>PUMP BACK SIDE F/ COOLING TOWER 380 GPM</p>
                    <p class="text-pdu-orange">2024-03-19 15:27:16</p>
                  </div> 
                </div>
                <div class="flex flex-row">
                  <i class="fa-solid fa-circle fa-2xs p-3 text-pdu-orange content-center"></i>
                  <div class="flex flex-col p-2 align-middle font-bold text-xs">
                    <p>PUMP BACK SIDE F/ COOLING TOWER 380 GPM</p>
                    <p class="text-pdu-orange">2024-03-19 15:27:16</p>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <div id="dashboard-container" data-well-id="{{ $well_id }}">
    </div>

    <!-- JS -->
    <script>
      document.getElementById("dropdownButton").addEventListener("click", function(event) {
        event.stopPropagation(); // Prevent the event from bubbling up to document
        var menu = document.getElementById("dropdownMenu");
        if (menu.style.display === "none" || menu.style.display === "") {
          menu.style.display = "block";
          menu.classList.add('opacity-100', 'scale-100');
          menu.classList.remove('opacity-0', 'scale-95');
        } else {
          menu.style.display = "none";
          menu.classList.add('opacity-0', 'scale-95');
          menu.classList.remove('opacity-100', 'scale-100');
        }
      });

      // Close the dropdown when clicking outside of it
      document.addEventListener("click", function(event) {
        var menu = document.getElementById("dropdownMenu");
        var button = document.getElementById("dropdownButton");
        if (!button.contains(event.target) && !menu.contains(event.target)) {
          menu.style.display = "none";
          menu.classList.add('opacity-0', 'scale-95');
          menu.classList.remove('opacity-100', 'scale-100');
        }
      });
    </script>

  <script src="{{ $chart->cdn() }}"></script>
  {{ $chart->script() }}
  {{ $chart1->script() }}

  </body>
</html>
