//**********FUNÇOES GERAIS DO SISTEMA****************
function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF == "00000000000" ||
        strCPF == "11111111111" ||
        strCPF == "22222222222" ||
        strCPF == "33333333333" ||
        strCPF == "44444444444" ||
        strCPF == "55555555555" ||
        strCPF == "66666666666" ||
        strCPF == "77777777777" ||
        strCPF == "88888888888" ||
        strCPF == "99999999999" ) return false;

    for (var i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

    Soma = 0;
    for (var i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}
function CP(cp){
    var st = "";
    for(var x=0; x<cp.length; x++){
        if(cp[x]=="." || cp[x]=="-");
        else st += cp[x];
    }
    var cpf = TestaCPF(st);
    if(cpf == true){
        document.getElementById("cpf").value = cp;
    }else{
        document.getElementById("cpf").value = "";
        alert("CPF Não É VÁLIDO. FAVOR DIGITAR UM CPF VÁLIDO");
    }
}
//================================FIM=====================================



//**********JAVASCRIPT PERTENCENTE AO ARQUIVO INSERIR_USUARIO NO INPUT ID='cpf'****************
function buscarCpf(cpf){
    if(cpf == ""){
        document.getElementById("msg").innerHTML = "Campo CPF Em Branco";
        return false;
    }else{
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function(){
            if(this.readyState ==4 && this.status == 200){
                document.getElementById("msg").innerHTML = this.responseText;
            }
        };
        xml.open("GET","../Ajax/consulta_cpf_ajax.php?cpf="+cpf,true);
        xml.send();
    }
}
//================================FIM=====================================



//**********JAVASCRIPT PERTENCENTE AO ARQUIVO LOGIN NO INPUT TYPE='submit'****************
function mensagem(){
    $user = document.getElementById("username").value;
    $senha = document.getElementById("senha").value;
    if($user=="" || $senha==""){
        alert("Campos sem preenchimento");
    }
}
//================================FIM=====================================



//***JAVASCRIPT PERTENCENTE AO ARQUIVO PESQUISAR_PUBLICADOR NO INPUT ID='consulta'******
function consultar(nome){
    if(nome == ""){
        document.getElementById("tabela").innerHTML = "<h5>Nenhum Nome Inserido</h5>";
        return false;
    }else{
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function () {
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("tabela").innerHTML = this.responseText;
            }
        }
        xml.open("GET","../Ajax/consulta_usuario_ajax.php?nome="+nome,true);
        xml.send();
    }
}
//================================FIM=====================================



//**********JAVASCRIPT PERTENCENTE AO ARQUIVO PESQUISAR_RELATORIO NO:
//INPUT VALUE='nome';
function mudarD1(){
    document.getElementById("d1").style.display = 'block';
    document.getElementById("d2").style.display = 'none';
    m(); //referencía a funcao abaixo
}
//INPUT VALUE='data';
function mudarD2(){
    document.getElementById("d1").style.display = 'none';
    document.getElementById("d2").style.display = 'block';
   m(); //referencía a funcao abaixo
}
//INPUT VALUE='total';
function m(){
    document.getElementById('tabela').innerHTML = "";
}
//BUTTON consultar_por_Nome();
function consultar_por_nome(nome){
    if(nome == ""){
        alert("Favor preencer o campo do nome");
        return false;
    }else{
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById('tabela').innerHTML = this.responseText;
            }
        };
        xml.open("GET","../Ajax/consultar_por_nome.php?nome="+nome,true);
        xml.send();
    }
}
//BUTTON consultar_por_Data();
function consultar_por_Data(){
    var dtNome = document.getElementById('dtNome').value;
    var dtIni = document.getElementById('dtIni').value;
    var dtFin = document.getElementById('dtFin').value;
    if(dtNome == "" || dtIni == "" || dtFin == ""){
        alert("Todos os campos precisam ser preenchidos");
        return false;
    }else{
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById('tabela').innerHTML = this.responseText;
            }
        };
        xml.open("GET","../Ajax/consultar_por_Data.php?dtNome="+dtNome+"&dtIni="+dtIni+"&dtFin="+dtFin,true);
        xml.send();
    }
}

function excluir_relatorio(idRelatorio,indice){
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("tabela_criada").deleteRow(indice);
                document.getElementById('msg_alteracao_exclusao').innerHTML = this.responseText;

            }
        };
        xml.open("GET","../Ajax/excluir_relatorio.php?idRelatorio="+idRelatorio,true);
        xml.send();
}

function alterar_relatorio(idRelatorio){
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('msg_alteracao_exclusao').innerHTML = this.responseText;
        }
    };
    xml.open("GET","../Ajax/alterar_relatorio.php?idRelatorio="+idRelatorio,true);
    xml.send();
}
//PRECISO VERIFICAR ESSES METODOS INSERIDOS POR ULTIMO
//================================FIM=====================================
