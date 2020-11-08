
<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//include("phpmailer-gmail/class.phpmailer.php");
//include("phpmailer-gmail/class.smtp.php");
 $pre=$_REQUEST['pre'];
 $cambioClave=$_REQUEST['cambioClave'];
 $cambioClaveRes=$_REQUEST['cambioClaveRes'];
 $correoE=$_REQUEST['correo'];   //se recibe la variable email
 $cedu=$_REQUEST['cedula'];    // se recibe la valiable cedula
$cedulaesta=$_REQUEST['cedulaesta'];

if($cambioClave!=$cambioClaveRes)
{
?>

<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <h4>Disculpe! Ah ocurrido un error!</h4> <p>La Clave y la Confirmacion de clave deben ser exactamente iguales y de 8 caracteres alfanumericos.</p> </div> 
<?Php
@session_destroy();
exit();
}  

if($cedulaesta==$cedu)
{



if($pre=='' or $cambioClave=='' or $cambioClaveRes=='' or $correoE=='' or $cedu=='')
{
?>

<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <h4>Disculpe! Ah ocurrido un error!</h4> <p>Los campos deben ser llenados correctamente, verifique y vuelva a intentarlo.</p> </div> 
<?Php
@session_destroy();
exit();
}  


require_once('conectarpg.php');                
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);


	
	$sql="SELECT id, cedula, nombre, apellido FROM persona.persona where cedula='$cedu'";
	$resHMN=$conex->sentencia($sql);
while($datprce=$conex->filas($resHMN))
						{ 
						 $id_per=$datprce["id"];
						 $cedula=$datprce["cedula"];
						 $nombres=$datprce["nombre"];
						 $apellidos=$datprce["apellido"];						
						}
function real_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}
function generar_password($len)
{
  $r='';
  $r=rand(000000000,99999999);
  /*for($i=0; $i<$len; $i++)
  { 
    $al=rand(1,2);
    if($al==1)$r.=chr(rand(0,25)+ord('a'));
    if($al==2)$r.=chr(rand(0,8)+ord('1'));
  }*/
  return $r;
}

$claveGenerada=strtoupper(generar_password(8));
$fecha=date('Y-m-d H:i:s');
$ip=real_ip();


$siesta=$conex->sentencia("SELECT id, cedula, nombre, apellido FROM persona.persona where cedula='$cedu'");
$numsiesta=$conex->numfilas($siesta);
  
$siestaesu=$conex->sentencia("SELECT * FROM persona.usuario  where  idpersona=$id_per and estatus=1");
  $numusuario=$conex->numfilas($siestaesu);
if($numsiesta>0 and  $numusuario>0)
{
?>

<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <h4>Disculpe! Ah ocurrido un error!</h4> <p>Sus datos ya fueron registradas y posees usuario.</p> </div> 
<?Php
@session_destroy();
exit();
}  


$res=$conex->sentencia("SELECT id, nombre, direccion, estatus, rif, fecha, ip, num_telef
  FROM  empresa.empresa
  where estatus=1");



while($dato=$conex->filas($res)){
$id_uni=$dato["id"];
$nombre_u=$dato["nombre"];
$siglas=$dato["rif"];
}
$APELNOMB = "$nombres  $apellidos";
$contenido="
	La empresa ".$nombre_u." con rif (".$siglas."), informa al 
	
	Estimado ciudadano, <strong>".$APELNOMB." </strong>de cedula numero <strong>".$cedula."</strong>,  que este mensaje que le enviamos posee <strong>codigo secreto</strong> con el debera ingresar en el campo codigo secreto y <strong>continuar</strong> con el proceso de crear usuario. <br>

  <nbsp><nbsp><nbsp>  <strong>* Codigo Secreto: ".$claveGenerada."<br></strong>

<br>
<br>

<br>";

echo $contenido;
?> 
<?php
$correoOrigen='';
$claveDeCorreoOrigen=''; 
/*

$mm=(int)date("s"); 

if($mm>=0 && $mm<7)  { $correoOrigen="inscripj23@gmail.com";                   $claveDeCorreoOrigen="rafa3grado"; }
if($mm>=7 && $mm<14) { $correoOrigen="sarec.cuentas@gmail.com";                $claveDeCorreoOrigen="jj2c3desarrolladores"; }
if($mm>=14 && $mm<28){ $correoOrigen="usuarios.sarec@gmail.com";               $claveDeCorreoOrigen="saeyce123456"; }
if($mm>=28 && $mm<35){ $correoOrigen="inscripj23@gmail.com";                   $claveDeCorreoOrigen="rafa3grado"; }
if($mm>=35 && $mm<42){ $correoOrigen="sarec.cuentas@gmail.com";                $claveDeCorreoOrigen="jj2c3desarrolladores"; }
if($mm>=42 && $mm<49){ $correoOrigen="inscripj23@gmail.com";                   $claveDeCorreoOrigen="rafa3grado"; }
if($mm>=49 && $mm<60){ $correoOrigen="usuarios.sarec@gmail.com";               $claveDeCorreoOrigen="saeyce123456"; }

//echo $correoOrigen.'josue';
$mail = new PHPMailer();
$mail->IsSMTP();

$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "$correoOrigen";
$mail->Password = "$claveDeCorreoOrigen";
$mail->From = "$correoOrigen";
$mail->FromName = "SISADMAC - Colegio Juan XXIII";
$mail->Subject = "Registro de Estudiante";
$mail->AltBody = "";
	$mail->MsgHTML("$contenido");


$mail->AddAddress("$correoE", "Destinatario");
$mail->IsHTML(true);

if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
     echo "Un Mensaje ha sido enviado a su correo con el Codigo secreto $claveGenerada";
         }// fin delelse
*/
$incoise=$conex->sentencia("INSERT INTO public.codigo_secreto(
            codigo, fecha, ip, tipo_, id_persona, correo, estatus)
    VALUES (  '$claveGenerada', '$fecha','$ip',1,'$id_per','$correoE',1)");


}else{
?>

<div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <h4>Disculpe! Ah ocurrido un error!</h4> <p>Por favor verifique e ingrese completo su numero de cedula.</p> </div> 
<?Php
@session_destroy();
exit();
}  
	
?>
           

