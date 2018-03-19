<?php
$titulo = "XXXXXXXXXX";
    include 'Cabecalho.php';
?>
<?php
    include '../../vendor/autoload.php';
    $verifica = new App\Dao\LoginDao();
    $verifica->statusLogin();

    if($_POST){
        //essa $class abaixo está nas mensagens de alerta no final desse if
        $class = "class='animacaoServico w3-panel w3-yellow w3-topbar w3-bottombar w3-amber w3-center'";

        $pub = new \App\Model\Usuario();
        $pub->setIdUsuario($_POST['idUsuario']);
        $pub->setNome(!empty($_POST['nome'])?$_POST['nome']:null);
        $pub->setCpf(!empty($_POST['cpf']) && (App\Helper::validaCPF(App\Helper::setCPF($_POST['cpf'])))? App\Helper::setCPF($_POST['cpf']):null);
        $pub->setLogradouro(!empty($_POST['logradouro'])? $_POST['logradouro'] : null);
        $pub->setEndereco(!empty($_POST['descricao'])? $_POST['descricao'] : null);
        $pub->setNumero(!empty($_POST['numero'])? $_POST['numero'] : null);
        $pub->setBairro(!empty($_POST['bairro'])? $_POST['bairro'] : null);
        $pub->setCidade(!empty($_POST['cidade'])? $_POST['cidade'] : null);
        $pub->setUf(!empty($_POST['uf'])? $_POST['uf'] : null);
        $pub->setCep(!empty($_POST['cep'])? $_POST['cep'] : null);
        $pub->setCircuito(!empty($_POST['circuito'])? $_POST['circuito'] : null);
        $pub->setDtBatismo(!empty($_POST['dtBatismo'])?\App\Helper::setData($_POST['dtBatismo']):null);
        $pub->setDtNascimento(!empty($_POST['dtNascimento'])?\App\Helper::setData($_POST['dtNascimento']):null);
        $pub->setTelefone((!empty($_POST['tel']) && strlen($_POST['tel']) <= 15) ? $_POST['tel'] : null);
        $pub->setStatus(!empty($_POST['status']) ? $_POST['status'] : "Ativo");
        $pub->setObs(!empty($_POST['obs']) ? $_POST['obs'] : null);
        //o if abaixo só será realizado em caso do usuario dar uma de sabidao e retirar o required do campo nome
        if($pub->getNome()==null || $pub->getCpf()==null) {
            if($pub->getNome()==null) {
                echo "<div ".$class."><h5>O campo de nome deve ter o atributo 'required'</h5></div>";
            }else if($pub->getCpf()==null){
                echo "<div ".$class."><h5>O CPF É INVÁLIDO</h5></div>";
            }
        } else {
            $pd = new App\Dao\UsuarioDao();
            if ($pd->alterar($pub))
                header("Location: pesquisar_publicador.php?msg=2");
        }
    }
        $p = new App\Model\Usuario();
        $p->setIdUsuario(isset($_GET)? $_GET['idUsuario'] : $_POST['idUsuario']);
        $pdao = new \App\DAO\UsuarioDao();
        $u = $pdao->pesquisar($p);


?>
<div class="main">
    <form class="w3-container" action="alterar_publicador.php" method="post">
        <?php $class = 'class="w3-input w3-border w3-sand"';?>
          <p class="w3-third w3-row-padding">
            <label for="idUsuario"><b>Código: *</b></label>
            <input type="text" id="idUsuario" name="idUsuario" <?php echo $class;?> value="<?php echo $u['idUsuario'] ?>" autofocus required>
          </p>
          <p class="w3-rest w3-row-padding">
            <label for="nome"><b>Nome: *</b></label>
            <input type="text" id="nome" name="nome" <?php echo $class;?> value="<?php echo $u['nome'] ?>" autofocus required maxlength="100">
          </p>

        <p class="w3-third w3-row-padding">
            <label for="senha"><b>CPF</b></label>
            <input type="text" id="cpf" name="cpf" <?php echo $class;?>  value="<?php echo \App\Helper::getCPF($u['cpf']) ?>" maxlength="14" onchange="CP(this.value)">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="Logradouro">Logradouro:</label>
            <select class="w3-select  w3-border w3-sand" name="logradouro"">
                <?php
                    $log = array("Rua","Avenida","Outros");
                    foreach($log as $value){
                       if($value == $u['logradouro']){
                           echo "<option value='{$value}' selected>{$value}</option>";
                       }else{
                           echo "<option value='{$value}'>{$value}</option>";
                       }
                    }
                ?>
            </select>
        </p>
        <p class="w3-third w3-row-padding">
            <label for="descricao"><b>Endereço:</b></label>
            <input type="text" id="descricao" name="descricao" <?php echo $class;?> value="<?php echo $u['endereco'];?>">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="numero"><b>Numero:</b></label>
            <input type="text" id="numero" name="numero" <?php echo $class;?> value="<?php echo $u['numero'];?>">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="bairro"><b>Bairro:</b></label>
            <input type="text" id="bairro" name="bairro" <?php echo $class;?> value="<?php echo $u['bairro'];?>" maxlength="100">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="cidade"><b>Cidade:</b></label>
            <input type="text" id="cidade" name="cidade" <?php echo $class;?> value="<?php echo $u['cidade'] ?>">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="uf"><b>Estado:</b></label>
            <input type="text" id="uf" name="uf" <?php echo $class;?> value="<?php echo $u['uf'] ?>" maxlength="20">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="cep"><b>CEP:</b></label>
            <input type="text" id="cep" name="cep" <?php echo $class;?>  value="<?php echo $u['cep'] ?>"maxlength="10">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="circuito"><b>Circuito:</b></label>
            <input type="text" id="circuito" name="circuito" <?php echo $class;?> value="<?php echo $u['circuito'] ?>" maxlength="10">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="dtBatismo"><b>Data de Batismo:</b></label>
            <input type="date" id="dtBatismo" name="dtBatismo" <?php echo $class;?> value="<?php echo ($u['dtBatismo']==null)? "" :\App\Helper::setData($u['dtBatismo']);?>">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="dtNascimento"><b>Data de Nascimento:</b></label>
            <input type="date" id="dtNascimento" name="dtNascimento" <?php echo $class;?> value="<?php echo ($u['dtNascimento']==null)? "" :\App\Helper::setData($u['dtNascimento']);?>">
        </p>
        <p class="w3-third w3-row-padding">
            <label for="tel"><b>Telefone:</b></label>
            <input type="tel" id="tel" name="tel" <?php echo $class;?> value="<?php echo $u['telefone'];?>" maxlength="15">
        </p>
        <p class="w3-row-padding">
            <?php
            if($u['status']=="ativo") {
                echo '<label for="ativo">Ativo</label>           
                        <input class="w3-radio" type="radio" id="ativo" name="status" value="Ativo" checked>
                        <label for="ativo">Inativo</label>
                        <input class="w3-radio" type="radio" id="inativo" name="status" value="Inativo">';
            }else{
                echo '<label for="ativo">Ativo</label>           
                        <input class="w3-radio" type="radio" id="ativo" name="status" value="Ativo">
                        <label for="ativo">Inativo</label>
                        <input class="w3-radio" type="radio" id="inativo" name="status" value="Inativo" checked>';
            }
                ?>
        </p>
        <p>
            <label for="obs"><b>Observações:</b></label>
            <textarea rows="3" id="obs" name="obs" <?php echo $class;?>><?php echo $u['obs']?></textarea>
        </p>
        <p><input type="submit" value="Salvar" class="w3-btn w3-brown"></p>
        <p><h5><span style="color:red;">*</span> Campos Obrigatório.</h5></p>
    </form>
</div>
<?php
    include 'Rodape.php';
?>