
<?php
    $titulo = "Tela de Consulta de Publicador";
    include 'Cabecalho.php';
?>
<?php include "../../vendor/autoload.php";
    include '../../vendor/autoload.php';
    $verifica = new App\Dao\LoginDao();
    $verifica->statusLogin();
?>
<div id="corpo" style="min-height: 500px">
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
        <input type="text" id="consulta" class="w3-input" onkeyup="consultar(this.value)" autofocus>
        <label>Nome</label>

    <br>
    <div class="w3-container" id="tabela"></div>
    <script>
        function consultar(nome){
            if(nome == ""){
                document.getElementById("tabela").innerHTML = "<h5>Nenhum Nome Inserido</h5>";
                return false;
            }else{
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function () {
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById("tabela").innerHTML = this.responseText;
                    }
                }
                xml.open("GET","consulta_usuario_ajax.php?nome="+nome,true);
                xml.send();
            }
        }
    </script>
</div>
<?php
    include 'Rodape.php'
?>
