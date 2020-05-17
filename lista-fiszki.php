<?php
require_once('config.php');
include_once('menu-sprawdzanie-admin.php');
$query = "SELECT
    fiszki.fiszki_id,
    fiszki.nazwa,
    fiszki.opis,
    fiszki.zdjecie,
    fiszki.wymowa,
    fiszki.kurs_kurs_id
  FROM fiszki";
$results = $db_connection->query($query);
?>
<?php
if (!isset($_SESSION['zalogowany'])) {
    header('Location: indexZ.php');
    exit();
}
?>
<div class="container-fluid">
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
                <td><b><?php echo $result['nazwa'] ?></b</td>
                <td><b><?php echo $result['wymowa'] ?></b</td>
                <td><?php echo $result['opis'] ?></td>
                <td><b><?php echo $result['zdjecie'] ?></b></td>
                <td><?php echo $result['kurs_kurs_id'] ?></td>

                <td class="text-center"><a href="edytuj-fiszki.php?id=<?php echo $result['fiszki_id'] ?>"> <i
                                class="fas fa-edit "></i></a></td>
                <td class="text-center"><a href="akcje/usun-fiszki.php?id=<?php echo $result['fiszki_id'] ?>"> <i
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