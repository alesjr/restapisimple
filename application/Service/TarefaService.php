<?php

class TarefaService extends PDORepository
{

    public function adicionar(array $tarefa)
    {
        unset($tarefa['id']);
        $this->validaTarefa($tarefa);

        if ($id = $this->insert($tarefa, "tarefa")){
            $tarefa['id'] = $id;
            return $tarefa;
        }

        throw new \Exception("Ocorreu um erro ao adicionar a tarefa!");
    }

    public function editar(array $tarefa)
    {
        if (!isset($tarefa['id']) || !$this->getRow("Select * from tarefa where id = {$tarefa['id']}")){
            throw new \Exception("Ocorreu um erro ao editar a tarefa, tarefa inexistente!");
        }

        $this->validaTarefa($tarefa);
        if ( $this->update($tarefa, "tarefa", "id", $tarefa['id']) ) {
            return $tarefa;
        }

        throw new \Exception("Ocorreu um erro ao editar a tarefa!");
    }

    public function excluir($id)
    {
        $tarefa = $this->getRow("Select * from tarefa where id = $id");
        if (!$tarefa){
            throw new \Exception("Ocorreu um erro ao excluir a tarefa, tarefa inexistente!");
        }
        if ($this->delete("tarefa", "id", $id)){
            return $tarefa;
        }
        throw new \Exception("Ocorreu um erro ao excluir a tarefa!");
    }

    private function validaTarefa(array $tarefa)
    {
        if (!isset($tarefa['titulo']) || !$tarefa['titulo']){
            throw new \Exception("Título inexistente");
        }
        if (!isset($tarefa['descricao']) || !$tarefa['descricao']){
            throw new \Exception("Descrição inexistente");
        }
        if (!isset($tarefa['prioridade']) || !$tarefa['prioridade']){
            throw new \Exception("Prioridade inexistente");
        }
        return true;
    }
}