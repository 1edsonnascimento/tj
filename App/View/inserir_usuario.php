
<?php
$titulo = "xxxxxx";
    include 'Cabecalho.php';
?>
<?php include "../../vendor/autoload.php";
    include '../../vendor/autoload.php';
    $verifica = new App\Dao\LoginDao();
    $verifica->statusLogin();
?>




<?php
include 'Rodape.php';
?>