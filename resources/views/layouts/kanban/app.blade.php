<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

    </style>
</head>
<body style="overflow-x: auto;">
    <!-- Top container -->
    <div class="w3-bar w3-top w3-blue-gray w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <a href="{{ route('home') }}" class="w3-bar-item w3-button w3-hover-none">
            <b>KanBan</b>
        </a>
        <div class="w3-bar-item w3-right w3-hover-none w3-button">
            <a class="w3-hover-text-black" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <b>Logout</b>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>

    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-white w3-animate-left" style="z-index:3;width:300px;margin-top:43px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="https://www.w3schools.com/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>Welcome, <strong>{{ \Auth::user()->name }}</strong></span><br>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5>Dashboard</h5>
        </div>
        <div class="w3-bar-block">
            <a href="" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="{{ route('home') }}" class="w3-bar-item w3-button w3-padding w3-hover-blue {{ Route::current()->uri == '/' ? 'w3-blue' : '' }}"><i class="fa fa-dashboard fa-fw"></i>  Dashboard</a>
            <a href="{{ route('projects.index') }}" class="w3-bar-item w3-button w3-padding w3-hover-red {{ stristr(Route::current()->uri, 'projects') != FALSE ? 'w3-amber' : '' }}"><i class="fa fa-folder fa-fw"></i>  Projets</a>
            <a href="{{ route('tasks.index') }}" class="w3-bar-item w3-button w3-padding w3-hover-green {{ stristr(Route::current()->uri, 'tasks') != FALSE ? 'w3-green' : '' }}"><i class="fa fa-code fa-fw"></i>  Taches</a>
         </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div id="main" class="w3-main w3-display-container" style="margin-left:300px;margin-top:43px;">
        <div class="sideBarButton w3-display-topleft">
            <button class="w3-bar-item w3-button w3-hide-small w3-hover-none w3-hover-text-black" onclick="w3_open();"><i class="fa fa-caret-left" id="sidebarButtonIcon"></i>
                <br>M
                <br>e
                <br>n
                <br>u
                <br>
            </button>
        </div>

        <div class="content">
        @yield('content')
        </div>

    <!-- End page content -->
    </div>

    <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Get the DIV with overlay effect
        var main = document.getElementById("main");

        // Get the i element in sidebar button
        var x = document.getElementById("sidebarButtonIcon");
        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
                main.style.marginLeft = '0px';
                x.className = x.className.replace("left", "right");
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
                main.style.marginLeft = '300px';
                x.className = x.className.replace("right", "left");
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
            main.style.marginLeft = '0px';
        }



        function toggle(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        function modal(task, category) {
            console.log(task);
            document.getElementById('modalTitre').innerHTML = "<b>" + task.titre +"</b>";
            document.getElementById('titreInput').value = task.titre;
            document.getElementById('modalCategory').innerHTML = "<b>" + category + "</b>";
            document.getElementById('modalDescription').innerHTML = task.description;
            document.getElementById('descriptionInput').value = task.description;
            document.getElementById('descriptionForm').action = '/tasks/' + task.id;
            document.getElementById('category_idForm').action = '/tasks/' + task.id;
            document.getElementById('titreForm').action = '/tasks/' + task.id;
            document.getElementById('dateLineInput').value = task.hasOwnProperty('dateLine') ? task.dateLine : 'aucune';
            document.getElementById('modalDateLine').innerHTML = task.hasOwnProperty('dateLine') ? task.dateLine : 'aucune';
            document.getElementById('dateLineForm').action = '/tasks/' + task.id;
            document.getElementById('modal').style.display='block';
        }
    </script>
</body>
</html>
