<?php

require_once 'Repository/PessoaRepository.php';

class GrupoRepository extends Mysql
{

    public function buscaGrupos(){
        return $this->getAll();
    }

}