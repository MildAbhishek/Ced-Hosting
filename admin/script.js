$(document).ready(function(){
    $('.editCatBtn').click(function(){
        // alert("EditBtn");
        $dataId = $(this).attr("data-id");
        $dataName = $(this).attr("data-name");
        $datalink = $(this).attr("data-link");
        $dataAvailable = $(this).attr("data-available");
        // alert($dataId);
        document.getElementById('edittable').style.display="block";

        document.getElementById('editid').value=$dataId;
        document.getElementById('editname').value=$dataName;
        document.getElementById('editlink').value=$datalink;
        document.getElementById('editavailable').value=$dataAvailable;
    })

    $('.delCatBtn').click(function(){
        // alert("DelBtn");
        if (confirm("Do You want to delete")){
            $dataId = $(this).attr("data-id");
            $action= "deletecategory"
            // alert($dataId);
            $.ajax({
                url:'ajax.php',
                type:'POST',
                data:{id : $dataId, action : $action},
                success : function(data){
                    if(data==1){
                        alert("Category Deleted");
                    }else {
                        alert("Deletion Failed");
                    }
                }
            });
        }
    })

    $('.editProdBtn').click(function(){
        // alert("EditBtn");
        $dataId = $(this).attr("data-id");
        $dataName = $(this).attr("data-name");
        $dataCatName = $(this).attr("data-catname");
        $dataLink = $(this).attr("data-link");
        $dataAvailable = $(this).attr("data-available");
        $dataDate = $(this).attr("data-date");
        $dataMonPrice = $(this).attr("data-monprice");
        $dataAnnPrice = $(this).attr("data-annprice");
        $dataSku = $(this).attr("data-sku");
        $dataWebspace = $(this).attr("data-webspace");
        $dataBandwidth = $(this).attr("data-bandwidth");
        $dataFreeDomain = $(this).attr("data-freedomain");
        $dataTechnologySupport = $(this).attr("data-technologysupport");
        $dataMailbox = $(this).attr("data-mailbox");
        alert($dataLink);
        document.getElementById('editProductTable').style.display="block";

        document.getElementById('editProductId').value=$dataId;
        document.getElementById('editProductCategory').value=$dataCatName;
        document.getElementById('editProductName').value=$dataName;
        document.getElementById('editProductAvailable').value=$dataAvailable;
        document.getElementById('editProductPageUrl').value=$dataLink;
        document.getElementById('editProductMonPrice').value=$dataMonPrice;
        document.getElementById('editProductAnnPrice').value= $dataAnnPrice;
        document.getElementById('editProductSku').value=$dataSku;
        document.getElementById('editProductWebSpace').value= $dataWebspace;
        document.getElementById('editProductBandWidth').value= $dataBandwidth;
        document.getElementById('editProductFreeDomain').value= $dataFreeDomain;
        document.getElementById('editProductTechSupport').value=  $dataTechnologySupport;
        document.getElementById('editProductMailBox').value= $dataMailbox;
    })

    $('.delProdBtn').click(function(){
        if(confirm("Do You Really want to Delete This Product")){
            // alert("DelBtn");
            $dataId = $(this).attr("data-id");
            $action= "deleteproduct"
            // alert($dataId);
            $.ajax({
                url:'ajax.php',
                type:'POST',
                data:{id : $dataId, action : $action},
                success : function(data){
                    if(data==1){
                        alert("Product Deleted");
                        location.reload();
                    }else {
                        alert("Deletion Failed");
                    }
                }
            });
        }
    });


   //Validations For Add Product Table

    // $(document).ready(function(){
    // alert("Hii..");
    $('#productname').blur(function(){
        // alert("KeyUp");
        $productname= document.getElementById('productname').value;
        // alert($productname);
        $productname= $productname.trim();
        $productname = $productname.replace(/  +/g, ' ');
        $productname = $productname.replace(/--+/g, '- ');
        
        var regex1 = /^[A-Za-z0-9 \-]+$/;
        var regex2= /\D/;
        // document.getElementById('productname').value= $productname;
        if (regex1.test($productname) && regex2.test($productname) ){
            document.getElementById('productname').value= $productname;
        } else {
            document.getElementById('productname').value="";
            alert("Enter Valid Format of Product Name");
        }
        displayBtn();
        
    })

    $('#mon-price').blur(function(){
        // alert("Price");
        var monthlyprice= document.getElementById('mon-price').value;
        // alert(monthlyprice);
        $length= monthlyprice.length;
        // alert($length);
        monthlyprice= monthlyprice.trim();
        monthlyprice= monthlyprice.replace(/ +/g, '');
        if($length <= 15){
            // alert("Yeah");
            var regex= /(?<=^| )\d+(\.\d+)?(?=$| )|(?<=^| )\.\d+(?=$| )/;
            if(regex.test(monthlyprice)){
            document.getElementById('mon-price').value= monthlyprice;
            } else {
                document.getElementById('mon-price').value="";
                alert("Enter Valid Format of Monthly Price");
            }
        } else{
            // alert("Maximum 15 length is allowed");
            document.getElementById('mon-price').value= '';
            alert("Maximum 15 length is Allowed");
        }
        displayBtn();
    });

    $('#ann-price').blur(function(){
        // alert("Price");
        var annualprice= document.getElementById('ann-price').value;
        // alert(annualprice);
        $length= annualprice.length;
        // alert($length);
        annualprice= annualprice.trim();
        annualprice= annualprice.replace(/ +/g, '');
        if($length <= 15){
            // alert("Yeah");
            var regex= /(?<=^| )\d+(\.\d+)?(?=$| )|(?<=^| )\.\d+(?=$| )/;
            if(regex.test(annualprice)){
            document.getElementById('ann-price').value= annualprice;
            } else {
                document.getElementById('ann-price').value="";
                alert("Enter Valid Format of Annual Price");
            }
        } else{
            // alert("Maximum 15 length is allowed");
            document.getElementById('ann-price').value= '';
            alert("Maximum 15 length is Allowed");
        }
        displayBtn();
    });

    $('#sku').blur(function(){
        alert("SKU");
    })


    $('#web-space').blur(function(){
        // alert("Price");
        var webspace= document.getElementById('web-space').value;
        // alert(webspace);
        
        webspace= webspace.trim();
        webspace= webspace.replace(/ +/g, '');
        $length= webspace.length;
        // alert($length);

        if($length <= 5){
            // alert("Yeah");
            var regex= /(?<=^| )\d+(\.\d+)?(?=$| )|(?<=^| )\.\d+(?=$| )/;
            if(regex.test(webspace)){
            document.getElementById('web-space').value= webspace;
            } else {
                document.getElementById('web-space').value="";
                alert("Enter Valid Format of Web Space");
            }
        } else{
            // alert("Maximum 5 length is allowed");
            document.getElementById('web-space').value= '';
            alert("Maximum 5 length is Allowed");
        }
        displayBtn();
    });

    $('#band-width').blur(function(){
        // alert("Price");
        var bandwidth= document.getElementById('band-width').value;
        // alert(bandwidth);
        
        bandwidth= bandwidth.trim();
        bandwidth= bandwidth.replace(/ +/g, '');
        $length= bandwidth.length;
        // alert($length);

        if($length <= 5){
            // alert("Yeah");
            var regex= /(?<=^| )\d+(\.\d+)?(?=$| )|(?<=^| )\.\d+(?=$| )/;
            if(regex.test(bandwidth)){
            document.getElementById('band-width').value= bandwidth;
            } else {
                document.getElementById('band-width').value="";
                alert("Enter Valid Format of Band Width");
            }
        } else{
            // alert("Maximum 5 length is allowed");
            document.getElementById('band-width').value= '';
            alert("Maximum 5 length is Allowed");
        }
        displayBtn();
    });

    $('#free-domain').blur(function(){
        // alert("Free Domain");
        var freedomain= document.getElementById('free-domain').value;
        // alert(freedomain);
        freedomain= freedomain.trim();
        freedomain= freedomain.replace(/ +/g, '');

        var regex= /^[0-9]*$/;
        if (regex.test(freedomain)){
            // alert("Yes");
            document.getElementById('free-domain').value=freedomain;
        } else {
            alert("Only Digits are allowed");
            document.getElementById('free-domain').value="";
        }
        displayBtn();
    })

    $('#mail-box').blur(function(){
        // alert("Mail Box");
        var mailbox= document.getElementById('mail-box').value;
        // alert(mailbox);
        mailbox= mailbox.trim();
        mailbox= mailbox.replace(/ +/g, '');

        var regex= /^[0-9]*$/;
        if (regex.test(mailbox)){
            // alert("Yes");
            document.getElementById('mail-box').value=mailbox;
        } else {
            alert("Only Digits are allowed");
            document.getElementById('mail-box').value="";
        }
        displayBtn();
    })

    $('#tech-support').blur(function(){
        // alert("KeyUp");
        var $techsupport= document.getElementById('tech-support').value;
        // alert($techsupport);
        $techsupport= $techsupport.trim();
        $techsupport = $techsupport.replace(/  +/g, ' ');
        $techsupport = $techsupport.replace(/--+/g, '-');
        
        var regex1 = /^[A-Za-z0-9 \,]+$/;
        var regex2= /\D/;
        // document.getElementById('techsupport').value= $techsupport;
        if (regex1.test($techsupport) && regex2.test($techsupport) ){
            document.getElementById('tech-support').value= $techsupport;
        
        }else {
            alert("Enter Valid Format of Technology Support Field");
            document.getElementById('tech-support').value='';
        }
        displayBtn();
        
    })
    function displayBtn(){
        if(($('#productname').val()) != '' && ($('#mon-price').val()) != '' && ($('#ann-price').val()) != ''  && ($('#web-space').val()) != '' && ($('#band-width').val()) != '' && ($('#free-domain').val()) != '' && ($('#mail-box').val()) != '' && ($('#tech-support').val()) != '') {
            document.getElementById('addProductBtn').style.display="block";
            // $("#addProductBtn").removeAttr('disabled');
        } 
    }
    
//End of Validations for Add Product Table.
// })

// Validations for Update Product table
});