<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simpla Admin</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
<link rel="stylesheet" href="adminstyle.css">
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
<!-- Text Area API -->
<script src="https://cdn.tiny.cloud/1/xbxnoeo7hjxcj0z8n39jxvhnh7k4v647ybf0w6wsgxyuezqq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!-- End of Text Area API -->
<script type="text/javascript" src="script.js"></script>
</head>
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
        <?php 
		$filename = basename($_SERVER['REQUEST_URI']);
		//echo $filename;
		//die();
		$productmenu = array('products.php','categories.php', 'viewproduct.php');
		$usermenu = array('users.php');
	?>	
			<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile">John Doe</a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />
				<br />
				<a href="#" title="View the Site">View the Site</a> | <a href="../logout.php" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="http://www.google.com/" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				
				<li> 
					<a href="#" class="nav-top-item <?php if(in_array($filename,$productmenu)): ?>current<?php endif; ?>"> <!-- Add the class "current" to current menu item -->
					Products
					</a>
					<ul>
						<li><a <?php if($filename=='products.php'): ?>class="current"<?php endif; ?> href="products.php">Add Products</a></li>
						<li><a <?php if($filename=='categories.php'): ?>class="current"<?php endif; ?> href="categories.php">Add Category</a></li> <!-- Add class "current" to sub menu items also -->
						<li><a <?php if($filename=='viewproduct.php'): ?>class="current"<?php endif; ?> href="viewproduct.php">View Products</a></li>
						<li><a href="#">Create New Offers</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Orders
					</a>
					<ul>
						<li><a href="#">Pending Orders</a></li>
                        <li><a href="#">Completed Orders</a></li>
                        <li><a href="#">Cancelled Orders</a></li>
                        <li><a href="#">Generate Invoice</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Services
					</a>
					<ul>
						<li><a href="#">Active Services</a></li>
						<li><a href="#">Expired Services</a></li>
						
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Users
					</a>
					<ul>
						<li><a href="#">All User list</a></li>
						<li><a href="#">Create New User</a></li>
						
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Blog
					</a>
					<ul>
						<li><a href="#">Add New Blog</a></li>
						<li><a href="#">View All Blogs</a></li>
						
					</ul>
                </li> 
                
                <li>
					<a href="#" class="nav-top-item">
						Accounts
					</a>
					<ul>
						<li><a href="#">Update Company Info</a></li>
						<li><a href="#">Change Security Question</a></li>
						<li><a href="#">Change Password</a></li>
						
					</ul>
				</li>   
				
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="#" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->