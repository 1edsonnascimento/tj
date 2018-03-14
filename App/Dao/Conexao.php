<?php
/**
 * Created by PhpStorm.
 * User: 1813792
 * Date: 08/03/2018
 * Time: 21:10
 */

namespace App\Dao;


class Conexao
{
    protected $conexao;
    private $host = "localhost";
    private $db = "tj";
    private $user = "root";
    private $senha = "1234";

    public function __construct()
    {
        $this->conexao = new \PDO("mysql:host={$this->host};dbname={$this->db}",$this->user, $this->senha);
        $this->conexao->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }
}