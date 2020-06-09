<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');

if (isset($_POST['updateRecord'])) {
    $imie = filter_var($_POST['imie'], FILTER_SANITIZE_STRING);
    $nazwisko = filter_var($_POST['nazwisko'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $haslo = filter_var($_POST['haslo'], FILTER_SANITIZE_STRING);
    $miniaturkazdjecia = filter_var($_POST['miniaturkazdjecia'], FILTER_SANITIZE_STRING);

    $query = "INSERT INTO `student` (`student_id`,`imie`, `nazwisko`, `email`, `haslo`, `miniaturka_zdjecia`) 
                                VALUES ( null,:imie, :nazwisko, :email, :haslo, :miniaturkazdjecia)";
    $result = $db_connection->prepare($query);
    $result->execute([
        'imie' => $imie,
        'nazwisko' => $nazwisko,
        'email' => $email,
        'haslo' => $haslo,
        'miniaturkazdjecia' => $miniaturkazdjecia,
    ]);

    if ($result) {

        print_r($result); ?>
        <script>
            window.setTimeout(function () {
                window.location = 'lista-studenci.php';
            }, 10000);
        </script>
        <p></p>
        <?php
    }

}
?>
<br>
<div class="container">
    <form method="post" action="">

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
            <label for="miniaturkazdjecia" class="col-sm-2 col-form-label">Miniaturka zdjęcia</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="miniaturkazdjecia" name="miniaturkazdjecia" value="">
            </div>
        </div>

        <button type="submit" name="updateRecord" class="btn btn-success">Dodaj Studenta</button>
    </form>
</div>
<?php include('footer.php'); ?>
</body>
</html>