<?php
require_once('../config.php');

if (!isset($_GET['id'])) {
    //header('Location: ../lista-studenci.php');
    echo "test1";
    die();
} else {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    if (!$id) {
        //header('Location: ../lista-studenci.php');
        echo "test2";
        die();
    } else {
        $query = "DELETE FROM student_adres WHERE student_student_id=:id LIMIT 1";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body>


</body>

<?php include('../menu.php'); ?>
<div class="container">
    <?php
    if ($rowsDeleted == 1) {
        ?>
        <div class="alert alert-primary" role="alert">
            Rekord został usuniety
        </div>
        <script>
            window.setTimeout(function () {
                window.location = '../lista-studenci.php';
            }, 1000);
        </script>
    <?php
    } else {
    ?>
        <div class="alert alert-primary" role="alert">
            Rekord nie został usuniety
            <script>
                window.setTimeout(function () {
                    window.location = '../lista-studenci.php';
                }, 2000);
            </script>
        </div>
        <?php
    }
    ?>
</div>
<?php include_once('../footer.php'); ?>
</html>