<?php 
// session_start();
include_once 'Dbcon.php';
include_once 'Product.php';

$connection= new Dbcon();
$newproduct= new Product();
$result= $newproduct->fetchCategory($connection->conn);
?>
<!---header--->
<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<i class="sr-only">Toggle navigation</i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
								<i class="icon-bar"></i>
							</button>				  
							<div class="navbar-brand">
								<h1><a href="index.php"><span color:>Ced</span> <span>Hosting</span></a></h1>
							</div>
						</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
								<li><a href="about.php">About</a></li>
								<!-- <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages<i class="caret"></i></a>
										<ul class="dropdown-menu">
											<li><a href="blog.html">Blog</a></li>
											<li><a href="pricing.html">Pricing</a></li>
											<li><a href="faq.html">FAQ's</a></li>
											<li><a href="testimonials.html">Testimonials</a></li>
											<li><a href="history.html">History</a></li>
											<li><a href="support.html">Support</a></li>
											<li><a href="templatesetting.html">Template setting</a></li>
											<li><a href="login.html">Login</a></li>
											<li><a href="portfolio.html">Portfolio</a></li>
										</ul>
								</li>-->

								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services<i class="caret"></i></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
									<ul class="dropdown-menu">
										<?php foreach($result as $key=>$val){?>
										<li><a href="http://localhost/training/cedhosting/catpage.php?id=<?php echo $val['id']; ?>"><?php echo $val['prod_name'];?></a></li><?php } ?>
										<!-- <li><a href="wordpresshosting.html">WordPress Hosting</a></li>
										<li><a href="windowshosting.html">Windows Hosting</a></li>
										<li><a href="cmshosting.html">CMS Hosting</a></li> -->
									</ul>			
								</li>
								<li><a href="pricing.php">Pricing</a></li>
								<li><a href="blog.php">Blog</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>
								<?php if (isset($_SESSION['userdata'])){?>
									<li><a href="logout.php">Logout</a></li>
								
								<?php
								} else {?>
									<li><a href="login.php">Login</a></li>
								<?php
								}?>
								
							</ul>
									  
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	<!---header--->