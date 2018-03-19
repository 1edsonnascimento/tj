<?php
$titulo = "Tela de Cadastro de Publicador";
include 'Cabecalho.php';
?>
<?php
include '../../vendor/autoload.php';
$verifica = new App\Dao\LoginDao();
$verifica->statusLogin();
?>
 <div class="main">
    <div class="w3-container w3-brown">
        <h5 style="text-align: center">Registro de Novo Publicador</h5>
    </div>
    <?php
    if($_POST){
        $pub = new App\Model\Usuario();
        !empty($_POST['nome'])?$pub->setNome($_POST['nome']):$pub->setNome(null);
        if(!empty($_POST['cpf']) && \App\Helper::validaCPF(\App\Helper::setCPF($_POST['cpf']))){
            $pub->setCpf(\App\Helper::setCPF($_POST['cpf']));
        }else{
            $pub->setCpf(null);
        }
        $pub->setLogradouro(isset($_POST['logradouro'])? $_POST['logradouro'] : null);
        $pub->setEndereco(isset($_POST['descricao'])? $_POST['descricao'] : null);
        $pub->setNumero(isset($_POST['numero'])? $_POST['numero'] : null);
        $pub->setBairro(isset($_POST['bairro'])? $_POST['bairro'] : null);
        $pub->setCidade(isset($_POST['cidade'])? $_POST['cidade'] : null);
        $pub->setUf(isset($_POST['uf'])? $_POST['uf'] : null);
        $pub->setCep(isset($_POST['cep'])? $_POST['cep'] : null);
        $pub->setCircuito(isset($_POST['circuito'])? $_POST['circuito'] : null);
        $pub->setDtBatismo(!empty($_POST['dtBatismo'])?\App\Helper::setData($_POST['dtBatismo']):null);
        $pub->setDtNascimento(!empty($_POST['dtNascimento'])?\App\Helper::setData($_POST['dtNascimento']):null);
        $pub->setTelefone((isset($_POST['tel']) && strlen($_POST['tel']) <= 15) ? $_POST['tel'] : null);
        $pub->setStatus(isset($_POST['status']) ? $_POST['status'] : "Ativo");
        $pub->setObs(isset($_POST['obs']) ? $_POST['obs'] : null);
        //o if abaixo só será realizado em caso do usuario dar uma de sabidao e retirar o required do campo nome
        if($pub->getNome()==null) {
            if($pub->getNome()==null) {
                echo "<div class='animacaoServico w3-panel w3-yellow w3-topbar w3-bottombar w3-amber'><h5 style='text-align: center'>O campo de nome deve ter o atributo 'required'</h5></div>";
            }
        } else{
            $uDao = new App\Dao\UsuarioDao();
            if($uDao->inserir($pub))
                echo "<div class='animacaoServico w3-panel w3-pale-green w3-border-green w3-border'><h5 style='text-align: center'>Cadastro Realizado com Sucesso!!!</h5></div>";
        }
    }

    ?>
    <form class="w3-container" action="inserir_publicador.php" method="post">
        <?php $class = 'class="w3-input w3-border w3-sand"';?>
        <p class="w3-half w3-row-padding">
            <label for="nome"><b>Nome: *</b></label>
            <input type="text" id="nome" name="nome" <?php echo $class;?> autofocus required maxlength="100">
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="cpf"><b>CPF</b></label>
            <input type="text" id="cpf" name="cpf" <?php echo $class;?> maxlength="14" onchange="CP(this.value)">
        </p>
        <p class="w3-quarter w3-row-padding">
            <label><b>Logradouro:</b></label>
            <select class="w3-select  w3-border w3-sand" name="logradouro">
                <option value="Rua" selected>Rua</option>
                <option value="Avenida">Avenida</option>
                <option value="Outros">Outros</option>
            </select>
        </p>
        <p class="w3-half w3-row-padding">
            <label for="descricao"><b>Descrição:</b></label>
            <input type="text" id="descricao" name="descricao" <?php echo $class;?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="numero"><b>Numero:</b></label>
            <input type="text" id="numero" name="numero" <?php echo $class;?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="bairro"><b>Bairro:</b></label>
            <input type="text" id="bairro" name="bairro" <?php echo $class;?> maxlength="100">
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="cidade"><b>Cidade:</b></label>
            <input type="text" id="cidade" name="cidade" <?php echo $class;?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="uf"><b>Estado:</b></label>
            <input type="text" id="uf" name="uf" <?php echo $class;?> maxlength="20">
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="cep"><b>CEP:</b></label>
            <input type="text" id="cep" name="cep" <?php echo $class;?> maxlength="10">
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="circuito"><b>Circuito:</b></label>
            <input type="text" id="circuito" name="circuito" <?php echo $class;?> maxlength="10">
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="dtBatismo"><b>Data de Batismo:</b></label>
            <input type="date" id="dtBatismo" name="dtBatismo" <?php echo $class;?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="dtNascimento"><b>Data de Nascimento:</b></label>
            <input type="date" id="dtNascimento" name="dtNascimento" <?php echo $class;?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="tel"><b>Telefone:</b></label>
            <input type="tel" id="tel" name="tel" <?php echo $class;?> maxlength="15">
        </p>
        <p class="w3-quarter w3-row-padding">
            <label for="ativo">Ativo</label>
            <input class="w3-radio" type="radio" id="ativo" name="status" value="Ativo" checked>
            <label for="ativo">Inativo</label>
            <input class="w3-radio" type="radio" id="inativo" name="status" value="Inativo">
        </p>
        <p>
            <label for="obs"><b>Observações:</b></label>
            <textarea rows="3" id="obs" name="obs" <?php echo $class;?>></textarea>
        </p>
        <p><input type="submit" value="Salvar" class="w3-btn w3-brown"></p>
        <p><h5><span style="color:red;">*</span> Campos Obrigatório.</h5></p>
    </form>
 </div>
<?php
include 'Rodape.php';
?>
