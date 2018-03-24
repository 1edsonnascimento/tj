
<?php
    $titulo = "Tela de Consulta de Publicador";
    include 'Cabecalho.php';
?>
<?php
    include '../../vendor/autoload.php';
    $verifica = new App\Dao\LoginDao();
    $verifica->statusLogin();
?>
<div class="main">
    <div class="w3-container">
        <h3>Consultar Dados dos Publicadores</h3>
    </div>
    <?php
        if($_GET && $_GET['msg']=="1"){
            echo "<div class='animacaoServico w3-panel w3-pale-green w3-border-green w3-border'><h5>Publicador Excluido com Sucesso!!</h5></div>";
        }
        if($_GET && $_GET['msg']=="2"){
            echo "<div class='animacaoServico w3-panel w3-pale-yellow w3-border-yellow w3-border'><h5>Alterações feitas com Sucesso!!</h5></div>";
        }
    ?>
    <p>
        <label for="nome"><b>Nome: *</b></label>
        <input type="text" id="consulta" name="consulta" onkeyup="consultar(this.value)" style="width: 80%" autofocus>
    </p>

    <br>
    <div class="w3-container" id="tabela"></div>
</div>
<?php
    include 'Rodape.php'
?>
