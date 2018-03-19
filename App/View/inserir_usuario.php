<?php
$titulo = "xxxxxx";
    include 'Cabecalho.php';
?>
<?php
    include '../../vendor/autoload.php';
    $verifica = new App\Dao\LoginDao();
    $verifica->statusLogin();
?>
<?php
    if($_POST) {
        $user = new App\Model\Login();
        $user->setUsername($_POST['username']);
        $user->setSenha($_POST['senha']);
        $user->setIdUsuario($_POST['idUsuario']);
        $user->setPermissoes($_POST['permissao']);

        $userDao = new App\Dao\LoginDao();
        if ($userDao->inserir($user)) {
            echo "<div class='animacaoServico'>Permissões concedidas com sucesso!!</div>";
        } else {
            echo "<div>Houve uma Falha</div>";
        }
    }
?>
<div class="main">
    <h2>Atribuir Permissões do Sistema para usuário</h2>
    <p>
        <label for="cpf"><b>CPF:</b></label>
        <input type="text" id="cpf" class="w3-input w3-border w3-sand" name="cpf" onchange="buscarCpf(this.value)">
    </p>
    <span id="msg"></span>
</div>

<?php
include 'Rodape.php';
?>