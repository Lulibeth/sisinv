<?Php
@session_start();
		$cedula=$_SESSION["cedula"];
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
											   <li class="active">Producto > Reporte</li>
										    </ol>
									 </div>
<div class="graph"> <!--4-->
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-cup"><i class="glyphicon glyphicon-tag"></i>Inventario</a></li>
					<li><a href="#section-2" class="icon-cup"><i class="glyphicon glyphicon-user"></i> <span>Proveedor</span></a></li>
					</ul>
				</nav>
<div class="content tab"> <!--5-->
	<section id="section-1">
			<div class="mediabox" style="width:100%;">
               <a href="reportes/proveedores.php" target="_blank"> <img src= 'imagenes/imprimir.png' width='50' height='50'/>Imprimir</a>
			</div>
	</section>
																						
	<section id="section-2">
			<div class="mediabox" style="width:100%;">
               <a href="reportes/proveedores.php" target="_blank"> <img src= 'imagenes/imprimir.png' width='50' height='50'/>Imprimir</a>
			</div>
	</section>
																						
																													
</div>
																						
																					
																						
</div>

</div><!-- /content -->

</div>
																				<!-- /tabs -->
</div>
																	
																			