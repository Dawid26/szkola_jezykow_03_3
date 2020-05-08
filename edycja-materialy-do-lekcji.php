<?php
require_once('config.php');


include_once('menu-sprawdzanie-admin.php');

$query = "Select
    materialy_do_lekcji.materialy_do_lekcji_id,
    materialy_do_lekcji.nazwa,
    materialy_do_lekcji.opis,
    materialy_do_lekcji.link_lekcja_pdf,
    materialy_do_lekcji.kurs_kurs_id
From
    materialy_do_lekcji";

$results = $db_connection->query($query);
?>
<?php

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}

if (!isset($_SESSION['zalogowany'])) {
    header('Location: indexZ.php');
    exit();
}

?>
<div class="container">
    <table class="table table-bordered table-responsive table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>link_lekcja_pdf</th>
            <th>Kurs id</th>
            <th class="text-center">Edycja</th>
            <th class="text-center">Usuń</th>

        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['materialy_do_lekcji_id'] ?></td>
                <td><?php echo $result['nazwa'] ?></td>
                <td><?php echo $result['opis'] ?></td>
                <td><?php echo $result['link_lekcja_pdf'] ?></td>
                <td><?php echo $result['kurs_kurs_id'] ?></td>
                <td class="text-center"><a
                            href="edytuj-materialy-do-lekcji.php?id=<?php echo $result['materialy_do_lekcji_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center"><a
                            href="usun-materialy-do-lekcji.php?id=<?php echo $result['materialy_do_lekcji_id'] ?>"> <i
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