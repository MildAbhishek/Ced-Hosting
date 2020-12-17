<?php
session_start();

    // echo "<script>alert('Hii')</script>";
    $dataId = $_POST['id'];
    $dataName = $_POST['name'];
    $dataCatName =$_POST['category'];
    $dataAvailable =$_POST['available'];
    $dataMonPrice =$_POST['monprice'];
    $dataAnnPrice =$_POST['annprice'];
    $dataSku =$_POST['sku'];

    // echo $dataId;

    $products= array('id'=>$dataId, 'name'=>$dataName, 'category'=>$dataCatName, 'available'=>$dataAvailable, 'monprice'=>$dataMonPrice, 'annprice'=>$dataAnnPrice, 'sku'=>$dataSku);

    if(array_push($_SESSION['cart'], $products)) {
        echo 1;
    } else {
        echo 0;
    }
    
        

?>