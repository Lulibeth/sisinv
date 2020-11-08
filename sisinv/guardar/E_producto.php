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
$descrip=$_REQUEST['descrip'];
$tipro=$_REQUEST['tipro'];
$talla=$_REQUEST['talla'];
$cantidad=$_REQUEST['cantidad'];
$provee=$_REQUEST['provee'];
$precio=($_REQUEST['precio']);
$fechabb=($_REQUEST['fecha']);
$estatus=($_REQUEST['estattus']);
$id_pro=$_REQUEST['id_pro'];
$iva1=$_REQUEST['ivaid'];
$valor=$_REQUEST['valor'];
$ivaid2=$_REQUEST['ivaid2'];

if($iva1==0){
$iva=$ivaid2;
}else{$iva=$iva1;
}

     $sqlinpersoed="UPDATE factu_inv.producto
   SET  articulo=$descrip, tipo_articulo=$tipro, talla=$talla, proveedor=$provee, cantidad=$cantidad, 
       precio='$precio', fecha='$fechabb', estatus=$estatus, usuario=$id_usuario, ip='$ip', iva=$iva, valort='$valor'
 WHERE id=$id_pro";
	
$respered = pg_query($sqlinpersoed);

if($respered){
echo "
                <script language='JavaScript'>
                alert('Edicion Exitosa!');
				window.close('../index.php?s=copro');
                </script>";
}else{
echo "
                <script language='JavaScript'>
                alert('Error al procesar datos');
				window.close('../index.php?s=copro');
                </script>";

//pg_last_error();
}
?>