<?php 
include '../Dbcon.php';
include '../Product.php';

$connection= new Dbcon();
$newproduct= new Product();
$productcategory="";
// List coming in dropdown 
$result= $newproduct->fetchCategory($connection->conn);

//ADD PRODUCT =>Getting value of form in Post Method
if(isset($_POST['submit'])){
    $productcategory= $_POST['productcategory'];
    $productname= $_POST['productname'];
    $pageurl= $_POST['pageurl'];
    $monthlyprice= $_POST['monthlyprice'];
    $annualprice= $_POST['annualprice'];
    $productsku= $_POST['productsku'];

    $productwebspace= $_POST['productwebspace'];
    $productbandwidth= $_POST['productbandwidth'];
    $productfreedomain= $_POST['productfreedomain'];
    $productlanguagesupport= $_POST['productlanguagesupport'];
    $productmailbox= $_POST['productmailbox'];

    $features= array('productwebspace'=>$productwebspace, 'productbandwidth'=>$productbandwidth, 'productfreedomain'=>$productfreedomain, 'productlanguagesupport'=>$productlanguagesupport, 'productmailbox'=>$productmailbox);
    $description= json_encode($features);
    // echo "<script>alert('$description')</script>";
    //Addition of Product Detail in tbl_product
    $result= $newproduct->addProduct($productcategory, $productname, $pageurl, $connection->conn);
    if($result == 1){
        echo "<script>alert('Product details Added Successfully')</script>";
    } else {
        echo "<script>alert('Product details Addition Failed')</script>";
    }

	//Addition of Product Description in tbl_prod_description
	$result= $newproduct->addProductDescription($productname, $description, $monthlyprice, $annualprice, $productsku, $connection->conn);
	if($result == 1){
        echo "<script>alert('Product details Added Successfully')</script>";
    } else {
        echo "<script>alert('Product details Addition Failed')</script>";
    }
}
// End of ADD PRODUCT

// UPDATE PRODUCT =>Getting value of form in Post Method

if(isset($_POST['update'])){
	$productId= $_POST['editProductId'];
    $productcategory= $_POST['editProductCategory'];
	$productname= $_POST['editProductName'];
	$productavailable= $_POST['editProductAvailable'];
    $pageurl= $_POST['editProductPageUrl'];
    $monthlyprice= $_POST['editProductMonPrice'];
    $annualprice= $_POST['editProductAnnPrice'];
    $productsku= $_POST['editProductSku'];

    $productwebspace= $_POST['editProductWebSpace'];
    $productbandwidth= $_POST['editProductBandWidth'];
    $productfreedomain= $_POST['editProductFreeDomain'];
    $productlanguagesupport= $_POST['editProductTechSupport'];
    $productmailbox= $_POST['editProductMailBox'];

    $features= array('productwebspace'=>$productwebspace, 'productbandwidth'=>$productbandwidth, 'productfreedomain'=>$productfreedomain, 'productlanguagesupport'=>$productlanguagesupport, 'productmailbox'=>$productmailbox);
    $description= json_encode($features);
    // echo "<script>alert('$description')</script>";
    //Addition of Product Detail in tbl_product
    $result= $newproduct->updateProduct($productId, $productcategory, $productname, $productavailable, $pageurl, $connection->conn);
    if($result == 1){
        echo "<script>alert('Product details Updated Successfully')</script>";
    } else {
        echo "<script>alert('Product details Updation Failed')</script>";
    }

	//Addition of Product Description in tbl_prod_description
	$result= $newproduct->updateProductDescription($productname, $description, $monthlyprice, $annualprice, $productsku, $connection->conn);
	if($result == 1){
        echo "<script>alert('Product details Updated Successfully')</script>";
    } else {
        echo "<script>alert('Product details Updation Failed')</script>";
    }
}


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
			
			
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Show Table</a></li> <!-- href must be unique and match the id of target div -->
						<!-- <li><a href="#tab2">Add</a></li> -->
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
						<!-- EDIT PRODUCT HIDDEN TABLE -->
						<div class="" id="editProductTable" style="display: none;">
							<form action="" method="POST">
								
								<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
									<p>
										<label>Product ID</label>
											<input class="text-input small-input" type="text" id="editProductId" name="editProductId" placeholder="Ex: Abc-123" required readonly/> <span class="input-notification success png_bg" style="display:none">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
											<br /><small>Non Editable Field</small>
									</p>
									<p>
										<label>Select Product Category<span style="color:red;">*</span></label>              
										<select class="small-input" name="editProductCategory" id="editProductCategory" required>
											<option value="">Please Select</option>
										<?php foreach($result as $key=>$val){?>
											<option value="<?php echo $val['prod_name']; ?>" ><?php echo $val['prod_name']; ?></option>
										<?php } ?>
											<!-- <option value="option2">Option 2</option>
											<option value="option3">Option 3</option>
											<option value="option4">Option 4</option> -->
										</select> 
									</p>
									
									<p>
										<label>Enter Product Name<span style="color:red;">*</span></label>
											<input class="text-input small-input" type="text" id="editProductName" name="editProductName" placeholder="Ex: Abc-123" required/> <span class="input-notification success png_bg" style="display:none">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
											<br /><small>Only Alpha Numeric Value is Allowed</small>
									</p>

									<p>
										<label>Enter Product Availability<span style="color:red;">*</span></label>
											<input class="text-input small-input" type="text" id="editProductAvailable" name="editProductAvailable" placeholder="Ex: Abc-123"  required/> <span class="input-notification success png_bg" style="display:none">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
											<br /><small>Only Alpha Numeric Value is Allowed</small>
									</p>
									
									<p>
										<label>HTML</label>
										<textarea class="text-input small-input datepicker" type="text" id="editProductPageUrl" name="editProductPageUrl" placeholder="Ex: www.abc.com"></textarea> <span class="input-notification error png_bg" style="display:none">Error message</span>
										<br><small>Enter HTML in valid format</small>
									</p><br>
									
									<h3>Product Description</h3>
									<p>
										<label>Enter Monthly Price<span style="color:red;">*</span></label>
										<input class="text-input small-input" type="text" id="editProductMonPrice" name="editProductMonPrice" placeholder="Ex: 99.25" required/>
										<br><small>Enter Numeric value only</small>
									</p>

									<p>
										<label>Enter Annual Price<span style="color:red;">*</span></label>
										<input class="text-input small-input" type="text" id="editProductAnnPrice" name="editProductAnnPrice" placeholder="Ex: 999.99" required/>
										<br><small>Enter Numeric value only</small>
									</p>

									<p>
										<label>SKU<span style="color:red;">*</span></label>
										<input class="text-input small-input" type="text" id="editProductSku" name="editProductSku" placeholder="Ex: Abc@123" required/>
										<br><small>Not only special character is allowed.</small>
									</p><br>
									
									<h3>Features</h3>
									<p>
										<label>Web Space (in GB)<span style="color:red;">*</span></label>
										<input class="text-input small-input" type="text" id="editProductWebSpace" name="editProductWebSpace" placeholder="Ex: 5.5" required/>
										<br><small>Enter 0.5 for 512 MB</small>
									</p>

									<p>
										<label>Bandwidth (in GB)<span style="color:red;">*</span></label>
										<input class="text-input small-input" type="text" id="editProductBandWidth" name="editProductBandWidth" placeholder="Ex: 5.5" required/>
										<br><small>Enter 0.5 for 512 MB</small>
									</p>

									<p>
										<label>Free Domain<span style="color:red;">*</span></label>
										<input class="text-input small-input" type="text" id="editProductFreeDomain" name="editProductFreeDomain" placeholder="Ex: 3" required/>
										<br><small>Enter numeric value only. '0' if no domain available in this service</small>
									</p>

									<p>
										<label>Language / Technology Support<span style="color:red;">*</span></label>
										<input class="text-input medium-input" type="text" id="editProductTechSupport" name="editProductTechSupport" placeholder="Ex: Java2" required/>
										<br><small>Enter Alpha Numeric Value. Separate by (,) Ex: PHP, MySQL, MongoDB</small>
									</p>

									<p>
										<label>Mailbox<span style="color:red;">*</span></label>
										<input class="text-input small-input" type="number" id="editProductMailBox" name="editProductMailBox" placeholder="Ex: 5" required/>
										<br><small>Enter only Numeric value. Enter 0 if None. </small>
									</p>
									
									
									<p>
										<input class="button" type="submit" value="Update" name="update" id="updateProductBtn"/>
									</p>
									
								</fieldset>
								
								<div class="clear"></div><!-- End .clear -->
								
							</form>
						</div>
						<!-- END OF EDIT PRODUCT HIDDEN TABLE -->
						
						<div class="table-responsive">
						<table>
						
							
							<thead>
								<tr>
								   <!-- <th><input class="check-all" type="checkbox" /></th> -->
								   <th>Product Id</th>
								   <th>Product Name</th>
								   <th>Category Name</th>
								   <th>HTML</th>
								   <th>Availability</th>
								   <th>Launch Date</th>
								   <th>Monthly Price</th>
								   <th>Annual Price</th>
								   <th>SKU</th>
								   <th>Web Space</th>
								   <th>Bandwidth</th>
								   <th>Free Domain</th>
								   <th>Techonology Support</th>
								   <th>Mailbox</th>
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
							<?php $detail= $newproduct->fetchProductDetail($connection->conn); 
							foreach ($detail as $key => $val) {?>
							
							<?php 
							$description= json_decode ($val['description']);
							foreach ($description as $key=> $value){
								$webspace= $description->productwebspace;
								$bandwidth= $description->productbandwidth;
								$freedomain= $description->productfreedomain;
								$technologysupport= $description->productlanguagesupport;
								$mailbox= $description->productmailbox;
							}?>

								<tr>
									<!-- <td><input type="checkbox" /></td> -->
									<td><?php echo $val['prod_id']; ?></td>
									<td><?php echo $val['prod_name']; ?></td>
									<td><?php echo $categoryname= $newproduct->fetchCategoryName($val['prod_parent_id'], $connection->conn)?></td>
									<td><?php echo $val['html']; ?></td>
									<td><?php if($val['prod_available']==1){echo "Available";}else{echo "Not Available";} ?></td>
									<td><?php echo $val['prod_launch_date']; ?></td>
									<td><?php echo "Rs.".$val['mon_price']; ?></td>
									<td><?php echo "Rs.".$val['annual_price']; ?></td>
									<td><?php echo $val['sku']; ?></td>
									<td><?php echo "$webspace GB" ; ?></td>
									<td><?php echo "$bandwidth GB" ; ?></td>
									<td><?php echo "$freedomain" ; ?></td>
									<td><?php echo "$technologysupport" ; ?></td>
									<td><?php echo "$mailbox" ; ?></td>
									<td><?php //echo $val['description']; ?></td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" class="editProdBtn" data-id="<?php echo $val['prod_id'];?>"
										 data-name="<?php echo $val['prod_name']; ?>"  data-catname="<?php echo $categoryname;?>" data-link="<?php echo $val['html'];?>" 
										 data-available="<?php echo $val['prod_available'];?>"  data-date="<?php echo $val['prod_launch_date']; ?>"  data-monprice="<?php echo $val['mon_price']; ?>"
										 data-annprice="<?php echo $val['annual_price'];?>"  data-sku="<?php echo $val['sku'];?>" data-webspace='<?php echo "$webspace" ;?>'  
										 data-bandwidth='<?php echo "$bandwidth";?>'  data-freedomain='<?php echo "$freedomain";?>'  data-technologysupport='<?php echo "$technologysupport" ; ?>'  
										 data-mailbox='<?php echo "$mailbox" ; ?>'/></a>


										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete"  class="delProdBtn" data-id="<?php echo $val['prod_id']; ?>"/></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
								
							<?php } ?>
							</tbody>
							
						</table>
						</div>
					</div> <!-- End #tab1 -->
					
					
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
			
			
			<div class="clear"></div>
			
		<?php include 'adminfooter.php' ?>
