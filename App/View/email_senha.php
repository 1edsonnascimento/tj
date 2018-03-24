
<?php
$titulo = "Tela de Consulta de Publicador";
include 'Cabecalho.php';
?>
<?php
include '../../vendor/autoload.php';
$verifica = new App\Dao\LoginDao();
$verifica->statusLogin();
?>

<?php
if($_POST)
{
    $usuario = new App\Model\Login();
    $usuario->setIdUsuario($_SESSION['idLogin']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $udao = new App\Dao\LoginDao();
    if($_POST['senha']==$_POST['confirmarSenha']){
        if($udao->alterar_email_senha($usuario))
            echo "<div class='animacaoServico w3-panel w3-pale-green w3-border-green w3-border'>Alterado Com sucesso!!</div>";
    }

}
?>
<div class="main">
    <h1>Minha Senha e Email:</h1>
    <form action="email_senha.php" method="post">
        <p class="w3-third w3-row-padding">
            <label>Email:</label>
            <input type="email" id="email" name="email" class="w3-input w3-border w3-sand" required>
        </p>
        <p class="w3-third w3-row-padding">
            <label>Senha:</label>
            <input type="password" id="senha" name="senha" class="w3-input w3-border w3-sand" required>
        </p>
        <p class="w3-third w3-row-padding">
            <label>Confirme a Senha:</label>
            <input type="password" id="confirmarSenha" name="confirmarSenha" class="w3-input w3-border w3-sand" required>
        </p>
        <p class="w3-quarter w3-row-padding">
            <input type="submit" value="Salvar" class="w3-btn w3-brown">
        </p>
    </form>
</div>

<?php
include 'Rodape.php'
?>
