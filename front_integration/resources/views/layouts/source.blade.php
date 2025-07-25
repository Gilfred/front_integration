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
        </div>
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
                <a href="#" class="nav-link">Vue d’ensemble</a>
                <ul class="dropdown-menu">
                    <li><a href="#">Activités récentes</a></li>
                    <li><a href="#">Paramètres</a></li>
                </ul>
            </li>
            <li class="nav-item"><a href="{{route('transfere.argent')}}" class="nav-link">Envoyer de l'argent à ami</a></li>
            <li class="nav-item"><a href="{{route('fiche_information')}}" class="nav-link">Wallet</a></li>
            <li class="nav-item"><a href="{{route('recharge.carte')}}" class="nav-link">Recharger mon compte</a></li>
            <li class="nav-item"><a href="{{route('les.notifications')}}" class="nav-link">Notifications</a></li>
            <li class="nav-item">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
            </li>
            <li>
                <div>
                    <div>
                        <div >{{ Auth::user()->name }} {{ Auth::user()->prenom}}</div>
                        <div >{{ Auth::user()->email }}</div>
                    </div>

                </div>
            </li>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>

        </ul>

    </nav>
    <div>
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a href="{{ url('/dashboard') }}">

                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        Log in
                    </a>

                    @if (Route::has('register'))

                        <a href="{{ route('register') }}">

                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif

    </div>
    <main>
        @yield('content')
    </main>

    <footer style="background-color: #f0f0f0; padding: 10px; text-align: center;">
        <p>&copy; {{ date('M Y') }}. Mon Application. Tous droits réservés.</p>
        <ul style="list-style: none; padding: 0; justify-content: center; gap: 20px;">
        <li><a href="{{route('mentions-legales')}}">Mentions légales</a></li>
        <li><a href="{{route('contact')}}">Contact</a></li>
        <li><a href="{{route('politique-de-confidentialite')}}">Confidentialité</a></li>
    </ul>
    </footer>

</body>
</html>
