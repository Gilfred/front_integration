<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion of wallet</title>
</head>
<body>

<div class="banner1">
    <div class="left">
        <div class="summary">
            Summary
        </div>
        <div class="paginate">
            <label for="">
            <i class="fa-solid fa-note-sticky"></i>
            Updated:
            </label>
            <select  name="" id="selection_option">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">5</option>
            <option value="5">5</option>
            </select>
        </div>
        <div class="login">
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
    </div>
<div class="container">
        <h1>Mentions Légales</h1>

        {{-- <h2>Éditeur du site</h2> --}}
        <p>
            Adresse : Gilfred_Dev<br>
            Téléphone : (+229)0154020312<br>
            Email : gilfredmawulomdgb@gmail.com<br>
            Directeur de la publication : Gilfred DEGBEVI <br>
        </p>


        <h2>Propriété intellectuelle</h2>
        <p>
            Le contenu du site Gestionnaire est protégé par les lois en vigueur sur la propriété intellectuelle.<br>
            Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site,
            quel que soit le moyen ou le procédé utilisé, est interdite sans l'autorisation écrite préalable de Gilfred DEGBEVI.
        </p>

        <h2>Données personnelles</h2>
        <p>
            Les informations recueillies font l’objet d’un traitement informatique destiné à satifaire la vie quotidienne.<br>
            Conformément à la loi « informatique et libertés », vous pouvez exercer votre droit d'accès aux données vous
            concernant et les faire rectifier en contactant : <a href="maito:gilfredmawulomdgb@gmail.com"> service de dépannage</a>  .
        </p>

        <h2>Cookies</h2>
        <p>
            Le site peut utiliser des cookies pour améliorer l'expérience utilisateur. Vous pouvez configurer votre navigateur pour refuser les cookies.
        </p>

        <h2>Responsabilité</h2>
        {{-- <p>
            [Votre entreprise] ne saurait être tenue responsable des dommages directs et indirects causés au matériel de l’utilisateur lors de l’accès au site.
        </p> --}}
    </div>


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


