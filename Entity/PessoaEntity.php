<?php

class PessoaEntity
{
    private $id;

    private $nome;

    private $sobrenome;

    private $grupo;

    private $data_criacao;

    private $data_atualizacao;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * @param mixed $sobrenome
     */
    public function setSobrenome($sobrenome): void
    {
        $this->sobrenome = $sobrenome;
    }

    /**
     * @return mixed
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param mixed $grupo
     */
    public function setGrupo($grupo): void
    {
        $this->grupo = $grupo;
    }

    public function toArray(){
        return array(
              'nome'      => $this->getNome(),
              'sobrenome' => $this->getSobrenome(),
              'grupo'     => $this->getGrupo(),
        );
    }

}