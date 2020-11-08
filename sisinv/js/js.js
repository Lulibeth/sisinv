
/*
// agregar subcoordinacion
$(document).ready(function(){
	//alert('joasdasio');
})*/
function validacionAjax(campo,parametros,url)
{
  var respuesta='';
  $('#container #content #repetido').remove();
  document.getElementById(campo.id).value=trim(document.getElementById(campo.id).value);
     $.ajax({
                data  :  parametros,
        dataType: "json",
        async   :false,
                url   :   url,
                type  :  'post',
                success :  function (response) {
            respuesta=response.estado;
            if (respuesta==false){
              $('#container #content #'+campo.id+'').after('<div class="repetido" id="repetido">Campo repetido</div></div>');
               document.getElementById(campo.id).focus();
            }else $('#container #content #repetido').remove();
                }
        });
  return respuesta;
}
function iniciarSessioninW()
{
	
	document.getElementById("divInfoCapins").innerHTML='';
	var parametros ={"captchaUser"  : document.getElementById('captchaUser').value};
    var respuesta= validacionAjax(document.getElementById('captchaUser'),parametros,'../modal/controlador.php?opt=compararCapt');
	
	//alert (respuesta);
	
    if(chequear2(document.getElementById('login')))
    if(chequear2(document.getElementById('clave')))
    {
		if(respuesta)
		{
				document.getElementById("divInfoCapins").innerHTML='';
			return true
		}else
		{
			document.getElementById("divInfoCapins").innerHTML='<h6 class="alert alert-success">Este campo no puede estar vacio,<br> y su informacion debe coincidir con la imagen</h6>';
			return false;
		}
    }else
    {
		document.getElementById("divInfoCapins").innerHTML='';
		return false
    }
	/**/
    //alert(respuesta);
	return false;
}
function saludando()
{
	/*alert();*/
}
/*validar formu de universidad*/
function addMsjuni()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('prec')))
	if(chequearSelect(document.getElementById('prec')))
	if(chequear(document.getElementById('cedula')))
	if(chequearNumero(document.getElementById('cedula')))
	if(chequear(document.getElementById('apellido')))
	if(soloLetrasPrueba(document.getElementById('apellido')))
	if(chequear(document.getElementById('nombre')))
	if(soloLetrasPrueba(document.getElementById('nombre')))
	if(chequear(document.getElementById('fn')))
	if(chequearTexto(document.getElementById('fn')))	
	if(chequear(document.getElementById('documento')))
	if(chequearTexto(document.getElementById('documento')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}
/*validar formu de docente*/
function addMsjdocente()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('cedula')))
	if(chequearTexto(document.getElementById('cedula')))
	if(chequear(document.getElementById('persona')))
	if(chequearSelect(document.getElementById('persona')))
	if(chequear(document.getElementById('condicion')))
	if(chequearSelect(document.getElementById('condicion')))
	if(chequear(document.getElementById('dedicacion')))
	if(chequearSelect(document.getElementById('dedicacion')))
	if(chequear(document.getElementById('categoria')))
	if(chequearSelect(document.getElementById('categoria')))
	if(chequear(document.getElementById('fn')))
	if(chequearTexto(document.getElementById('fn')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}

/*validar formu de obrero*/
function addMsjobrero()
{
	if(chequear(document.getElementById('numreo')))
	if(chequearNumero(document.getElementById('numreo')))	
	if(chequear(document.getElementById('cedula3')))
	if(chequearTexto(document.getElementById('cedula3')))
	if(chequear(document.getElementById('persona')))
	if(chequearSelect(document.getElementById('persona')))
	if(chequear(document.getElementById('condiciono')))
	if(chequearSelect(document.getElementById('condiciono')))
	if(chequear(document.getElementById('dedicaciono')))
	if(chequearSelect(document.getElementById('dedicaciono')))
	if(chequear(document.getElementById('fno')))
	if(chequearTexto(document.getElementById('fno')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}


/*validar formu de administrativo*/
function addMsjadminis()
{
	if(chequear(document.getElementById('numrea')))
	if(chequearNumero(document.getElementById('numrea')))	
	if(chequear(document.getElementById('cedula2')))
	if(chequearTexto(document.getElementById('cedula2')))
	if(chequear(document.getElementById('persona')))
	if(chequearSelect(document.getElementById('persona')))
	if(chequear(document.getElementById('condiciona')))
	if(chequearSelect(document.getElementById('condiciona')))
	if(chequear(document.getElementById('dedicaciona')))
	if(chequearSelect(document.getElementById('dedicaciona')))
	if(chequear(document.getElementById('fna')))
	if(chequearTexto(document.getElementById('fna')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}
/*validar formu de hora*/
function addMsjhora()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('descripcion')))
	if(chequearTexto(document.getElementById('descripcion')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}

/*validar formu de dia*/
function addMsjdia()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('descripcion')))
	if(chequearTexto(document.getElementById('descripcion')))
	
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}

/*validar formu de aula*/
function addMsjaula()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('descripcion')))
	if(chequearTexto(document.getElementById('descripcion')))
	if(chequear(document.getElementById('sede')))
	if(chequearSelect(document.getElementById('sede')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}
/*validar formu de sedes*/
function addMsjsede()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('apellido')))
	if(chequearTexto(document.getElementById('apellido')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('letra')))
	if(chequearTexto(document.getElementById('letra')))
	if(chequear(document.getElementById('prec')))
	if(chequearSelect(document.getElementById('prec')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}

/*validar formu de autoridades*/
function addMsjauto()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('prec')))
	if(chequearSelect(document.getElementById('prec')))
	if(chequear(document.getElementById('carg')))
	if(chequearSelect(document.getElementById('carg')))
	if(chequear(document.getElementById('uni')))
	if(chequearSelect(document.getElementById('uni')))
	if(chequear(document.getElementById('documento')))
	if(chequearTexto(document.getElementById('documento')))
	if(chequear(document.getElementById('fn')))
	if(chequearTexto(document.getElementById('fn')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}

/*validar formu de escala*/
function addMsjescal()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('escalades')))
	if(chequearTexto(document.getElementById('escalades')))
	if(chequear(document.getElementById('aprob')))
	if(chequearTexto(document.getElementById('aprob')))
	if(chequear(document.getElementById('fn')))
	if(chequearTexto(document.getElementById('fn')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}

/*validar formu de tipo de materia*/
function addMsjtmateria()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('descripcion')))
	if(chequearTexto(document.getElementById('descripcion')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}


/*validar formu de tipo de periodo*/
function addMsjtprtio()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('descripcion')))
	if(chequearTexto(document.getElementById('descripcion')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}

/*validar formu de periodo*/
function addMsjperiodo()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('descripcion')))
	if(chequearTexto(document.getElementById('descripcion')))
	if(chequear(document.getElementById('tperi')))
	if(chequearSelect(document.getElementById('tperi')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}

/*validar formu de oferta*/

function addMsjoferta()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('sede')))
	if(chequearSelect(document.getElementById('sede')))
	if(chequear(document.getElementById('carrera')))
	if(chequearSelect(document.getElementById('carrera')))
	if(chequear(document.getElementById('smat')))
	if(chequearSelect(document.getElementById('smat')))
	if(chequear(document.getElementById('dsmat')))
	if(chequearSelect(document.getElementById('dsmat')))
	if(chequear(document.getElementById('peri1')))
	if(chequearSelect(document.getElementById('peri1')))
	if(chequear(document.getElementById('peri2')))
	if(chequearSelect(document.getElementById('peri2')))
	if(chequear(document.getElementById('fn')))
	if(chequearTexto(document.getElementById('fn')))
	if(chequear(document.getElementById('ff')))
	if(chequearTexto(document.getElementById('ff')))
	if(chequear(document.getElementById('descripcion')))
	if(chequearTexto(document.getElementById('descripcion')))
	if(chequear(document.getElementById('cants')))
	if(chequearTexto(document.getElementById('cants')))
		{
			return true
		}else
		{
			return false;
		}
return false;
}


/*validar formu de sectorizacion de materia*/
function addMsjsmateria()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('descripcion')))
	if(chequearTexto(document.getElementById('descripcion')))
	if(chequear(document.getElementById('duracion')))
	if(chequearSelect(document.getElementById('duracion')))
	if(chequear(document.getElementById('durac')))
	if(chequearSelect(document.getElementById('durac')))
		{
			//if(soloLetrasPrueba(document.getElementById('cambioClave').value))
			return true
		}else
		{
			return false;
		}
return false;
}
/* validacion formulario registrp de persona*/
function addMsjri()
{
	if(chequear(document.getElementById('numre')))
	if(chequearNumero(document.getElementById('numre')))	
	if(chequear(document.getElementById('prec')))
	if(chequearSelect(document.getElementById('prec')))
	if(chequear(document.getElementById('cedula')))
	if(chequearNumero(document.getElementById('cedula')))
	if(chequear(document.getElementById('apellido')))
	if(chequearTexto(document.getElementById('apellido')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('fn')))
	if(chequearTexto(document.getElementById('fn')))	
	if(chequear(document.getElementById('fi')))
	if(chequearTexto(document.getElementById('fi')))
	if(chequear(document.getElementById('nacio')))
	if(chequearSelect(document.getElementById('nacio')))
	if(chequear(document.getElementById('sexo')))
	if(chequearSelect(document.getElementById('sexo')))
	if(chequear(document.getElementById('eciv')))
	if(chequearSelect(document.getElementById('eciv')))
	if(chequear(document.getElementById('etnia')))
	if(chequearSelect(document.getElementById('etnia')))
	if(chequear(document.getElementById('pais')))
	if(chequearSelect(document.getElementById('pais')))
	if(chequear(document.getElementById('estadon')))
	if(chequearSelect(document.getElementById('estadon')))	
	if(chequear(document.getElementById('municipion')))
	if(chequearSelect(document.getElementById('municipion')))
	if(chequear(document.getElementById('parroquian')))
	if(chequearSelect(document.getElementById('parroquian')))	
	if(chequear(document.getElementById('paisu')))
	if(chequearSelect(document.getElementById('paisu')))
	if(chequear(document.getElementById('estadou')))
	if(chequearSelect(document.getElementById('estadou')))	
	if(chequear(document.getElementById('municipiou')))
	if(chequearSelect(document.getElementById('municipiou')))
	if(chequear(document.getElementById('parroquiau')))
	if(chequearSelect(document.getElementById('parroquiau')))	
	if(chequear(document.getElementById('direccion')))
	if(chequearTexto(document.getElementById('direccion')))		
		{
			return true
		}else
		{
			return false;
		}
return false;
}


function addMsjri22Cambcont()
{
	if(chequear(document.getElementById('cambioClaveCC')))
	if(chequear(document.getElementById('cambioClaveResCC')))
	if(validarClaveCambio(document.getElementById('cambioClaveCC'), document.getElementById('cambioClaveResCC')))
		{
			return true
		}else
		{
			return false;
		}

return false;
}


function addMsjenviar()
{
	if(chequear(document.getElementById('pre')))
	if(chequearSelect(document.getElementById('pre')))
	if(chequear(document.getElementById('cedula')))
	if(chequearNumero(document.getElementById('cedula')))
	if(chequear(document.getElementById('nombres')))
	if(chequearTexto(document.getElementById('nombres')))
	if(chequear(document.getElementById('apellidos')))
	if(chequearTexto(document.getElementById('apellidos')))
	if(chequear(document.getElementById('fn')))
	if(chequearfecha(document.getElementById('fn')))
	if(chequear(document.getElementById('correo')))
	if(validarEmail(document.getElementById('correo')))
	if(chequear(document.getElementById('cambioClave')))
	if(chequear(document.getElementById('cambioClaveRes')))
	if(validarClave(document.getElementById('cambioClave')))
	if(validarClave(document.getElementById('cambioClaveRes')))
		{
			return true
		}else
		{
			return false;
		}
return false;
}


function addMsjenviarolv()
{
	if(chequear(document.getElementById('preO')))
	if(chequearSelect(document.getElementById('preO')))
	if(chequear(document.getElementById('cedulaO')))
	if(chequearNumero(document.getElementById('cedulaO')))
	if(chequear(document.getElementById('correoO')))
	if(validarEmail(document.getElementById('correoO')))
		{
			return true
		}else
		{
			return false;
		}
return false;
}


/*ACTUALIZAR*/
function addMsjriACT15()
{
	if(chequear(document.getElementById('cedulax')))
	if(chequear(document.getElementById('nombresx')))
	if(chequearTexto(document.getElementById('nombresx')))
	if(chequear(document.getElementById('apellidosx')))
	if(chequearTexto(document.getElementById('apellidosx')))
	if(chequear(document.getElementById('nacionalidadx')))
	if(chequearSelect(document.getElementById('nacionalidadx')))
	if(chequear(document.getElementById('sexox')))
	if(chequearSelect(document.getElementById('sexox')))
	if(chequear(document.getElementById('ecivilx')))
	if(chequearSelect(document.getElementById('ecivilx')))
	if(chequear(document.getElementById('fnx')))
	if(chequearfecha(document.getElementById('fnx')))
	if(chequear(document.getElementById('telcasax')))
	if(chequearTelef(document.getElementById('telcasax')))
	if(chequear(document.getElementById('telcelx')))
	if(chequearTelef(document.getElementById('telcelx')))
	if(chequear(document.getElementById('paisn')))
	if(chequearSelect(document.getElementById('paisn')))
	if(chequear(document.getElementById('estadon')))
	if(chequearSelect(document.getElementById('estadon')))	
	if(chequear(document.getElementById('municipion')))
	if(chequearSelect(document.getElementById('municipion')))
	if(chequear(document.getElementById('parroquian')))
	if(chequearSelect(document.getElementById('parroquian')))	
	if(chequear(document.getElementById('etnia')))
	if(chequearSelect(document.getElementById('etnia')))	
	if(chequear(document.getElementById('paisu')))
	if(chequearSelect(document.getElementById('paisu')))
	if(chequear(document.getElementById('estadou')))
	if(chequearSelect(document.getElementById('estadou')))	
	if(chequear(document.getElementById('municipiou')))
	if(chequearSelect(document.getElementById('municipiou')))
	if(chequear(document.getElementById('parroquiau')))
	if(chequearSelect(document.getElementById('parroquiau')))
	if(chequear(document.getElementById('direccion')))
	if(chequearTexto(document.getElementById('direccion')))	
		{
			return true
		}else
		{
			return false;
		}
return false;
}


function addMsjri22Act()
{
	if(chequear(document.getElementById('id_persona')))
	if(chequear(document.getElementById('titulo')))
	if(chequearSelect(document.getElementById('titulo')))
	if(chequear(document.getElementById('institucion')))
	if(chequearSelect(document.getElementById('institucion')))
	if(chequear(document.getElementById('anog')))
	if(chequearSelect(document.getElementById('anog')))
	if(chequear(document.getElementById('cosdopsu')))
	if(chequearNumero(document.getElementById('cosdopsu')))
		{
			return true
		}else
		{
			return false;
		}
return false;
}


function addMsjri234Actu()
{
	if(chequear(document.getElementById('sede123')))
	if(chequearSelect(document.getElementById('sede123')))
	if(chequear(document.getElementById('programa')))
	if(chequearSelect(document.getElementById('programa')))
	if(chequear(document.getElementById('turnoxx')))
	if(chequearSelect(document.getElementById('turnoxx')))
	
		{
			return true
		}else
		{
			return false;
		}
return false;
}


function addNot()
{
	if(chequear(document.getElementById('asunto')))
	if(chequearTexto(document.getElementById('asunto')))
	if(chequear(document.getElementById('contenido')))
	if(chequearTexto(document.getElementById('contenido')))
	{
		
		document.getElementById("form").action="/saeyce/mensajeria/index.php?opt=addNot";
		document.getElementById("form").submit();
	}
}

function addsubcoo()
{
if (document.getElementById('estatus').checked){
	var estatus=document.getElementById('estatus').value=1;
}else{
	var estatus=document.getElementById('estatus').value=0;
}
	if(chequearSelect(document.getElementById('coordinacion_id')))
	if(chequear(document.getElementById('ciudad')))
	if(chequearTexto(document.getElementById('ciudad')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('direccion')))
	if(chequearTexto(document.getElementById('direccion')))
	{
		document.getElementById("form").action="index.php?opt=22&estatus="+estatus;
		document.getElementById('form').submit();
	}
}

// editar subcoordinacion
function editsubcoo()
{
if (document.getElementById('estatus').checked){
	var estatus=document.getElementById('estatus').value=1;
}else{
	var estatus=document.getElementById('estatus').value=0;
}
	if(chequearSelect(document.getElementById('coordinacion_id')))
	if(chequear(document.getElementById('ciudad')))
	if(chequearTexto(document.getElementById('ciudad')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('direccion')))
	if(chequearTexto(document.getElementById('direccion')))
	{
		document.getElementById("form").action="index.php?opt=23&estatus="+estatus;
		document.getElementById('form').submit();
	}
}

// agregar unidad administrativa
function addUad()
{
if (document.getElementById('estatus').checked){
	var estatus=document.getElementById('estatus').value=1;
}else{
	var estatus=document.getElementById('estatus').value=0;
}
if (document.getElementById('tipo').checked){
	var tipo=document.getElementById('tipo').value=1;
}else{
	var tipo=document.getElementById('tipo').value=0;
}
	if(chequearSelect(document.getElementById('sub_coordinacion_id')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('telefono')))
	if(chequearTelef(document.getElementById('telefono')))
	{
		document.getElementById("form").action="index.php?opt=32&estatus="+estatus+"&tipo="+tipo;
		document.getElementById('form').submit();
	}
}

// editar unidad administrativa
function editUad()
{
if (document.getElementById('estatus').checked){
	var estatus=document.getElementById('estatus').value=1;
}else{
	var estatus=document.getElementById('estatus').value=0;
}
if (document.getElementById('tipo').checked){
	var tipo=document.getElementById('tipo').value=1;
}else{
	var tipo=document.getElementById('tipo').value=0;
}
	if(chequearSelect(document.getElementById('sub_coordinacion_id')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('telefono')))
	if(chequearTelef(document.getElementById('telefono')))
	{
		document.getElementById("form").action="index.php?opt=33&estatus="+estatus+"&tipo="+tipo;
		document.getElementById('form').submit();
	}
}

//agregar dependencia usuaria
function addDus()
{
	if (document.getElementById('estatus').checked){
		var estatus=document.getElementById('estatus').value=1;
	}else{
		var estatus=document.getElementById('estatus').value=0;
	}
	if(chequearSelect(document.getElementById('unidad_admin_id')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	{
		document.getElementById("form").action="index.php?opt=42&estatus="+estatus;
		document.getElementById('form').submit();
	}
	
}
//editar dependencia usuaria
function editDus()
{
	if (document.getElementById('estatus').checked){
		var estatus=document.getElementById('estatus').value=1;
	}else{
		var estatus=document.getElementById('estatus').value=0;
	}
	if(chequearSelect(document.getElementById('unidad_admin_id')))
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	{
		document.getElementById("form").action="index.php?opt=43&estatus="+estatus;
		document.getElementById('form').submit();
	}
}

//agregar marca
function addMar()
{
	
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	{
		document.getElementById("form1").action="index.php?opt=52";
		document.getElementById('form1').submit();
	}
	
}
//agregar marca con ajax
function addMarcaAjax()
{
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	{
		libAjax('form1','controlador.php?opt=52','divListMarcas');
		ocultar('divFormAddMarca');
	}
}
//editar marca
function editMar()
{
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	{
		document.getElementById("form").action="index.php?opt=53";
		document.getElementById('form').submit();
	}
}
//agregar proveedor
function addPro()
{
	if (document.getElementById('estatus').checked){
		var estatus=document.getElementById('estatus').value=1;
	}else{
		var estatus=document.getElementById('estatus').value=0;
	}
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('telefono')))
	if(chequearTelef(document.getElementById('telefono')))
	if(chequear(document.getElementById('email')))
	if(validarEmail(document.getElementById('email')))
	if(chequear(document.getElementById('rif')))
	if(chequear(document.getElementById('direccion')))
	{
		document.getElementById("form").action="index.php?opt=62&estatus="+estatus;
		document.getElementById('form').submit();
	}
	
}

//editar proveedor
function editPro()
{
	if (document.getElementById('estatus').checked){
		var estatus=document.getElementById('estatus').value=1;
	}else{
		var estatus=document.getElementById('estatus').value=0;
	}
	if(chequear(document.getElementById('nombre')))
	if(chequearTexto(document.getElementById('nombre')))
	if(chequear(document.getElementById('telefono')))
	if(chequearTelef(document.getElementById('telefono')))
	if(chequear(document.getElementById('email')))
	if(validarEmail(document.getElementById('email')))
	if(chequear(document.getElementById('rif')))
	if(chequear(document.getElementById('direccion')))
	{
		document.getElementById("form").action="index.php?opt=63&estatus="+estatus;
		document.getElementById('form').submit();
	}
	
}




//agregar articulo
function addArt()
{
	//alert(document.getElementById('indiceFilaMarca').value);
	if (document.getElementById('estatus').checked){
		var estatus=document.getElementById('estatus').value=1;
	}else{
		var estatus=document.getElementById('estatus').value=0;
	}
	if(chequearSelect(document.getElementById('dep_usuaria_id')))
	if(chequearSelect(document.getElementById('catalogo')))
	if(chequearSelect(document.getElementById('denominacion_id')))
	if(chequearSelect(document.getElementById('uMedida')))
	if(chequearSelect(document.getElementById('des_unidad_id')))
	if(chequearSelect(document.getElementById('color_id')))
	if(chequear(document.getElementById('stock')))
	if(chequearNumero(document.getElementById('stock')))
	if(buscarPuntos(document.getElementById('stock')))
	if(chequearSelect(document.getElementById('marca_id')))
	{
		codigo=document.getElementById('codigo').value;
		document.getElementById("form").action="index.php?opt=72&estatus="+estatus+"&codigo="+codigo;
		document.getElementById('form').submit();
	}
}

function editArt()
{
	if (document.getElementById('estatus').checked){
		var estatus=document.getElementById('estatus').value=1;
	}else{
		var estatus=document.getElementById('estatus').value=0;
	}
	if(chequearSelect(document.getElementById('dep_usuaria_id')))
	if(chequearSelect(document.getElementById('denominacion_id')))
	if(chequearSelect(document.getElementById('des_unidad_id')))
	if(chequearSelect(document.getElementById('color_id')))
	if(chequear(document.getElementById('stock')))
	if(chequearNumero(document.getElementById('stock')))
	if(buscarPuntos(document.getElementById('stock')))
	if(chequearSelect(document.getElementById('marca_id')))
	{
		codigo=document.getElementById('codigo').value;
		document.getElementById("form").action="index.php?opt=73&estatus="+estatus+"&codigo="+codigo;
		document.getElementById('form').submit();
	}
}



function enviar(caso)
{
	document.getElementById("form").action="index.php?opt="+caso;
	document.getElementById("form").submit();
}
function enviar2(caso,id)
{
	document.getElementById("form").action="index.php?opt="+caso+"&id="+id;
	document.getElementById("form").submit();
	
}
function enviar3(caso,id)
{
	window.location.href = '/saeyce/mensajeria/index.php?opt='+caso+'&id='+id //Will take you to Google.
}
function enviar4(caso,data)
{
	window.location.href = '/saeyce/mensajeria/index.php?opt='+caso+'&data='+data //Will take you to Google.
}
function enviar5(caso,data,otr)
{
	window.location.href = '/saeyce/mensajeria/index.php?opt='+caso+'&data='+data+'&otr='+otr //Will take you to Google.
}
function enviar6(caso,id,otr)
{
	window.location.href = '/saeyce/mensajeria/index.php?opt='+caso+'&id='+id+'&otr='+otr //Will take you to Google.
}
