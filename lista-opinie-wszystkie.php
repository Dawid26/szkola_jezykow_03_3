<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');


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
$query = "Select opinia.tytul,
       opinia.opis,
       opinia.student_student_id,
       opinia.kurs_kurs_id,
       opinia.data_wystawienia,
       opinia.ocena,
       opinia.opinia_id
From opinia";


$results = $db_connection->query($query);


?>
<?php


if (!isset($_SESSION['zalogowany'])) {
    header('Location: indexZ.php');
    exit();
}

?>

<?php //include('menu.php'); ?>
<div class="container">
    <!--    <table class="table ">-->
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>tytul</th>
            <th>opis</th>
            <th>Ocena</th>
            <th>Student_id</th>
            <th>Kurs id</th>


            <th class="text-center">Edycja</th>
            <th class="text-center">Usuń</th>

        </tr>
        </thead>
        <tbody class="table-striped">
        <?php
        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['opinia_id'] ?></td>
                <td><b><?php echo $result['tytul'] ?></b</td>
                <td><b><?php echo $result['opis'] ?></b</td>
                <td><?php echo $result['ocena'] ?></td>
                <td><?php echo $result['student_student_id'] ?></td>
                <td><?php echo $result['kurs_kurs_id'] ?></td>

                <td class="text-center"><a href="edytuj-opinie-wszystkie.php?id=<?php echo $result['opinia_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center"><a href="akcje/usun-opinie.php?id=<?php echo $result['opinia_id'] ?>"> <i
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
<?php include('zalogowany.php'); ?>