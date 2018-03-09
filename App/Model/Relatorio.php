<?php
/**
 * Created by PhpStorm.
 * User: 1813792
 * Date: 08/03/2018
 * Time: 20:59
 */

namespace App\Model;


class Relatorio
{
    private $idRelatorio;   //NOT NULL
    private $publicacoes;
    private $videos;
    private $horas;        //DECIMAL(5,2)
    private $visitas;
    private $estudos;
    private $dat;
    private $idUsuario;    //NOT NULL

    /**
     * @return mixed
     */
    public function getIdRelatorio()
    {
        return $this->idRelatorio;
    }

    /**
     * @param mixed $idRelatorio
     */
    public function setIdRelatorio($idRelatorio)
    {
        $this->idRelatorio = $idRelatorio;
    }

    /**
     * @return mixed
     */
    public function getPublicacoes()
    {
        return $this->publicacoes;
    }

    /**
     * @param mixed $publicacoes
     */
    public function setPublicacoes($publicacoes)
    {
        $this->publicacoes = $publicacoes;
    }

    /**
     * @return mixed
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * @param mixed $videos
     */
    public function setVideos($videos)
    {
        $this->videos = $videos;
    }

    /**
     * @return mixed
     */
    public function getHoras()
    {
        return $this->horas;
    }

    /**
     * @param mixed $horas
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;
    }

    /**
     * @return mixed
     */
    public function getVisitas()
    {
        return $this->visitas;
    }

    /**
     * @param mixed $visitas
     */
    public function setVisitas($visitas)
    {
        $this->visitas = $visitas;
    }

    /**
     * @return mixed
     */
    public function getEstudos()
    {
        return $this->estudos;
    }

    /**
     * @param mixed $estudos
     */
    public function setEstudos($estudos)
    {
        $this->estudos = $estudos;
    }

    /**
     * @return mixed
     */
    public function getDat()
    {
        return $this->dat;
    }

    /**
     * @param mixed $dat
     */
    public function setDat($dat)
    {
        $this->dat = $dat;
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
    }
}
