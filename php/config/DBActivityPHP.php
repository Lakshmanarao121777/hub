<?php
class DBActivityPHP
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    public function connect()
    { 
        include "config.inc.php";
        $this->servername = $server_servername;
        $this->username = $server_username;
        $this->password = $server_password;
        $this->dbname = $server_database;
        $this->servername = $server_servername;
        $this->charset = "utf8mb4";
        
        $json_array = array();
        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            //echo $e-getMessage();
            $json_array['status']='Error';
            $json_array['message']=$e->getMessage();
            return $json_array;
            //die("<div class='notfound'> An error occured Please contact Admin for more details </div>");
        }
    }
    public function inserting($table_name, $colums, $values)
    {
    	$sql = "INSERT INTO $table_name ($colums) VALUES ($values)";
        $q = $this->connect()->exec($sql);
        if ($q > 0) {
            //return "success";
            $json_array['status']='Success';
            $json_array['message']='success';
            return $json_array;
        }
    }

    public function UpdateTable($table_name, $where_set, $where_update)
    {
        $sql = "UPDATE $table_name SET $where_set WHERE $where_update";
        $q = $this->connect()->exec($sql);
        if ($q > 0) {
            $json_array['status']='success';
            $json_array['Message']='success';
            return $json_array;
        }
        else{
            $json_array['status']='success';
            $json_array['Message']='Failed';
            return $json_array;
        }
    }
    public function DeleteColum($table_name, $update_where)
    {
        $sql = "DELETE FROM $table_name WHERE $update_where ";
        $q = $this->connect()->exec($sql);
        if ($q > 0) {return "success";}
    }
    public function getColValue($table_name, $where, $col)
    {
        $sql = "SELECT * FROM $table_name WHERE $where";
        $q = $this->connect()->query($sql);
        $count = 0;
        $credit='';
        while ($row = $q->fetch()): $count++;
            $credit = $row["$col"];
        endwhile;
        return $credit;
    }
    public function getCount($table_name, $where)
    {
        $sql = "SELECT * FROM $table_name WHERE $where";
        $q = $this->connect()->query($sql);
        $credit = 0;
        while ($row = $q->fetch()):
            $credit++;
        endwhile;
        return $credit;
    }
    public function getCountDistinct($table_name, $where,$col)
    {
        $sql = "SELECT DISTINCT ( $col ) FROM $table_name WHERE $where";
        $q = $this->connect()->query($sql);
        $credit = 0;
        while ($row = $q->fetch()):
            $credit++;
        endwhile;
        return $credit;
    }
    public function getDistinct($table_name, $where,$col)
    {
        $sql = "SELECT DISTINCT ( $col ) FROM $table_name WHERE $where";
        $q = $this->connect()->query($sql);
        $count = 0;
        $msg_array=array();
        while ($row = $q->fetch()):$count++;
            $data = array();
            foreach($row as $column => $value) {
                $data[$column]=$value;
            }
            $msg_array[] = $data;
        endwhile;
        $json_array['Message']=$msg_array;
        return $json_array;  
    }
    public function getRowsValues($table_name, $where){
        $sql = "SELECT * FROM $table_name WHERE $where";
        $q = $this->connect()->query($sql);
        $count = 0;
        $msg_array=array();
        while ($row = $q->fetch()):$count++;
            $data = array();
            foreach($row as $column => $value) {
                $data[$column]=$value;
            }
            $msg_array[] = $data;
        endwhile;
        $json_array['Message']=$msg_array;
        return $json_array;         
    }
}
