<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 23/11/18
 * Time: 09:48
 */

class Mysql{

    protected $conn = false;  //DB connection resources

    protected $sql;           //sql statement

    public function __construct($config = array()){

        $host = isset($config['host'])? $config['host'] : 'localhost';

        $user = isset($config['user'])? $config['user'] : 'root';

        $password = isset($config['password'])? $config['password'] : '';

        $dbname = isset($config['dbname'])? $config['dbname'] : '';

        $port = isset($config['port'])? $config['port'] : '3306';

        $charset = isset($config['charset'])? $config['charset'] : '3306';

        $this->conn = mysql_connect("$host:$port",$user,$password) or false;

        if(!$this->conn){
            throw new \Exception('Database connection error');
        }

        $db = mysql_select_db($dbname) or false;

        if(!$this->conn){
            throw new \Exception('Database selection error');
        }

        $this->setChar($charset);

    }

    private function setChar($charest){

        $sql = 'set names '.$charest;

        $this->query($sql);

    }

    /**
     * Execute SQL statement
     * @access public
     * @param $sql string SQL query statement
     * @return $result，if succeed, return resrouces; if fail return error message and exit
     */
    public function query($sql){

        $this->sql = $sql;

//log
        $str = $sql . "  [". date("Y-m-d H:i:s") ."]" . PHP_EOL;

        file_put_contents("log.txt", $str,FILE_APPEND);

        $result = mysql_query($this->sql,$this->conn);

        if (! $result) {

            throw new \Exception($this->errno().':'.$this->error().'<br />Error SQL statement is '.$this->sql.'<br />');

        }

        return $result;

    }

    public function insert(array $dados, $table){

        $keys = implode(",", array_keys($dados));
        $values = "\"".implode("\",\"", array_values($dados)) . "\"";

        $sql = "INSERT into $table ($keys) values ($values)";
        return $this->query($sql);
    }


    public function getRow($sql){

        if ($result = $this->query($sql)) {

            $row = mysql_fetch_assoc($result);

            return $row;

        }
        return false;
    }

    public function getAll($sql){

        $result = $this->query($sql);

        $list = array();

        while ($row = mysql_fetch_assoc($result)){

            $list[] = $row;

        }

        return $list;

    }

    public function getCol($sql){

        $result = $this->query($sql);

        $list = array();

        while ($row = mysql_fetch_row($result)) {

            $list[] = $row[0];

        }

        return $list;

    }

    public function getInsertId(){

        return mysql_insert_id($this->conn);

    }

    public function errno(){

        return mysql_errno($this->conn);

    }

    public function error(){

        return mysql_error($this->conn);

    }

}