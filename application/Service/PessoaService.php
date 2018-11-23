<?php

class PessoaService extends Mysql
{

    public function __construct()
    {
        require_once (APP_ROOT."Entity/PessoaEntity.php");
//        require_once (APP_ROOT."Repository/PessoaRepository.php");
    }

    /**
     * @param array $pessoa dados da pessoa
     * @param array $grupos dados do grupo da pessoa
     */
    public function adicionar(array $pessoa, array $grupos){
        $this->validaPessoa($pessoa);

        $pessoa_entity = new PessoaEntity();

        $pessoa_entity->setId(null);
        $pessoa_entity->setNome($pessoa['nome']);
        $pessoa_entity->setSobrenome($pessoa['sobrenome']);
        $pessoa_entity->setDataCriacao(date("Y-m-d H:i:s"));
        $pessoa_entity->setId($this->insert($pessoa, "pessoa"));

        return $pessoa_entity;
    }


    /**
     * @param array $pessoa dados da pessoa
     * @param array $grupos dados do grupo da pessoa
     */
    public function editar(array $pessoa, array $grupos){


    }

    /**
     */
    public function excluir($id){

    }

    private function validaPessoa($dados){
        if(!isset($dados['nome'])){
            throw new \Exception("O campo nome não foi preenchido!");
        }
        if(!isset($dados['sobrenome'])){
            throw new \Exception("O campo sobrenome não foi preenchido!");
        }

        $pessoa_nome_length = strlen($dados['nome']);
        if($pessoa_nome_length < 3 || $pessoa_nome_length > 50){
            throw new \Exception("O nome tem que ter ao menos 3 e no máximo 50 caracteres!");
        }

        $pessoa_sobrenome_length = strlen($dados['sobrenome']);
        if($pessoa_sobrenome_length < 3 || $pessoa_sobrenome_length > 100){
            throw new \Exception("O nome tem que ter ao menos 3 e no máximo 100 caracteres!");
        }

        return true;
    }

}