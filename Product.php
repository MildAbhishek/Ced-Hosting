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
        $sql= "SELECT * FROM tbl_product WHERE `id`='$categoryid' ";
        $result= $conn->query($sql);
        if ($result ->num_rows > 0){
            while($row= $result->fetch_assoc()){
                if($categoryname == $row['prod_name'] && $link == $row['link'] && $available == $row['prod_available']){
                    // echo "<script>alert('Nothing Updated')</script>";
                    return 2;
                }
            }
        }
        $arr=array();
        $sql= "UPDATE tbl_product SET `prod_name`='$categoryname', `link`='$link', `prod_available`='$available' WHERE `id`='$categoryid' ";
        // echo $sql;
        $result= $conn->query($sql);
        if($result){
            return 1;
        }else{
            return 0;
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

    public function addProduct($productcategory, $productname, $link, $conn){
        $parentid="";
        $sql= "SELECT * FROM tbl_product WHERE `prod_name`='$productcategory' ";
        $result= $conn->query($sql);
        if($result->num_rows > 0){
            while($row= $result->fetch_assoc()){
                $parentid= $row['id'];
            }
        } 
        $sql= "INSERT INTO tbl_product (`prod_parent_id`, `prod_name`, `link`) VALUES ('$parentid', '$productname', '$link')";
        // echo $sql;
        $result= $conn->query($sql);
        if($result){
            return 1;

        } else{
            return 0;
        }
        
    }

    public function addProductDescription($productname, $description, $monthlyprice, $annualprice, $productsku, $conn){
        $parentid="";
        $sql= "SELECT * FROM tbl_product WHERE `prod_name`='$productname' ";
        $result= $conn->query($sql);
        if($result->num_rows > 0){
            while($row= $result->fetch_assoc()){
                $productid= $row['id'];
            }
        } 
        $sql= "INSERT INTO tbl_product_description (`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES ('$productid', '$description', '$monthlyprice', '$annualprice', '$productsku')";
        // echo $sql;
        $result= $conn->query($sql);
        if($result){
            return 1;

        } else{
            return 0;
        }
        
    }

    public function fetchProductDetail($conn){
        $arr= array();
        $sql= "SELECT * FROM tbl_product INNER JOIN tbl_product_description ON tbl_product.id = tbl_product_description.prod_id";
        $result= $conn->query($sql);
        if($result->num_rows >0){
            while($row= $result->fetch_assoc()){
                array_push($arr, $row);

            }
            return $arr;
        }
    }

    public function fetchCategoryName($productid, $conn){
        $sql= "SELECT `prod_name` FROM tbl_product WHERE `id`='$productid'";
        $result= $conn->query($sql);
        $categoryname= $result->fetch_array()[0] ?? '' ;
        return $categoryname;
    }
}
?>