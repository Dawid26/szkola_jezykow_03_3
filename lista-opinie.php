<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}


$kurs_id = $_GET['id'];

$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
if (isset($_SESSION['zalogowany'])){
    $zalogowany = $_SESSION['zalogowany'];
}




    if ((isset($_SESSION['zalogowany']))) {
        $uprawnienia = $_SESSION['uprawnienia'];


        if ($uprawnienia == 'student') {
            $student_id = $_SESSION['student_id'];
            $email = $_SESSION['email'];
            $imie = $_SESSION['imie'];
            $uprawnienia = $_SESSION['uprawnienia'];
        }
        if ($uprawnienia == 'admin') {
            //  echo $uprawnienia;
            include_once('menu-admin.php');
        }
        if ($uprawnienia == 'nauczyciel') {
            //   echo $uprawnienia;
            include_once('menu-nauczyciel.php');
        }

    }


//$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);


//echo 'student id =' . $student_id . ',,';





$query = "Select student.imie,
       student.email,
       opinia.opinia_id,
       opinia.tytul,
       opinia.opis,
       opinia.ocena,
       opinia.data_wystawienia,
       opinia.student_student_id,
       kurs.nazwa
From opinia Inner Join
     student On opinia.student_student_id = student.student_id Inner Join
     kurs On opinia.kurs_kurs_id = '$kurs_id'
     WHERE opinia.kurs_kurs_id = '$kurs_id' AND kurs.kurs_id = '$kurs_id'";


?>
<div class="container">
    <h2 class="text-center">Opinie studentów</h2>
    <?php
    $results = $db_connection->query($query);

    foreach ($results as $result) {
        ?>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">

                <div class="card-body">
                    <?php $star = 'fa-star'; ?>
                    <p class="card-text">Nazwa:<b> <?php echo $result['nazwa'] ?></b></p>
                    <p class="card-text"> <?php echo ( $result['imie'] ? 'Imie: ' .$result['imie'] : 'Imie: Brak danych'); ?></p>
                    <p class="card-text">Tytul: <?php echo $result['tytul'] ?></p>
                   <p class="card-text">Opis:  <b><?php echo $result['opis'] ?></p></b>
                    <p class="star-rating">
                        <span class="text-left">Ocena</span>
                        <span  class="fa <?php echo (((int)$result['ocena']>=1) ? $star: 'no'); ?>" data-rating="1"></span>
                        <span  class="fa <?php echo (((int)$result['ocena']>=2) ? $star: 'no'); ?>" data-rating="2"></span>
                        <span  class="fa <?php echo (((int)$result['ocena']>=3) ? $star: 'no'); ?>"  data-rating="3"></span>
                        <span  class="fa <?php echo (((int)$result['ocena']>=4) ? $star: 'no'); ?>"  data-rating="4"></span>
                        <span  class="fa <?php echo (((int)$result['ocena']>=5) ? $star: 'no'); ?>"  data-rating="5"></span>
<!--                             <input type="hidden" name="whatever1" class="rating-value" value="--><?php //echo $result['ocena'] ?><!--">-->
                    </p>



                    <p class="card-text">Data wystawienia: <?php echo $result['data_wystawienia'] ?></p>


                </div>
            </div>
        </div>
        <?php
    }
    ?>

</div>


<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-lg-12">-->
<!--            <div class="star-rating">-->
<!--                <span style="color:gold;" class="fa fa-star-o" data-rating="1"></span>-->
<!--                <span style="color:gold;" class="fa fa-star-o" data-rating="2"></span>-->
<!--                <span style="color:gold;" class="fa fa-star-o" data-rating="3"></span>-->
<!--                <span  style="color:gold;"class="fa fa-star-o" data-rating="4"></span>-->
<!--                <span style="color:gold;" class="fa fa-star-o" data-rating="5"></span>-->
<!--                <input type="hidden" name="whatever1" class="rating-value" value="5">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!---->
<!--</div>-->
<!--<script-->
<!--        src="https://code.jquery.com/jquery-3.4.1.min.js"-->
<!--        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="-->
<!--        crossorigin="anonymous"></script>-->
<!--<script>-->
<!---->
<!--    var $star_rating = $('.star-rating .fa');-->
<!---->
<!--    var SetRatingStar = function() {-->
<!--        return $star_rating.each(function() {-->
<!--            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {-->
<!--                return $(this).removeClass('fa-star-o').addClass('fa-star');-->
<!--            } else {-->
<!--                return $(this).removeClass('fa-star').addClass('fa-star-o');-->
<!--            }-->
<!--        });-->
<!--    };-->

<!--    // $star_rating.on('click', function() {-->
<!--    //     $star_rating.siblings('input.rating-value').val($(this).data('rating'));-->
<!--    //     return SetRatingStar();-->
<!--    // });-->
<!---->
<!--    SetRatingStar();-->
<!--    $(document).ready(function() {-->
<!---->
<!--    });-->
<!--// </script>-->
<!---->
<!---->
<!---->
<!--<p></p></br>-->
<?php
include('footer.php');

?>
