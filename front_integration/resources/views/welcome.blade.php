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
        <label for="">
            <i class="fa-solid fa-calendar-days"></i>
            Time:
        </label>
        <input type="date" {{date('d-m-y H:i')}} id="time_input" readonly>
    </div>
</div>
<p class="income">
    income
</p>


<div class="section1">

    <div>
    <div class="left">
    <div>
        <h5>Solde</h5>
        <div class="first_nomber">$15000.17</div>

    </div>
    </div>
    </div>

    <div class="right">
    <div class="option_text">
        <div>
        Deposit
        </div>
        <button class="button_option">...</button>
    </div>
    <div class="montant">
        <div>
        $1,523.50
        </div>
        <div class="qte_fleche">
        <span class="fleche">↑</span>
        <span class="qte">8.4</span>
        </div>
    </div>


    </div>
</div>


<div class="section2">
    <div class="filtrage">
    <ul>
        <li class="bordure_filtre">
        <img class="les_filtres" src="{{asset('images/8679934_filter_2_line_icon.png')}}" alt="filter">
        Filter
        </li>
        <li class="bordure_filtre">All time &#10006</li>
        <li class="bordure_filtre">USD &#10006</li>
        <li class="bordure_filtre">Partners &#10006</li>
    </ul>
    </div>

    <div class="recherche">
    <span class="icon">
        <i class="fa-brands fa-searchengin fa-beat-fade"></i></span>
    <input type="text" placeholder="search" class="recherche_input">
    </div>
</div>


<table>
    <thead>
    <tr>
        <th>case</th>
        <th>Partners↑↓</th>
        <th>ID</th>
        <th>Status</th>
        <th>Area</th>
        <th>Transaction</th>
    </tr>
    </thead>
    <tbody>

        <tr>
            <td>
                <form action="">
                <input type="checkbox">
                </form>
            </td>
            <td>
                <div class="position_profile">
                <div class="left">
                    <img src="{{asset('images/logo 1.png')}}" class="profile" alt="#">
                </div>
                <div class="right">
                    <h5>Hello Abonné</h5>
                    <p>helloabonne@gmail.com</p>
                </div>
                </div>
            </td>
            <td>#recepteur#</td>
            <td class="data_checbox" style="background-color: pink;">
                <i class="fa-regular fa-circle-check"></i>
                Done
            </td>
            <td>Graphic Designer</td>
            <td>$1251</td>
        </tr>

        <tr>
            <td>
                <form action="">
                <input type="checkbox">
                </form>
            </td>
            <td>
                <div class="position_profile">
                <div class="left">
                    <img src="{{asset('images/Social icon (1).png')}}" class="profile" alt="#">
                    </div>
                    <div class="right">
                    <h5>Rajesh Sharma</h5>
                    <p>rejesh@gmail.com</p>
                    </div>
                </div>
            </td>
            <td>#926482</td>
            <td class="data_checbox" style="background-color: cornflowerblue;">
                <i class="far fa-times-circle"></i>
                Cancelled
            </td>
            <td>CopyWriter</td>
            <td>$13,533.44</td>
        </tr>
        <tr>
            <td>
                <form action="">
                <input type="checkbox">
                </form>
            </td>
            <td>
                <div class="position_profile">
                <div class="left">
                    <img src="{{asset('images/Social icon (2).png')}}" class="profile" alt="#">
                    </div>
                    <div class="right">
                    <h5>Isabella Johnson</h5>
                    <p>isabella@gmail.com</p>
                    </div>
                </div>
            </td>
            <td>#101104</td>
            <td class="data_checbox" style="background-color: blue;">
                <i class="fa-solid fa-spinner"></i>
                In progress
            </td>
            <td>Illustrator</td>
            <td>$124,000.00</td>
        </tr>
        <tr>
            <td>
                <form action="">
                    <input type="checkbox">
                </form>
            </td>
            <td>
                <div class="position_profile">
                <div class="left">
                    <img src="{{asset('images/Social icon (3).png')}}" class="profile" alt="#">
                    </div>
                    <div class="right">
                    <h5>Olivia Taylor</h5>
                    <p>olivia@gmail.com</p>
                    </div>
                </div>
            </td>
            <td>#520462</td>
            <td class="data_checbox" style="background-color: pink;">
                <i class="fa-regular fa-circle-check"></i>
                Done
            </td>
            <td>UI/UX designer</td>
            <td>$2,743.28</td>
        </tr>
    </tbody>
</table>

    <footer style="background-color: #f0f0f0; padding: 10px; text-align: center;">
        <p>&copy; {{ date('M Y') }}. Mon Application. Tous droits réservés.</p>
        <ul style="list-style: none; padding: 0; justify-content: center; gap: 20px;">
            <li><a href="mentions-legales">Mentions légales</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="confidentialite">Confidentialité</a></li>
        </ul>
    </footer>


</body>
</html>
