<?php
/*if($_SESSION["s_nivel"]!=1)
{
?>
<script language='JavaScript'>
alert('Usted no posee permisologia para acceder a esta pagina');
window.location = '../../index.php';
</script>
<?Php
@session_destroy();
exit();
}*/
		switch ($opt) {
		
		case 'recarg':{ require_once('inicial.php');  break;  } 
		case 'inpro':{ require_once('inser_produ.php');  break;  } 
		case 'inper':{ require_once('inser_person.php');  break;  } 
		case 'inpercar':{ require_once('inser_empre_carg.php');  break;  }
		case 'inemp':{ require_once('inser_empre.php');  break;  }
		case 'iniva':{ require_once('inser_iva.php');  break;  }
		case 'intipo':{ require_once('inser_tipo_pro.php');  break;  }
		case 'intalla':{ require_once('inser_talla.php');  break;  }
		case 'inprove':{ require_once('inprove.php');  break;  }
		//case 'inprota':{ require_once('inser_produ_talla.php');  break;  } 
		case 'inarticu':{ require_once('inser_articulo.php');  break;  } 
		
		
		case 'coper':{ require_once('ver_persona.php');  personaPRE(); break;  }
		case 'coper2':{ require_once('ver_persona_2.php');  VerpersonaPRE(); break;  }
		case 'copro':{ require_once('ver_producto.php');  productoPRE(); break;  }
		case 'copro2':{ require_once('ver_producto_2.php');  VerproductoPRE(); break;  }
		case 'coprovee':{ require_once('ver_proveedor.php');  proveedorPRE(); break;  }
		case 'coiva':{ require_once('ver_iva.php');  ivaPRE(); break;  }
		case 'cotipo_produ':{ require_once('ver_tipo_produ.php');  tip_produPRE(); break;  }
		case 'cotalla':{ require_once('ver_talla.php'); tallaPRE(); break;  }
		case 'coempresa':{ require_once('ver_empresa.php'); empresaPRE(); break;  }
		case 'cocargo':{ require_once('ver_cargo.php'); cargoPRE(); break;  }
		case 'coarticulo':{ require_once('ver_articulo.php');  articuloPRE(); break;  }
		
		case 'basicoper':{ require_once('basico_persona_insertar.php');  break;  }
		case 'basicopro':{ require_once('basico_producto_insertar.php');  break;  }
		case 'basicoprocon':{ require_once('basico_producto_consultar.php');  break;  }
		case 'basicoempre':{ require_once('basico_empresa_insertar.php');  break;  }
		case 'basicoemprecon':{ require_once('basico_empresa_consultar.php');  break;  }
		
		case 'basicoprore':{ require_once('basico_producto_reporte.php');  break;  }
		case 'factura':{ require_once('agregar_facturax.php');  break;  }


		


		default:      { require_once("inicial.php");      break;   }  
					  
					  }
		?>
