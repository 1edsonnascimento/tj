<?php
$titulo = "Tela de Cadastro de Publicador";
include 'Cabecalho.php';
?>
<?php
include '../../vendor/autoload.php';
$verifica = new App\Dao\LoginDao();
$verifica->statusLogin();
?>
<div id="miolo" class="w3-card-4" style="width: 70%;margin: 0 auto 20px;">
    <div class="w3-container w3-green">
        <h5 style="text-align: center">Registro de Novo Publicador</h5>
    </div>
    <?php
    if($_POST){
        $pub = new App\Model\Usuario();
        !empty($_POST['nome'])?$pub->setNome($_POST['nome']):$pub->setNome(null);
        if(!empty($_POST['cpf']) && \App\Helper::validaCPF($_POST['cpf'])){
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
        if($pub->getNome()==null)
            echo "<div class='animacaoServico w3-panel w3-yellow w3-topbar w3-bottombar w3-amber'><h1 style='text-align: center'>O campo de nome deve ter o atributo 'required'</h1></div>";
        else{
            $uDao = new App\Dao\UsuarioDao();
            if($uDao->inserir($pub))
                echo "<div class='animacaoServico w3-panel w3-pale-green w3-border-green w3-border'><h3 style='text-align: center'>Cadastro Realizado com Sucesso!!!</h3></div>";
        }
    }

    ?>
    <form class="w3-container" action="inserir_publicador.php" method="post">
        <p>
            <input type="text" id="nome" name="nome" class="w3-input w3-border w3-light-gray" autofocus required maxlength="100">
            <label for="nome">Nome: *</label>
        </p>
        <p>
            <input type="text" id="cpf" name="cpf" class="w3-input w3-border w3-light-gray" maxlength="11">
            <label for="senha">CPF</label>
        </p>
        <p>
            <select class="w3-select  w3-border w3-light-gray" name="logradouro">
                <option value="Rua" selected>Rua</option>
                <option value="Avenida">Avenida</option>
                <option value="Outros">Outros</option>
            </select>
            <label for="Logradouro">Logradouro:</label>
        </p>
        <p>
            <input type="text" id="descricao" name="descricao" class="w3-input w3-border w3-light-gray">
            <label for="descricao">Descrição:</label>
        </p>
        <p>
            <input type="text" id="numero" name="numero" class="w3-input w3-border w3-light-gray" maxlength="10">
            <label for="numero">Numero:</label>
        </p>
        <p>
            <input type="text" id="bairro" name="bairro" class="w3-input w3-border w3-light-gray" maxlength="100">
            <label for="bairro">Bairro:</label>
        </p>
        <p>
            <input type="text" id="cidade" name="cidade" class="w3-input w3-border w3-light-gray">
            <label for="cidade">Cidade:</label>
        </p>
        <p>
            <input type="text" id="uf" name="uf" class="w3-input w3-border w3-light-gray" maxlength="20">
            <label for="uf">Estado:</label>
        </p>
        <p>
            <input type="text" id="cep" name="cep" class="w3-input w3-border w3-light-gray" maxlength="10">
            <label for="cep">CEP:</label>
        </p>
        <p>
            <input type="text" id="circuito" name="circuito" class="w3-input w3-border w3-light-gray" maxlength="10">
            <label for="circuito">Circuito:</label>
        </p>
        <p>
            <input type="date" id="dtBatismo" name="dtBatismo" class="w3-input w3-border w3-light-gray">
            <label for="dtBatismo">Data de Batismo:</label>
        </p>
        <p>
            <input type="date" id="dtNascimento" name="dtNascimento" class="w3-input w3-border w3-light-gray">
            <label for="dtNascimento">Data de Nascimento:</label>
        </p>
        <p>
            <input type="tel" id="tel" name="tel" class="w3-input w3-border w3-light-gray" maxlength="15">
            <label for="tel">Telefone:</label>
        </p>
        <p>
            <label for="ativo">Ativo</label>
            <input class="w3-radio" type="radio" id="ativo" name="status" value="Ativo" checked>
            <label for="ativo">Inativo</label>
            <input class="w3-radio" type="radio" id="inativo" name="status" value="Inativo">
        </p>
        <p>
            <label for="obs">Observações:</label>
            <textarea rows="6" id="obs" class="w3-input  w3-border w3-light-gray"></textarea>
        </p>
        <p><input type="submit" value="Salvar" class="w3-btn w3-teal"></p>
        <p><h5><span style="color:red;">*</span> Campos Obrigatório.</h5></p>
    </form>
</div>
<?php
include 'Rodape.php';
?>
