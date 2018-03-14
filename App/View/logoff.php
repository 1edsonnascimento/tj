<?php
include '../../vendor/autoload.php';
$logoff = new App\Dao\LoginDao();
$logoff->logoff();