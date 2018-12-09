<?php
require_once (APP_ROOT . "Service/TarefaService.php");

class ApiController extends AbstractCoreController
{

    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
    }

    /**
     * @throws Exception
     */
    public function tarefaAction()
    {
        $metodo = $_REQUEST['method'];
        $result = null;
        $tarefa = new TarefaService();
        try{
            switch ($metodo){
                case "adicionar":{
                    $result = $tarefa->adicionar(json_decode($_REQUEST["params"]));
                    break;
                }
                case "editar":{
                    $result = $tarefa->editar(json_decode($_REQUEST["params"]));
                    break;
                }
                case "excluir":{
                    $result = $tarefa->excluir(json_decode($_REQUEST["params"])['id']);
                    break;
                }
                default: {
                    $result = "Método inexistente";
                }
            }
        }catch (\Exception $ex){
            $result = $ex->getMessage();
        }
        return json_encode($result);

    }

}