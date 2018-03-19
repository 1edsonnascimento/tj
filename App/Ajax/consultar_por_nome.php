<?php
//ESSE ARQUIVO ESTÁ SENDO CHAMADO NO ARQUIVO pesquisar_relatorio.php-> com o id=''
include '../../vendor/autoload.php';
$nome = $_GET['nome'];

$u = new App\Model\Usuario();
$u->setNome($nome);
$uDao = new App\Dao\RelatorioDao();
$lista = $uDao->consultar_por_Nome($u);
if($lista > 0){
    $qtdPub = 0; $qtdVid = 0; $qtdHor = 0; $qtdVis = 0;
    echo "<table id='tabela_criada' class='w3-table-all w3-hoverable'><tr><th><b>ID</b></th><th>Publicações</th><th>Videos</th><th>Horas</th><th>visitas</th><th>Estudos</th><th>Data</th><th></th><th></th></tr>";
    foreach ($lista as $item){
        echo "<tr>";
        echo "<td>{$item['idRelatorio']}</td>";
        echo "<td>{$item['publicacoes']}</td>";
        echo "<td>{$item['videos']}</td>";
        echo "<td>{$item['horas']}</td>";
        echo "<td>{$item['visitas']}</td>";
        echo "<td>{$item['estudos']}</td>";
        echo "<td>{$item['dat']}</td>";
        echo "<td><button type='button' class='w3-btn w3-yellow' onclick='alterar_relatorio({$item['idRelatorio']})'>Alterar</button></td>";
        echo "<td><button type='button' class='w3-btn w3-red' onclick='excluir_relatorio({$item['idRelatorio']},this.parentNode.parentNode.rowIndex)'>Excluir</button></td>";
        echo "</tr>";
        $qtdPub += $item['publicacoes'];
        $qtdVid += $item['videos'];
        $qtdHor += $item['horas'];
        $qtdVis += $item['visitas'];
    }
    echo "<tr><td></td><td><b>{$qtdPub}</b></td><td><b>{$qtdVid}</b></td><td><b>{$qtdHor}</b></td><td><b>{$qtdVis}</b></td><td><b>****</b></td><td><b>*****</b></td></tr>";
    echo "</table>";
}


