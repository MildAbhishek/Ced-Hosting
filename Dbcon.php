<?php
class Dbcon{
    public $conn;

    public function __construct() {

        $this->conn=new mysqli('localhost', 'root', '', 'CedHosting');

        if($this->conn->connect_error) {
            echo "failed";
            // die("Connection failed: ".$this->conn->connect_error);
    
        } else {
            // echo "Connected Successfully";
        }
        
    }


}
// $a=new Config();
// $a->connect();

?>