<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>Little Blog preview</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="/LittleBlog/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/LittleBlog/public/css/justified-nav.css" rel="stylesheet" type="text/css">
	<link href="/LittleBlog/public/css/templatemo_style.css" rel="stylesheet" type="text/css">

	<script>
	function refresh()
	{
		var container = document.getElementById('preview');
		var masthead = document.getElementById('masthead');
		var content = document.getElementById('img_preview');
		container.removeChild(masthead);
		container.insertBefore(masthead, content);
	}
	</script>
</head>
<body onresize="refresh()">
	<div id="main_container">
		<div class="container" id="preview">
			<div class="header">
				<div class="navbar-header">
		          	<a href="#"><img src="/LittleBlog/public/images/templatemo_logo.jpg" alt="fantasy" class="templatemo_logo"></a>
		        </div>
      			<form  action="#" method="get" class="navbar-form navbar-right" role="search">
      				<div class="form-group">
      					<?php
      							//If a user exists, show his name
      						if (isset($_SESSION['user'])) {
      							echo 'Hello, ' . $_SESSION['user'] . '!';

      							echo "<div> <a href='/LittleBlog/public/insertArticle'>Insert Article</a> </div>";
      						}
							?>
							<div>
								<a href="/LittleBlog/public/signOut">Sign out</a></p>
							</div>
      				</div>
      			</form>
			</div>
			<!--<div class="cleaner"></div>-->
			<img src="/LittleBlog/public/images/header_image1.jpg" alt="header image" class="img-responsive cleaner">
			<div class="masthead" id="masthead">
                <ul class="nav nav-justified">
                    <li><a href="/LittleBlog/public/">Home</a></li>
                    <li><a href="/LittleBlog/public/about">About</a></li>
                    <li class="active"><a href="/LittleBlog/public/topArticles">Top Articles</a></li>
                    <li><a href="/LittleBlog/public/searchArticles">Search Article</a></li>
                    <li><a href="/LittleBlog/public/contact">Contact</a></li>
                </ul>
	      	</div> <!-- nav -->
			<div class="row" id="img_preview">
				<div class="col-md-9">
                
					<h3>
					<?php
						echo $data['article']->title;
					?>
					</h3>

					<p>
					<?php
						echo $data['article']->content;
					?>
					</p>
					
					<!--<a href="/LittleBlog/public/images/templatemo_preview.jpg" title="Click to see the original size">
                        <img src="/LittleBlog/public/images/templatemo_preview.jpg"
                             alt="Article" class="img-responsive" width="840" height="840">
					</a>	-->
                    			
				</div>
				<div class="col-md-3"> 
					<div class="preview_footer_container">				
						<div class="footer_item section_box col-xs-12 col-sm-4 col-md-12">
							<h4>
								<?php
									echo $data['article']->title;
								?>		
							</h4>
                            <p>Description of this article is not yet available</p>
                            <p><b>Written by</b>: 
								<?php 
									echo $data['article']->userid;
								?>
							</p>
							<p><b>Added</b>: 
								<?php 
									echo $data['article']->date;
								?>
							</p>
							<p><b>Views</b>:
								<?php 
									echo $data['article']->views;
								?>
							</p>
							<p><b>Rating</b>: 
								<?php 
									echo $data['article']->rating;
								?>
							</p>
						</div>
                        
						<!--
						<div class="footer_item section_box col-xs-12 col-sm-4 col-md-12">
							<h4>Top Articles</h4>
                            <ul class="sidebar_menu">
                                <li><a href="http://google.ro" rel="nofollow">Google</a></li>
                                <li><a href="http://www.youtube.com" rel="nofollow">Youtube</a></li>
                                <li><a href="http://www.facebook.com" rel="nofollow">Facebook</a></li>
                                <li><a href="#">This page</a></li>
							</ul>
                            <a href="#" class="btn btn-info" role="button">View More</a>
						</div>-->
                        
					</div> <!-- preview_footer_container -->

				</div>
			</div>
			
			<div class="row" id="other_downloads">
				<h3 class="col-lg-12">Featured Articles</h3>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<a href="http://www.Google.com" rel="nofollow" class="thumbnail">
                        <img src="/LittleBlog/public/images/templatemo_image_01.jpg" alt="Article 1">
						<p class="hideOverflow">
	                    	<abbr title="New Article - Article">New Article...</abbr>
	                    </p>
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<a href="http://www.facebook.com" rel="nofollow" class="thumbnail">
						<img src="/LittleBlog/public/images/templatemo_image_03.jpg" alt="Article 3">
						<p>Third Article</p>
					</a>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">                  
					<a href="http://www.yahoo.com" rel="nofollow" class="thumbnail">
						<img src="/LittleBlog/public/images/templatemo_image_05.jpg" alt="Article 5">
						<p>Fifth Article</p>
					</a>                  
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<a href="http://www.youtube.com" rel="nofollow" class="thumbnail">
						<img src="/LittleBlog/public/images/templatemo_image_07.jpg" alt="Article 7">
						<p>Model Article</p>
					</a>
				</div>
			</div>
		</div>
		<footer class="container">
			<div class="credit row">
				<div class="col-md-6 col-md-offset-3">
                    <div id="templatemo_footer">
                        Alexandru-Sebastian SARBU &nbsp; &nbsp; &nbsp; Nicusor IANCU-PUIU &nbsp; &nbsp; &nbsp;Sabina-Elena CARAPENCEA
                    </div>
				</div>
				<div class="col-md-3">
					<div style="text-align: right">
						<a href="http://www.facebook.com" rel="nofollow"><img src="/LittleBlog/public/images/facebook.png" alt="Like us on Facebook"></a>
						<a href="#"><img src="/LittleBlog/public/images/twitter.png" alt="Follow us on Twitter"></a>
						<a href="#"><img src="/LittleBlog/public/images/rss.png" alt="RSS feeds"></a>
					</div>
				</div>				
			</div>
		</footer>	
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>