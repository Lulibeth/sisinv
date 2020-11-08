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
		
		
function VerproductoPRE()
{
?>

 
<script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.js"></script>

<script type="text/javascript">
function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 

posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "leonpurpura.com", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=yes,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script> 
 <?php
require_once('conectarpg.php');
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);

$id_=$_REQUEST['id_producto'];
  $sql="SELECT id, descripcion,   substring(cast(precio as text),0,(position('€' in cast(precio as text)) -1)) as precio, (SELECT nombre  FROM public.estatus where id=estatus) as descestatus, talla, 
       cantidad
  FROM factu_inv.producto
				where
 id=".$id_.";";
$data_estu=$conex->sentencia($sql);
while($data=$conex->filas($data_estu))
        {
		$CODIGO=$data['id'];
	    $descrip=$data['descripcion'];
		$precio1=utf8_decode($data["precio"]);
	    $precio=substr($precio1,0,-1); //RECORTAR EL SÍMBOLO DE MONEDA	

		$talla=$data['talla'];
		$cantidad=$data['cantidad'];
		$estatus=$data['descestatus'];
		}
		
		
	
$fotsin="$descrip.png";

        ?>
<div class="container-fluid-center">
<div class="form-group">
<h2 align="center">FICHA PRODUCTO</h2>
<div align="center">
  <table class='table table-bordered' style="width:90%" >
    <tr>
      <td rowspan="3" width="15%"><div align="center"><img src="<?Php echo $fotsin; ?>" alt=" " height="140"  style="width:100%; "  /></div></td>
      <td width="15%"><div align="center"><em><strong>ID</strong></em></div></td>
      <td width="15%"><div align="justify"><?Php echo $CODIGO; ?></div></td>
      <td width="15%"><p align="center"><em><strong>DESCRIPCION</strong></em></p>      </td>
      <td width="20%"><div align="justify"><?Php echo $descrip; ?></div></td>
	  </tr>
    <tr>
      <td><div align="center"><em><strong>CANTIDAD</strong></em></div></td>
      <td><div align="justify"><?Php echo $cantidad; ?></div></td>
      <td><div align="center"><em><strong>TALLA</strong></em></div></td>
      <td><div align="justify"><?Php echo $talla; ?></div></td>
	  </tr>
    <tr>
      <td><div align="center"><em><strong>PRECIO</strong></em></div></td>
      <td colspan="2"><div align="justify"><?Php echo $precio; ?></div></td>
      <td ><div align="center"><a href='Producto_editar.php' target='_blank' ><img src='imagenes/ver-detalles_318-1493__.png' width='40' height='40' /></a></div></td>
	  </tr>
  </table>
  

  </div>
  </div>
</div>




<?php

}
?>