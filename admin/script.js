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
        alert("DelBtn");
        $dataId = $(this).attr("data-id");
        $action= "deletecategory"
        alert($dataId);
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
    })
});