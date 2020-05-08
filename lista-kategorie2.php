<?php
require_once('config.php');


include_once('menu-sprawdzanie-admin.php');

//$query = "Select
//    kurs.kurs_id,
//    kurs.nazwa,
//    kurs.opis,
//    kurs.cena,
//    kurs.zdjecie,
//    kurs.data_utworzenia,
//    kurs.kategoria_kategoria_id,
//    kurs.nauczyciel_nauczyciel_id
//From
//    kurs";
$query = "Select kategoria.nazwa,
       kategoria.opis,
       kategoria.zdjecie,
       kategoria.kategoria_id
From kategoria";

$results = $db_connection->query($query);

?>

<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <!-- Required meta tags -->-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
<!---->
<!--    <!-- Bootstrap CSS -->-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"-->
<!--          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<!--    <script src="https://kit.fontawesome.com/ba6dc923ee.js" crossorigin="anonymous"></script>-->
<!--    <link rel="stylesheet" href="css/style.css">-->
<!--    <link rel="stylesheet" href="css/bootstrap.css">-->
<!--    <title>Hello, world!</title>-->
<!--</head>-->
<!--<body>-->
<?php include('menu.php'); ?>
<div class="container">
    <!--    <table class="table ">-->
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>zdjecie link</th>
            <th class="text-center">Edycja</th>
            <th class="text-center">Usuń</th>

        </tr>
        </thead>
        <tbody class="table-striped">
        <?php

        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['kategoria_id'] ?></td>
                <td><?php echo $result['nazwa'] ?></td>
                <td><?php echo $result['opis'] ?></td>
                <td><?php echo $result['zdjecie'] ?></td>

                <td class="text-center"><a href="edytuj-kategorie.php?id=<?php echo $result['kategoria_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center"><a href="usun-kategorie.php?id=<?php echo $result['kategoria_id'] ?>"> <i
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