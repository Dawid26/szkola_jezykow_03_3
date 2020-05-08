<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');
$query = "Select
   student.imie,
    student.nazwisko,
    student.haslo,
    student.email,
    student.miniaturka_zdjecia,
    student.data_dolaczenia,
    student.uprawnienia,
    student_adres.miasto,
    student_adres.kod_pocztowy,
    student_adres.ulica,
    student_adres.kraj_zamieszkania_id,
    student_adres.student_student_id,
    kraj_zamieszkania.nazwa,
    student_adres.student_student_id,
    kraj_zamieszkania.kraj_zamieszkania_id As kraj_zamieszkania_id1,
    student.student_id
From
    student left join 
    student_adres on student_adres.student_student_id = student.student_id left Join
    kraj_zamieszkania On student_adres.kraj_zamieszkania_id = kraj_zamieszkania.kraj_zamieszkania_id";

$results = $db_connection->query($query);


?>

<?php
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();

}
if(isset($_SESSION['student_id'])){
    $studentId = $_SESSION['student_id'];
}

$uprawnienia = $_SESSION['uprawnienia'];


?>
<?php //include('menu.php'); ?>

<div class="container-fluid">
<!--    <p>Zalogowany</p>-->
    <!--    <table class="table-responsive-sm table-bordered">-->
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>data dołączenia</th>
            <th>miniaturka_zdjecia</th>
            <th>Uprawnienia</th>
            <th class="text-center">Edycja dane</th>
            <th>Kraj</th>
            <th>Miasto</th>
            <th>Kod pocztowy</th>
            <th>Ulica</th>


            <th class="text-center">Edycja</th>
            <th class="text-center">Usuń rekord</th>

        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['student_id'] ?></td>
                <td><?php echo $result['imie'] ?></td>
                <td><?php echo $result['nazwisko'] ?></td>
                <td><b><?php echo $result['email'] ?></b></td>
                <td><?php echo $result['data_dolaczenia'] ?></td>
                <td><b><?php echo $result['miniaturka_zdjecia'] ?></b></td>
                <td><?php echo $result['uprawnienia'] ?></td>
                <td class="text-center"><a href="edytuj-studenta.php?id=<?php echo $result['student_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>

                <td><?php echo $result['nazwa'] ?></td>
                <td><?php echo $result['miasto'] ?></td>
                <td><?php echo $result['kod_pocztowy'] ?></td>
                <td><?php echo $result['ulica'] ?></td>


                <td class="text-center"><a href="edytuj-adres-studenta.php?id=<?php echo $result['student_id'] ?>"> <i
                                class="fas fa-edit  "></i></a></td>
                <td class="text-center"><a href="usun-studenta.php?id=<?php echo $result['student_id'] ?>"> <i
                                class="fas fa-trash-alt "></i></a></td>
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