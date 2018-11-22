<?php

require_once 'Service/PessoaService.php';

class PessoaController
{
    public function indexAction() {

        $srvPessoa = new PessoaService();

        //$_REQUEST['clientes'] = $clientes;

        require_once 'view/cliente_view.php';
    }


    public function adicionarAction(){

    }

    public function editarAction(){

    }

    public function excluirAction(){

    }


}