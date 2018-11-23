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
     * @return false|string
     */
    public function getDataAtualizacao()
    {
        return $this->data_atualizacao;
    }

    /**
     * @param false|string $data_atualizacao
     */
    public function setDataAtualizacao($data_atualizacao)
    {
        $this->data_atualizacao = $data_atualizacao;
    }

    /**
     * @return mixed
     */
    public function getDataCriacao()
    {
        return $this->data_criacao;
    }

    /**
     * @param mixed $data_criacao
     */
    public function setDataCriacao($data_criacao)
    {
        $this->data_criacao = $data_criacao;
    }

    public function toArray(){
        return array(
              'id'        => $this->getId(),
              'nome'      => $this->getNome(),
              'sobrenome' => $this->getSobrenome(),
              'data_criacao' => $this->getDataCriacao() ? $this->getDataCriacao() : null,
              'data_atualizacao' => $this->getDataAtualizacao() ? $this->getDataAtualizacao() : null,
        );
    }

}