<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $titulo;?></title>
    <link rel="stylesheet" href="../../vendor/w3/estilo.css">
    <script src="../../vendor/w3/javascript.js"></script>
    <style>
        #miolo{
            margin: 5% auto;
            padding: 20px;
            min-height: 200px;
            width: 400px;
            box-shadow: 0px 0px 50px #9e9c9e;
        }
    </style>
</head>
<body>
<?php
if($_POST){
    include '../../vendor/autoload.php';
    $log = new App\Model\Login();
    $log->setUsername($_POST['username']);
    $log->setSenha($_POST['senha']);
    $logDao = new App\Dao\LoginDao();
    if($logDao->logar($log))
        header("Location: inicio.php");
}
?>
<div class="w3-container">
    <h1 style="text-align: center">Cadastro de Publicadores</h1>
</div>
<div id="miolo" class="w3-card-4">
    <div class="w3-container w3-green">
        <h5 style="text-align: center">Relatórios das Atividades dos Publicadores</h5>
    </div>
    <form class="w3-container" action="login.php" method="post">
        <p>
            <input type="text" id="username" name="username" class="w3-input">
            <label for="username">Usuário</label>
        </p>
        <p>
            <input type="password" id="senha" name="senha" class="w3-input">
            <label for="senha">Senha</label>
        </p>
        <p><input type="submit" value="Acessar" class="w3-btn w3-teal"></p>
    </form>
</div>
</body>
</html>