<?Php
@session_start();
		$cedula_usu=$_SESSION["cedula"];
		$nombre_usu=$_SESSION["nombres"];
		$apellido_usu=$_SESSION["apellidos"];
		$nivel_usu=$_SESSION["nivel_acceso"];
		$des_rol_usu=$_SESSION["descripcionrol"];
		$id_usuario=$_SESSION["id_usuario"];
		$fecha=date("d/m/Y");
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
$descrip=strtoupper($_REQUEST['descrip']);
$prerif=$_REQUEST['prerif'];
$cedu=$_REQUEST['cedu'];
$telef=$_REQUEST['telef'];
$telef_=$_REQUEST['telef_'];

$rif_p= $prerif.$cedu;

$consulprove=$conex->sentencia("SELECT descripcion  FROM factu_inv.proveedor where rif='$rif_p' ");
  $numcedu=$conex->numfilas($consulprove);

if($numcedu>0)
{
?>
<script type="text/javascript">
alert('Disculpe! proveedor ya Registrado con este Rif!');
var pagina="../index.php?s=basicopro";
function redireccionar() 
{location.href=pagina;} 
setTimeout ("redireccionar()", 10);  
</script>
<?Php
}else{

 $sqlinpersoprove="INSERT INTO factu_inv.proveedor(
            descripcion, rif, telefono, telefono_f, estatus, usuario, 
            ip)
    VALUES ( '$descrip', '$rif_p', '$telef', '$telef_', '1', '$id_usuario', 
            '$ip');
";
	
$resper = pg_query($sqlinpersoprove);

if($resper){
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