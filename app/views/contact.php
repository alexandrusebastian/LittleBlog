<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>Contact Little Blog</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/justified-nav.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">

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
		<div class="container" id="contact">
			<div class="header">
				<div class="navbar-header">
		          	<a href="#"><img src="images/templatemo_logo.jpg" alt="fantasy" class="templatemo_logo"></a>
		        </div>
      			<form  action="#" method="get" class="navbar-form navbar-right" role="search">
      				<div class="form-group">
      					<input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword">
      				</div>
      				<button type="submit" class="btn btn-default" name="Search">Go</button>
      			</form>
			</div>
            <img src="images/header_image1.jpg" alt="header image" class="img-responsive cleaner">
            <div class="masthead" id="masthead">
                <ul class="nav nav-justified">
                    <li><a href="/LittleBlog/public/">Home</a></li>
                    <li><a href="/LittleBlog/public/about">About</a></li>
                    <li><a href="preview.html">Top Articles</a></li>
                    <li><a href="/LittleBlog/public/searchArticles">Search Article</a></li>
                    <li class="active"><a href="/LittleBlog/public/contact">Contact</a></li>
                </ul>
            </div> <!-- nav -->
			<div class="row" id="content">
				<div class="col-md-12">
					<h2>Contact Information</h2>
					<p>Vivamus sed adipiscing felis, non molestie velit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum auctor justo eu nibh pharetra, nec rhoncus justo tincidunt. Donec ut ipsum ac erat vehicula volutpat sed sed enim. Nunc varius luctus tellus, ac vulputate purus cursus vitae. Maecenas orci justo, volutpat quis tincidunt id, lacinia nec massa. Curabitur sollicitudin velit sit amet nisi dictum scelerisque. Vivamus at rutrum lectus. Etiam ut velit eget nulla feugiat accumsan. You may use this free <a href="http://www.google.ro">Google</a> for any purpose.</p>
                    <h3>Contact Form</h3>
                  <p>You may leave us a message for any kind of business matter or personal greeting. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow">CSS</a>. </p>
				</div>
			</div>
			<form action="#" method="post" id="contact_form" role="form">
				<div class="row">
					<div class="col-md-5">
						<div class="form-group left-inner-addon">
							<span class="glyphicon glyphicon-user"></span>
							<input name="name" type="text" class="form-control" id="input_name" placeholder="Name">
						</div>
						<div class="form-group left-inner-addon">
							<span class="glyphicon glyphicon-envelope"></span>
							<input name="email" type="email" class="form-control" id="input_email" placeholder="Email">
						</div>
						<div class="form-group left-inner-addon">
							<span class="glyphicon glyphicon-earphone"></span>
							<input name="phone" type="tel" class="form-control" id="input_tel" placeholder="Phone">
						</div>
					</div> 
					<div class="col-md-7">
						<div class="form-group left-inner-addon">
							<span class="glyphicon glyphicon-comment"></span>
						  	<textarea name="message" rows="6" class="form-control" id="input_message" placeholder="Message..."></textarea><br>
							<button type="submit" class="btn btn-primary">Send</button>
							<button type="reset" class="btn btn-default right">Reset</button>
						</div>
					</div>
				</div> <!-- row -->
			</form>
      <hr class="featurette-divider">
			<div class="row">
				<section class="col-xs-12 col-md-12">
					<h3>Our Location</h3> 
                    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus non ornare felis, sit amet gravida velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras at lobortis tortor. Mauris porttitor vel leo eu pretium. Ut nec blandit arcu. Pellentesque dignissim dui vel viverra ullamcorper.</p>   
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:500px;width:600px;"><div id="gmap_canvas" style="height:500px;width:600px;"></div>
                    <style>
                        #gmap_canvas img {
                            max-width: none !important;
                            background: none !important;
                        }
                    </style><a class="google-map-code" href="http://www.trivoo.net" id="get-map-data">trivoo.net</a></div>
                    <script type="text/javascript"> function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(45.74729663273878,21.22628837763216),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(45.74729663273878, 21.22628837763216)});infowindow = new google.maps.InfoWindow({content:"<b>Universitatea \"Politehnica\" Timisoara</b><br/>Vasile Pirvan, Nr 2<br/> Timisoara" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                </section>
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
						<a href="http://www.facebook.com/" rel="nofollow"><img src="images/facebook.png" alt="Like us on Facebook"></a>
						<a href="#"><img src="images/twitter.png" alt="Follow us on Twitter"></a>
						<a href="#"><img src="images/rss.png" alt="RSS feeds"></a>
					</div>
				</div>				
			</div>
		</footer>
	</div>
</body>
</html>