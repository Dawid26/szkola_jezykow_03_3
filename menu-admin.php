<!doctype html>
<html lang="pl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Strona główna <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Logowanie
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="indexZ.php">Zaloguj się</a>


                    <a class="dropdown-item" href="logoutZ.php">Wyloguj</a>
                    <a class="dropdown-item" href="rejestracjaZ.php">Rejestracja</a>
                </div>

            </li>
            <li class="nav-item active">
                <a class="nav-link" href="wszystkie-kursy-admin.php">Wszystkie kursy </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="lista-opinie-wszystkie.php">Lista opinie </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Fiszki
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="fiszki2.php">Fiszki wszystkie <span class="sr-only"></span></a>
                    <a class="nav-link" href="lista-fiszki.php">Fiszki lista<span class="sr-only"></span></a>
                    <a class="nav-link" href="dodaj-fiszki.php">Fiszki dodaj<span class="sr-only"></span></a>
                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Kursy
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="lista-kursy.php">Lista Kursy</a>
                    <a class="nav-link" href="dodaj-kurs-form.php">Dodaj Kurs</a>
                    <a class="nav-link" href="lista-kategorie.php">Lista Kategorie</a>
                    <a class="nav-link" href="dodaj-kategorie.php">Dodaj Kategorie</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Materiały
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="materialy-do-lekcji.php">Materiały</a>
                    <a class="nav-link" href="dodaj-materialy.php">Dodaj materiały</a>
                </div>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Studenci
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="lista-studenci.php">Lista Studentów</a>
                    <a class="dropdown-item" href="dodaj-studenta.php">Dodaj Studenta</a>
                    <a class="dropdown-item" href="lista_zamowienia.php">Zamówienia Studentów</a>
                    <a class="dropdown-item" href="dodaj-adres-studenta.php">Dodaj adres studenta</a>
                    <a class="dropdown-item" href="dodaj-studenta-do-kursu.php">Dodaj studenta do kursu</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Wyszukaj Użytkownika</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Nauczyciele
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="lista-nauczyciele2.php">Lista Nauczycieli</a>

                    <a class="dropdown-item" href="dodaj-nauczyciela.php">Dodaj Nauczyciela</a>
                    <a class="dropdown-item" href="dodaj-adres-nauczyciela.php">Dodaj adres nauczyciela</a>
<!--                    <a class="dropdown-item" href="lista-nauczyciele2-kursy.php">Kursy Nauczycieli</a>-->
                    <a class="dropdown-item" href="dodaj-nauczyciela-do-kursu.php">Dodaj nauczyciela do kursu</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Wyszukaj Nauczyciela</a>
                </div>
            </li>

        </ul>
        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav><!-- navbar end -->