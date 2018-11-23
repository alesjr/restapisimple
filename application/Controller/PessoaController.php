<?php

require (APP_ROOT."Service/PessoaService.php");

class PessoaController extends AbstractCoreController
{
    public function indexAction() {

        $srv_pessoa = new PessoaService();


        $this->render("index");
    }




    public function adicionarAction(){


        $srv_grupo = new GrupoRepository();



//        if (isset($_POST["title"]))
//        {
//            require(ROOT . 'Models/Task.php');
//            $task= new Task();
//            if ($task->create($_POST["title"], $_POST["description"]))
//            {
//                header("Location: " . WEBROOT . "tasks/index");
//            }
//        }
    }

    public function editarAction(){

    }

    public function excluirAction(){

    }


}