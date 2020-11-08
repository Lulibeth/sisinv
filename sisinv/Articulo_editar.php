
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Sisinv | Tienda MarYhor</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->

 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->

<!-- jQuery -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<script src="js/radar.js"></script>	

  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/datatables.js"></script>
  <script src="css/css.css"></script>
  
<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
<!--clock init-->
<script src="js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>

<script src="js/js.js"></script>
<script src="js/libreria.js"></script>
  <script src="js/PaginadorClass.js"></script>

<!--//skycons-icons-->
</head> 
<body>
<?php
@session_start();
		$cedula_usu=$_SESSION["cedula"];
		$nombre_usu=$_SESSION["nombres"];
		$apellido_usu=$_SESSION["apellidos"];
		$nivel_usu=$_SESSION["nivel_acceso"];
		$des_rol_usu=$_SESSION["descripcionrol"];
		$id_usuario=$_SESSION["id_usuario"];
		$fotouuario=$_SESSION['s_foto'];
		$fecha=date("d/m/Y");
		

require_once('conectarpg.php');
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);

$id_=$_REQUEST['nest'];
 $sql="SELECT id, descripcion,(SELECT nombre  FROM public.estatus where id=articulo.estatus) as estatusdes ,estatus
  FROM factu_inv.articulo
  where
 id=".$id_.";";
 
 
 
$data_estu=$conex->sentencia($sql);
while($data=$conex->filas($data_estu))
        {
		$CODIGO=$data['id'];
	    $articu=$data['descripcion'];
		$estatus=$data['estatus'];
		$estatusdes=$data['estatusdes'];
		}
	
        ?>
										<!--/sub-heard-part-->
											 <div class="sub-heard-part">
													   <ol class="breadcrumb m-b-0">
															<li><a href="index.php">Inicio</a></li>
															<li class="active">Articulo > Editar</li>
														</ol>
											</div>	
											
<form action="guardar/E_articulo.php" name="edprovee" id="edprovee" method="post"> 

<div align="center">
<h2 align="center">Editar Articulo</h2>

  <table class='table table-bordered' style="width:90%" >
    <tr>
      <td width="15%"><div align="center"><em><strong>ID</strong></em></div></td>
      <td width="15%"><div align="justify"><input name="id_pro" id="id_pro" type="hidden" value="<?Php echo $CODIGO; ?>">
	  <?Php echo $CODIGO; ?></div></td>
      <td width="15%"><p align="center"><em><strong>Articulo</strong></em></p>      </td>
      <td width="20%"><div align="justify">
<input type="text" class="form-control" id="articu" name="articu" value="<?Php echo $articu; ?>">
      </div></td>
	  </tr>
    <tr>
      <td><div align="center"><em><strong>Estatus</strong></em></div></td>
      <td><select name="estatus" id="estatus" class="form-control1">
<option value="<?Php echo $estatus; ?>"><?Php echo $estatusdes; ?></option>
<option value="1">Activo</option>
<option value="2">Inactivo</option>
</select></td>
    </tr>
  </table>
  <div align="center"> <button type="submit" class="btn btn-default">Editar</button> </div>

  </div>
  </form>
  </div>
</div>
<script>
							   $(document).ready(function() 
    {
      $('#myModal').modal('show')
      $('#myModal').on('show', function() {
      $("#txtname").focus();
      })
  	});
	
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
							
							<script src="js/cbpFWTabs.js"></script>
							<script>
							new CBPFWTabs( document.getElementById( 'tabs' ) );
							</script>
							
<link rel="stylesheet" href="css/vroom.css">
						
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
