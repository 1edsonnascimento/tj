<?php
//ESSE ARQUIVO ESTÁ SENDO CHAMADO NO ARQUIVO pesquisar_relatorio.php-> com o id='data'
include '../../vendor/autoload.php';

$dtIni = $_GET['dtIni'];
$dtFin = $_GET['dtFin'];

$u = new App\Model\Usuario();
$u->setNome($_GET['dtNome']);

$uDao = new App\Dao\RelatorioDao();
$lista = $uDao->consultar_por_Data($u,$dtIni,$dtFin);
if($lista > 0){
    $qtdPub = 0; $qtdVid = 0; $qtdHor = 0; $qtdVis = 0;
    echo "<table id='tabela_criada' class='w3-table-all w3-hoverable'><tr><th>ID</th><th>Publicações</th><th>Videos</th><th>Horas</th><th>visitas</th><th>Estudos</th><th>Data</th><th></th><th></th></tr>";
    foreach ($lista as $item){
        echo "<tr>";
        echo "<td>{$item['idRelatorio']}</td>";
        echo "<td>{$item['publicacoes']}</td>";
        echo "<td>{$item['videos']}</td>";
        echo "<td>{$item['horas']}</td>";
        echo "<td>{$item['visitas']}</td>";
        echo "<td>{$item['estudos']}</td>";
        echo "<td>".App\Helper::getData($item['dat'])."</td>";
        echo "<td><button type='button' class='w3-btn w3-yellow' onclick='alterar_relatorio({$item['idRelatorio']});'>Alterar</button></td>";
        echo "<td><button type='button' class='w3-btn w3-red' onclick='excluir_relatorio({$item['idRelatorio']},this.parentNode.parentNode.rowIndex);'>Excluir</button></td>";
        echo "</tr>";
        $qtdPub += $item['publicacoes'];
        $qtdVid += $item['videos'];
        $qtdHor += $item['horas'];
        $qtdVis += $item['visitas'];
    }
    echo "<tr><td></td><td><b>{$qtdPub}</b></td><td><b>{$qtdVid}</b></td><td><b>{$qtdHor}</b></td><td><b>{$qtdVis}</b></td><td><b>****</b></td><td><b>*****</b></td></tr>";
    echo "</table>";
}

