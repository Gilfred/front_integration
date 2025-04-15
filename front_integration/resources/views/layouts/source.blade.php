<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title','Gestionnaire')</title>
</head>
<body>

    <nav class="navbar">
        <div class="logo">
            <div>
                <img src="{{asset('images/logo_wave.png')}}" class="image_logo" alt="">
            </div>
            <div>
                Wave
            </div>
        </div>
        <ul class="nav-menu">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link">Dashboard</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Vue d’ensemble</a></li>
                    <li><a href="#">Activités récentes</a></li>
                    <li><a href="#">Paramètres</a></li>
                </ul>
            </li>
            <li class="nav-item"><a href="#" class="nav-link">Statistics</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Wallet</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Tasks</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Activity</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <footer style="background-color: #f0f0f0; padding: 10px; text-align: center;">
            <p>&copy; {{ date('Y') }} Mon Application. Tous droits réservés.</p>
        </footer>
    </footer>
</body>
</html>
