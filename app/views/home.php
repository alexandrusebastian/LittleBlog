<?php
	@session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>Little Blog</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="/LittleBlog/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/LittleBlog/public/css/justified-nav.css" rel="stylesheet" type="text/css">
	<link href="/LittleBlog/public/css/templatemo_style.css" rel="stylesheet" type="text/css">

	<script>
	function refresh()
	{
		var container = document.getElementById('home');
		var masthead = document.getElementById('masthead');
		var content = document.getElementById('thumbnails_container');
		container.removeChild(masthead);
		container.insertBefore(masthead, content);
	}
	</script>
</head>
<body onresize="refresh()">
	<div id="main_container">
		<div class="container" id="home">
			<div class="header">
				<div class="navbar-header">
		          	<a href="#"><img src="/LittleBlog/public/images/templatemo_logo.jpg" alt="LittleBlog" class="templatemo_logo"></a>
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
			<img src="/LittleBlog/public/images/header_image1.jpg" alt="header image" class="img-responsive cleaner">
			<div class="masthead" id="masthead">
		        <ul class="nav nav-justified">
		          <li class="active"><a href="index.html">Home</a></li>
                  <li><a href="/LittleBlog/public/about">About</a></li>
		          <li><a href="/LittleBlog/public/topArticles">Top Articles</a></li>
		          <li><a href="/LittleBlog/public/searchArticles">Search Article</a></li>
		          <li><a href="/LittleBlog/public/contact">Contact</a></li>
		        </ul>
	      	</div> <!-- nav -->
			<div class="row" id="thumbnails_container">
            
				<div class="col-md-12">
					<h1>Welcome to our little blog</h1>
					<p>We promise that you'll like what you'll see here</p>
					<hr>
					<h2>Newest article:</h2>
                    <h3>"
                    	<?php
                    		if(isset($data[0])){
									$title = explode('_', $data[0]);
									$title = str_replace("-", " ", $title[0]);
									echo ($title);	
							}			
                    	?>
                    	"
                    </h3>
                    <p>Description not available <a href=
                    	<?php
                    		echo '"/LittleBlog/public/searchArticle/';
                    		echo preg_replace("/[^\w]+/", "-", $data[0]);
                    		echo '"';
                    	?>
                    	>Read all the article</a></p>
                    <hr>
                    <h3>Latest articles</h3>
				</div>
                
				<?php
				for($i = 0; $i < 2; $i++) {
					echo '<div class="row">';
					for($counter = 0; $counter < 4; $counter++){
						if(isset($data[$i * 4 + $counter])){
							$title = explode('_', $data[$i * 4 + $counter]);
							$id = $title[1];
							$title =  preg_replace("/[^\w]+/", "-", $title[0]);
							echo 
								'<div class="col-xs-6 col-sm-3 col-md-3">
									<a href="searchArticle/' . $title . "_" . $id . '" class="thumbnail">
										<img src="/LittleBlog/public/images/templatemo_image_02.jpg" alt="NO IMAGE" class="img-responsive">
										<p> ' . ($title) . '</p>
									</a>
								</div>';					
						} else {
							return;
						}
					}
					echo '</div>';
				}
					
				?>

				<!--
				<div class="row">
					<div class="col-xs-6 col-sm-3 col-md-3"><a href="preview.html" class="thumbnail"><img src="/LittleBlog/public/images/templatemo_image_01.jpg" alt="Model Girl 1" class="img-responsive"><p>Article One</p></a></div>
					<div class="col-xs-6 col-sm-3 col-md-3"><a href="preview.html" class="thumbnail"><img src="/LittleBlog/public/images/templatemo_image_02.jpg" alt="Model Girl 2" class="img-responsive"><p>Second Article</p></a></div>
					<div class="col-xs-6 col-sm-3 col-md-3"><a href="preview.html" class="thumbnail"><img src="/LittleBlog/public/images/templatemo_image_03.jpg" alt="Model Girl 3" class="img-responsive"><p>Article Three</p></a></div>
					<div class="col-xs-6 col-sm-3 col-md-3"><a href="preview.html" class="thumbnail"><img src="/LittleBlog/public/images/templatemo_image_04.jpg" alt="Model Girl 4" class="img-responsive"><p>Fourth Article</p></a></div>
				</div>
                
				<div class="row">
					<div class="col-xs-6 col-sm-3 col-md-3"><a href="preview.html" class="thumbnail"><img src="/LittleBlog/public/images/templatemo_image_05.jpg" alt="Model Girl 5" class="img-responsive"><p>Fifth Article</p></a></div>
					<div class="col-xs-6 col-sm-3 col-md-3"><a href="preview.html" class="thumbnail"><img src="/LittleBlog/public/images/templatemo_image_06.jpg" alt="Model Girl 6" class="img-responsive"><p>Sixth Article</p></a></div>
					<div class="col-xs-6 col-sm-3 col-md-3"><a href="preview.html" class="thumbnail"><img src="/LittleBlog/public/images/templatemo_image_07.jpg" alt="Model Girl 7" class="img-responsive"><p>Seventh Article</p></a></div>
					<div class="col-xs-6 col-sm-3 col-md-3"><a href="preview.html" class="thumbnail"><img src="/LittleBlog/public/images/templatemo_image_08.jpg" alt="Model Girl 8" class="img-responsive"><p>Eighth Article</p></a></div>
				</div>
				-->
				
				<div class="col-xs-12 col-md-12">
                	<a href="#" class="btn btn-primary" role="button">Previous</a>
                    <a href="#" class="btn btn-primary" role="button">1</a>
                    <a href="#" class="btn btn-primary" role="button">2</a>
                    <a href="#" class="btn btn-primary" role="button">3</a>
                    <a href="#" class="btn btn-primary" role="button">4</a>
                    <a href="#" class="btn btn-primary" role="button">Next</a>
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
</body>
</html>