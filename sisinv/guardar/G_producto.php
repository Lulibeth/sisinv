<?Php
@session_start();
		$cedula_usu=$_SESSION["cedula"];
		$nombre_usu=$_SESSION["nombres"];
		$apellido_usu=$_SESSION["apellidos"];
		$nivel_usu=$_SESSION["nivel_acceso"];
		$des_rol_usu=$_SESSION["descripcionrol"];
		$id_usuario=$_SESSION["id_usuario"];
		$fecha=date("d/m/Y - H:i:s");
function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}
$ip=getRealIP();

require_once('../conectarpg.php'); 
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);
///////////////////////////////////////////////////////////////////////////////////////////////////
$descrip=$_REQUEST['descrip'];
$tipro=$_REQUEST['tipro'];
$provee=$_REQUEST['provee'];
$canti=$_REQUEST['cantidad'];
$talla=$_REQUEST['talla'];
$precio=$_REQUEST['precio'];
$fecha=$_REQUEST['fecha'];
$iva=$_REQUEST['ivaid'];
$valor=$_REQUEST['valor'];

$consulpersona=$conex->sentencia("SELECT id, articulo, tipo_articulo, talla, proveedor, cantidad, precio, 
       fecha, estatus, usuario, ip
  FROM factu_inv.producto where articulo=$descrip and tipo_articulo=$tipro and cantidad=$canti and  talla=$talla and  proveedor=$provee and  fecha='$fecha'");
  $numcedu=$conex->numfilas($consulpersona);
if($numcedu>0)
{
?>
<script type="text/javascript">
alert('Articulos ya Registrados!');
var pagina="../index.php?s=basicopro";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{


 $sqlinserproducto="INSERT INTO factu_inv.producto(
           articulo, tipo_articulo, talla, proveedor, cantidad, precio, 
            fecha, estatus, usuario, ip,iva,valort)
    VALUES ($descrip, $tipro, $talla, $provee, $canti, '$precio','$fecha', 1, $id_usuario,  '$ip',$iva,'$valor')";
	
$res = pg_query($sqlinserproducto);

if($res){
?>
<script type="text/javascript">
alert('Datos Registrados con Exito!');
var pagina="../index.php?s=basicopro";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{
?>
<script type="text/javascript">
alert('Disculpa, Datos NO Registrados!');
var pagina="../index.php?s=basicopro";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php 
//pg_last_error();
}
}
?>