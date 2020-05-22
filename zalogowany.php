<?php
if (isset($_SESSION['zalogowany'])){

}else{
    ?>
    <script>
        window.location = "http://localhost/szkola_jezykow_03_3/";
    </script>
    <?php
}