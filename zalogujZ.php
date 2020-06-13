<?php
$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}
if (isset($_SESSION['zalogowany'])) {
    header('Location: witaj.php');
}
require_once "connectZ.php";
require_once('config.php');
require_once('menu-sprawdzanie.php');


//	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
//	{
//		header('Location: indexZ.php');
//		exit();
//	}


$polaczenie = new mysqli($db_host, $db_username, $db_password, $db_name);
//potem dodać @new mysqli
if ($polaczenie->connect_errno != 0) {
    echo "Error: " . $polaczenie->connect_errno . "opis" . $polaczenie->connect_error;
    //potem usunać"opis" .$polaczenie->connect_error;
} else {
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
        // header('Location: witaj.php');

    }
    if (isset($_POST['haslo'])) {
        $haslo = $_POST['haslo'];
        // header('Location: witaj.php');

    }


//        $_SESSION['akcje'] = $_POST['akcje'];
//        $_SESSION['haslo'] = $_POST['haslo'];

//$login="";
    if (isset($login)) {
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        // header('Location: witaj.php');

    }


    // dodac = @$polaczenie
    if ($rezultat = $polaczenie->query(
        sprintf("SELECT * FROM student WHERE email='%s'",
            mysqli_real_escape_string($polaczenie, $login)))) {
        $ilu_userow = $rezultat->num_rows;
        if ($ilu_userow > 0) {
            $wiersz = $rezultat->fetch_assoc();
            //  $sql = "SEKECT * FROM student WHERE email='$akcje' AND haslo='$haslo'";
            //	$student =$wiersz['imie'];
            //     $_SESSION['student'] = $student;
            //	echo $student;
            if (password_verify($haslo, $wiersz['haslo'])) {
                $_SESSION['zalogowany'] = true;
                $_SESSION['student_id'] = $wiersz['student_id'];
                $_SESSION['email'] = $wiersz['email'];
                $_SESSION['imie'] = $wiersz['imie'];
                $_SESSION['nazwisko'] = $wiersz['nazwisko'];
                $_SESSION['uprawnienia'] = $wiersz['uprawnienia'];
                //  $_SESSION['kurs_kurs_id'] = $wiersz['kurs_kurs_id'];
                $studentId = $_SESSION['student_id'];
//					$_SESSION['drewno'] = $wiersz['drewno'];
//					$_SESSION['kamien'] = $wiersz['kamien'];
//					$_SESSION['zboze'] = $wiersz['zboze'];
//					$_SESSION['email'] = $wiersz['email'];
//					$_SESSION['dnipremium'] = $wiersz['dnipremium'];

                unset($_SESSION['blad']);
                $rezultat->free_result();
                //	header('Location: lista-studenci.php');
            } else {
                $_SESSION['blad'] = ' <span style="color:red">Nieprawidłowy email lub hasło!</span>';
                header('Location: indexZ.php');
            }

        } else {

            $_SESSION['blad'] = ' <span style="color:red">Nieprawidłowy email lub hasło!</span>';
            header('Location: indexZ.php');

        }

    }


    if (isset($_POST['student_id'])) {
        $studentId = $_SESSION['student_id'];
        header('Location: witaj.php');

    }

//	$query = "Select
//    fiszki.fiszki_id,
//    fiszki.nazwa,
//    fiszki.opis,
//    fiszki.zdjecie
//  From
//    fiszki where fiszki.fiszki_id = '$kurs_kurs_id';
//    ";


    //$results = $db_connection->query($query);


}
//include('menu.php');

?>
<?php

//foreach($results as $result){
//	?//>
//	<div class="col-md-4">
//		<div class="card mb-4 box-shadow">
/*			<img class="card-img-top" src="<?php echo $result['zdjecie'] ?>">*/
//			<div class="card-body">
//				<p class="card-text"><?php echo $result['nazwa'] ?><!--</p>-->
<!--				<p class="card-text">--><? //php //echo $result['opis'] ?><!--</p>-->

<!--			</div>-->
<!--		</div>-->
<!--	</div>}-->

<?php
if (isset($_SESSION['zalogowany'])) {

    header('Location: witaj.php');
}
$polaczenie->close();

include('footer.php');

