<?php
include_once('menu-start.php');

$isSessionActive = defined('SID');
if (!$isSessionActive) {
    session_start();
}


if (isset($_SESSION['zalogowany'])) {

    header('Location: witaj.php');

}


//if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
//	{
//		header('Location: witaj.php');
//		exit();
//	}

?>


<?php

//include('menu.php');
?>
<div class="logowanieRejestracja">
<a  href="rejestracjaZ.php">Rejestracja - załóż konto</a>
</div>
<div class="logowanie">
<br/><br/>


<br/><br/>

<form action="zalogujZ.php" method="post" class="col-md-4 center">

    Login: <br/> <input type="text" name="login" class="form-control"/> <br/>
    Hasło: <br/> <input type="password" name="haslo" class="form-control"/> <br/><br/>
    <input type="submit" value="Zaloguj się" class="przyciskZaloguj"/>

</form>
</div>
<!--<form>-->
<!--    <div class="form-group">-->
<!--        <label for="exampleInputEmail1">Email address</label>-->
<!--        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">-->
<!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label for="exampleInputPassword1">Password</label>-->
<!--        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">-->
<!--    </div>-->
<!--    <div class="form-check">-->
<!--        <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--        <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--    </div>-->
<!--    <button type="submit" class="btn btn-primary">Submit</button>-->
<!--</form>-->
<?php
if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
?>

<?php include('footer.php'); ?>
</body>
</html>