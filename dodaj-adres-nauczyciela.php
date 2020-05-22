<?php


require_once('config.php');
include_once('menu-sprawdzanie-admin.php');
if (isset($_GET['id'])) {

    $id = (filter_var($_GET['id'], FILTER_VALIDATE_INT));
}

//if(isset($POST['addRecord'])){
if (isset($_POST['addRecord'])) {
    $kod_pocztowy = filter_var($_POST['kod_pocztowy'], FILTER_SANITIZE_STRING);
    $miasto = filter_var($_POST['miasto'], FILTER_SANITIZE_STRING);
    $ulica = filter_var($_POST['ulica'], FILTER_SANITIZE_STRING);
    $kraj_zamieszkania_id = filter_var($_POST['kraj_zamieszkania_id'], FILTER_SANITIZE_STRING);
    $nauczyciel_nauczyciel_id = filter_var($_POST['nauczyciel_nauczyciel_id'], FILTER_SANITIZE_NUMBER_INT);

//    $query =    "
//INSERT INTO kurs ( nazwa, opis, cena, zdjecie, data_utworzenia, kategoria_kategoria_id, nauczyciel_nauczyciel_id)
//        VALUES ( :nazwa, :opis, :cena, :zdjecie, current_timestamp(), :kategoria_id, :nauczyciel_nauczyciel_id)";

//    $query =    "INSERT INTO `kurs` (`kurs_id`, `nazwa`, `opis`, `cena`, `zdjecie`, `data_utworzenia`, `kategoria_kategoria_id`, `nauczyciel_nauczyciel_id`)
//VALUES (NULL, :nazwa, :opis, :cena, :zdjecie, current_timestamp(), :kategoria_id, :nauczyciel_nauczyciel_id);";

    $query = "INSERT INTO nauczyciel_adres ( kod_pocztowy, miasto, ulica, kraj_zamieszkania_id, nauczyciel_nauczyciel_id)
                       VALUES ( :kod_pocztowy, :miasto, :ulica, :kraj_zamieszkania_id, :nauczyciel_nauczyciel_id)";

    $result = $db_connection->prepare($query);
    $result->execute([
        'kod_pocztowy' => $kod_pocztowy,
        'miasto' => $miasto,
        'ulica' => $ulica,
        'kraj_zamieszkania_id' => $kraj_zamieszkania_id,
        'nauczyciel_nauczyciel_id' => $nauczyciel_nauczyciel_id
    ]);
    if ($result) {
        echo "działa"; ?>
        <script>
            window.setTimeout(function () {
                window.location = 'lista-nauczyciele2.php';
            }, 5000);
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
                <input type="number" class="form-control" id="kraj_zamieszkania_id" name="kraj_zamieszkania_id"
                       value="">
            </div>
        </div>
        <!--        <div class="form-group row">-->
        <!--            <label for="data_dolaczenia" class="col-sm-2 col-form-label">data_utworzenia</label>-->
        <!--            <div class="col-sm-10">-->
        <!--                <input type="text" class="form-control" id="data_utworzenia" name="data_utworzenia" value="">-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="form-group row">
            <label for="nauczyciel_nauczyciel_id" class="col-sm-2 col-form-label">nauczyciel_nauczyciel_id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="nauczyciel_nauczyciel_id" name="nauczyciel_nauczyciel_id"
                       value="<?php if (isset($id)) {
                           echo $id;
                       } ?>">
            </div>
        </div>


        <button type="submit" name="addRecord" class="btn btn-success">Dodaj adres</button>

    </form>

    <?php

    $query2 = "Select
  nazwa,kraj_zamieszkania_id
From
    kraj_zamieszkania";

    $results2 = $db_connection->query($query2);
    ?>

    <table class="table">
        <thead>
        <tr>
            <th>Lista krajów </th>
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
</div>
</body>
</html>
<?php include('footer.php'); ?>
<?php include('zalogowany.php'); ?>
