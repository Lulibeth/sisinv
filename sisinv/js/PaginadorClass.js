var Paginador = /** @class */ (function () {

    //Autor:ingeniero Jhonathan

    function Paginador(url, tbodyId, callback) {
        this.buscar = '';
        this.page = 0;
        this.url = url;
        this.offset = 3;
        this.capoOrdernar = 'id';
        this.orderBy = 'desc';
        this.pagination = {
            total: 0,
            current_page: 0,
            per_page: 0,
            last_page: 0,
            from: 0,
            to: 0,
        };
        this.tbodyId = tbodyId;
        this.callback = callback;
        return this;
    }
    Paginador.prototype.asignar = function (parametro) {
        if (document.getElementById('buscar_' + this.tbodyId))
            this.buscar = document.getElementById('buscar_' + this.tbodyId).value;
        if (parametro.hasOwnProperty("page"))
            this.page = parametro.page;
        if (parametro.hasOwnProperty("buscar"))
            this.buscar = parametro.buscar;
        if (parametro.hasOwnProperty("buscar"))
            this.pagination.current_page = parametro.page;
        if (parametro.hasOwnProperty("capoOrdernar")) {
            if (this.capoOrdernar == parametro.capoOrdernar) {
                if (this.orderBy == 'desc')
                    this.orderBy = 'asc';
                else
                    this.orderBy = 'desc';
            }
            else {
                this.capoOrdernar = parametro.capoOrdernar;
                this.orderBy = 'desc';
            }
            this.capoOrdernar = parametro.capoOrdernar;
        }
        this.listar();
    };

    Paginador.prototype.listar = function () {
        var auxilarCallback = this.callback;
        var dataRespuesta = '';
        var objeto = this;
        var p = '';
        var tablaBody = $('#' + objeto.tbodyId);
        if ($('#' + objeto.tbodyId).parent().parent().find('#buscar_' + objeto.tbodyId).length == 0)
         $('#' + objeto.tbodyId).parent().before('<style>table th{cursor:pointer} </style><div class="row"><div class="col-sm-3"><span class="glyphicon glyphicon-search" ></span><label> <strong><em>&nbsp;&nbsp;Buscar:</em></strong></label><input class="form-control1" type="search" name="buscar_' + objeto.tbodyId + '" id="buscar_' + objeto.tbodyId + '" data="' + this.url + '"   onkeyup="new Paginador(\'' + this.url + '\', \'' + objeto.tbodyId + '\', ' + auxilarCallback + ').asignar({buscar:this.value,page:0});"/></div></div>');

        this.route = this.url + "?page=" + this.page + "&nombre=" + this.buscar + "&capoOrdernar=" + this.capoOrdernar + "&orderBy=" + this.orderBy + "";
        $.get(this.route, function (respuesta) {
            var respuesta = JSON.parse(respuesta);
            tablaBody.html('');
            $(respuesta).each(function (clave, valor) {
                dataRespuesta = valor;
            });

        }).done(function () {
            var data = dataRespuesta.data;
            auxilarCallback(data);
            this.pagination = dataRespuesta;
            this.offset = 3;
			

            var pie = "<hr><h5 class=\"pull-left\">Mostrando desde el " + this.pagination.from + " hasta el " + this.pagination.to + ", de un total de " + this.pagination.total + " de registros</h5><nav aria-label='Page navigation'><ul class=\"pagination\" >";
 
if (this.pagination.current_page==1) {
pie+="<li ><a href='#' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
 }

            if (this.pagination.current_page > 1) {
                pie += "<li><a onclick=\"new Paginador('" + this.pagination.path + "','" + objeto.tbodyId + "'," + auxilarCallback + ").asignar({page:" + (parseInt(this.pagination.current_page) - 1) + "}); \"><span aria-hidden='true'>&laquo;</span></a></li>";

            }

            if (this.pagination.to) {
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {

                    pagesArray.push(from);

                    from++;

                }
                for (var q = 0; q < pagesArray.length; q++) {
                    var pagActva = '';
                    if (pagesArray[q] == this.pagination.current_page)
                        pagActva = 'active';
						
                    pie += "<li class='" + pagActva + "  '><a class=\"active\" onclick=\"new Paginador('" + this.pagination.path + "','" + objeto.tbodyId + "'," + auxilarCallback + ").asignar({page:" + (parseInt(pagesArray[q])) + "});\">" + pagesArray[q] + "</a></li>";
                }
            }
            if (this.pagination.current_page < this.pagination.last_page) {
                pie += "<li ><a aria-label='Next'  onclick=\"new Paginador('" + this.pagination.path + "','" + objeto.tbodyId + "', " + auxilarCallback + ").asignar({page:" + (parseInt(this.pagination.current_page) + 1) + "});\"><span aria-hidden='true'>&raquo;</span></a></li>";

            }
            pie += "</ul></nav>";
            p = pie;
            if (document.getElementById('paginador_' + objeto.tbodyId)) {
                $('#paginador_' + objeto.tbodyId).html(p);
            }

            else {

                $('#' + objeto.tbodyId).parent().after('<div id="paginador_' + objeto.tbodyId + '">' + p + '</div>');

            }

        });

    };

    return Paginador;

}());


/*


class Paginador{
    //Autor:ingeniero Josue
    constructor(url,tbodyId,callback){
        this.buscar='';
        this.page=0;
        this.url=url;
        this.offset= 3;
        this.capoOrdernar='id';
        this.orderBy= 'desc';
        this.pagination={
            total         :0,
            current_page  :0,
            per_page      :0,
            last_page     :0,
            from          :0,
            to            :0,

        };
        this.tbodyId=tbodyId;
        this.callback=callback;
        return this;
    }
    asignar(parametro){
        if(document.getElementById('buscar_'+this.tbodyId))
            this.buscar=document.getElementById('buscar_'+this.tbodyId).value;
        if(parametro.hasOwnProperty("page"))
            this.page=parametro.page;
        if(parametro.hasOwnProperty("buscar"))
            this.buscar=parametro.buscar;
        if(parametro.hasOwnProperty("buscar"))
            this.pagination.current_page = parametro.page;
        if(parametro.hasOwnProperty("capoOrdernar")){
            if(this.capoOrdernar==parametro.capoOrdernar){
                if(this.orderBy=='desc')
                    this.orderBy='asc';
                else
                    this.orderBy='desc';
            }else{
                this.capoOrdernar=parametro.capoOrdernar;
                this.orderBy='desc'
            }
            this.capoOrdernar=parametro.capoOrdernar;
        }
        this.listar();
    }
    
    listar()
    {
        var auxilarCallback=this.callback;
        var dataRespuesta='';
        var objeto=this;
		var p='';
		var tablaBody=$('#'+objeto.tbodyId);
        if($('#'+objeto.tbodyId).parent().parent().find('#buscar_'+objeto.tbodyId).length==0)
            $('#'+objeto.tbodyId).parent().before('<style>table th{cursor:pointer} </style>   <input type="search" name="buscar_'+objeto.tbodyId+'" id="buscar_'+objeto.tbodyId+'" data="'+this.url+'" autofocus="autofocus" placeholder="Buscar" class="form-control" onkeyup="new Paginador(`'+this.url+'`, `'+objeto.tbodyId+'`, '+auxilarCallback+').asignar({buscar:this.value,page:0});">');
            this.route=this.url+"?page="+this.page+"&nombre="+this.buscar+"&capoOrdernar="+this.capoOrdernar+"&orderBy="+this.orderBy+"";
        $.get(this.route, function(respuesta)
            {
				var respuesta = JSON.parse(respuesta);
				tablaBody.html('');
                $(respuesta).each(function(clave, valor)
                    {
                        dataRespuesta=valor;
                    });
            }).done(function(){
                let data=dataRespuesta.data;
                auxilarCallback(data);
                this.pagination=dataRespuesta;
                this.offset= 3;
				let pie=`<hr><h5 class="pull-left">Mostrando desde el `+this.pagination.from+` hasta el `+this.pagination.to+`, de un total de `+this.pagination.total+` de registros</h5> <nav class='pull-right pagination pagination-large'><ul class="pagination" >`;
                if(this.pagination.current_page > 1)
				{
					pie+=`<li class='page-item' *ngIf="pagination.current_page > 1"><a class="page-link" onclick="new Paginador('`+this.pagination.path+`','`+objeto.tbodyId+`',`+auxilarCallback+`).asignar({page:`+(parseInt(this.pagination.current_page) - 1)+`}); "><span>Atras</span></a></li>`;
				}
                if(this.pagination.to)
				{
					var from = this.pagination.current_page - this.offset;
					if(from < 1)
					{
						from = 1;
					}
					var to = from + (this.offset * 2);
					if(to >= this.pagination.last_page)
					{
						to = this.pagination.last_page;
					}
					var pagesArray = [];
					while(from <= to)
					{
						pagesArray.push(from);
						from++;
					}
					for(let q=0;q<pagesArray.length; q++)
					{
						let pagActva='';
						if(pagesArray[q] == this.pagination.current_page)
							pagActva='active';
						pie+=`<li class='page-item `+pagActva+`  '><a class="page-link active" onclick="new Paginador('`+this.pagination.path+`','`+objeto.tbodyId+`',`+auxilarCallback+`).asignar({page:`+(parseInt(pagesArray[q]) )+ `});">`+pagesArray[q]+`</a></li>`;}
					}
                	if(this.pagination.current_page < this.pagination.last_page)
					{
						pie+=`<li class='page-item'><a class="page-link" onclick="new Paginador('`+this.pagination.path+`','`+objeto.tbodyId+`', `+auxilarCallback+`).asignar({page:`+ (parseInt(this.pagination.current_page) + 1 )+ `});"><span>Siguiente</span></a></li>`;}pie+=`</ul></nav>`;
						p=pie+'<br><br>';                    
                if(document.getElementById('paginador_'+objeto.tbodyId)){
                    $('#paginador_'+objeto.tbodyId).html(p);
                }
                else{
                    $('#'+objeto.tbodyId).parent().after('<div id="paginador_'+objeto.tbodyId+'">'+p+'</div>')
                }
            });
    }
}

*/