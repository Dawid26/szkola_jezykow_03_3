<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');

$kurs_link_id = $_GET['id'];
$zalogowany = $_SESSION['zalogowany'];
$email = $_SESSION['email'];
$imie = $_SESSION['imie'];
$nazwisko = $_SESSION['nazwisko'];
$uprawnienia = $_SESSION['uprawnienia'];


//$query = "Select
//    fiszki.kurs_id,
//    fiszki.nazwa,
//    fiszki.opis,
//    fiszki.cena,
//    fiszki.zdjecie,
//    fiszki.data_utworzenia,
//    fiszki.kategoria_kategoria_id,
//    fiszki.nauczyciel_nauczyciel_id
//From
//    kurs";
$query = "Select fiszki.fiszki_id,
       fiszki.nazwa ,
       fiszki.opis ,
       fiszki.zdjecie ,
       fiszki.wymowa ,
       fiszki.kurs_kurs_id
From fiszki
     where  fiszki.kurs_kurs_id = '$kurs_link_id'";

$results = $db_connection->query($query);


?>
<?php


if (!isset($_SESSION['zalogowany'])) {
    header('Location: indexZ.php');
    exit();
}

?>


<?php //include('menu.php'); ?>
<div class="container-fluid">
    <!--    <table class="table ">-->
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Wymowa</th>
            <th>Opis</th>
            <th>Zdjecie</th>
            <th>Kurs_id</th>

            <th class="text-center">Edycja</th>
            <th class="text-center">Usuń</th>

        </tr>
        </thead>
        <tbody class="table-striped">
        <?php

        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['fiszki_id'] ?></td>
                <td><?php echo $result['nazwa'] ?></td>
                <td><?php echo $result['wymowa'] ?></td>
                <td><?php echo $result['opis'] ?></td>
                <td><?php echo $result['zdjecie'] ?></td>
                <td><?php echo $result['kurs_kurs_id'] ?></td>

                <td class="text-center"><a href="edytuj-fiszki-admin.php?id=<?php echo $result['fiszki_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center"><a href="akcje/usun-fiszki-admin.php?id=<?php echo $result['fiszki_id'] ?>&amp;kurs_id=<?php echo $result['kurs_kurs_id'] ?>"> <i
                                class="fas fa-trash-alt "></i></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


    <?php include('footer.php'); ?>
</div>
</body>
</html>