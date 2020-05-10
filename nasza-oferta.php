
<?php


include_once('menu-sprawdzanie.php'); ?>
<?php //include('menu.php'); ?>

<!-- navbar end -->
<!-- header -->
<header class="masthead" id="mainHeader">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <a href="#nauczyciele" style="color:white;text-align:center;">
                    <button class="col-4 p-4">
                        Zobacz nasze kursy
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
<!-- div-->
<div id="naszaMetoda">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center p-3 mb-3 mt-3"><span>Nasze kursy </span></br></h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center p-4">
            <div class="col-12 mt-5">
                <div class="card">
                    <img src="assets/new/kurs-niemieckiego.jpg" alt="niemcy">
                    <h3>Niemiecki dla informatyków</h3>
                    <p>Kurs niemieckiego </p>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="card">
                    <img src="assets/new/kurs-angielskiego.jpg" alt="niemcy">
                    <h3>Angielski dla informatyków</h3>
                    <p>Kurs angielskiego </p>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="card">
                    <img src="assets/new/niemiecki-dla-informatykow-2.jpg" alt="niemcy">
                    <h3>Niemiecki ogólny poziomy od A1 do C1</h3>
                    <p>Kurs niemieckiego </p>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="card">
                    <img src="assets/new/niemiecki-dla-informatykow-2.jpg" alt="niemcy">
                    <h3>Angielski ogólny poziomy od A1 do C1</h3>
                    <p>Kurs niemieckiego </p>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="card">
                    <img src="assets/new/niemiecki-dla-informatykow-2.jpg" alt="niemcy">
                    <h3>Konto premium, dostęp do wszystkich kursów i lekcje z profesjonalnym nauczycielem</h3>
                    <p>Kurs niemieckiego </p>
                </div>
            </div>
        </div>
        <div class="col-6 text-center center-block">
            <a href="wszystkie-kursy.php">
                <!--                <button style="color:white;text-align:center;background-color: lightblue;" class="col-4 p-3">-->
                <!--                    Wszystkie kursy-->
                <!--                </button>-->
                <button type="button" class="btn btn-primary btn-lg btn-block m-4">
                    Zobacz nasz sklep
                </button>
            </a>
        </div>
    </div>
</div>
<!-- div end -->
<!--drivers-->
<section id="nauczyciel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center p4" id="nauczyciele">
                    Nasi nauczyciele </h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-3 m-3">
                <div class="avatar mx-auto">
                    <img src="assets/new/nauczyciel-angielskiego-Radek.jpg" class="w-100 rounded-circle"
                         alt="niemiecki">
                </div>
                <h3 class="font-weight-bold mt-3 mb-3 text-center ">Radek</h3>
                <p class="">Nasz nowy i kreatywny nauczyciel angielskiego w informatyce</p>
            </div>
            <div class="col-3 m-3">
                <div class="avatar mx-auto">
                    <img src="assets/new/nauczycielka-niemieckiego-agnieszka.jpg" class="w-100 rounded-circle"
                         alt="niemiecki">
                </div>
                <h3 class="font-weight-bold mt-3 mb-3 text-center ">Agnieszka</h3>
                <p class="">Nasza nauczycielka angielskiego z pięcioletnim doświadczeniem</p>
            </div>
            <div class="col-3 m-3">
                <div class="avatar mx-auto">
                    <img src="assets/new/nauczyciel-niemieckiego-dla-informatykow.jpg" class="w-100 rounded-circle"
                         alt="niemiecki">
                </div>
                <h3 class="font-weight-bold mt-3 mb-3 text-center">Zbigniew</h3>
                <p class="">Nasz nauczyciel nauczyciel niemieckiego dla informatykow</p>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php'); ?>

</body>
</html>