<?php

namespace App;

class Helper
{
    public static function criptografar($str){
        return md5($str);
    }
    public static function setData($data){
        return date("Y-m-d",strtotime($data));
    }
    public static function getData($data){
        return date("d/m/Y",strtotime($data));
    }

    //************FUNÇAO VERIFICADORA DE VALIDADE DE CPF*******************
    public static function validaCPF($cpf = null) {
        if(empty($cpf)) {
            return false;
        }
        $cpf = str_replace('[^0-9]', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        if (strlen($cpf) != 11) {
            return false;
        }
        else if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return false;
        } else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }
    //************FIM DA FUNÇAO VERIFICADORA DE VALIDADE DE CPF**************

    //*******TRATAMENTO DE CPF PARA ENTRADA E SAIDA DO BANCO DE DADOS **********
    public static function setCPF($cpf){
        $c = str_replace(".","",(str_replace("-","",$cpf)));
        return $c;
    }
    public static function getCPF($cpf){
        $c = "";
        for($x=0;$x<strlen($cpf);$x++){
            $c .= $cpf[$x];
            if($x==2 || $x==5){
                $c .= ".";
            }
            if($x==8){
                $c .= "-";
            }
        }
        return $c;
    }
}