<?php
//ESSE ARQUIVO ESTÁ SENDO CHAMADO NO ARQUIVO pesquisar_publicador.php-> com o id='consulta'

include '../../vendor/autoload.php';
$u = new App\Model\Usuario();
$u->setNome($_GET['nome']);
$uDao = new App\Dao\UsuarioDao();
$usuario = $uDao->pesquisaAjax($u);
echo "<table class='w3-table-all w3-hoverable'><tr class='w3-light-gray'><th>Código</th><th>Nome</th><th>CPF</th><th>Telefone</th><th></th><th></th></tr>";
foreach ($usuario as $value){
    echo "<tr>";
    echo "<td>{$value['idUsuario']}</td>";
    echo "<td>{$value['nome']}</td>";
    echo "<td>".\App\Helper::getCPF($value['cpf'])."</td>";
    echo "<td>{$value['telefone']}</td>";
    echo "<td><a href='alterar_publicador.php?idUsuario={$value['idUsuario']}'><button type='button' class='w3-button w3-yellow'>Alterar</button></a></td>";
    echo "<td><a href='excluir_publicador.php?idUsuario={$value['idUsuario']}'><button type='button' class='w3-button w3-red'>Excluir</button></a></td>";
    echo "</tr>";
}
echo "</table>";
//ARQUIVO PHP FUNCIONANDO CORRETAMENTE. NAO EXISTE TELA PARA ESSE ARQUIVO
?>