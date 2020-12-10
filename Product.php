<?php

class Product{
    public $parentid;
    public $productid;
    public $productname;
    public $link;
    public $available;
    public $conn;
    public $result="";

    public function addCategory($parentid, $categoryname, $link, $conn){
        $sql= "SELECT * FROM tbl_product WHERE `prod_name`='$categoryname' ";
        $result= $conn->query($sql);
        if($result->num_rows > 0){
            return 2;
        } else {
            $sql= "INSERT INTO tbl_product (`prod_parent_id`, `prod_name`, `link`) VALUES ('$parentid', '$categoryname', '$link')";
            // echo $sql;
            $result= $conn->query($sql);
            if($result){
                return 1;

            } else{
                return 0;
            }
        }
    }

    public function showCategory($conn){
        $arr=array();
        $sql= "SELECT * FROM tbl_product";
        // echo $sql;
        $result= $conn->query($sql);
        if($result->num_rows >0){
            while($row= $result->fetch_assoc()){
                array_push($arr, $row);

            }
            return $arr;
        }
    }

    public function fetchCategory($conn){
        $arr=array();
        $sql= "SELECT * FROM tbl_product WHERE `prod_parent_id`='1' ";
        // echo $sql;
        $result= $conn->query($sql);
        if($result->num_rows >0){
            while($row= $result->fetch_assoc()){
                array_push($arr, $row);

            }
            return $arr;
        }
    }

    public function editCategory($categoryid, $categoryname, $link, $available, $conn){
        $arr=array();
        $sql= "UPDATE tbl_product SET `prod_name`='$categoryname', `link`='$link', `prod_available`='$available' WHERE `id`='$categoryid' ";
        // echo $sql;
        $result= $conn->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCategory($categoryid, $conn){
        // $arr=array();
        $sql= "DELETE FROM tbl_product WHERE `id`='$categoryid' ";
        // echo $sql;
        $result= $conn->query($sql);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>