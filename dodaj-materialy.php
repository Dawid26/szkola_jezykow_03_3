<?php
require_once('config.php');

include_once('menu-sprawdzanie.php');
//if(isset($POST['addRecord'])){
if (isset($_POST['dodaj_materialy_do_lekcji'])) {
    $nazwa = filter_var($_POST['nazwa'], FILTER_SANITIZE_STRING);
    $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
    $link_lekcja_pdf = filter_var($_POST['link_lekcja_pdf'], FILTER_SANITIZE_STRING);
    $kurs_kurs_id = filter_var($_POST['kurs_kurs_id'], FILTER_SANITIZE_STRING);
//   $studentId =  $_SESSION['student_id'];

    $query = "INSERT INTO materialy_do_lekcji ( nazwa, opis, link_lekcja_pdf, kurs_kurs_id)
                       VALUES ( :nazwa, :opis, :link_lekcja_pdf, :kurs_kurs_id)";

    $result = $db_connection->prepare($query);
    $result->execute([
        'nazwa' => $nazwa,
        'opis' => $opis,
        'link_lekcja_pdf' => $link_lekcja_pdf,
        'kurs_kurs_id' => $kurs_kurs_id,
    ]);
    if ($result) {
//        echo "działa"; ?>
        <script>
            window.setTimeout(function () {
                window.location = 'materialy-do-lekcji.php';
            }, 1000);
        </script>
        <p></p>
        <?php
//        print_r($result);
    }
} else {
//    echo "error";
}

?>


<?php //include('menu.php'); ?>

<br>
<div class="container">
    <form method="post" action="">
        <div class="form-group row">
            <label for="nazwa" class="col-sm-2 col-form-label">Nazwa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="opis" class="col-sm-2 col-form-label">Opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="link_lekcja_pdf" class="col-sm-2 col-form-label">Link_lekcja_pdf</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="link_lekcja_pdf" name="link_lekcja_pdf" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="kurs_kurs_id" class="col-sm-2 col-form-label">Kurs id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="kurs_kurs_id" name="kurs_kurs_id" value="">
            </div>
        </div>


        <button type="submit" name="dodaj_materialy_do_lekcji" class="btn btn-success">Dodaj materiały do lekcji</button>

    </form>
</div>
<?php include('footer.php'); ?>

</body>


</html>