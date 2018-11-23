<?php

class GrupoService extends Mysql
{

    public function __construct()
    {
        require_once (APP_ROOT."Entity/GrupoEntity.php");
    }

    /**
     * @param array $pessoa dados da pessoa
     * @param array $grupos dados do grupo da pessoa
     */
    public function adicionar(array $grupo){


    }


    /**
     * @param array $pessoa dados da pessoa
     * @param array $grupos dados do grupo da pessoa
     */
    public function editar(array $grupo){


    }

    /**
     */
    public function excluir($id){

    }

    public function gerRepository(){
        require_once (APP_ROOT."Repository/GrupoRepository.php");
        return new GrupoRepository();
    }


}