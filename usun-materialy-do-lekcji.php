<?php
require_once('config.php');

include_once('menu-sprawdzanie-admin.php');

if (!isset($_GET['id'])) {
    header('Location: lista-studenci.php');
    die();
} else {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    if (!$id) {
//        header('Location: lista-studenci.php');
        die();
    } else {
        $query = "DELETE FROM materialy_do_lekcji WHERE materialy_do_lekcji_id=:id LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id
        ]);
        $rowsDeleted = $result->rowCount();
//        if($rowsDeleted==1){
//            echo "success";
//        } else {
//            echo "failure";
//        }
    }
}
?>
<div class="container">
    <?php
    if ($rowsDeleted == 1) {
        ?>
        <div class="alert alert-primary" role="alert">
            Rekord został usuniety
        </div>
        <script>
            window.setTimeout(function () {
                window.location = 'materialy-do-lekcji.php';
            }, 1000);
        </script>

    <?php
    } else {
    ?>
        <div class="alert alert-primary" role="alert">
            Rekord nie został usuniety
        </div>

        <?php
    }
    ?>
</div>
<?php include('footer.php'); ?>
</html>