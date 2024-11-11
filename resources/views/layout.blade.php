<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') | Kantida</title>

    @vite('resources/css/app.css')
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="header">
        <p>My Portfolio</p>
    </div>

    <div class="sidebar" id="mySidebar">
        <div class="sidebar-header">
            <button class="btn-close sidebar-close" onclick="sidebar_close()">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <button class="homepage">
                <a href="{{ url('/') }}">
                    <i class="fa-solid fa-house-chimney"></i> หน้าแรก (Home)
                </a>
            </button>

        </div>
        @yield('menu')
    </div>



    <div id="background">
        <div class="main">
            <!-- ปุ่มเปิด sidebar -->
            <button id="openNav" class="btn-open " onclick="sidebar_open()">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- back-container -->
            <div class="container">
                <div>
                    @yield('content')
                </div>

            </div>
        </div>

    </div>

    <div class="footer">Footer</div>


    <script>
        function sidebar_open() {
            document.getElementById("background").style.marginLeft = "20%";
            document.getElementById("mySidebar").style.width = "20%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';


        }

        function sidebar_close() {
            document.getElementById("background").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";


        }
    </script>
</body>

</html>