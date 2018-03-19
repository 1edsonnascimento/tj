<?php
include '../../vendor/autoload.php';
$r = $_GET['idRelatorio'];

$rel = new App\Model\Relatorio();
$rel->setIdRelatorio($r);
$relDao = new App\Dao\RelatorioDao();
if($relDao->excluir_relatorio($rel)){
    echo "<h2>Excluido com sucesso!!</h2>";
}else{
    echo "<h2>Erro na Exclusao</h2>";
}
//TRABALHAR NA CAPUTRA DAS MENSAGENS DE RETORNO