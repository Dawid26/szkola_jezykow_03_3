<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}


$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);

//echo $zalogowany;

//$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
$zalogowany = $_SESSION['zalogowany'];
if ($zalogowany) {
    //header('Location: indexZ.php');
    //echo 'zalogowany';
    //exit();
    $student_id = $_SESSION['student_id'];
    $email = $_SESSION['email'];
    $imie = $_SESSION['imie'];
    $nazwisko = $_SESSION['nazwisko'];
    $uprawnienia = $_SESSION['uprawnienia'];
}


if(isset($_SESSION['calkowitaKwotaDoZaplaty'])){
//    $calkowitaKwotaDoZaplaty = $_SESSION['calkowitaKwotaDoZaplaty'];
}
//echo 'student id =' . $student_id . ',,';


$studentId = $_SESSION['student_id'];


$query = "Select kurs.cena,
       kurs.nazwa,
       student.imie,
       student.email,
       student_has_kurs.kurs_kurs_id,
       student_has_kurs.student_student_id,
       student_has_kurs.ostatnia_wplata,
       student_has_kurs.data_utworzenia,
       student_has_kurs.odnawialny,
       student_has_kurs.ostatnia_naleznosc,
       student_has_kurs.oplacony
From student_has_kurs Inner Join
     student On student_has_kurs.student_student_id = student.student_id Inner Join
     kurs On student_has_kurs.kurs_kurs_id = kurs.kurs_id
     WHERE
     student_has_kurs.student_student_id = '$studentId'
    ";

//$query2 ="Select count(kurs_kurs_id)  From student_has_kurs WHERE student_has_kurs.student_student_id = '$studentId'";
//$count = 1;
//$liczbaKursow=0 ;
?>
<div class="container">
    <div class="col-4 text-center center-block">
        <a href="wszystkie-kursy.php">
            <!--                <button style="color:white;text-align:center;background-color: lightblue;" class="col-4 p-3">-->
            <!--                    Wszystkie kursy-->
            <!--                </button>-->
            <button type="button" class="btn btn-success btn-lg btn-block m-4">
                Zobacz więcej kursów
            </button>
        </a>
    </div>
    <?php
    $results = $db_connection->query($query);
//    $nRows = $db_connection->query($query2)->fetchColumn();
//    echo '$nRows'.$nRows;

    foreach ($results as $result) {
        ?>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">

                <div class="card-body">

                    <p class="card-text">nazwa:<b> <?php echo $result['nazwa'] ?></b></p>
<!--                    <p class="card-text">$count:<b> --><?php //echo $count?><!--</b></p>-->
                    <p class="card-text">Kurs id: <?php echo $result['kurs_kurs_id'] ?></p>
                    <p class="card-text">Cena: <?php echo $result['cena'] ?></p>
                    <p class="card-text">Ostatniawplata: <?php echo $result['ostatnia_wplata'] ?></p>
                    <p class="card-text">Data zamówienia: <?php echo $result['data_utworzenia'] ?></p>

                    <p class="card-text">odnawialny:
                        <?php echo ' ' . ($result['odnawialny'] ? $result['odnawialny'] : ' ' . 'Nie'); ?>
                    </p>
                    <p class="card-text">ostatnia naleznosc:
                        <?php echo ' ' . ($result['ostatnia_naleznosc'] ? $result['ostatnia_naleznosc'] : 'Brak') . ''; ?>
                    </p>
                    <p class="card-text"><b>oplacony:
                        <?php echo ' ' . ($result['oplacony'] ? $result['oplacony'] : 'Nie') . ''; ?>
                        </b> </p>
                    <?php
//                    if ($result['cena'] && !$result['oplacony']) {
//
//                          $count++;
//                        if ($count > $nRows){
//                            $_SESSION['calkowitaKwotaDoZaplaty'] += $result['cena'];
//                        }
//
//
//                    } ?>
                    <p class="card-text"><b>Pozostało do zapacenia:
                        <?php echo ' ' . (!$result['oplacony'] ? $result['cena'] : 'Brak zadłużenia') . ''; ?>
                        </b>   </p>
                    <!--                <p class="card-text">Pozostało do zapacenia:-->
                    <!--                    --><?php //echo ' ' . (isset($kwotaDoZaplaty) ? $kwotaDoZaplaty : 'Brak zadłużenia') . ''; ?>
                    <!--                </p>-->
                    <p>
                        <a style="color:white;" href="dodaj-opinie.php?kurs_id=<?php echo $result['kurs_kurs_id'] ?>&amp;student_id=<?php echo $studentId ?>">
                            <button type="submit" class="btn btn-primary mt-2 ml-1">

                                Dodaj Opinie

                            </button>
                        </a>
                    </p>
                </div>
            </div>

        </div>
        <?php
    }

//    if($liczbaKursow >= count){
//
//    }


//
//    $calkowitaKwotaDoZaplaty2 = $_SESSION['calkowitaKwotaDoZaplaty'] ;

//    echo ' $liczbaKursow' .$liczbaKursow;
//   echo ' $count' .$count;
//    echo '$calkowitaKwotaDoZaplaty2' . $calkowitaKwotaDoZaplaty2;
//    echo ' $count' .$count;
//    echo ' <p class="card-text"><b>Calkowita kwota do Zaplaty: ' . (isset($calkowitaKwotaDoZaplaty)&& $liczbaKursow==$count? $calkowitaKwotaDoZaplaty : 'Brak zadłużenia') . '';
//    echo "</b><p><b>Numer Konta: 0000 1111 0000 1111 0000 1111</b>  </p>";
    ?>

</div>
<p></p></br><?php
include('footer.php');
$polaczenie->close();
?>
