<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo;?></title>
    <link rel="stylesheet" href="../../vendor/w3/estilo.css">
    <style>
        .animacaoServico {
            animation:animatezoom 0.6s;
        }
        @keyframes animatezoom{
            from{transform:scale(0)}
            to{transform:scale(1)}}
    </style>
</head>
<body>
    <div class="w3-container">
    <?php
    session_start();
          include 'Navegador.php';
          $nav = new \App\View\Navegador($_SESSION['permissoes'],$_SESSION['nome']);
          echo $nav->getNavegador();
    ?>
