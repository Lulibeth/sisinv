 <?Php @session_destroy(); ?>
  <script>
  
  
  function buscardatos()
{
//alert("csd");
	
		    var cedula =document.getElementById('cedula').value; 
		    var pre =document.getElementById('pre').value; 
			ceducomple=pre+cedula;
				libAjax('form1re','nombrepersona.php?cedula='+ceducomple,'nombres_inscr');

}

function enviarmensaje()
{
//alert("csd");
	
		    var cedula =document.getElementById('cedula').value; 
				libAjax('form1re','enviocodigosecreto.php?cedula='+cedula,'mostrarmensaje');

}

function mostrarboton(n)
{
    var nu =n; 
		if(nu==1)
		{	
		document.getElementById("mosbenmen").innerHTML="<a id='enviarco' tabindex='0' onClick='enviarmensaje();' class=' btn btn-lg btn-danger bs-docs-popover' role='button' data-toggle='popover' data-trigger='focus' title='Solicitar Codigo Secreto' >Solicitar Codigo</a>";
				return true;
		}else{
		document.getElementById("mosbenmen").innerHTML="";
		return false;
		
		}
	
	

}

function mostrarbotonx(n)
{
    var nu =n; 
		
			if(nu==2)
		{	
		document.getElementById("botonregistro").innerHTML="<button type='submit' class='btn btn-primary'>Guardar</button>";
				return true;
		}else{
		document.getElementById("botonregistro").innerHTML="";
		return false;
		
		}
	

}
</script>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<!DOCTYPE HTML>
<html>
<head>
<title>Sisinv | Registro :: Noslen CA.</title>
<link href="images/logoeditable2.png" rel="shortcut icon"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--lined-icons -->
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

<script src="js/js.js"></script>
<script src="js/libreria.js"></script>
  <script src="js/PaginadorClass.js"></script>
<!--clock init-->
</head> 
<body>
<div class="error_page" ><!--/login-top-->
 <h3 class="inner-tittle t-inner">Iniciar sesion </h3>
<div class="error-top" align="right" style="left: 10%; width:80%;">
<div class="validation-form" > <div id="mensaje"></div>
<form  action="entradaRegis.php" method="post" name="form1re" id="form1re"  onsubmit="return addMsj();">
<table class="table table-hover">
  <tr>
    <td><label for="pre" class="col-sm-1 control-label">Prefijo</label><select class="form-control" name="pre" id="pre">
	<option value="" disabled selected>Seleccione</option>
	<option value="V-">V-</option>
	<option value="E-">E-</option>
</select></td>
    <td><label for="cedula" class="col-sm-1 control-label">Cedula</label>
<input class="form-control" name="cedula" id="cedula" type="text" required="" maxlength="12" onKeyUp="buscardatos()" ></td>
  </tr>
  <tr>
    <td colspan="2"><div id="nombres_inscr" class="bs-example bs-example-padded-bottom" style='font-size:20px'></div></td>
  </tr>
  <tr>
    <td><label for="cambioClave" class="col-sm-1 control-label">Clave</label>
<input class="form-control" name="cambioClave"  autofocus="autofocus" type="password" id="cambioClave" value="" size="10" maxlength="8"   required /></td>
    <td><label for="cambioClaveRes" class="col-sm-1 control-label">Confirmar</label>
<input class="form-control"  name="cambioClaveRes" type="password" id="cambioClaveRes" value="" size="10" maxlength="8" required  /></td>
  </tr><!-- return soloLetrasPrueba(event);   -->
  <tr>
    <td><label for="correo" class="col-sm-1 control-label">Correo</label>
	<input class="form-control" name="correo" id="correo" type="email" required="" onKeyUp="mostrarboton(1)"/></label></td>
    <td>
	<div id="mosbenmen" class="bs-example bs-example-padded-bottom" ></div>
	<div id="mostrarmensaje"></div>
	
	
	</td>
  </tr>
  <tr>
    <td><label for="correo" class="col-sm-1 control-label">Codigo:</label>
	<input class="form-control"  type="text"  name="cc" id="cc" value="" required="" onKeyUp="mostrarbotonx(2)" /></td>
    <td><div id="botonregistro"></div>
</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

</div>
</div>
</div><!--//login-top--><br><br><br><br><br><br>


 

	 	<!--//login-->
										    <!--footer section start-->
										<div class="footer">
										   <p>SISADMAC &copy; 2019 . Sistema Administrativo y Academico del Colegio Juan XXIII</p>
										</div>
									<!--footer section end-->
									<!--/404-->
									<script>
  $('#myButton').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })
</script>
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
							
							
							
<link rel="stylesheet" href="css/vroom.css">
						
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>

</body>
</html>
