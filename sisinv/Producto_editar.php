
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
 <script>
function iva_produc()
{

	var arti_iva =document.getElementById('iva').value; 
	var arti_precio =document.getElementById('precio').value; 
	var calcular;
	var ncalcu;
	var id_iva;

ncalcu=arti_iva.split("#")[0];
id_iva=arti_iva.split("#")[1];
		calcular=((parseFloat(arti_precio)*parseFloat(ncalcu))+parseFloat(arti_precio));		
			document.getElementById('valor').value=parseFloat(calcular);
			document.getElementById('ivaid').value=id_iva;

}
</script>
<!--//skycons-icons--></head> 
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
 $sql="SELECT id, 
articulo,
(SELECT descripcion FROM factu_inv.articulo WHERE id=producto.articulo) as des_arti,
tipo_articulo,
(SELECT descripcion FROM factu_inv.tip_produ where id=producto.tipo_articulo) as destipo_art,
talla,
(SELECT descripcion FROM factu_inv.talla where id=producto.talla) as des_talla,
substring(cast(precio as text),0,(position('€' in cast(precio as text)) -1)) as precionu,
iva,
(SELECT  descripcion  FROM factu_inv.iva where id=producto.iva) as des_iva, 
(SELECT  n_calcular  FROM factu_inv.iva where id=producto.iva) as n_calcular, 

substring(cast(valort as text),0,(position('€' in cast(valort as text)) -1)) as preciot,
proveedor,
(SELECT (rif||'-->'||descripcion)  FROM factu_inv.proveedor where id=producto.proveedor) as des_proveedor, 
cantidad, 
estatus,
fecha,
(SELECT nombre  FROM public.estatus where id=producto.estatus) AS descestatus
  FROM factu_inv.producto
  where id=".$id_.";";
$data_estu=$conex->sentencia($sql);
while($data=$conex->filas($data_estu))
        {
		$CODIGO=$data['id'];
		
	    $des_arti=$data['des_arti'];
	    $des_arti_id=$data['articulo'];
		
		$destipo_art=$data['destipo_art'];
		$tipo_articulo=$data['tipo_articulo'];
		
		$talla=$data['talla'];
		$des_talla=$data['des_talla'];	
			
		$iva=$data['iva'];
		$n_calcular=$data['n_calcular'];
		$des_iva=$data['des_iva'];
		
		$precionu33=utf8_decode($data['precionu']);
    	$precionu=substr($precionu33,0,-1);
		$precionu=str_replace(".","",$precionu);
		
		$preciot33=utf8_decode($data['preciot']);
    	$preciot=substr($preciot33,0,-1);
		$preciot=str_replace(".","",$preciot);
		
		
		$proveedor=$data['proveedor'];
    	$des_proveedor=$data['des_proveedor'];
		
		$cantidad=$data['cantidad'];
		
		$fecha=$data['fecha'];
		
		$estatus=$data['estatus'];
		$estatusdes=$data['descestatus'];
		}
	
        ?>
										<!--/sub-heard-part-->
											 <div class="sub-heard-part">
													   <ol class="breadcrumb m-b-0">
															<li><a href="index.php">Inicio</a></li>
															<li class="active">Producto > Editar</li>
														</ol>
											</div>	
											
<form action="guardar/E_producto.php" name="edpro" id="edpro" method="post"> 

<div align="center">
<h2 align="center">Editar Producto</h2>
<table class='table table-bordered' style="width:90%" >
  <tr>
    <td><div align="center"><em><strong>ID</strong></em></div></td>
    <td><div align="justify">
      <input name="id_pro" id="id_pro" type="hidden" value="<?Php echo $CODIGO; ?>">
      <?Php echo $CODIGO; ?></div></td>
    <td><em><strong>Articulo</strong></em></td>
    <td><select name="descrip" id="descrip" class="form-control1">
<option value="<?Php echo $des_arti_id; ?>"><?Php echo $des_arti; ?></option>
<?Php

$descrip=$conex->sentencia("SELECT id, descripcion  FROM factu_inv.articulo where  estatus=1");
		while($dadescrip=$conex->filas($descrip)){
		$id_talla=$dadescrip["id"];
		$descripcion_talla=$dadescrip["descripcion"];
		echo "<option value='$id_talla'>$descripcion_talla</option>";
		}
?>
</select></td>
    <td><em><strong>Tipo de Art. </strong></em></td>
    <td><select name="tipro" id="tipro" class="form-control1">
<option value="<?Php echo $tipo_articulo; ?>"><?Php echo $destipo_art; ?></option>
<?Php

$descrip=$conex->sentencia("SELECT id, descripcion  FROM factu_inv.tip_produ where  estatus=1");
		while($dadescrip=$conex->filas($descrip)){
		$id_tip_produ=$dadescrip["id"];
		$descripcion_tip_produ=$dadescrip["descripcion"];
		echo "<option value='$id_tip_produ'>$descripcion_tip_produ</option>";
		}
?>
</select></td>
  </tr>
  <tr>
    <td><em><strong>Talla</strong></em></td>
    <td><select name="talla" id="talla" class="form-control1">
<option value="<?Php echo $talla; ?>"><?Php echo $des_talla; ?></option>
<?Php

$talla=$conex->sentencia("SELECT id, descripcion
  FROM factu_inv.talla where estatus=1");
		while($datotalla=$conex->filas($talla)){
		$id_talla=$datotalla["id"];
		$descripcion_talla=$datotalla["descripcion"];
		echo "<option value='$id_talla'>$descripcion_talla</option>";
		}
?>
</select></td>
    <td><em><strong>Cantidad</strong></em></td>
    <td><input type="number" class="form-control" id="cantidad" name="cantidad"  value="<?Php echo $cantidad; ?>"> </td>
    <td><em><strong>Proveedor</strong></em></td>
    <td><select name="provee" id="provee" class="form-control1">
<option value="<?Php echo $proveedor; ?>"><?Php echo $des_proveedor; ?></option>
<?Php

$proveedor=$conex->sentencia("SELECT id, descripcion
  FROM factu_inv.proveedor where estatus=1");
		while($datoproveedor=$conex->filas($proveedor)){
		$id_proveedor=$datoproveedor["id"];
		$descripcion_proveedor=$datoproveedor["descripcion"];
		echo "<option value='$id_proveedor'>$descripcion_proveedor</option>";
		}
?>
</select></td>
<input name="ivaid" id="ivaid" type="hidden" value="0" />
<input name="ivaid2" id="ivaid2" type="hidden" value="<?Php echo $iva; ?>" />
  </tr>
  <tr>
    <td><em><strong>Precio Unitario </strong></em></td>
    <td><input type="number/text" class="form-control" id="precio" name="precio"  value="<?Php echo $precionu; ?>"> </td>
    <td><em><strong>Iva</strong></em></td>
    <td><select name="iva" id="iva" onChange="iva_produc()" class="form-control1">
<option value="<?Php echo "$n_calcular#$iva"; ?>"><?Php echo $des_iva; ?></option>
<?Php

$iva=$conex->sentencia("SELECT id, n_calcular,descripcion
  FROM factu_inv.iva where estatus=1 order by descripcion");
		while($datoiva=$conex->filas($iva)){
		$id_iva=$datoiva["id"];
		$n_calcular=$datoiva["n_calcular"];
		$descripcion_iva=$datoiva["descripcion"];
		echo "<option value='$n_calcular#$id_iva'>$descripcion_iva</option>";
		}
?>
</select></td>
    <td><em><strong>Valor Total Unitario</strong></em></td>
    <td><input type="number/text" class="form-control" id="valor" name="valor"  value="<?Php echo $preciot; ?>"  readonly="readonly"></td>
  </tr>
  <tr>
    <td><em><strong>Fecha </strong></em></td>
    <td colspan="2"><input type="text" class="form-control" id="fecha" name="fecha" value="<?Php echo $fecha; ?>" ></td>
    <td><em><strong>Estatus</strong></em></td>
    <td colspan="2"><select name="estattus" id="estattus" class="form-control1">
<option value="<?Php echo $estatus; ?>"><?Php echo $estatusdes; ?></option>
<?Php


		echo "<option value='1'>Activo</option>";
		echo "<option value='2'>Inactivo</option>";
?>
</select></td>
    </tr>
</table>
<p align="center">&nbsp;</p>
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
