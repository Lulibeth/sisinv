
 <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- lined-icons -->
<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->

<!-- jQuery -->
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/amcharts.js"></script>	
<script src="../js/serial.js"></script>	
<script src="../js/light.js"></script>	
<script src="../js/radar.js"></script>	

  <script src="../js/jquery.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/datatables.js"></script>
  <script src="../css/css.css"></script>
  
<link href="../css/fabochart.css" rel='stylesheet' type='text/css' />
<!--clock init-->
<script src="../js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="../js/skycons.js"></script>
<!--Calender-->
<link rel="stylesheet" href="../css/clndr.css" type="text/css" />
<script src="../js/underscore-min.js" type="text/javascript"></script>
<script src= "../js/moment-2.2.1.js" type="text/javascript"></script>
<script src="../js/clndr.js" type="text/javascript"></script>
<script src="../js/site.js" type="text/javascript"></script>

<script src="../js/js.js"></script>
<script src="../js/libreria.js"></script>
  <script src="../js/PaginadorClass.js"></script>

<!--//skycons-icons-->
</head> 
<body>

<div class="forms-main">
	<div class="set-1">
		<div class="graph-2 general">
		<h3 class="inner-tittle two">ANULAR FACTURA </h3>
		<div class="grid-1">
			<div class="form-body">

<?Php 
	session_start();  
//error_reporting(E_ALL); ini_set('display_errors', '1');
require_once('../conectarpg.php');
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);

$id=$_REQUEST['nest'];
       $sql2="SELECT 
	   (e.id) as estudiante,
  p.id,f.id_fact,f.fecha_fact,f.n_control_fact,f.sub_total_fact,f.iva_fact,f.total_fact,
  ((SELECT descripcion  FROM persona.prefijo_cedula where id=p.pre_cedula)||p.cedula) as cedula,
  (p.nombres||' '||p.apellidos) as nombres, 
  (pa.id) as id_per_fact, 
  ((SELECT descripcion  FROM persona.prefijo_cedula where id=pa.pre_cedula)||pa.cedula) as cedulafact, 
  (pa.nombres||' '||pa.apellidos) as apellido_fact, 
 ((SELECT (descrip_pais||' '||descrip_estado||' '||descrip_muni||' '||descrip_parro) as direccfact  FROM general.vista_ubicacion  where parroquia_id=pa.parroquia_r_id)||' '||pa.diresccion) as diresccion, 
 ('0'||(SELECT  numero FROM persona.prefijo_telefono where id=pa.pre_tel_hab)||'-'||pa.telf_habitacion) as tefefono1,
 ('0'||(SELECT  numero FROM persona.prefijo_telefono where id=pa.pre_tel_personal)||'-'||pa.telef_personal) as tefefono2

FROM 
  
  persona.persona as p,
  persona.persona_adicionales as pa,
  facturacion.factura as f, persona.estudiante as e
  
where 
f.id_fact='$id'
and e.id_persona=p.id
and f.id_per_fact=pa.id
and pa.id_persona_estu=p.id ";

$cantidad=$conex->sentencia($sql2);
	while($datos1=$conex->filas($cantidad)){
	 $numf=utf8_decode($datos1["id_fact"]);
	 
	 $loo=strlen ($numf); 
			switch ($loo) {
			case ($loo=='1'):{$jo = '0000000'. $numf; break;}
			case ($loo=='2'):{$jo = '000000'. $numf; break;}
			case ($loo=='3'):{$jo = '00000'. $numf; break;}
			case ($loo=='4'):{$jo = '0000'. $numf; break;}
			case ($loo=='5'):{$jo = '000'. $numf; break;}
			case ($loo=='6'):{$jo = '00'. $numf; break;}
			case ($loo=='7'):{$jo = '0'. $numf; break;}
			case ($loo=='8'):{$jo = $numf; break;}
			default:   $jo = '';
						   }
						   
						   
	 $fec=utf8_decode($datos1["fecha_fact"]);
	 $fech=substr($fec,0,10);
	 $f=explode("-",$fech);
	 $fecha=$f[2]."-".$f[1]."-".$f[0];
	 $numc=utf8_decode($datos1["n_control_fact"]);
	  $sbf=utf8_decode($datos1["sub_total_fact"]);
	 $subf=substr($sbf,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	subttal
	  $ivt=utf8_decode($datos1["iva_fact"]);
	 $ivaf=substr($ivt,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	
	  $ttf=utf8_decode($datos1["total_fact"]);
	 $totalf=substr($ttf,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	
	 $idper=utf8_decode($datos1["id_per"]);
     $totalapago=str_replace(".","",$totalf);
	 $estudiante=$datos1["estudiante"];

	 $nom=$datos1["apellido_fact"]; 
	 $ced=utf8_decode($datos1["cedulafact"]);
	 $direc=utf8_decode($datos1["diresccion"]);
	 $tel=utf8_decode($datos1["tefefono1"]);
	 $tel2=utf8_decode($datos1["tefefono2"]);

	 }
	 
	 $sql_razon="SELECT id, descripcion_iva
  FROM facturacion.anular_des
WHERE status_iva=1";
	$ressql_razon=$conex->sentencia($sql_razon);

?>

<div class="gradiente">
<form action="guardar_factura_anular.php" method="post" name="formularioxc" onsubmit="return validar(this);" >
<!--  Tabla superior para la Factura  hidden  -->
<input type="hidden" name="facturan" id="facturan" value="<?php echo $numf; ?>">
<input type="hidden" name="totalfactura" id="totalfactura" value="<?php echo $totalapago; ?>">
<input type="text" name="estudiante" id="estudiante" value="<?php echo $estudiante; ?>">

<table class="table-condensed" width="100%">
  <tr>
    <td colspan="2"><div align="center"><b>FACTURA N&deg; <?php echo $jo; ?></b></div></td>
    <td colspan="2"><div align="center"><b>FECHA  DE EMISION:&nbsp;</b><?php echo substr($fecha,0,10); ?></div></td>
    <td colspan="2"><div align="center"><b>HORA DE EMISION:&nbsp;</b><?php echo substr($fecha,11,19); ?></div></td>
  </tr>
  <tr>
    <td><b>NOMBRE O RAZON SOCIAL: </b></td>
    <td colspan="5"><?php echo $nom; ?></td>
  </tr>
  <tr>
    <td><b>CED/RIF:</b></td>
    <td><?php echo $ced; ?></td>
    <td><b>TELEFONOS:</b><?php echo $tel; ?></td>
    <td><?php echo $tel2; ?></td>
    <td><strong>TOTAL DE MONTO A PAGAR </strong></td>
    <td><span class="Estilo1"><?php echo $totalf; ?></span></td>
  </tr>
</table>



<div class="form-group">						
						<label for="focusedinput" class="col-sm-3 control-label">Anular por</label>
						<div class="col-sm-4">
				<select name="razon" id="razon" class="form-control1" required="" >
						<option value="">Seleccione</option>
						<?Php
						while($daressql_razon=$conex->filas($ressql_razon))
						{ 
						 $descripcionrazon=$daressql_razon["descripcion_iva"];
						 $id_razon=$daressql_razon["id"];
												echo "<option value='$id_razon' > $descripcionrazon </option>";
						}
						?></select>
						</div>
					</div>

<div class="col-md-12 form-group button-2">
<button type="submit" class="btn btn-primary">Guardar</button>
</div>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 

		</div>
							</div>
				<!--//content-inner-->
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
							
							<script src="../js/cbpFWTabs.js"></script>
							<script>
							new CBPFWTabs( document.getElementById( 'tabs' ) );
							</script>
							
<link rel="stylesheet" href="../css/vroom.css">
						
<!--js -->
<script src="../js/jquery.nicescroll.js"></script>
<script src="../js/scripts.js"></script>
<script type="text/javascript" src="../js/vroom.js"></script>
<script type="text/javascript" src="../js/TweenLite.min.js"></script>
<script type="text/javascript" src="../js/CSSPlugin.min.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="../js/bootstrap.min.js"></script>

</body>
</html>







