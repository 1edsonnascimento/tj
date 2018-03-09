<?php

namespace App\Model;

class Login
{
    private $idLogin;    //NOT NULL
    private $username;       //NOT NULL
    private $senha;      //NOT NULL
    private $permissoes;
    private $idUsuario;

    /**
     * @return mixed
     */
    public function getIdLogin()
    {
        return $this->idLogin;
    }

    /**
     * @param mixed $idLogin
     */
    public function setIdLogin($idLogin)
    {
        $this->idLogin = $idLogin;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }



    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getPermissoes()
    {
        return $this->permissoes;
    }

    /**
     * @param mixed $permissoes
     */
    public function setPermissoes($permissoes)
    {
        $this->permissoes = $permissoes;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }  //NOT NULL


}
