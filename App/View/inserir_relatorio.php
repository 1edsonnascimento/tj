
<?php
$titulo = "xxxxxx";
    include 'Cabecalho.php';
?>
<?php
    include '../../vendor/autoload.php';
    $verifica = new App\Dao\LoginDao();
    $verifica->statusLogin();

    if($_POST){
        $rel = new App\Model\Relatorio();
        $rel->setIdUsuario((int)$_POST['publicador']);
        $rel->setPublicacoes(isset($_POST['publicacoes'])?(int)$_POST['publicacoes']:null);
        $rel->setVideos(isset($_POST['videos'])?(int)$_POST['videos']:null);
        $rel->setHoras(isset($_POST['horas'])?(int)$_POST['horas']:null);
        $rel->setVisitas(isset($_POST['visitas'])?(int)$_POST['visitas']:null);
        $rel->setEstudos(isset($_POST['estudos'])?(int)$_POST['estudos']:null);
        $rel->setDat(isset($_POST['dat'])?\App\Helper::setData($_POST['dat']):null);
        $relDao = new App\Dao\RelatorioDao();
        if($relDao->inserir($rel)){
            echo "<div class='w3-container animacaoServico'>Relatório Cadastrado com sucesso!!</div>";
        }
    }
?>
<div class="main">
    <h2>Inserir Novo Relatório</h2>

    <form action="inserir_relatorio.php" method="post">
        <?php $class = 'class="w3-input w3-border w3-sand"';?>
        <p class="w3-quarter w3-row-padding">
            <label><b>Publicador:</b></label>
            <select name="publicador" class="w3-select  w3-border w3-sand">
                <?php
                    $p = new App\Dao\UsuarioDao();
                    $pub = $p->pesquisarTodos($p);
                    foreach($pub as $value){
                        echo "<option value='{$value['idUsuario']}'>{$value['nome']}</option>";
                    }
                ?>
            </select>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label><b>Publicações:</b></label>
            <input type="number" min="0" name="publicacoes" <?php echo $class?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label><b>Videos:</b></label>
            <input type="number" min="0" name="videos" <?php echo $class?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label><b>Horas:</b></label>
            <input type="number" min="0" name="horas" <?php echo $class?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label><b>Visitas:</b></label>
            <input type="number" min="0" name="visitas" <?php echo $class?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label><b>Estudos:</b></label>
            <input type="number" min="0" name="estudos" <?php echo $class?>>
        </p>
        <p class="w3-quarter w3-row-padding">
            <label><b>Data:</b></label>
            <input type="date" name="dat" <?php echo $class?> value="<?php echo date("Y-m-d") ?>">
        </p>
        <p class="w3-half w3-row-padding"><input type="submit" value="Salvar" class="w3-btn w3-brown"></p>
    </form>
</div>
<?php
include 'Rodape.php';
?>