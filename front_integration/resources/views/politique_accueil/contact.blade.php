<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
        <h1>Contact</h1>
        <p>
            Pour toute question ou demande d'information, vous pouvez nous contacter à l'adresse suivante :
        </p>
        <p>
            Email : <a href="mailto:gilfredmawulomdgb@gmail.com">Nous ecrire</a>
        </p>
    </div>


    <footer style="background-color: #f0f0f0; padding: 10px; text-align: center;">
        <p>&copy; {{ date('M Y') }}. Mon Application. Tous droits réservés.</p>
        <ul style="list-style: none; padding: 0; justify-content: center; gap: 20px;">
            <li><a href="mentions-legales">Mentions légales</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="politic_confident/politique-de-confidentialite">Confidentialité</a></li>
        </ul>
    </footer>


</body>
</html>


