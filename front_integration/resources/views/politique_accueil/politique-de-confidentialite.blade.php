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
    <div>
        <h1>Politique de Confidentialité</h1>

        <p>
            Cette politique de confidentialité décrit comment nous collectons, utilisons et protégeons vos informations personnelles.
        </p>

        <h2>Collecte d'informations</h2>
        <p>
            Nous collectons des informations lorsque vous vous inscrivez sur notre site, effectuée une opération ou interagissez avec nos services.
        </p>

        <h2>Utilisation des informations</h2>
        <p>
            Les informations que nous collectons peuvent être utilisées pour améliorer notre service, personnaliser votre expérience et vous contacter.
        </p>

        <h2>Protection des informations</h2>
        <p>
            Nous mettons en œuvre une variété de mesures de sécurité pour protéger vos informations personnelles.
        </p>

        <h2>Partage des informations</h2>
        <p>
            Nous ne vendons pas, n'échangeons pas ou ne transférons pas vos informations personnelles à des tiers sans votre consentement.
        </p>

        <h2>Consentement</h2>
        <p>
            En utilisant notre site, vous consentez à notre politique de confidentialité.
        </p>
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


