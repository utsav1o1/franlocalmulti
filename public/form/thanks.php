<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>

		<meta charset="utf-8">
		<title>Multi Dynamic | Your Dynamic Real Estate</title>
		<meta name="keywords" content="">
		<meta name="description" content="">		
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">		
			
		<link href="css/bootstrap.css" rel="stylesheet"> 
		<link href="css/font-awesome.min.css" rel="stylesheet">	
		<link href="css/owl.carousel.css" rel="stylesheet">	
		<link href="css/magnific-popup.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">  
	
		<link href="css/responsive.css" rel="stylesheet"> 
								
		<link rel="shortcut icon" href="img/icons/favicon.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
			
		<link href='http://fonts.googleapis.com/css?family=Lato:400,900italic,900,700italic,400italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
				
	</head>
	
		
	<body>
    
    <?php

//echo '<pre>';
//print_r($_SESSION);

$to = "sales@multidynamic.com.au, megha.poudel@multidynamic.com.au";
$subject = "First Home Buyer Information Session";


$message = '<html>
<head>
<title>Multi Dynamic - Your Dynamic Real Estate</title>

<style>
        .hdb{ font-weight:bolder; border-bottom:1px solid #ffffff; background:#ffffff; padding:10px 25px;}
		.hdn{ font-weight:normal; border-bottom:1px solid #ffffff; background:#ffffff;padding:10px 25px;}
        
        </style>

</head>
<body>

<table style="background:#00529C; padding:25px;">
<tr>
<td class="hdb">Name:</td>
<td class="hdn">'. $_POST["name"].'</td>
</tr>

<tr>
<td class="hdb">Email:</td>
<td class="hdn">'. $_POST["email"].'</td>
</tr>

<tr>
<td class="hdb">Phone Number</td>
<td class="hdn">'. $_POST["phone_number"].'</td>
</tr>

<tr>
<td class="hdb">Message:</td>
<td class="hdn">'. $_POST["message"].'</td>
</tr>


</table>
</body>
</html>';

$name = $_POST["name"];
$email = $_POST["email"];

//echo $message;

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:'.$name.' <'. $email.'>' . "\r\n";

@mail($to,$subject,$message,$headers);
?> 

				
		<div id="preloader">
			<div id="status"></div>
		</div>
		
		<header id="header">
		
			<!-- Fixed Top Navigation Bar  -->
			<div class="navbar navbar-fixed-top top">	
				<div class="container">
				
				
					<div class="navbar-header">					
								
							
						<a class="navbar-brand logo" href="index.php"><img src="img/logo.png"  alt="logo" class="img-responsive"></a>	
					</div>	
					
					
					
					
			  </div>
			</div>
			
		</header>
		
		<div id="about-page-wrapper">
			
			<div id="breadcrumb-wrapper">			
				<div class="container">				
					<div class="row">						
						<div class="col-xs-12 text-right">									
							<ol class="breadcrumb">								
								<li><a href="index.php" title="">Home</a></li>
								<li class="active">Thank You</li>
							</ol>	
						</div>						
					</div>					
				</div>					
			</div>	
			
			<section id="stepwizard">
				<div class="container">
					<div class="col-sm-12 titlebar">
						<h1>Thank You!</h1>
						<p>We will endeavour to respond as soon as possible.</p>
					</div>
				</div>
			</section>
			
			
		
		
		</div>
		
		<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>	
		<script src="js/retina.js" type="text/javascript"></script>	
		<script defer src="js/count-to.js"></script>
		<script defer src="js/jquery.appear.js"></script>	
		<script src="js/owl.carousel.js" type="text/javascript"></script>
		<script defer src="js/jquery.validate.min.js" type="text/javascript"></script>	
		<script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
		<script src="js/custom.js" type="text/javascript"></script>
		
		
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

		<!--
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		-->

		
	</body>
</html>