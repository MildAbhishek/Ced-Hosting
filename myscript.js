// $(document).ready(function () {
    // alert("Hii...");
        // console.log('47');
    
    // Buy Now Button
    $('.buyNowBtn').click(function(){
        // alert("Hii..");
        var action = "cart";

        var dataId = $(this).data("id");
        var dataName = $(this).data("name");
        var dataCatName = $(this).data("catname");
        // var dataLink = $(this).data("data-link");
        var dataAvailable = $(this).data("available");
        // var dataDate = $(this).data("data-date");
        var dataMonPrice = $(this).data("monprice");
        var dataAnnPrice = $(this).data("annprice");
        var dataSku = $(this).data("sku");
        // var dataWebspace = $(this).data("data-webspace");
        // var dataBandwidth = $(this).data("data-bandwidth");
        // var dataFreeDomain = $(this).data("data-freedomain");
        // var dataTechnologySupport = $(this).data("data-technologysupport");
        // var dataMailbox = $(this).data("data-mailbox");
        // alert("Buy Now Btn");
        // alert(dataSku);
        // console.log(dataSku);



        $.ajax({
            url: 'myajax.php',
            type: "POST",
            data: { action: action, id: dataId, name: dataName, category: dataCatName, available: dataAvailable, monprice: dataMonPrice, annprice: dataAnnPrice, sku: dataSku },
            success: function (data) {
                if (data == 1) {
                    alert("Product Added to Cart");
                    // location.reload();
                } else {
                    alert("Product Addition in Cart Failed");
                }
            }
        });
    });

// });