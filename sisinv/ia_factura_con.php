<div class="row-fluid" >
<script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.js"></script>
<script>
function enviaimp(n){
var nes=n;
window.open("solicitudes/factura_pdf.php?nest="+nes, '_blank')
 window.location.href= "index_o.php?s=repagox";
}
</script>
<script type="text/javascript">
function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 
posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "leonpurpura.com", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script> 
<!--/forms-->
<div class="forms-main">
	<div class="set-1">
		<div class="graph-2 general">
		<h3 class="inner-tittle two">DATOS DE LA FACTURA</h3>
    

<?php
		require_once('conectarpg.php');

        $conex=new BaseDatos();
        $conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);
@session_start();
$usuariox=$_SESSION["s_usuario"];
 $firma_autorizada=$_SESSION["furma_aut"];


$id=$_REQUEST['id'];
      $sql2="SELECT 
  p.id,f.id_fact,f.fecha_fact,f.n_control_fact,f.sub_total_fact,f.iva_fact,f.total_fact,
  ((SELECT descripcion  FROM persona.prefijo_cedula where id=p.pre_cedula)||p.cedula) as cedula,
 (SUBSTRING(p.apellidos,0,position (' ' IN p.apellidos))||' '||SUBSTRING(p.apellidos,(position (' ' IN p.apellidos)+1),1)||' '||SUBSTRING(p.nombres,0,position (' ' IN p.nombres))||' '||SUBSTRING(p.nombres,(position (' ' IN p.nombres)+1),1)||',') as nombres, 
  (pa.id) as id_per_fact, 
  ((SELECT descripcion  FROM persona.prefijo_cedula where id=pa.pre_cedula)||pa.cedula) as cedulafact, 
  (pa.nombres||' '||pa.apellidos) as apellido_fact, 
  (pa.diresccion) as diresccion, 
 ('0'||(SELECT  numero FROM persona.prefijo_telefono where id=pa.pre_tel_hab)||'-'||pa.telf_habitacion) as tefefono1,
 ('0'||(SELECT  numero FROM persona.prefijo_telefono where id=pa.pre_tel_personal)||'-'||pa.telef_personal) as tefefono2

FROM 
  
  persona.persona as p,
  persona.persona_adicionales as pa,
  facturacion.factura as f
  
where 
f.id_fact='$id'
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
$nombresestu=utf8_decode($datos1["nombres"]);
	 $nom=$datos1["apellido_fact"]; 
	 $ced=utf8_decode($datos1["cedulafact"]);
	 $direc=utf8_decode($datos1["diresccion"]);
	 $tel=utf8_decode($datos1["tefefono1"]);
	  $tel2=utf8_decode($datos1["tefefono2"]);

	 }
$res2="SELECT *
  FROM facturacion.detalle_factura
  where id_fact='$id' order by precio_unitario_df,iva_df";
$cantidad2=$conex->sentencia($res2);


?>
<div class="grid-1">
			<div class="form-body">
<input name="id" type="hidden" value="<?php echo $numf; ?>" />
<style>
.prioridad{

line-height:normal;
}
</style>
<table class="table-condensed" width="100%">

  <tr>
    <td colspan="2"><div align="center"><b>FACTURA N&deg; <?php echo $jo; ?></b></div></td>
	<td colspan="2"><div align="center"><b>FECHA  DE EMISION:&nbsp;<?php echo substr($fecha,0,10); ?></b></div></td>
	<td ><div align="center"><b>HORA DE EMISION:&nbsp;<?php echo substr($fecha,11,19); ?></b></div></td>
  </tr>
  <tr>
    <td><b>NOMBRE O RAZON SOCIAL: </b></td>
    <td colspan="4"><?php echo $nom; ?></td>
  </tr>
  <tr>
    <td><b>CED/RIF:</b></td>
    <td><?php echo $ced; ?></td>
    <td><b>TELEFONOS:</b></td>
    <td><?php echo $tel; ?></td>
    <td><?php echo $tel2; ?></td>
  </tr>
  <tr>
    <td><b>DIRECCION</b></td>
    <td colspan="4"><?php echo $direc; ?></td>
  </tr>
</table>

<table class="table-bordered" width="100%">
  <tr >
	<td width='10%'><div align="center"><b>CANTIDAD</b></div></td>
	<td width='50%'><div align="center"><b>DESCRIPCION DEL SERVICIO</b></div></td>
	<td width='15%'><div align="center"><b>PRECIO UNITARIO</b></div></td>
	<td width='10%'><div align="center"><b>IMPUESTO</b></div></td>
	<td width='15%'><div align="center"><b>MONTO</b></div></td>
  </tr>
  <?Php
 	while($datos2=$conex->filas($cantidad2)){
	  $ser=utf8_decode($datos2["id_ser"]); 
		 $res3=$conex->sentencia("SELECT *
	  FROM facturacion.servicio
	  where id_ser='$ser' ");
	  $cantd=utf8_decode($datos2["cantidad_ser_df"]);
	  $preco=utf8_decode($datos2["precio_unitario_df"]);
	 $pred=substr($preco,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	  
	  $ivadx=utf8_decode($datos2["iva_df"]);
	  $ivad=substr($ivadx,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	  

	  $std=utf8_decode($datos2["sub_total_df"]);
	 $subtd=substr($std,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA
	?>
  <tr >
	<td><div align="center"><?php echo $cantd; ?>&nbsp;&nbsp;</div></td>
	<td align="left"><?php echo $nombresestu;echo " ";
		  while($producto=$conex->filas($res3)){
		  $serd=utf8_decode($producto["descripcion_ser"]); }
	echo $serd; ?>&nbsp;&nbsp;</td>
	<td align='right'><?php echo $pred; ?>&nbsp;&nbsp;&nbsp;Bs.</td>
<!-- 	<input name='impuesto$fila' id='impuesto$fila' type='hidden'  value='<?php //echo $ivad; ?>' size='5' maxlength='50'  style='width:90%;' readonly='readonly'>		-->
	<td align='right'><?php echo $ivad;  ?>&nbsp;&nbsp;Bs.</td>			
	<td align='right'><?php echo $subtd; ?>&nbsp;&nbsp;&nbsp;Bs.</td>
  </tr>
  <?Php
	}
	?>
</table>

<table class="table-bordered" width="100%">
  <tr>
    <td width="85%" align="right"><b>SUBTOTAL:</b></td>
    <td width="15%" align="right"><?php echo $subf; ?>&nbsp;&nbsp;&nbsp;Bs.</td>
  </tr>
  <tr>
    <td align="right"><b>IMPUESTO:</b></td>
    <td align="right"><?php echo $ivaf; ?>&nbsp;&nbsp;&nbsp;Bs.</td>
  </tr>
  <tr>
    <td align="right"><b>TOTAL A PAGAR:</b></td>
    <td align="right"><?php echo $totalf; ?>&nbsp;&nbsp;&nbsp;Bs.</td>
  </tr>
  <tr>
      <td align='right'>
	  <table width='100%'>
  <tr>
    <td><strong>FORMA DE PAGO:</strong></td>
    <td><strong>MONTO:</strong></td>
    <td><strong>N DEP.</strong></td>
    <td><strong>FECHA:</strong></td>
  </tr>

	  <?Php
	  $formadepago="SELECT id, (SELECT descripcion_fp  FROM facturacion.forma_pago where id_fp=id_forma_pago) as formadepago, monto, codigo_transsaccion,substring(CAST(fecha as text),0,11 ) as fecha
  FROM facturacion.factura_f_pago
  WHERE id_factura=$id AND estatus_id=1";
$fiformadepago=$conex->sentencia($formadepago);
	while($datos_fopag=$conex->filas($fiformadepago)){
	 $formadepago=utf8_decode($datos_fopag["formadepago"]);
	   $codigo_transsaccion=utf8_decode($datos_fopag["codigo_transsaccion"]);
	   $fecha_formadepago=utf8_decode($datos_fopag["fecha"]);
	  $monto=utf8_decode($datos_fopag["monto"]);
	 $montof=substr($monto,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	
	  ?>

<tr><td><?Php echo $formadepago; ?></td><td><?Php echo $montof; ?>Bs.</td><td><?Php echo $codigo_transsaccion; ?></td><td><?Php echo $fecha_formadepago; ?></td></tr>
<?Php }?>
</table>
		      </td>
    <td ><strong>FIRMA AUTORIZADA:</strong><b><?Php echo $firma_autorizada; ?></b></td>
  </tr>
   <tr>

    <td align="center" colspan="2"> <div align="center"><a href="javascript:popup('contenido/factura_editar.php?nest=<?php echo $numf; ?>',900,600)"><img src="Imagenes/Editar.png" width="40" height="40" border="0" title="EDITAR"/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<!--
echo "
                <script language='JavaScript'>
		        window.open('solicitudes/cierre_consulta_movimientos.php?fecha=$fecha');
				window.location = 'index_o.php?s=cierrd';
                </script>";
					-->
	<a href="javascript:enviaimp(<?php echo $numf; ?>)"><img src="Imagenes/Printer_Green.jpg" width="40" height="40" border="0" title="IMPRIMIR"/></a></div>	</td>   </tr>
</table>
  </div>
 </div>
</div>
 </div>
</div>
              
