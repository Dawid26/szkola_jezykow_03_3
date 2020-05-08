<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');

//if(isset($POST['addRecord'])){
if (isset($_POST['addRecord'])) {
    $nazwa = filter_var($_POST['nazwa'], FILTER_SANITIZE_STRING);
    $opis = filter_var($_POST['opis'], FILTER_SANITIZE_STRING);
    $cena = filter_var($_POST['cena'], FILTER_SANITIZE_STRING);
    $zdjecie = filter_var($_POST['zdjecie'], FILTER_SANITIZE_STRING);
//            $data_utworzenia = filter_var($_POST['data_utworzenia'], FILTER_SANITIZE_STRING);
    $kategoria_kategoria_id = filter_var($_POST['kategoria_kategoria_id'], FILTER_SANITIZE_STRING);
    $nauczyciel_nauczyciel_id = filter_var($_POST['nauczyciel_nauczyciel_id'], FILTER_SANITIZE_STRING);

//    $query =    "
//INSERT INTO kurs ( nazwa, opis, cena, zdjecie, data_utworzenia, kategoria_kategoria_id, nauczyciel_nauczyciel_id)
//        VALUES ( :nazwa, :opis, :cena, :zdjecie, current_timestamp(), :kategoria_id, :nauczyciel_nauczyciel_id)";

//    $query =    "INSERT INTO `kurs` (`kurs_id`, `nazwa`, `opis`, `cena`, `zdjecie`, `data_utworzenia`, `kategoria_kategoria_id`, `nauczyciel_nauczyciel_id`)
//VALUES (NULL, :nazwa, :opis, :cena, :zdjecie, current_timestamp(), :kategoria_id, :nauczyciel_nauczyciel_id);";

    $query = "INSERT INTO kurs ( nazwa, opis, cena, zdjecie, kategoria_kategoria_id)
                       VALUES ( :nazwa, :opis, :cena, :zdjecie, :kategoria_kategoria_id)";

    $result = $db_connection->prepare($query);
    $result->execute([
        'nazwa' => $nazwa,
        'opis' => $opis,
        'cena' => $cena,
        'zdjecie' => $zdjecie,
        'kategoria_kategoria_id' => $kategoria_kategoria_id,
    ]);
    if ($result) {
        echo "działa"; ?>
        <script>
            window.setTimeout(function () {
                window.location = 'lista-kursy.php';
            }, 50000);
        </script>
        <p></p>
        <?php
        print_r($result);
    }
} else {
    echo "error";
}

?>


<?php //include('menu.php'); ?>

<br>
<div class="container">
    <form method="post" action="">
        <div class="form-group row">
            <label for="imie" class="col-sm-2 col-form-label">Nazwa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nazwa" name="nazwa" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="nazwisko" class="col-sm-2 col-form-label">Opis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="opis" name="opis" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Cena</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cena" name="cena" value="">
            </div>
        </div>

        <div class="form-group row">
            <label for="data_dolaczenia" class="col-sm-2 col-form-label">Zdjecie</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="zdjecie" name="zdjecie" value="">
            </div>
        </div>
        <!--        <div class="form-group row">-->
        <!--            <label for="data_dolaczenia" class="col-sm-2 col-form-label">data_utworzenia</label>-->
        <!--            <div class="col-sm-10">-->
        <!--                <input type="text" class="form-control" id="data_utworzenia" name="data_utworzenia" value="">-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="form-group row">
            <label for="data_dolaczenia" class="col-sm-2 col-form-label">kategoria_kategoria_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kategoria_kategoria_id" name="kategoria_kategoria_id"
                       value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="data_dolaczenia" class="col-sm-2 col-form-label">nauczyciel_nauczyciel_id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nauczyciel_nauczyciel_id" name="nauczyciel_nauczyciel_id"
                       value="">
            </div>
        </div>


        <button type="submit" name="addRecord" class="btn btn-success">Dodaj kurs</button>

    </form>

    <?php

    $query2 = "Select
kategoria.nazwa,
kategoria.kategoria_id, 
kategoria.opis, 
kategoria.zdjecie
From
    kategoria";

    $results2 = $db_connection->query($query2);
    ?>

    <table class="table mt-4">
        <thead>
        <tr>
            <th> kategoria_id</th>
            <th> nazwa</th>
            <th> opis</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($results2 as $result2) {
            ?>
            <tr>
                <td><?php echo $result2['kategoria_id'] ?></td>
                <td><?php echo $result2['nazwa'] ?></td>
                <td><?php echo $result2['opis'] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>

</body>


</html>