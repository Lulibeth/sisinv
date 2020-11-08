<?php
require_once('conectarpg.php'); //conexión a la base de datos
 $id_persona=$_REQUEST['id_personax']; 
 $pre=$_REQUEST['pre'];    // se recibe la valiable nacionalidad
 $cedu=$_REQUEST['cedula'];    // se recibe la valiable cedula
 $correoE=strtoupper($_REQUEST['correo']);   //se recibe la variable email
 $cc=$_REQUEST['cc'];    // se recibe la valiable codigo secreto
 $cla=$_REQUEST['cambioClave'];
 
// =md5(strtoupper($_REQUEST['cambioClave']));
 $cedula=$cedu;

function real_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
        return $_SERVER['REMOTE_ADDR'];
}
$fecha=date('Y-m-d H:i:s');
$ip=real_ip();

$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);


$resdatadcoo=$conex->sentencia("SELECT usuario
  FROM persona.usuario  where   usuario='$correoE'");

  $resdatadenumoo=$conex->numfilas($resdatadcoo);
if($resdatadenumoo!=0)
{
?>
<script language='JavaScript'>
alert('Correo ya registrado, por favor usar uno diferente');
window.location = '../index2.php';
</script>
<?Php
exit();
}
$cantcaracedu=strlen($cedu);
if(($cedu<5000000) or ($cantcaracedu<=6))
{
?>
<script language='JavaScript'>
alert('Cedula no es valida, por favor usar la correcta');
window.location = 'register.php';
</script>
<?Php
exit();
}

$resdatad=$conex->sentencia("SELECT id, codigo, fecha, ip, tipo_, id_persona, correo
  FROM public.codigo_secreto
  where
  id_persona='$id_persona' and codigo='$cc' AND tipo_=1");


  $resdatadenum=$conex->numfilas($resdatad);
if($resdatadenum==0)
{
?>
<script language='JavaScript'>
alert('Codigo o cedula erronea');
window.location = 'register.php';
</script>
<?Php
exit();
}
$sicrear=$conex->sentencia("SELECT id, descripcion,  cargo, usuario, estatus, usuario_registrto, 
       fecha, ip
  FROM persona.carg_pers
  where persona=$id_persona and estatus=1 ");
$ressicrear=$conex->numfilas($sicrear);
if($ressicrear>0)
{

$numusu=$conex->sentencia("SELECT id  FROM persona.usuario");
 $resnumusu=$conex->numfilas($numusu);
$idusuarionuevo=$resnumusu+1;
while($datprce=$conex->filas($sicrear))
						{ 
						 $cargo=$datprce["cargo"];						
						 $persona_cargo=$datprce["id"];						
						}

 $inserusuario="INSERT INTO persona.usuario(
           id,usuario, clave, estatus, idpersona, idcarg_pers, fecha, ip)
		   VALUES
		   ($idusuarionuevo,'$correoE', '$cla',1,$id_persona, $persona_cargo,'$fecha','$ip')";
 
$usuarios=$conex->sentencia($inserusuario); 
$resulusu=pg_affected_rows ($usuarios );
	   
$edtcarper="UPDATE persona.carg_pers   SET usuario=$idusuarionuevo  WHERE persona=$id_persona and id=$persona_cargo ";
$xbz=$conex->sentencia($edtcarper); 
$resxbz=pg_affected_rows ($xbz);
	   
}else{
?>


                <script language='JavaScript'>
                alert('Usted no posee los permisos para crear usuario');
		var pagina="../index.php";
		
				function redireccionar() 
		{location.href=pagina;} 
		setTimeout ("redireccionar()", 10);  
                </script>
				<?Php

}

 if($resulusu=='' or  $resxbz=='')
{

?>


                <script language='JavaScript'>
                alert('Error al procesar datos');
		var pagina="register.php";
		
				function redireccionar() 
		{location.href=pagina;} 
		setTimeout ("redireccionar()", 10);  
                </script>
				<?Php

}else 
{
?>


                <script language='JavaScript'>
             alert('¡Felicitaciones! Tu registro fue exitoso Ingresa con tu usuario y clave creada');
		var pagina="../index2.php";
		
				function redireccionar() 
		{location.href=pagina;} 
		setTimeout ("redireccionar()", 10);  
                </script>
<?Php
}
?>
