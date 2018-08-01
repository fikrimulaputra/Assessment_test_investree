<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Cuaca Meta Weather</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body >


	<!-- About -->
	<div style="background-image: url(img/background.jpg);"  id="about" class="section md-padding" >

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">
				<form action="search.php" method="post">
				<!-- Section header -->
				<div class="section-header text-center">
					<h2 style="color:white;" width="10" class="title ">Masukkan Kota</h2>
					
				</div>
				<!-- /Section header -->
				
				<div>
					<input type="text" name="kota" id="kota" class="form-control" placeholder="nama kota">
					<input type ="submit" id="submitcuaca" class="btn btn-primary" value="Cari Kota"> 
					<span id="error"> </span>
				</div>


				
				
				</form>
				<div align="center">
				<!-- about -->
				<?php
					$url="https://www.metaweather.com/api/location/1047378/";
					$url2="https://www.metaweather.com/api/location/search/?query=jakarta";

					
					$hsl_a = file_get_contents("https://www.metaweather.com/api/location/1047378/");
					$hsl=json_decode($hsl_a, true);
					
					//var_dump($hsl);
					$val="coba";
					foreach($hsl as $innerArray){
						if(is_array($innerArray)){	
							foreach($innerArray as $innerArray2){
								
								$col="3";
								$date=date("Y-m-d");
								if($innerArray2['applicable_date'] == $date){
									$col="12";
								}
				?>
					<div style="opacity:0.8" class="col-md-<?php echo $col ?>">
						<div style="background-color:#0a5469" class="about">
						<h4 style="color:white;"> 
							<?php
								$d=strtotime($innerArray2['applicable_date']);
								
								echo date("l", $d); 
							?>
						</h4>
						<hr/>
						<h3 style="color:white;"><?php echo $innerArray2['weather_state_name']; ?></h3>
							<img height="42" width="42" src="https://www.metaweather.com/static/img/weather/<?php echo  $innerArray2['weather_state_abbr'].".svg" ?>" />
							
							<div style="float:right">
							
							<div style="float:left">
							<p style="color:white;"> <?php echo $innerArray2['min_temp']; ?> </p>
							<p style="color:white;"> <?php echo $innerArray2['max_temp']; ?> </p>
							</div>
							</div>
					
						</div>
					</div>
				<?php		
							}
						}
					}

				 ?>
				<!-- /about -->
				
			</div>
			<!-- /Row -->

		</div>
		</div>
		<!-- /Container -->

	</div>
	<!-- /About -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="cuaca.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>

	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>
