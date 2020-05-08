<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');

if (isset($_POST['updateRecord'])) {
    //    header('Location:index.php');
    //<!--miasto`, `kod_pocztowy`, `ulica`, `kraj_zamieszkania_id`, `nauczyciel_nauczyciel_id-->
    // $id= filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $imie = filter_var($_POST['imie'], FILTER_SANITIZE_STRING);
    $nazwisko = filter_var($_POST['nazwisko'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $haslo = filter_var($_POST['haslo'], FILTER_SANITIZE_STRING);
    $miniaturka_zdjecia = filter_var($_POST['miniaturka_zdjecia'], FILTER_SANITIZE_STRING);
    $miasto = filter_var($_POST['miasto'], FILTER_SANITIZE_STRING);
    $kod_pocztowy = filter_var($_POST['kod_pocztowy'], FILTER_SANITIZE_STRING);
    $ulica = filter_var($_POST['ulica'], FILTER_SANITIZE_STRING);
    $kraj_zamieszkania_id = filter_var($_POST['kraj_zamieszkania_id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "INSERT INTO `nauczyciel` (`nauczyciel_id`,`imie`, `nazwisko`, `email`, `haslo`, `miniaturka_zdjecia`) 
                                                VALUES ( null,:imie, :nazwisko, :email, :haslo, :miniaturka_zdjecia);
SELECT LAST_INSERT_ID() INTO @mysql_variable_here;
              INSERT INTO `nauczyciel_adres` ( `nauczyciel_adres_id` , `kod_pocztowy`,`miasto`, `ulica`, `kraj_zamieszkania_id`, `nauczyciel_nauczyciel_id`)
                                             VALUES (null, :miasto, :kod_pocztowy, :ulica, :kraj_zamieszkania_id, @mysql_variable_here)";

    $result = $db_connection->prepare($query);
    $result->execute([
        'imie' => $imie,
        'nazwisko' => $nazwisko,
        'email' => $email,
        'haslo' => $haslo,
        'miniaturka_zdjecia' => $miniaturka_zdjecia,
        'miasto' => $miasto,
        'kod_pocztowy' => $kod_pocztowy,
        'ulica' => $ulica,
        'kraj_zamieszkania_id' => $kraj_zamieszkania_id,
    ]);
//    $query2 = "SELECT nauczyciel_adres_id , `kod_pocztowy`,`miasto`, `ulica`, `kraj_zamieszkania_id`, `nauczyciel_nauczyciel_id`)
//                                             VALUES (null, :miasto, :kod_pocztowy, :ulica, :kraj_zamieszkania_id, :id)";


    if ($result) {
        echo "działa"; ?>
        <script>
            window.setTimeout(function () {
                window.location = 'lista-nauczyciele2.php';
            }, 10000);
        </script>
        <p></p>
        <?php
    }

}


?>
<?php


?>

<?php include('menu.php'); ?>

<br>
<div class="container">
    <form method="post" action="">

        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" name="id" value="" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label for="imie" class="col-sm-2 col-form-label">Imię</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="imie" name="imie" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="nazwisko" class="col-sm-2 col-form-label">Nazwisko</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nazwisko" name="nazwisko" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="haslo" class="col-sm-2 col-form-label">Hasło</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="haslo" name="haslo" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="miniaturka_zdjecia" class="col-sm-2 col-form-label">Miniaturka zdjęcia</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="miniaturka_zdjecia" name="miniaturka_zdjecia" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="miasto" class="col-sm-2 col-form-label">miasto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="miasto" name="miasto" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="kod_pocztowy" class="col-sm-2 col-form-label">kod_pocztowy</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kod_pocztowy" name="kod_pocztowy" value="">
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
                <input type="text" class="form-control" id="kraj_zamieszkania_id" name="kraj_zamieszkania_id" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="nauczyciel_nauczyciel_id" class="col-sm-2 col-form-label">ulica</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nauczyciel_nauczyciel_id" name="nauczyciel_nauczyciel_id"
                       value="">
            </div>
        </div>
        <button type="submit" name="updateRecord" class="btn btn-success">Update Record</button>
    </form>
</div>
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

<?php include('footer.php'); ?>

</body>


</html>
<!--INSERT INTO `nauczyciel_adres` (`miasto`, `kod_pocztowy`, `ulica`, `kraj_zamieszkania_id`, `nauczyciel_nauczyciel_id`)-->
<!--VALUES ('Warsxaaw', '58-964', 'das', 1 ,1)";-->
<!--miasto`, `kod_pocztowy`, `ulica`, `kraj_zamieszkania_id`, `nauczyciel_nauczyciel_id-->