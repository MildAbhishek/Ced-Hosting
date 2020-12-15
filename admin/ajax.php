<?php 
include_once '../Dbcon.php';
include_once '../Product.php';

$connection= new Dbcon();
$newproduct= new Product();

if(isset($_POST)){
    $id= $_POST['id'];
    $action= $_POST['action'];
    // echo $id;

    if($action== 'deletecategory'){
        $result= $newproduct->deleteCategory($id, $connection->conn);
        if($result == true){
            echo 1;
        }else {
            echo 0;
        }
    }

    if($action== 'deleteproduct'){
        $result= $newproduct->deleteProduct($id, $connection->conn);
        if($result == true){
            echo 1;
        }else {
            echo 0;
        }
    }
 }
?>