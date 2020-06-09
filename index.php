<?php
include_once('menu-sprawdzanie.php'); ?>
<!-- header -->
<header class="masthead" id="mainHeader">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <a href="#nauczyciele" style="color:white;text-align:center;">
                    <button class="col-xl-4 p-4">
                        Poznaj nas
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
<!-- div-->
<div  class="text-center center-block" id="naszaMetoda">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center p-3 mb-3 mt-3"><span>Szkoła języków</span></br>kursy</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center p-4">
            <div class="col-12 col-sm-12 col-lg-6 col-xl-4 mt-4">
                <div class="card">
                    <img src="assets/new/kurs-niemieckiego.jpg" alt="niemcy">
                    <h3>Niemiecki</h3>
                    <p>Kurs niemieckiego </p>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6 col-xl-4 mt-4">
                <div class="card">
                    <img src="assets/new/kurs-angielskiego.jpg" alt="niemcy">
                    <h3>Angielski</h3>
                    <p>Kurs angielskiego </p>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-6 col-xl-4 mt-4">
                <div class="card">
                    <img src="assets/new/niemiecki-dla-informatykow-2.jpg" alt="niemcy">
                    <h3>Niemiecki dla informatyków</h3>
                    <p>Kurs niemieckiego </p>
                </div>
            </div>
        </div>
        <div class=" col-12 center-block text-center row d-flex justify-content-center p-4">
          <div class="col-lg-8 col-12  text-center center-block ">
            <a  class="text-center center-block" href="wszystkie-kursy.php">

                <button type="button" class="  btn btn-primary btn-lg btn-block mt-4">
                    Zobacz nasz sklep
                </button>
             </a>
            </div>
            <div class="col-lg-8 col-12  text-center center-block">
            <a  class="text-center center-block" href="nasza-oferta.php">

<!--                <button type="button" class="  btn btn-info btn-lg btn-block m-4">-->
                <button type="button" class="btn btn-secondary btn-lg btn-block mt-4">
                    Opis kursów
                </button>
            </a>
          </div>
        </div>
    </div>
</div>
<!-- div end -->
<!--nauczyciel-->
<section id="nauczyciel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center p4" id="nauczyciele">
                    Nasi nauczyciele </h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class=" col-sm-12 col-lg-3 m-3">
                <div class="avatar mx-auto">
                    <img src="assets/new/nauczyciel-angielskiego-Radek.jpg" class="w-100 rounded-circle"
                         alt="niemiecki">
                </div>
                <h3 class="font-weight-bold mt-3 mb-3 text-center ">Radek</h3>
                <p class="text-center">Nasz nowy i kreatywny nauczyciel angielskiego w informatyce</p>
            </div>
            <div class=" col-sm-12 col-lg-3  m-3">
                <div class="avatar mx-auto">
                    <img src="assets/new/nauczycielka-niemieckiego-agnieszka.jpg" class="w-100 rounded-circle"
                         alt="niemiecki">
                </div>
                <h3 class="font-weight-bold mt-3 mb-3 text-center ">Agnieszka</h3>
                <p class="text-center">Nasza nauczycielka angielskiego z pięcioletnim doświadczeniem</p>
            </div>
            <div class=" col-sm-12 col-lg-3  m-3">
                <div class="avatar mx-auto">
                    <img src="assets/new/nauczyciel-niemieckiego-dla-informatykow.jpg" class="w-100 rounded-circle"
                         alt="niemiecki">
                </div>
                <h3 class="font-weight-bold mt-3 mb-3 text-center">Zbigniew</h3>
                <p class="text-center">Nasz nauczyciel nauczyciel niemieckiego dla informatykow</p>
            </div>
        </div>
    </div>
</section>
<?php include('footer2.php'); ?>
</body>
</html>