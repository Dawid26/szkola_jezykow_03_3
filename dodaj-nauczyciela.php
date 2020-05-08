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
    $query = "INSERT INTO nauczyciel (nauczyciel_id,imie, nazwisko, email, haslo, miniaturka_zdjecia) 
                                     VALUES ( null,:imie, :nazwisko, :email, :haslo, :miniaturka_zdjecia)";
    $result = $db_connection->prepare($query);
    $result->execute([
        'imie' => $imie,
        'nazwisko' => $nazwisko,
        'email' => $email,
        'haslo' => $haslo,
        'miniaturka_zdjecia' => $miniaturka_zdjecia,
    ]);


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

} ?>
<?php //include('menu.php'); ?>
<br>
<div class="container">
    <form method="post" action="">
        <!--        <div class="form-group row">-->
        <!--            <label for="id" class="col-sm-2 col-form-label">ID</label>-->
        <!--            <div class="col-sm-10">-->
        <!--                <input type="number" readonly class="form-control" id="id" name="id" value="">-->
        <!--            </div>-->
        <!--        </div>-->
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
        <button type="submit" name="updateRecord" class="btn btn-success">Dodaj Nauczyciela</button>
    </form>

<!--    --><?php
//
//    $query2 = "Select
//  nazwa,kraj_zamieszkania_id
//From
//    kraj_zamieszkania";
//
//    $results2 = $db_connection->query($query2);
//    ?>
<!--    <table class="table">-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th> nazwa</th>-->
<!--            <th> kraj_zamieszkania_id</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php
//
//        foreach ($results2 as $result2) {
//            ?>
<!--            <tr>-->
<!--                <td>--><?php //echo $result2['nazwa'] ?><!--</td>-->
<!--                <td>--><?php //echo $result2['kraj_zamieszkania_id'] ?><!--</td>-->
<!--            </tr>-->
<!--            --><?php
//        }
//        ?>
<!--        </tbody>-->
<!--    </table>-->
</div>
<?php include('footer.php'); ?>

</body>


</html>
<!--INSERT INTO `nauczyciel_adres` (`miasto`, `kod_pocztowy`, `ulica`, `kraj_zamieszkania_id`, `nauczyciel_nauczyciel_id`)-->
<!--VALUES ('Warsxaaw', '58-964', 'das', 1 ,1)";-->
<!--miasto`, `kod_pocztowy`, `ulica`, `kraj_zamieszkania_id`, `nauczyciel_nauczyciel_id-->