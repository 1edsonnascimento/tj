<?php
$titulo = "XXXXXXXXXX";
    include 'Cabecalho.php';
?>
<?php
    include '../../vendor/autoload.php';
    $verifica = new App\Dao\LoginDao();
    $verifica->statusLogin();

    if($_POST){
        $pub = new \App\Model\Usuario();
        $pub->setIdUsuario($_POST['idUsuario']);
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

        $pd = new App\Dao\UsuarioDao();
        if($pd->alterar($pub))
            
            header("Location: pesquisar_publicador.php?msg=2");
    }
        $pp = new App\Model\Usuario();
        $pp->setIdUsuario(isset($_GET)? $_GET['idUsuario'] : $_POST['idUsuario']);
        $pd = new \App\DAO\UsuarioDao();
        $u = $pd->pesquisar($pp);


?>

<form class="w3-container" action="alterar_publicador.php" method="post">
    <p>
        <input type="number" id="id" name="idUsuario" class="w3-input w3-border w3-light-gray" required value="<?php echo $u['idUsuario']; ?>">
        <label for="id">ID:</label>
    </p>
        <p>
            <input type="text" id="nome" name="nome" class="w3-input w3-border w3-light-gray" autofocus required maxlength="100"  value="<?php echo $u['nome']; ?>">
            <label for="nome">Nome: *</label>
        </p>
        <p>
            <input type="text" id="cpf" name="cpf" class="w3-input w3-border w3-light-gray" maxlength="11"  value="<?php echo $u['cpf']; ?>">
            <label for="senha">CPF</label>
        </p>
        <p>
            <select class="w3-select  w3-border w3-light-gray" name="logradouro"">
                <?php
                    $log = array("Rua","Avenida","Outros");
                    foreach($log as $value){
                       if($value == $u['logradouro']){
                           echo "<option value='{$value} selected'>{$value}</option>";
                       }else{
                           echo "<option value='{$value}'>{$value}</option>";
                       }
                    }
                ?>
            </select>
            <label for="Logradouro">Logradouro:</label>
        </p>
        <p>
            <input type="text" id="descricao" name="descricao" class="w3-input w3-border w3-light-gray" value="<?php echo $u['endereco']; ?>">
            <label for="descricao">Descrição:</label>
        </p>
        <p>
            <input type="text" id="numero" name="numero" class="w3-input w3-border w3-light-gray" maxlength="10" value="<?php echo $u['numero']; ?>">
            <label for="numero">Numero:</label>
        </p>
        <p>
            <input type="text" id="bairro" name="bairro" class="w3-input w3-border w3-light-gray" maxlength="100" value="<?php echo $u['bairro']; ?>">
            <label for="bairro">Bairro:</label>
        </p>
        <p>
            <input type="text" id="cidade" name="cidade" class="w3-input w3-border w3-light-gray" value="<?php echo $u['cidade']; ?>">
            <label for="cidade">Cidade:</label>
        </p>
        <p>
            <input type="text" id="uf" name="uf" class="w3-input w3-border w3-light-gray" maxlength="20" value="<?php echo $u['uf']; ?>">
            <label for="uf">Estado:</label>
        </p>
        <p>
            <input type="text" id="cep" name="cep" class="w3-input w3-border w3-light-gray" maxlength="10" value="<?php echo $u['cep']; ?>">
            <label for="cep">CEP:</label>
        </p>
        <p>
            <input type="text" id="circuito" name="circuito" class="w3-input w3-border w3-light-gray" maxlength="10" value="<?php echo $u['circuito']; ?>">
            <label for="circuito">Circuito:</label>
        </p>
        <p>
            <input type="date" id="dtBatismo" name="dtBatismo" class="w3-input w3-border w3-light-gray" value="<?php echo $u['dtBatismo']; ?>">
            <label for="dtBatismo">Data de Batismo:</label>
        </p>
        <p>
            <input type="date" id="dtNascimento" name="dtNascimento" class="w3-input w3-border w3-light-gray" value="<?php echo $u['dtNascimento']; ?>">
            <label for="dtNascimento">Data de Nascimento:</label>
        </p>
        <p>
            <input type="tel" id="tel" name="tel" class="w3-input w3-border w3-light-gray" maxlength="15" value="<?php echo $u['telefone']; ?>">
            <label for="tel">Telefone:</label>
        </p>
        <p>
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
            <label for="obs">Observações:</label>
            <textarea rows="6" id="obs" class="w3-input  w3-border w3-light-gray" value="<?php echo $u['obs']?>"></textarea>
        </p>
        <p><input type="submit" value="Salvar" class="w3-btn w3-teal"></p>
        <p><h5><span style="color:red;">*</span> Campos Obrigatório.</h5></p>
    </form>

<?php
    include 'Rodape.php';
?>