var arregloClave =  new Array('','','');
function ilumina(fila)// ILUMINA LOS ELEMENTOS DE LAS LISTAS
{       
	fila.style.background="-webkit-gradient(linear, 10% 56%, 10% 21%, from(#3F86BA), to(#327AAA))";
	fila.style.background="-moz-linear-gradient(53% 55% 92deg, #3F86BA, #327AAA 36%)";
	fila.style.color="#FFF";
}
function apaga(fila)
{
	fila.style.background="none";
	fila.style.color="black";
}
//elimina los espacios en blanco de las cajas de texto
function trim(cadena)
{
	for(i=0; i<cadena.length; )
	{
		if(cadena.charAt(i)==" ")
			cadena=cadena.substring(i+1, cadena.length);
		else
			break;
	}

	for(i=cadena.length-1; i>=0; i=cadena.length-1)
	{
		if(cadena.charAt(i)==" ")
			cadena=cadena.substring(0,i);
		else
			break;
	}
	return cadena;
}
//usado para verificar los campos vacios
function chequear(k)
{
	document.getElementById(k.id).value=trim(document.getElementById(k.id).value);
cadena = k.value;
cadena = cadena.replace(/(^\s*)|(\s*$)/g,""); 

	if(cadena.length==0)
	{
		document.getElementById("mensaje").innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Existen campos obligatorios vacios</div>';
	 k.focus();
	 return false;
	}else{
		document.getElementById("mensaje").innerHTML='';
		return true;
	}
}//fin de funcion chequear
function chequearCanchica(k,div,cedd)
{
	document.getElementById(k.id).value=trim(document.getElementById(k.id).value);
cadena = k.value;
cadena = cadena.replace(/(^\s*)|(\s*$)/g,""); 

	if(cadena.length==0)
	{
		document.getElementById(div).innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Existen campos obligatorios vacios</div>';
	 k.focus();
	 return false;
	}else{
		document.getElementById(div).innerHTML='';
		return true;
	}
}//fin de funcion chequear



function chequearSelectcanchica(k,div)
{
	if(k.value==0)
	{
document.getElementById(div).innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Existen campos obligatorios vacios</div>';	 	
k.focus();
	 	return false;
		}else{
		document.getElementById(div).innerHTML='';
			return true;
	}		
}



function chequear2(k)
{
	document.getElementById(k.id).value=trim(document.getElementById(k.id).value);
cadena = k.value;
cadena = cadena.replace(/(^\s*)|(\s*$)/g,""); 

	if(cadena.length==0)
	{
		document.getElementById("mensaje").innerHTML='<div align="center"><div class="alert alert-error" align="center" style=" width:710px"><button type="button" class="close" data-dismiss="alert">×</button>Existen campos obligatorios vacios</div></div>';
	 k.focus();
	 return false;
	}else{
		document.getElementById("mensaje").innerHTML='';
		return true;
	}
}//fin de funcion chequear
//SELECCIONAR ELEMENTOS DE LA LISTA
function chequearSelect(k)
{
	if(k.value==0)
	{
		document.getElementById("mensaje").innerHTML="<img src='../../estud/js/images/inactivo.PNG' width='14' height='12'> Lo Sentimos: algun elemento de la lista debe ser seleccionado";
	 	k.focus();
	 	return false;
		}else{
			document.getElementById("mensaje").innerHTML="";
			return true;
	}		
}
function chequearTexto(k)
{//usado para verificar  que la cadena solo texo
document.getElementById(k.id).value = k.value.toUpperCase();
document.getElementById(k.id).value=trim(document.getElementById(k.id).value);

	if(!isNaN(k.value))
	{
		document.getElementById("mensaje").innerHTML="<font color='#FF0000'><img src='../../estud/js/images/inactivo.PNG' width='14' height='12'>El campo debe poseer solo texto</font>";
		k.focus();
		return false;
	
	}else{
		document.getElementById("mensaje").innerHTML="";
		return true;
	}
}
function chequearTelef(k){
if( !(/^\d{4}-\d{7}$/.test(k.value)) ) {
			document.getElementById("mensaje").innerHTML="<font color='#FF0000'><img src='../../estud/js/images/inactivo.PNG' width='14' height='12'>Lo Sentimos: telefono invalido, formato es: 0000-0000000</font>";
		 k.focus();
		 return false;
  }else{
		document.getElementById("mensaje").innerHTML="";
		return true;
	  }
}
function validarEmail(theElement)
{
	var evaluar = theElement.value;
	var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;
	if (filter.test(evaluar))
	{
		document.getElementById("mensaje").innerHTML="";
		return true;}
	else{
		document.getElementById("mensaje").innerHTML="<font color='#FF0000'><img src='../../estud/js/images/inactivo.PNG' width='14' height='12'>Lo Sentimos: Correo electronico invalido</font>";
	theElement.focus();
	return false;}
}

function chequearNumero(k)
{
	if(k.value<0)
	{
		//document.getElementById(k.id).value='';
		document.getElementById("mensaje").innerHTML="<font color='#FF0000'><img src='../../estud/js/images/inactivo.PNG' width='14' height='12'>Este campo Invalido</font>";
		k.focus();
		return false;
	}
	else{
		document.getElementById("mensaje").innerHTML="";
		return true;}
}
function buscarPuntos(k)
{
	var busca='.';
	if(k.value.indexOf(busca)>0)
	{
		document.getElementById("mensaje").innerHTML="<font color='#FF0000'><img src='../../estud/js/images/inactivo.PNG' width='14' height='12'>Este campo debe poseer solo Numeros, no puede contener puntos.</font>";
		k.focus();
		return false;
	}
	else{
		document.getElementById("mensaje").innerHTML="";
		return true;
		}
}
//libreria para el manejo de ajax ENVIO TOODA la data del formulario
function libAjax(formulario,url,divActualizar)
{
		var parametros= $('#'+formulario+'').serialize();
        $.ajax({
                data:  parametros,
               url:   url,
                type:  'post',
				beforeSend: function(){
					$("#"+divActualizar+"").html("<div align='center' ><img src='Imagenes/142car.gif'></div>");
					},
                success:  function (response) {
                        $("#"+divActualizar+"").html(response);
               }
        });
}
function claveArticulo(k)
{
	if(k.id=='denominacion_id')
		arregloClave[0]=k.value;
	else if(k.id=='color_id')
		arregloClave[1]=k.value;
	else if(k.id=='marca_id')
		arregloClave[2]=k.value;
	document.getElementById('codigo').value=arregloClave[0]+''+arregloClave[1]+''+arregloClave[2];
}

function limiteInferior(k)
{
	if(k.value<1)
	{
		document.getElementById("mensaje").innerHTML="<font color='#FF0000'><img src='../../estud/js/images/inactivo.PNG' width='14' height='12'>Para el registro es necesario al menos un proveedor y marca</font>";
		k.focus();
		return false;
	}
	else{
		document.getElementById("mensaje").innerHTML="";
		return true;}
}
function ocultar(div)
{
  		$( "#"+div+"").hide('explode');
}

function asignarValorClave()
{
	arregloClave[0]=document.getElementById('denominacion_id').value;
	arregloClave[1]=document.getElementById('color_id').value;
	arregloClave[2]=document.getElementById('marca_id').value;
}




function chequearCheckbox()
{
	var sAux="";
	var frm = document.getElementById("form");
	var control=false;
	for (i=0;i<frm.elements.length;i++)
	{
		if(frm.elements[i].type=='checkbox'){
			if(frm.elements[i].checked==true)
			{
				control=true;
			}
		}
	}
	if(control==false)
	{
		document.getElementById("mensaje").innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Debe seleccionar al menos un destinatario</div>';
		return false;
	}else
	{
		document.getElementById("mensaje").innerHTML='';
		return true;
	}
}