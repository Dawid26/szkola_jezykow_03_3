




<!-- Footer -->
<footer class="page-footer font-small indigo main">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-2">Kontakt</h5>

                <ul class="list-unstyled kontakt">

                    <li>
                        <b>  tel.</b>  000 000 000
                    </li>
                    <li>
                        <b>  e-mail:</b>  szkola000@wroclaw.pl
                    </li>
                    <li>
                        <b> </b><br>Hallera 2212/22
                    </li>
                    <li>
                        Wrocław 22-222
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-2">Opinie</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="lista-opinie-strona-glowna.php">Zobacz opinie naszych klientów</a>
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-2">Oferta</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="nasza-oferta.php">Zobacz naszą ofertę</a>
                    </li>

                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-2">Sklep</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="wszystkie-kursy.php">Przejdź do sklepu</a>
                    </li>
                    <li>
                        <a href="index.php">Strona główna</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="container">
        <!--        <div class="row p-4 d-flex justify-content-between">-->
        <!--            <div class="col-3">-->
        <!--            -->
        <!--                <p>Bazy danych, PHP i MySQL</p>-->
        <!--            </div>-->
        <!--            <div class="col-4">-->
        <!--                <p>-->
        <!--                    <i class='fas fa-user p-2' style='font-size:24px'> </i>-->
        <!--                    Dawid Mariankowski-->
        <!--                </p>-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="row">
            <div class="text-center col-12">
                <p>Praca zaliczeniowa, bazy danych Dawid Mariankowski &copy; Copyright: <?php $year = date("Y");
                    echo $year ?></p>
                <p>Wrocławska Wyższa Szkoła Informatyki Stosowanej "Horyzont"</p>
            </div>
        </div>
    </div>
    <!--footer end-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src='js/scripts.js'></script>
    <!-- Copyright -->

</footer>
<!-- Footer -->
<?php
//if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' ||
//        $_SERVER['HTTPS'] == 1) ||
//    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
//    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))
//{
//    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//    header('HTTP/1.1 301 Moved Permanently');
//    header('Location: ' . $redirect);
//    exit();
//}