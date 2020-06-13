<?php
require_once "connectZ.php";
require_once('config.php');
include_once('menu-sprawdzanie.php');
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}
$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);

$zalogowany = $_SESSION['zalogowany'];
if ($zalogowany) {
    $student_id = $_SESSION['student_id'];
    $email = $_SESSION['email'];
    $imie = $_SESSION['imie'];
    $nazwisko = $_SESSION['nazwisko'];
    $uprawnienia = $_SESSION['uprawnienia'];
}
if (isset($_SESSION['calkowitaKwotaDoZaplaty'])) {
}
$studentId = $_SESSION['student_id'];
$query = "SELECT kurs.cena,
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
FROM student_has_kurs INNER JOIN
     student ON student_has_kurs.student_student_id = student.student_id INNER JOIN
     kurs ON student_has_kurs.kurs_kurs_id = kurs.kurs_id
     WHERE
     student_has_kurs.student_student_id = '$studentId'
    ";
?>
    <div class="container">
        <div class="col-4 text-center center-block">
            <a href="wszystkie-kursy.php">
                <button type="button" class="btn btn-success btn-lg btn-block m-4">
                    Zobacz więcej kursów
                </button>
            </a>
        </div>
        <?php
        $results = $db_connection->query($query);
        $cenaCalkowita = 0;
        foreach ($results as $result) {
            ?>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                        <b> <p class="card-text">Nazwa: <?php echo $result['nazwa'] ?></b></p>
                        <p class="card-text">Kurs id: <?php echo $result['kurs_kurs_id'] ?></p>
                        <p class="card-text">Cena: <?php echo $result['cena'] ?></p>

                        <p class="card-text">Ostatnia wplata:
                            <?php if((int)$result['ostatnia_wplata']) {
                                echo $result['ostatnia_wplata'] ;
                            }else {
                                echo ' ' . 'Brak '.  (int)$result['ostatnia_wplata'];
                            }
?>
                        </p>
                        <p class="card-text">Data zamówienia: <?php echo $result['data_utworzenia'] ?></p>

                        <p class="card-text">Odnawialny:
                            <?php if((int)$result['odnawialny']){
                             echo  'Tak';
                            }else {
                                echo  ' ' . 'Nie';
                            }
                          ?>
                        </p>
                        <p class="card-text">Oplacony:<b>
                                <?php if((int)$result['oplacony']==1){
                                    echo 'Tak';
                                    }else{
                                    echo 'Nie ' .(int)$result['oplacony'];
                                    }
                                 ?>
                            </b></p>
                        <p class="card-text"><b>
                                <?php if((int)$result['oplacony']==1)
                                {
                                    echo 'Kurs został już opłacony ' .(int)$result['oplacony'];
                                }
                                else{
                                    echo'Pozostało '.$result['cena'].'zł do zapłacenia';
                                }
                                         ?>
                                <?php if((int)$result['oplacony']==1){

                                }else{$cenaCalkowita += $result['cena'];
                                } ?>
                            </b></p>
                        <p>
                            <a style="color:white;" href="dodaj-opinie.php?kurs_id=<?php echo $result['kurs_kurs_id'] ?>
                               &amp;student_id=<?php echo $studentId ?>">
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

        ?>
    </div>
<div class="container">
    <h2>Dane do przelewu</h2>
    <p>
       <b>W tytule przelewu prodać email studenta oraz id kursu.</b>
    </p>
    <p>
       Numer Konta: 0000 1111 0000 1111 0000 1111
    </p>
    <p>
        Pozostało do zapaty:<b> <?php     echo  $cenaCalkowita;?></b>
    </p>
    <p>

       <p>Dziękujemy za zakupy, twój adres email  to: <b>   <?php
            if(isset($_SESSION['email'])){
                echo  $_SESSION['email'] .'</p> </b>';
                     echo 'Student ID: <b>' .  $student_id.'</b>';
                ;
        }else{
           echo  ' ' . 'nieznajomy';
        }
        echo ' ' . ($_SESSION["uprawnienia"] ? "</b><p>Uprawnienia:<b> " . $_SESSION['uprawnienia'] .'</p>': ' ' . 'Brak danych');

        ?>
        </b></p>

</div>
    </br><?php
include('footer.php');
$polaczenie->close();
include('zalogowany.php');
?>