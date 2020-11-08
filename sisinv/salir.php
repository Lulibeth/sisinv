<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Sisinv  | Salir  :: MarYhor</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<!--clock init-->
</head> 
<body>
		
								<!--/login-->
								
									   <div class="error_page">
												<!--/login-top-->
												
													<div class="error-top">
													<h2 class="inner-tittle page">MARYHOR</h2>
													    <div class="login">
														<h3 class="inner-tittle t-inner">Hasta Pronto..!</h3>
									
																<form>
<?Php

session_start();
$nomusuario=$_SESSION["nombres"];
$alusuario=$_SESSION["apellidos"];
$fotouuario=$_SESSION['s_foto'];
?>

 

<div class="profile-widget">
<img src="<?Php echo $fotouuario; ?>" alt=" " style="width:20%; height:20%"  />
<h2 ><?Php echo $nomusuario; echo "   ";  echo $alusuario; ?></h2>
</div>
<?php 
	    unset($_SESSION["cedula"]);
	 	unset($_SESSION["nombres"]);
		unset($_SESSION["apellidos"]);
		unset($_SESSION["nivel_acceso"]);
		unset($_SESSION["descripcionrol"]);
		unset($_SESSION['s_foto']);
		unset($_SESSION["s_usuario"]);
session_destroy();
?>	
			<script type="text/javascript">
		var pagina="http://<?php echo $_SERVER['SERVER_NAME']; ?>";
	
		function redireccionar()
		{location.href=pagina; } 
		setTimeout ("redireccionar()", 1500);
	  	</script>				
																	</form>
														</div>
														
													</div>
													 </div>
												<!--//login-top-->
										  
										  	<!--//login-->
										    <!--footer section start-->
										<div class="footer">
										   <p>&copy 2020 Sisinv . Noslen Moreno | 2020.</p>
										</div>
									<!--footer section end-->
									<!--/404-->
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>