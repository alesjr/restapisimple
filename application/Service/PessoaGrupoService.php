<?php

class PessoaGrupoService extends Mysql
{

    public function adicionarPessoaGrupo(array $pessoa, array $grupos){

        if(sizeof($grupos)<2){
            throw new \Exception("É necessário que haja ao menos 2 grupos para o usuário!");
        }

        $srv_pessoa = new PessoaService();
        $entity_pessoa = $srv_pessoa->adicionar($pessoa);

        foreach($grupos as $cada_grupo){
            $cada_grupo = [
                'pessoa_id' => $entity_pessoa->getId(),
                'grupo_id'  => $cada_grupo['id']
            ];
            $this->insert($cada_grupo, "pessoa_grupo");
        }
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