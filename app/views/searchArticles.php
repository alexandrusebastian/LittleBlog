
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>LittleBlog</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="/LittleBlog/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/LittleBlog/public/css/justified-nav.css" rel="stylesheet" type="text/css">
	<link href="/LittleBlog/public/css/templatemo_style.css" rel="stylesheet" type="text/css">
	<script src="//cdn.ckeditor.com/4.4.6/full/ckeditor.js"></script>
	<script>
	function refresh()
	{
		var container = document.getElementById('contact');
		var masthead = document.getElementById('masthead');
		var content = document.getElementById('content');
		container.removeChild(masthead);
		container.insertBefore(masthead, content);
	}
	</script>
</head>
<body onresize="refresh()">
	<div id="main_container">
		<div class="container" id="contact" >
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

      							if(isset($_SESSION['admin'])) {      								
      								echo "<div> <a href='/LittleBlog/public/insertArticle'>Insert Article</a> </div>";
      							}
      						}
							?>
							<div>
								<a href="/LittleBlog/public/signOut">Sign out</a></p>
							</div>
      				</div>
      			</form>
			</div>
            <img src="images/header_image1.jpg" alt="header image" class="img-responsive cleaner">
            <div class="masthead" id="masthead">
                <ul class="nav nav-justified">
                  <li><a href="/LittleBlog/public/">Home</a></li>
                  <li><a href="/LittleBlog/public/about">About</a></li>
		          <li><a href="/LittleBlog/public/topArticles">Top Articles</a></li>
		          <li class="active"><a href="/LittleBlog/public/searchArticles">Search Article</a></li>
		          <li><a href="/LittleBlog/public/contact">Contact</a></li>
                </ul>
            </div> 
            <div class="row" id="content">
            	<div class="col-md-8">
				<h3>
					Search Articles by Keywords
				</h3>
			</div>
			</div>		
			
				<div class="row">					
					<div class="col-md-9">
						<form action="/LittleBlog/public/searchArticles" method="post" id="contact_form" role="form" >
							<h2>Search Articles</h2>
							<h3>
								<font color="red">
									<?php
										if(array_key_exists('error_sin', $data)) {
											echo $data['error_sin'];
										}
									?>
								</font>
							</h3>
							<div class="form-group left-inner-addon" >
								<span class="glyphicon glyphicon-chevron-up"></span>
								<input name="search" type="text" class="form-control" id="search_id" placeholder="Search Keywords" >
							</div>
							<div class="form-group left-inner-addon">
									<button type="submit" name = "signin" class="btn btn-primary">Search</button>
									<br></br>
							</div>	
							<?php
								if(!empty($_POST['search'])){
									$articles = preg_replace('#\s+#', ' ', $_POST['search']);
									$articles = explode(" ", rtrim($articles));
									//(Article::searchArticles($articles));
									$articles = Article::searchArticles($articles);
									foreach($articles as $art) {
										$title = explode('_', $art);
										$id = $title[1];
										$title =  preg_replace("/[^\w]+/", "-", $title[0]);
										echo 
											'<div class="col-xs-6 col-sm-3 col-md-3">
												<a href="searchArticle/' . $title . "_" . $id . '" class="thumbnail">
													<img src="/LittleBlog/public/images/templatemo_image_02.jpg" alt="NO IMAGE" class="img-responsive">
													<p> ' . ($title) . '</p>
												</a>
											</div>';
									}
								}
							?>
						</form>

					</div>						
				</div> 
      <hr class="featurette-divider">
		<footer class="container">
			<div class="credit row">
				<div class="col-md-6 col-md-offset-3">
                    <div id="templatemo_footer">
                        Alexandru-Sebastian SARBU &nbsp; &nbsp; &nbsp; Nicusor IANCU-PUIU &nbsp; &nbsp; &nbsp;Sabina-Elena CARAPENCEA
                    </div>
				</div>
				<div class="col-md-3">
					<div style="text-align: right">
						<a href="http://www.facebook.com/" rel="nofollow"><img src="images/facebook.png" alt="Like us on Facebook"></a>
						<a href="#"><img src="images/twitter.png" alt="Follow us on Twitter"></a>
						<a href="#"><img src="images/rss.png" alt="RSS feeds"></a>
					</div>
				</div>				
			</div>
		</footer>
	</div>
</body>-->
</html>