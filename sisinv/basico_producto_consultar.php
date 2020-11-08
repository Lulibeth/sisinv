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

require_once('conectarpg.php'); 
$conex=new BaseDatos();
$conex->conectar($conex->servidor,$conex->usuario,$conex->password,$conex->BD);
///////////////////////////////////////////////////////////////////////////////////////////////////
?>
<div class="tab-main"> <!--1-->
<div class="tab-inner"> <!--2-->
<div id="tabs" class="tabs"> <!--3-->
                                     <div class="sub-heard-part">
									        <ol class="breadcrumb m-b-0">
											   <li><a href="index.php">Inicio</a></li>
											   <li class="active">Producto > Consultar</li>
										    </ol>
									 </div>
<div class="graph"> <!--4-->
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-cup"><i class="glyphicon glyphicon-tag"></i>Producto</a></li>
					<li><a href="#section-2" class="icon-cup"><i class="glyphicon glyphicon-user"></i> <span>Proveedor</span></a></li>
						<li><a href="#section-3" class="icon-cup"><i class="glyphicon glyphicon-usd"></i>Iva</a></li>
						<li><a href="#section-4" class="icon-cup"><i class="glyphicon glyphicon-tags"></i>Tipo de Prod.</a></li>
						<li><a href="#section-5" class="icon-cup"><i class="glyphicon glyphicon-asterisk"></i>Talla</a></li>
						<li><a href="#section-6" class="icon-cup"><i class="glyphicon glyphicon-asterisk"></i>Articulo</a></li>
					</ul>
				</nav>
<div class="content tab"> <!--5-->
	<section id="section-1">
			<div class="mediabox" style="width:100%;">
               <a href="index.php?s=copro" target="_blank"> <img src= 'imagenes/ver-detalles_318-1493__.png' width='50' height='50'/>Consultar</a>
			</div>
	</section>
																						
	<section id="section-2">
			<div class="mediabox" style="width:100%;">
               <a href="index.php?s=coprovee" target="_blank"> <img src= 'imagenes/ver-detalles_318-1493__.png' width='50' height='50'/>Consultar</a>
			</div>
	</section>
																						
	<section id="section-3">
		    <div class="mediabox" style="width:100%;">
			  <a href="index.php?s=coiva" target="_blank"><img src= 'imagenes/ver-detalles_318-1493__.png' width='50' height='50'/>Consultar</a>
			</div>
	</section>
																						
	<section id="section-4">
			<div class="mediabox" style="width:100%;">
			  <a href="index.php?s=cotipo_produ" target="_blank"><img src= 'imagenes/ver-detalles_318-1493__.png' width='50' height='50'/>Consultar</a>
			</div>
	</section>
																						
	<section id="section-5">
			<div class="mediabox" style="width:100%;">
				<a href="index.php?s=cotalla" target="_blank"><img src= 'imagenes/ver-detalles_318-1493__.png' width='50' height='50'/>Consultar</a>
			</div>
	</section>
	
	<section id="section-6">
			<div class="mediabox" style="width:100%;">
				<a href="index.php?s=coarticulo" target="_blank"><img src= 'imagenes/ver-detalles_318-1493__.png' width='50' height='50'/>Consultar</a>
			</div>
	</section>
																																
</div>
																						
																					
																						
</div>

</div><!-- /content -->

</div>
																				<!-- /tabs -->
</div>
																	
																			