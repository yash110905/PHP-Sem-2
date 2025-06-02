<?php
  class validate{
    //check to se if our fiels are empty
    public function checkEmpty($data,$fields){
        $msg=null;
        foreach($fields as $value){
            if(empty($data[$value])){
                $msg .= "<p>$value field is empty</p>";
            }
        }
        return $msg;
    }
// check to see if our age input is numeric
  public function validAge($age){
    if(preg_match(pattern:"/^[0-9]+$/", $age)){
        return true;
    }
    return false;
  }
  //check our email and see if it follows as email format
  public function validEmail($email){
    if(filter_var($email,filter:FILTER_VALIDATE_EMAIL)){
        return true;

    }
    return false;
  }
}

?>