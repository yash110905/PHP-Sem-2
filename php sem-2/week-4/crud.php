<?php
  require 'database.php';
  class crud extends database{
    public function __construct(){
        parent::__construct();
    }
    //get our data
    public function getData($query){
        $result = $this->connection->query($query);
        if($result == false){
            return false;
        }
        $rows=array();
        while($roe=$result->fetch_assoc()){
            $rows[]=$row;
        }
        return $rows;
    }
    // create a function to execute our create funnctionality.
    public function execute($query){
        $result = $this->connection->query($query);
        if($result ==false){
            return false;

        }else{
            return true;
        }
    }  
    //clean up any strings that has been added to the form
    public function escape_string($value){
        return $this->connection->real_escape_string($value);
    }
}

?>