<?php
include '../Dbcon.php';
include '../Product.php';

$connection= new Dbcon();
$newproduct= new Product();

// Add category
if(isset($_POST['submit'])){
    $parentid= $_POST['parentid'];
    $categoryname= $_POST['categoryname'];
    $categorylink= $_POST['categorylink'];
    // echo "$categoryname";

    if($parentid !='' && $categoryname !='' && $categorylink !=''){
        $result= $newproduct->addCategory($parentid, $categoryname, $categorylink, $connection->conn);
		// unset($_POST);
		if($result ==2){
			echo "<script>alert('Category Already Exist')</script>";
			
		}else if($result == 1){
            echo "<script>alert('Category is Successfully added')</script>";
        }else{
            echo "<script>alert('Category addition failed')</script>";
        }
    }

}
// End of Add category

// Update Category
if(isset($_POST['update'])){
	$categoryid= $_POST['editid'];
	$categoryname= $_POST['editname'];
	$categorylink= $_POST['editlink'];
	$categoryavailable= $_POST['editavailable'];
	// echo "<script>alert($categoryid)</script>";
	$result= $newproduct->editCategory($categoryid, $categoryname, $categorylink, $categoryavailable, $connection->conn);
	if ($result==1){
		echo "<script>alert('Successfully Updated')</script>";
	}
	if ($result==0){
		echo "<script>alert('Updation Failed')</script>";
	}
	if ($result==2){
		echo "<script>alert('Nothing Updated')</script>";
	}

}

// Show Category in Table
$result= $newproduct->fetchCategory($connection->conn);
// End of show category in Table

?>








<?php include 'adminsidebar.php' ?> 
<!-- End #sidebar -->
		
<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			<!-- Hidden Edit Form -->
			<div class="tab-content" id="edittable" style="display:none;">

				
					
						<form action="" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Category Id</label>
									    <input class="text-input small-input" type="text" id="editid" name="editid" readonly title="Non-Editable"/> <span class="input-notification success png_bg" style="display:none;">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Non Editable Field</small>
								</p>
								
                                <p>
									<label>Category Name</label>
									    <input class="text-input small-input" type="text" id="editname" name="editname" /> <span class="input-notification success png_bg" style="display:none;">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Enter Category Name</small>
                                </p>
                                
                                <p>
									<label>Category Link</label>
									    <input class="text-input small-input" type="text" id="editlink" name="editlink" /> <span class="input-notification success png_bg" style="display:none;">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Enter valid Link</small>
								</p>

								<p>
									<label>Product Available</label>
										<select name="editavailable" id="editavailable"  class="text-input small-input">
											<option value="1">Available</option>
											<option value="0">Unavailable</option>
										</select>
									    <br /><small>Choose From Dropdown</small>
										
								</p>
								
							
								<p>
									<input class="button" type="submit" value="Update" name="update"/>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
			<!-- End of Hidden Edit Form -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Show Table</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Add</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div>
						
						<table id="table_id" class="display">
							
							<thead>
								<tr>
								   <!-- <th><input class="check-all" type="checkbox" /></th> -->
								   <th>Category Id</th>
								   <th>Parent Id</th>
								   <th>Category Name</th>
								   <th>Category link</th>
								   <th>Availability</th>
								   <th>Launch Date</th>
								   <th>Action</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number current" title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
							<?php foreach($result as $key=>$val){?>
								<tr>

									
									<!-- <td><input type="checkbox" /></td> -->
									<td><?php echo $val['id'];?></td>
									<td><?php echo $val['prod_parent_id'];?></td>
									<td><?php echo $val['prod_name'];?></td>
									<td><?php echo $val['link'];?></td>
									<td><?php if($val['prod_available']==1) { echo ("Available");} else { echo ("Not Available");}?></td>
									<td><?php echo $val['prod_launch_date'];?></td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" class="editCatBtn" data-id="<?php echo $val['id']?>" data-name="<?php echo $val['prod_name']?>" data-link="<?php echo $val['link']?>" data-available="<?php echo $val['prod_available']?>"/></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" class="delCatBtn" data-id="<?php echo $val['id']?>"/></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
									
								</tr>
								<?php } ?>
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					<script>
						$(document).ready(function(){
							// alert("Validation");
							$flag=0;
							// $('#categoryparentid').blur(function(){
							// 	// alert("KeyUp");
							// 	$id= document.getElementById('categoryparentid').value;
							// 	$id= $.trim($id);
							// 	$id = $id.replace(/ +/g, '');
							// 	document.getElementById('categoryparentid').value= $id;
							// })

							$('#categoryname').blur(function(){
								alert("KeyUp");
								var $categoryname= document.getElementById('categoryname').value;
								$categoryname= $.trim($categoryname);
								$categoryname = $categoryname.replace(/  +/g, ' ');
								var regex1= /^[a-zA-Z ]*$/g;
								// var regex2= //;
								document.getElementById('categoryname').value= $categoryname;
								
								displayBtn();
								
							


							})

							$('#categorylink').blur(function(){
								// alert("KeyUp");
								$categorylink= document.getElementById('categorylink').value;
								$categorylink= $.trim($categorylink);
								$categorylink = $categorylink.replace(/ +/g, '');
								document.getElementById('categorylink').value= $categorylink;
								displayBtn();
								
							})

							function displayBtn(){
								var $id= document.getElementById('categoryparentid').value;
								var $categoryname= document.getElementById('categoryname').value;
								
								// var $categorylink= document.getElementById('categorylink').value;
								if(($id != '') && ($categoryname != '')){
									document.getElementById('submitBtn1').style.display="block";
								}

							}

							

						});
					</script>
					
					
						<form action="" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Category Parent</label>
										
										<select class="text-input small-input" id="categoryparentid"  name="parentid">
											<option value="">Select</option>
											<option value="1">Hosting</option>
										</select>
										<br /><small>Choose From Dropdown </small>
                                </p>
                                
                                <p>
									<label>Category Name</label>
									    <input class="text-input small-input" type="text" id="categoryname" name="categoryname" placeholder="Ex: Abc" required/> <span class="input-notification success png_bg" style="display:none;">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Enter only Alphabets</small>
                                </p>
                                
                                <p>
									<label>Category Link</label>
									    <input class="text-input small-input" type="text" id="categorylink" name="categorylink" placeholder="Ex: www.abc.com"/> <span class="input-notification success png_bg" style="display:none;">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>Enter Link in valid format</small>
								</p>
								
							
								<p>
									<input class="button" type="submit" value="Submit" name="submit" id="submitBtn1" style="display:none;"/>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
			
			
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			
			<!-- <div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div> -->
			
			<!-- End Notifications -->
			
		<?php include 'adminfooter.php' ?>
