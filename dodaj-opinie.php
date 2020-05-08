<?php
require_once('config.php');

include_once('menu-sprawdzanie.php');
//if(isset($POST['addRecord'])){

$studentId = (filter_var($_GET['student_id'], FILTER_VALIDATE_INT));
$kursId = (filter_var($_GET['kurs_id'], FILTER_VALIDATE_INT));
if (isset($_POST['dodajOpinie'])) {
    $tytul = filter_var($_POST['tytul'], FILTER_SANITIZE_STRING);
    $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
    $ocena = filter_var($_POST['ocena'], FILTER_SANITIZE_STRING);



    $query = "INSERT INTO opinia ( tytul, opis,ocena, data_wystawienia, student_student_id, kurs_kurs_id)
                       VALUES ( :tytul, :opis,:ocena, current_timestamp(), :studentId, :kursId)";

    $result = $db_connection->prepare($query);
    $result->execute([
        'tytul' => $tytul,
        'opis' => $opis,
        'ocena' => $ocena,
        'studentId' => $studentId,
        'kursId' =>$kursId,
    ]);
    if ($result) {
        echo "działa"; ?>
        <script>
            window.setTimeout(function () {
                window.location = 'index.php';
            }, 10000);
        </script>
        <p></p>
        <?php
        print_r($result);
    }
} else {
    //echo "error";
}

?>


<?php //include('menu.php'); ?>

<br>
<div class="container">
    <form method="post" action="">
        <div class="form-group row">
            <label for="tytul" class="col-sm-2 col-form-label">tytul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tytul" name="tytul" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="opis" class="col-sm-2 col-form-label">Opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="ocena" class="col-sm-2 col-form-label">ocena</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ocena" name="ocena" value="">
            </div>
        </div>
        <button type="submit" name="dodajOpinie" class="btn btn-success">Dodaj opinie</button>

    </form>
</div>
<?php include('footer.php'); ?>

</body>


</html>