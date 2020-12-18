<?php 
session_start(); 
// print_r($_SESSION['cart']);

if (isset($_GET['deleteproduct'])) {
    $id= $_GET['deleteproduct'];
    // echo "<script>alert(".$_SESSION['cart'][$id].")</script>";
    unset($_SESSION['cart'][$id]);
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | About :: w3layouts</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!---fonts-->
    <link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!---fonts-->
    <!--script-->
    <script src="js/modernizr.custom.97074.js"></script>
    <script src="js/jquery.chocolat.js"></script>
    <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--lightboxfiles-->
    <script type="text/javascript">
        $(function() {
            $('.team a').Chocolat();
        });
    </script>
    <script type="text/javascript" src="js/jquery.hoverdir.js"></script>
    <script type="text/javascript">
        $(function() {

            $(' #da-thumbs > li ').each(function() {
                $(this).hoverdir();
            });

        });
    </script>
    <!--script-->
</head>

<?php include_once 'header.php'; ?>

<!--cart--->
<!-- <div class="content"> -->
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Category Name</th>
                                                <th>SKU</th>
                                                <th>Billing Cycle</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $subtotal=0; ?>
                                            
                                            <?php foreach($_SESSION['cart'] as $key=> $val) {?>
                                           
                                            <tr>
                                                
                                                <td><?php echo $val['id']; ?></td>
                                                <td><?php echo $val['name']; ?></td>
                                                <td><?php echo $val['category']; ?></td>
                                                <td><?php echo $val['sku']; ?></td>
                                                <td>Billing Cycle</td>
                                                <!-- <td><input class="aa-cart-quantity" type="number" value="1"></td> -->
                                                <td><?php echo $val['monprice']; ?></td>
                                                <td><a class="remove" href="cart.php?deleteproduct=<?php echo $key; ?>" data-id="<?php echo $key; ?>">
                                                        <fa class="fa fa-close"></fa>
                                                    </a>
                                                </td>
                                                <?php $subtotal= $subtotal + $val['monprice']; ?>
                                            </tr>
                                            <?php } ?>
                                            
                                            <!-- <tr>
                                                <td><a class="remove" href="#">
                                                        <fa class="fa fa-close"></fa>
                                                    </a></td>
                                                <td><a href="#"><img src="img/man/polo-shirt-2.png" alt="img"></a></td>
                                                <td><a class="aa-cart-title" href="#">Polo T-Shirt</a></td>
                                                <td>$150</td>
                                                <td><input class="aa-cart-quantity" type="number" value="1"></td>
                                                <td>$150</td>
                                            </tr>
                                            <tr>
                                                <td><a class="remove" href="#">
                                                        <fa class="fa fa-close"></fa>
                                                    </a></td>
                                                <td><a href="#"><img src="img/man/polo-shirt-3.png" alt="img"></a></td>
                                                <td><a class="aa-cart-title" href="#">Polo T-Shirt</a></td>
                                                <td>$50</td>
                                                <td><input class="aa-cart-quantity" type="number" value="1"></td>
                                                <td>$50</td>
                                            </tr> -->
                                            <!-- <tr>
                                                <td colspan="6" class="aa-cart-view-bottom">
                                                    <div class="aa-cart-coupon">
                                                        <input class="aa-coupon-code" type="text" placeholder="Coupon">
                                                        <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                                                    </div>
                                                    <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <!-- Cart Total view -->
                            <div class="cart-view-total">
                                <h4>Cart Totals</h4>
                                <table class="aa-totals-table">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td><?php echo $subtotal;?></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td><?php echo $subtotal;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- </div> -->

<?php include_once 'footer.php'; ?>
<script>
    // $('.remove').click(function(){
    //     alert("Delete");
    // })
    function myfun(){
        // alert("Hello");
        var id= $(this).data("did");
        alert(id);
        // $price= document.getElementById('selectplan').value;
        // alert($price);
        // document.getElementById('price').value=$price;
    }
</script>