
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
		          	<a href="#"><img src="/LittleBlog/public/images/templatemo_logo.jpg" alt="fantasy" class="templatemo_logo"></a>
		        </div>
			</div>
            <img src="images/header_image1.jpg" alt="header image" class="img-responsive cleaner">
            <div class="masthead" id="masthead">
                <ul class="nav nav-justified">
                    <li><a href="index.php">Sign In or Sign Up</a></li>
                </ul>
            </div> <!-- nav -->
            <div class="row" id="content">
            	<div class="col-md-12">
				<h3>LittleBlog is one of the best platforms for reading in the world! The best articles written by the most extraordinary people can be found on this website. Having a modern look and being customizable is one of the best choices for reading articles on the web. Please sign up for trying the flavour of LittleBlog.</h3>
			</div>
			</div>		
			
				<div class="row">					
					<div class="col-md-6">
						<script type='text/javascript'>

							//At sign in, hash the password
							function hash_sin(){
								var pwd = document.getElementById('input_pwd_sin');
								pwd.value = btoa(pwd.value);
							}

							//At sign up, hash the passwords entered by the user
							function hash_sup(){
								var pwd = document.getElementById('input_pwd_sup');
								pwd.value = btoa(pwd.value);
								var rpwd = document.getElementById('input_rpwd_sup');
								rpwd.value = btoa(rpwd.value);
							}
						</script>

						<form action="/LittleBlog/public/signIn" onsubmit = "hash_sin()" method="post" id="contact_form" role="form">
							<h2>Sign In</h2>
							<h3>
								<font color="red">
									<?php
										if(array_key_exists('error_sin', $data)) {
											echo $data['error_sin'];
										}
									?>
								</font>
							</h3>
							<div class="form-group left-inner-addon">
								<span class="glyphicon glyphicon-chevron-up"></span>
								<input name="unamesin" type="text" class="form-control" id="input_uname_sin" placeholder="User name">
							</div>
							<div class="form-group left-inner-addon">
								<span class="glyphicon glyphicon-asterisk"></span>
								<input name="pwdsin" type="password" class="form-control" id="input_pwd_sin" placeholder="Password">
							</div>
							<div class="form-group left-inner-addon">
									<button type="submit" name = "signin" class="btn btn-primary">Sign in</button>
									<br></br>
							</div>								
						</form>

						<form action="index.php" method="post" id="contact_form" role="form">
							<div class="form-group left-inner-addon">
								<h2>Forgot your password?</h2>
								<div class="form-group left-inner-addon">
									<span class="glyphicon glyphicon-envelope"></span>
									<input name="email" type="email" class="form-control" id="input_uname" placeholder="Enter your Email here">
								</div>	
							</div>
							<div class="form-group left-inner-addon">
									<button type="submit" class="btn btn-primary">Recover</button>
									<br></br>
							</div>	
						</form>
					</div>

					<form action="/LittleBlog/public/signUp" onsubmit = "hash_sup()" method="post" id="contact_form" role="form">
						<div class="col-md-6">
							<div class="col-md-12">
							<h2>Sign Up</h2>
							<h3>
								<font color="red">
									<?php
										//If this page has errors as parameters, display them
										if(array_key_exists('error_sup', $data)) {
											echo $data['error_sup'];
										}
									?>
								</font>
							</h3>
							</div>
							<div class="form-group left-inner-addon">
								<span class="glyphicon glyphicon-user"></span>
								<input name="fnamesup" type="text" class="form-control" id="input_fname_sup" placeholder="First name">
							</div>						
							<div class="form-group left-inner-addon">
								<span class="glyphicon glyphicon-user"></span>
								<input name="lnamesup" type="text" class="form-control" id="input_lname_sup" placeholder="Last name">
							</div>
							<div class="form-group left-inner-addon">
								<span class="glyphicon glyphicon-envelope"></span>
								<input name="emailsup" type="email" class="form-control" id="input_email_sup" placeholder="Email">
							</div>
							<div class="form-group left-inner-addon">
								<span class="glyphicon glyphicon-chevron-up"></span>
								<input name="unamesup" type="text" class="form-control" id="input_uname_sup" placeholder="User name">
							</div>
							<div class="form-group left-inner-addon">
								<span class="glyphicon glyphicon-asterisk"></span>
								<input name="pwdsup" type="password" class="form-control" id="input_pwd_sup" placeholder="Password">
							</div>
							<div class="form-group left-inner-addon">
								<span class="glyphicon glyphicon-asterisk"></span>
								<input name="rpwdsup" type="password" class="form-control" id="input_rpwd_sup" placeholder="Re-enter password">
							</div>	
							<div class="form-group left-inner-addon">
									<button type="submit" class="btn btn-primary">Sign up</button>
									<button type="reset" class="btn btn-default right">Reset fields</button>
							</div>						
						</div> 
					</form>								
				</div> <!-- row -->
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
</body>
</html>