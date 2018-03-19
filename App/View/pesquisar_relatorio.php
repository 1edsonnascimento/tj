
<?php
$titulo = "xxxxxx";
include 'Cabecalho.php';
?>
<?php
include '../../vendor/autoload.php';
$verifica = new App\Dao\LoginDao();
$verifica->statusLogin();


?>
<div class="main">
    <p>
        <input type="radio" class="w3-radio" value="nome" name="consulta" checked  onclick="mudarD1();">
        <label><b>Consultar Nome:</b></label>
    </p>

    <p>
        <input type="radio" class="w3-radio" value="data" name="consulta" onclick="mudarD2();">
        <label><b>Consultar Por Data</b></label>
    </p>


    <div id="d1" style="display: block;">
        <h2>Pesquisa Por Nome</h2>
        <p class="w3-quarter w3-row-padding">
                <input type="text" id="campo_nome" name="campo_nome">
            </p>
            <p class="w3-twothird w3-row-padding">
                <button type="button" class="w3-btn w3-brown" onclick="consultar_por_nome(document.getElementById('campo_nome').value);">Buscar</button>
            </p>

    </div>

    <div id="d2" style="display: none;">
        <h2>Pesquisa Por Data</h2>

            <p class="w3-quarter w3-row-padding">
                <label><b>Data Inicial:</b></label>
                <input type="date" id="dtIni" name="dtIni">
            </p>
            <p class="w3-quarter w3-row-padding">
                <label><b>Data Final:</b></label>
                <input type="date" id="dtFin" name="dtFin">
            </p>
            <p class="w3-quarter w3-row-padding">
                <label><b>Nome:</b></label>
                <input type="text" id="dtNome" name="dtNome">
            </p>
            <p class="w3-twothird w3-row-padding">
                <button type="button" class="w3-btn w3-brown" onclick="consultar_por_Data();">Buscar</button>
            </p>
    </div>

    <div>
        <span id="tabela"></span>
    </div>

    <div>
        <span id="tela_auteracao_relatorio"></span>
    </div>
</div>

<?php
include 'Rodape.php';
?>