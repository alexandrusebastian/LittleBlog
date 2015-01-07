<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>About Little Blog</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="/LittleBlog/public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="/LittleBlog/public/css/justified-nav.css" rel="stylesheet" type="text/css">
	<link href="/LittleBlog/public/css/templatemo_style.css" rel="stylesheet" type="text/css">

	<script>
	function refresh()
	{
		var container = document.getElementById('about');
		var masthead = document.getElementById('masthead');
		var content = document.getElementById('content');
		container.removeChild(masthead);
		container.insertBefore(masthead, content);
	}

		function changeBackground() {		
			
			var color = "<?php echo $_SESSION['color'] ?>"

   			document.body.style.background = (color == "white" ? "lightGray" : "black")

   			var el = [ 
   				document.getElementsByTagName('div'), 
   				document.getElementsByTagName('span'), 
				document.getElementsByTagName('p'), 
				document.getElementsByTagName('h1'), 
				document.getElementsByTagName('h2'), 
				document.getElementsByTagName('h3'), 
				document.getElementsByTagName('h4') 
			]; 
			for (i in el) { 
				for (j in el[i]) { 
					if (el[i][j].style) {

						 el[i][j].style.color = (color == "white" ? "black" : "white")
					}
				} 
			} 

			var list = document.getElementsByClassName("home")
			for (var i = 0; i < list.length; i++) {
				list[i].style.backgroundColor = (color == "white" ? "white" : "black")
			}

}

	</script>
</head>
<body onload="changeBackground()" onresize="refresh()" >
	<div id="main_container">
		<div class="container home">
			<div class="header">

				<div class="navbar-header">
		          	<img  src="/LittleBlog/public/images/templatemo_logo.png" alt="LittleBlog" class="templatemo_logo">
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
		    <img src="/LittleBlog/public/images/header_image1.jpg" alt="header image" class="img-responsive cleaner">
			<div class="masthead" id="masthead">
                <ul class="nav nav-justified">
                    <li><a href="/LittleBlog/public/">Home</a></li>
                    <li class="active"><a href="/LittleBlog/public/about">About</a></li>
                    <li><a href="/LittleBlog/public/topArticles">Top Articles</a></li>
                    <li><a href="/LittleBlog/public/searchArticles">Search Article</a></li>
                    <li><a href="/LittleBlog/public/contact">Contact</a></li>
                </ul>
	      	</div> <!-- nav -->
			
			<!--<div class="row" id="content">
				<div class="col-md-6">
					<h2>Nam Imperdiet Aliquam</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed mauris eu ligula convallis fringilla. Morbi at tincidunt justo, non vestibulum nisi. Quisque dictum mi ut ullamcorper iaculis. Donec in mi ut nulla consectetur dictum. In elementum a urna quis feugiat. Quisque a porttitor metus. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow">CSS</a>.</p>
				</div>
				<div class="col-md-6">
					<h2>Aliquam Erat Volutpat</h2>
					<p>This is free responsive <a href="http://www.facebook.com">Facebook</a> that can be viewed in any mobile device. Vivamus adipiscing, lorem a rhoncus adipiscing, dolor massa hendrerit sem, suscipit fermentum justo dolor at sapien. Sed volutpat libero lectus, nec pulvinar tellus dictum eu. Praesent luctus feugiat mattis. Pellentesque ut diam vehicula, mattis nisi at, convallis neque.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<h3>Morbi Quis </h3>
					<p>Maecenas adipiscing semper sapien at pretium. Aenean tortor leo, venenatis vitae pretium sit amet, blandit porta diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
				</div>
				<div class="col-md-3">
					<h3>Integer ac Urna</h3>
					<p><a href="#">Maecenas adipiscing</a> semper sapien at pretium. Aenean tortor leo, venenatis vitae pretium sit amet, blandit porta diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.            </p>
				</div>
				<div class="col-md-3">
					<h3>Neque Vel Auctor</h3>
					<p>Donec ipsum diam, fermentum eu scelerisque quis, vestibulum sit amet orci. Cras in commodo libero. Duis ut urna sit amet est feugiat ultrices id eget metus. Nulla et eros tellus, a hendrerit nulla. Maecenas adipiscing semper.</p>
				</div>
				<div class="col-md-3">
					<h3>Maecenas Id </h3>
					<p>Pellentesque ac magna quis sem aliquam viverra id sit amet justo. Nunc egestas sodales eros, et tristique sapien laoreet sit amet. Sed quis rutrum ipsum. Suspendisse ullamcorper augue sit amet arcu malesuada.</p>
				</div>
			</div>
            
            <hr class="featurette-divider">
            
			<div class="row">
				<div class="col-md-3">
					<h3>Imerdiet Aliquam</h3>
					<p>Quisque a porttitor metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus pulvinar ligula in lorem gravida, vel congue leo sodales. Quisque bibendum iaculis libero et porttitor.</p>
				</div>
				<div class="col-md-9">
					<h3>Nam Imperdiet Aliquam</h3>
					<p>Maecenas adipiscing semper sapien at pretium. Aenean tortor leo, venenatis vitae pretium sit amet, blandit porta diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi semper mauris vel erat suscipit venenatis. Nullam rhoncus porta tortor ut semper. Etiam elit dolor, vehicula eu sodales ac, lacinia sed mauris. Vestibulum convallis est nulla, lacinia dictum nisi porttitor at.</p>
					<p>Donec ipsum diam, <a href="#">fermentum eu</a> scelerisque quis, vestibulum sit amet orci. Cras in commodo libero. Duis ut urna sit amet est id eget metus. Nulla et eros tellus, a hendrerit nulla. Maecenas adipiscing semper sapien at pretium. Aenean tortor leo, venenatis vitae pretium sit amet. Class aptent taciti sociosqu ad litora venenatis.</p>
				</div>
			</div>
            
            <hr class="featurette-divider">
            
			<div class="row">
				<div class="col-md-4">
					<h2>Lorem Ipsum Dolor</h2>
					<p>Cras mi lectus, tempus vitae venenatis vitae, lobortis in felis. Morbi hendrerit massa et neque facilisis iaculis. Morbi ante odio, ullamcorper eu consequat non, consectetur nec ipsum. Nullam molestie aliquam diam at lacinia. Curabitur dignissim placerat nisl, nec bibendum enim laoreet non. </p>
					<a href="#" class="more btn btn-warning btn-sm" role="button">More</a>
				</div>
				<div class="col-md-4">
					<h2>Lorem Ipsum Dolor</h2>
					<ul class="list_bullet">
	                    <li>Tempus vitae lobortis</li>
	                    <li>Morbi hendrerit massa</li>
	                    <li>Nullam aliquam diam</li>
	                    <li>Curab dignis placerat</li>
	                    <li>Vulputate vitae risus</li>
	                    <li>Phasellus euismod est</li>
	                    <li>Class aptent taciti</li>
	                </ul>
				</div>
				<div class="col-md-4">
					<h2>Testimonial</h2>
					<div class="testimonial">
	                	<blockquote>
	                        <p>"Nullam molestie aliquam diam at lacinia. Curabitur placerat nisl, nec bibendum enim laoreet non."</p>
	                        <p class="name"><a href="#">Harry</a> <span> - CEO of our company</span></p>
						</blockquote>
	                </div>
				</div>
			</div>
		-->
			<div class="row home" id="content">
            	<div class="col-md-12">
            		<h2>LittleBlog is one of the best platforms for reading in the world! 
						The best articles written by the most extraordinary people can be found on this website. 
						Having a modern look and being customizable is one of the best choices for reading articles on the web. 
						Please enjoy the flavour of LittleBlog.
					</h2>				
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
						<a href="http://www.facebook.com/templatemo" rel="nofollow"><img src="/LittleBlog/public/images/facebook.png" alt="Like us on Facebook"></a>
						<a href="#"><img src="/LittleBlog/public/images/twitter.png" alt="Follow us on Twitter"></a>
						<a href="#"><img src="/LittleBlog/public/images/rss.png" alt="RSS feeds"></a>
					</div>
				</div>				
			</div>
		</footer>
	</div>
</body>
</html>