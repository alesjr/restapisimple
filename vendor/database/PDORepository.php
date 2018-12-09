<?php
abstract class PDORepository{

    private $connection;

    private function getConnection()
    {
        if ($this->connection){
            return $this->connection;
        }
        $username = USER;
        $password = PASS;
        $host = HOST;
        $db = DB;
        $this->connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);
        return $this->connection;
    }

    private function queryList($sql, $args)
    {
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public function getRow($sql, $args = array())
    {
        return $this->queryList($sql, $args)->fetch();
    }

    public function getAll($sql, $args = array())
    {
        return $this->queryList($sql, $args)->fetchAll();
    }

    public function insert(array $dados, $table){
        if (!$dados){
            return false;
        }

        $sql = "INSERT INTO %s (%s) values (%s) ";
        $bind_array = array();

        foreach ($dados as $key=>$cada_dado){
            $nome_bind = ":{$key}";
            $bind_array[$nome_bind] = $cada_dado;
        }
        $sql = sprintf($sql, $table, implode(",", array_keys($dados)), implode(",", array_keys($bind_array)));

        $conexao = $this->getConnection();
        $conexao->prepare($sql)->execute($bind_array);

        if ($conexao->errorCode()){
            return false;
        }
        return $conexao->lastInsertId();
    }

    public function update(array $dados, $table, $field_name_id, $id_value){
        if (!$dados){
            return false;
        }

        $sql = "UPDATE %s SET %s WHERE $field_name_id = :value_id";
        $bind_array = array(":value_id"=>$id_value);

        $set = array();
        foreach ($dados as $key=>$cada_dado){
            $nome_bind = ":{$key}";
            $bind_array[$nome_bind] = $cada_dado;
            $set[] = "{$key} = {$nome_bind}";
        }
        $sql = sprintf($sql, $table, implode(", ", $set));

        $conexao = $this->getConnection();
        $conexao->prepare($sql)->execute($bind_array);

        return true;
    }

    public function delete($table, $field_name_id, $id_value){
        $sql = "DELETE FROM $table WHERE $field_name_id = :id";
        $this->getConnection()->prepare($sql)->execute(array(":id"=>$id_value));
        return true;
    }

}