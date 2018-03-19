<?php
//ARQUIVO ESTÁ SENDO REFERENCIADO NO VIEW/INSERIR_USUARIO->QUANDO DIGITA O CPF TEM UM ONCHANGE PARA FAZER A BUSCA NO BANCO E RETORNAR ESSE ARQUIVO.

include '../../vendor/autoload.php';

$cpf = $_GET['cpf'];
$u = new App\Model\Usuario();
$u->setCpf($cpf);
$udao = new App\Dao\UsuarioDao();
$res = $udao->consulta_cpf($u);

$class = 'class="w3-input w3-border w3-sand"';

echo '<form action="../View/inserir_usuario.php" method="post">                     
            <p class="w3-quarter w3-row-padding">
                <label for="idUsuario"><b>idUsuario:*</b></label>
                <input type="text" id="idUsuario" ' .$class.' name="idUsuario" value="'.$res['idUsuario'].'" required>
            </p>
            <p class="w3-half w3-row-padding">
                <label for="nome"><b>Nome:*</b></label>
                <input type="text" id="nome" '.$class.' name="nome" value="'.$res['nome'].'" required>
            </p>
            <p class="w3-quarter w3-row-padding">
                <label for="cpf"><b>CPF:*</b></label>
                <input type="text" id="nome" '.$class.' name="nome" value="'.App\Helper::getCPF($res['cpf']).'" required>
            </p>
            <p class="w3-quarter w3-row-padding">
                <label for="username"><b>Username:*</b></label>
                <input type="text" id="username" '.$class.' name="username" required>
            </p>          
            <p class="w3-quarter w3-row-padding">
                <label for="senha"><b>Senha:*</b></label>
                <input type="text" id="senha" '.$class.' name="senha" required>
            </p>
            <p class="w3-quarter w3-row-padding">
                <label for="confirSenha"><b>Confirme a Senha:*</b></label>
                <input type="text" id="confirSenha" '.$class.' name="confirSenha" required>
            </p>
            <p class="w3-row-padding">
                <fieldset><legend><b>Permissões:*</b></legend>                    
                    <input class="w3-radio" type="radio" name="permissao" value="1">
                    <label>Permissão 1</label><br><br>
                    
                    <input class="w3-radio" type="radio" name="permissao" value="2" checked>
                    <label>Permissão 2</label><br><br>
                    
                    <input class="w3-radio" type="radio" name="permissao" value="3">
                    <label>Permissão 3</label><br><br>
                </fieldset>
            </p>
            <p>
                <input type="submit" value="Salvar" class="w3-btn w3-brown">
            </p>
            <p><b>* - Campo Obrigatório</b></p>
        </form>';