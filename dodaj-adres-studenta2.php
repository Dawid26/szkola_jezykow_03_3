<?php
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}

include_once('menu-sprawdzanie-admin.php');

require_once('config.php');
if (isset($_GET['id'])) {

    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
}

//if(isset($POST['addRecord'])){
if (isset($_POST['addRecord'])) {
    $kod_pocztowy = filter_var($_POST['kod_pocztowy'], FILTER_SANITIZE_STRING);
    $miasto = filter_var($_POST['miasto'], FILTER_SANITIZE_STRING);
    $ulica = filter_var($_POST['ulica'], FILTER_SANITIZE_STRING);
    $kraj_zamieszkania_id = filter_var($_POST['kraj_zamieszkania_id'], FILTER_SANITIZE_NUMBER_INT);
    $student_student_id = filter_var($_POST['student_student_id'], FILTER_SANITIZE_NUMBER_INT);

//    $query =    "
//INSERT INTO kurs ( nazwa, opis, cena, zdjecie, data_utworzenia, kategoria_kategoria_id, nauczyciel_nauczyciel_id)
//        VALUES ( :nazwa, :opis, :cena, :zdjecie, current_timestamp(), :kategoria_id, :nauczyciel_nauczyciel_id)";

//    $query =    "INSERT INTO `kurs` (`kurs_id`, `nazwa`, `opis`, `cena`, `zdjecie`, `data_utworzenia`, `kategoria_kategoria_id`, `nauczyciel_nauczyciel_id`)
//VALUES (NULL, :nazwa, :opis, :cena, :zdjecie, current_timestamp(), :kategoria_id, :nauczyciel_nauczyciel_id);";

    $query = "INSERT INTO student_adres ( kod_pocztowy, miasto, ulica, kraj_zamieszkania_id, student_student_id)
                       VALUES ( :kod_pocztowy, :miasto, :ulica, :kraj_zamieszkania_id, :student_student_id)";

    $result = $db_connection->prepare($query);
    $result->execute([
        'kod_pocztowy' => $kod_pocztowy,
        'miasto' => $miasto,
        'ulica' => $ulica,
        'kraj_zamieszkania_id' => $kraj_zamieszkania_id,
        'student_student_id' => $student_student_id
    ]);
    if ($result) {
        echo "działa"; ?>
        <script>
            window.setTimeout(function () {
                window.location = 'lista-studenci.php';
            }, 1000);
        </script>
        <p></p>
        <?php
        print_r($result);
    }
} else {
//    echo "error linia 45";
}

?>
<br>
<div class="container">
    <form method="post" action="">
        <div class="form-group row">
            <label for="kod_pocztowy" class="col-sm-2 col-form-label">kod_pocztowy</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kod_pocztowy" name="kod_pocztowy" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="miasto" class="col-sm-2 col-form-label">miasto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="miasto" name="miasto" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="ulica" class="col-sm-2 col-form-label">ulica</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ulica" name="ulica" value="">
            </div>
        </div>

        <div class="form-group row">
            <label for="kraj_zamieszkania_id" class="col-sm-2 col-form-label">kraj_zamieszkania_id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="kraj_zamieszkania_id" name="kraj_zamieszkania_id" value="">
            </div>
        </div>
        <!--        <div class="form-group row">-->
        <!--            <label for="data_dolaczenia" class="col-sm-2 col-form-label">data_utworzenia</label>-->
        <!--            <div class="col-sm-10">-->
        <!--                <input type="text" class="form-control" id="data_utworzenia" name="data_utworzenia" value="">-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="form-group row">
            <label for="student_student_id" class="col-sm-2 col-form-label">student_student_id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="student_student_id" name="student_student_id"
                       value="<?php if (isset($id)) {
                           echo $id;
                       } ?>">
            </div>
        </div>


        <button type="submit" name="addRecord" class="btn btn-success">Dodaj adres</button>

    </form>
</div>
<div class="container">
<?php

$query2 = "Select
  nazwa,kraj_zamieszkania_id
From
    kraj_zamieszkania";

$results2 = $db_connection->query($query2);
?>
<?php include('footer.php'); ?>
<table class="table">
    <thead>
    <tr>
        <th> nazwa</th>
        <th> kraj_zamieszkania_id</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($results2 as $result2) {
        ?>
        <tr>
            <td><?php echo $result2['nazwa'] ?></td>
            <td><?php echo $result2['kraj_zamieszkania_id'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>

</div>
</html>