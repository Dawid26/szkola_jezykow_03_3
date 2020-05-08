<?php
require_once('config.php');
include_once('menu-sprawdzanie.php');


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
$query = "Select
    fiszki.fiszki_id,
    fiszki.nazwa,
    fiszki.opis,
    fiszki.zdjecie,
    fiszki.kurs_kurs_id
  From
    fiszki";


$results = $db_connection->query($query);


?>
<?php


if (!isset($_SESSION['zalogowany'])) {
    header('Location: indexZ.php');
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ba6dc923ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Hello, world!</title>
</head>
<body>
<?php //include('menu.php'); ?>
<div class="container">
    <!--    <table class="table ">-->
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Zdjecie</th>
            <th>Kurs_id</th>

            <th class="text-center">Edycja</th>


        </tr>
        </thead>
        <tbody class="table-striped">
        <?php

        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['fiszki_id'] ?></td>
                <td><?php echo $result['nazwa'] ?></td>
                <td><?php echo $result['opis'] ?></td>
                <td><?php echo $result['zdjecie'] ?></td>
                <td><?php echo $result['kurs_kurs_id'] ?></td>

                <td class="text-center"><a href="edytuj-fiszki.php?id=<?php echo $result['fiszki_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
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