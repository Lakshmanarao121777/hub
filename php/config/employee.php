<?php 
require "DBActivityJSON.php";
require "DBActivityPHP.php";
class employee extends DBActivity
{
    public function addNewNotice($table_name, $colms, $values)
    {
      return $this->inserting($table_name, $colms, $values);
    }
    public function getAllRowsValue($table_name, $where)
    {
        return $this->getRowsValues($table_name, $where);
    }
    public function update_password($table_name, $where_set, $where_update)
    {
        return $this->UpdateTable($table_name, $where_set, $where_update);
    }
}

?>