
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
 $sql="SELECT id, cedula, nombre, apellido, direccion, telefono, estatus, precedu
  FROM persona.persona
  where
 id=".$id_.";";
$data_estu=$conex->sentencia($sql);
while($data=$conex->filas($data_estu))
        {
		$CODIGO=$data['id'];
	    $ced=$data['cedula'];
		$nombre=$data['nombre'];
		$apellido=$data['apellido'];
		$direccion=$data['direccion'];
		$telefono=$data['telefono'];
		$estatus=$data['estatus'];
		$precedu=$data['precedu'];
		}
		
		
		$sql_U="SELECT (SELECT  nombre  FROM empresa.cargo where id=cargo) as cargop
  FROM persona.carg_pers
  where persona=$id_ and estatus=1";
$data_estu_u=$conex->sentencia($sql_U);
$numdataus=$conex->numfilas($data_estu_u);
if($numdataus!=''){
while($dataus=$conex->filas($data_estu_u))
        {
		 $cargop=$dataus['cargop'];
		}
	}else{$cargop="No Posee";}
		
		
		
$sql_Usu="SELECT usuario, clave  FROM persona.usuario where idpersona=$id_ and estatus=1";
$data_estu_usu=$conex->sentencia($sql_Usu);
$numdatausua=$conex->numfilas($data_estu_usu);
if($numdatausua){
while($datausua=$conex->filas($data_estu_usu))
        {
		$usuario=$datausua['usuario'];
		$clave=$datausua['clave'];
		}
	}else{$clave="No Posee";  $usuario="No Posee";}


	
$fotsin="sinfoto.png";

if (file_exists("/xampp/htdocs/sisinv/fotos/".$ced.".png")){ 
$foto="http://".$_SERVER['SERVER_NAME']."/sisinv/fotos/".$ced.".png";
}
else
{ 
$foto="http://".$_SERVER['SERVER_NAME']."/sisinv/fotos/".$fotsin;}  


        ?>
										<!--/sub-heard-part-->
											 <div class="sub-heard-part">
													   <ol class="breadcrumb m-b-0">
															<li><a href="index.php">Inicio</a></li>
															<li class="active">Persona > Ingresar</li>
														</ol>
											</div>	
<form action="guardar/E_persona.php" name="edper" id="edper" method="post"> 

<div align="center">
  <table class='table table-bordered' style="width:90%" >
    <tr>
      <td rowspan="3" width="15%"><div align="center"><img src="<?Php echo $foto; ?>" alt=" " height="140"  style="width:100%; "  /></div></td>
      <td width="15%"><div align="center"><em><strong>ID</strong></em></div></td>
      <td width="15%"><div align="justify"><input name="id_per" id="id_per" type="hidden" value="<?Php echo $CODIGO; ?>">
	  <?Php echo $CODIGO; ?></div></td>
      <td width="15%"><p align="center"><em><strong>APELLIDOS</strong></em></p>      </td>
      <td width="20%"><div align="justify">
<input type="text" class="form-control" id="apellido" name="apellido" value="<?Php echo $apellido; ?>">
      </div></td>
	  </tr>
    <tr>
      <td><div align="center"><em><strong>CEDULA</strong></em></div></td>
      <td><div align="justify"><select name="preced" id="preced" class="form-control1">
<option value="<?Php echo $precedu; ?>"><?Php echo $precedu; ?></option>
<option value="V-">V-</option>
<option value="E-">E-</option>
</select> 
        <input type="text" class="form-control" name="cedula" id="cedula" value="<?Php  echo $ced; ?>">
      </div></td>
      <td><div align="center"><em><strong>NOMBRES</strong></em></div></td>
      <td><div align="justify">
        <input type="text" class="form-control" name="nombre" id="nombre" value="<?Php echo $nombre; ?>">
      </div></td>
	  </tr>
    <tr>
      <td height="30"><div align="center"><em><strong>TELEFONO</strong></em></div></td>
      <td><div align="justify">
        <input type="text" class="form-control" id="telefono" name="telefono" value="<?Php echo $telefono; ?>">
      </div></td>
      <td><div align="center"><em><strong>CARGO</strong></em></div></td>
      <td><div align="justify">
        <input type="text" class="form-control" name="direccion" value="<?Php echo $cargop; ?>">
      </div></td>
	  </tr>
    <tr>
      <td><div align="center"><em><strong>DIRECCION</strong></em></div></td>
      <td colspan="4"><div align="center">
        <textarea class="form-control" name="direccion" id="direccion" cols="80" rows="3"><?Php echo $direccion; ?></textarea>
      </div></td>
	  </tr>
  </table>
  <div align="center"> <button type="submit" class="btn btn-default">Ingresar</button> </div>

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
