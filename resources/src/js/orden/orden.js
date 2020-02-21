function listaCliente(){
    $.post("Orden/mostrarCliente",{},function(res){
        var r = JSON.parse(res);
        $("#idCliente option").remove();
        $("#idCliente").append("<option>Elige el Cliente</option>");
        for(var i = 0;i<r.length;i++){
            $("#idCliente").append("<option value='"+r[i].idCliente+"'>"+r[i].nombre+" "+r[i].apellido+"</option>");
        }
    });
}

function llenarCotiz(){

    var idCliente = $("#idCliente").val();

    $.ajax(
        {
            url:"Orden/mostrarCotiz",
            type: "POST",
            data: {idCliente},
            dataType: "JSON",
            success:function (r) {
                if(r!="")
                {
                    $("#idCotiz option").remove();
                    $("#idCotiz").append("<option>Elige la Cotizacion</option>");
                    for(var i = 0;i<r.length;i++){
                        $("#idCotiz").append("<option value='"+r[i].idCotizacion+"'>"+r[i].codigo+"</option>");
                    }
                }
                else
                {
                    $("#idCotiz option").remove();
                    $("#idCotiz").append("<option>Este Cliente no tiene Ninguna Cotizacion</option>");
                }

            },
        });
}

function llenarMuestra(){

    var idCotiz = $("#idCotiz").val();

    $.ajax(
        {
            url:"Orden/mostrarMuestra",
            type: "POST",
            data: {idCotiz},
            dataType: "JSON",
            success:function (r) {
                if(r!="")
                {
                    $("#idMuestra option").remove();
                    $("#idMuestra").append("<option>Elige la Muestra</option>");
                    for(var i = 0;i<r.length;i++){
                        $("#idMuestra").append("<option value='"+r[i].idMuestra+"'>"+r[i].url+"</option>");
                    }
                }
                else
                {
                    $("#idMuestra option").remove();
                    $("#idMuestra").append("<option>Este Cotizacion no tiene Ninguna Muestra</option>");
                }

            },
        });
}


function listProd(){
    $.post("Inventario/mostrarProd",{},function(res){
        var r = JSON.parse(res);
        $("#selectProd option").remove();
        $("#selectProd").append("<option>Elige el Producto</option>");
        for(var i = 0;i<r.length;i++){
            $("#selectProd").append("<option value='"+r[i].idInventario+"'>"+r[i].nombreInv+"</option>");
        }
    });
}




function llenarTablaUtilizados()
{
    let idOrden = localStorage.getItem("idOrden");
    $.ajax(
        {
            url:"Orden/MostrarUtilizados",
            type: "POST",
            data: {idOrden},
            success:function (res) {
                let data = JSON.parse(res);
                if(data!=""){
                    $("#tablaUtilizados").show();
                    $("#tablaUtilizados").dataTable().fnDestroy();
                    $("#tablaUtilizados tbody tr").remove();
                    $.each(data, function (key,val) {
                        var fila ='<tr><td><div align="center">';
                        fila=fila + val.nombreInv + '</div></td><td>';
                        fila=fila + val.cantidad + '</div></td>';
                        fila = fila +  '<td> <a class="btn btn-outline-info btnEditarEx" id="'+val.idDetalleInvCompra+'"><i class="fas fa-marker"></i></a>\n' +
                            '                     <a class="btn btn-outline-danger btnEliminarEx"id="'+val.idDetalleInvCompra+'"><i class="far fa-trash-alt"></i></a>';
                        fila = fila + '</td></tr>';
                        $("#tablaUtilizados tbody").append(fila);
                    });
                    $("#tablaUtilizados").dataTable({
                        bLengthChange: false,
                        language: {
                            "decimal": "",
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                            "infoFiltered": "(Filtrado de  _MAX_  total entradas)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Entradas",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });
                }
                else{
                    $("#tablaUtilizados").hide();
                }

            },
        });
}




$(document).ready(function () {
    showOrden();
    statusLoad();
    listaCliente();
    $("#tablaUtilizados").hide();

    $('#data1').DataTable();
    $("#data").dataTable({
        bLengthChange: false,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de  _MAX_  total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });

    $("#idCliente").change(function () {
        llenarCotiz();
    });

    $("#idCotiz").change(function () {
        llenarMuestra();
    });


    $(document).on("click", "#agregarOrden", function () {
        $('#frmOrden')[0].reset();
        $("#frmInsertarOrden").modal("show");
    });


    $(document).on("click", ".add1", function () {

        $("#prodUt").modal("show");
        $('#frmUtilizados')[0].reset();
        listProd();
    })


    $(document).on("click","#addUtilizados",function () {
        event.preventDefault();
        var datosEx = $("#frmUtilizados").serializeArray();
        let idOrden = localStorage.getItem("idOrden");
        $.ajax({
            url:"Orden/insertarUtilizado",
            type:"POST",
            data: {datosEx,idOrden},
        }).done(function (res) {
            localStorage.setItem("idDetalle",res);
            $("#prodUtilizados").modal("show");
            $("#prodUt").modal("hide");
            $('#frmUtilizados')[0].reset();
            llenarTablaUtilizados();
        })
    });


























        });

$(document).on('click','#cotShowId',function(){
    event.preventDefault();

        llenarCotizacion();


});

$(document).on("click", "#cotShowId", function () {
    llenarCotizacion();
    $("#modalCot").modal("show");

});

$(document).on('click','#btnSaveOrdenId',function(){
    event.preventDefault();
    var formData = new FormData($("#frmOrden")[0]);

    $.ajax({
        url: BASE_URL+'index.php/Orden/addOrden',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    })
        .done(function() {

            $("#frmInsertarOrden").modal("hide");
            $('#frmOrden')[0].reset();
            showOrden();

        })
        .fail(function() {
            alert("ocurrio un error");
        });

});



$(document).on('click','#editar',function () {

    var id = $(this).attr('data');
    localStorage.setItem("idOrden",id);
    $("#frmEditarOrden").modal("show");

    $.ajax({
        type:'ajax',
        method: 'get',
        url: BASE_URL+'index.php/Orden/updateOrden',
        data: {idOrden:id},
        async: false,
        dataType: 'json',
        success:function (data) {
            $('input[name=idC]').val(data.idCotizacion);
            $('input[name=idCotizE]').val(data.codigo);
            $('input[name=ordenE]').val(data.nombre);
            $('input[name=descE]').val(data.comentarios);
            $('input[name=tamañoE]').val(data.tamaño);
            $('input[name=idM]').val(data.idMuestra);
            $('input[name=idMuestraE]').val(data.url);
            $('select[name=estadoE]').val(data.idEstado2);

            $('input[name=txtId]').val(data.idOrden);
            $('input[name=txtIdEst]').val(data.idEstado2);
            status(data.idEstado2);


        },
        error:function () {
            alert('Could not edit data');
        }
    })

});

$(document).on('click','#download',function () {

    var id = $(this).attr('data');
    $('#txtIdText').val(id);
    var idText = $('#txtIdText').val();
    $.ajax({
        type:'ajax',
        method: 'get',
        url:BASE_URL+'index.php/Orden/download',
        data: {idOrden:idText},
        async: false,

        success:function (data) {



        },
        error:function () {
            alert('Could not download file');
        }
    })

});



$(document).on('click','#btnEditOrdenId',function(){
    event.preventDefault();
    var formData = new FormData($("#editFormOrden")[0]);

    $.ajax({
        url: BASE_URL+'index.php/Orden/saveChanges',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    })

        .done(function() {

            $("#frmEditarOrden").modal("hide");
            history(formData);
            showOrden();


            var estado=$("#estadoIdE").val();

            if(estado==3){
                llenarTablaUtilizados();
                $("#prodUtilizados").modal("show");
                $('#frmUtilizados')[0].reset();

            }


        })
        .fail(function() {
            alert("ocurrio un error");
        });

});

$(document).on('click','#btnDeleteId',function(){
    event.preventDefault();

});

$(document).on('click','#eliminar',function(){
    event.preventDefault();
    var id = $(this).attr('data');
    $("#deleteModal").modal("show");
    $("#btnDeleteId").unbind().click(function () {
        $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: BASE_URL+'index.php/Orden/eraseOrden',
            data:{idOrden:id},
            cache:false,
            dataType: 'json',
            success:function (response) {
                $("#deleteModal").modal("hide");
                showOrden();
            },
            error:function () {
                $("#deleteModal").modal("hide");
                showOrden();
            }
        })
    })

});




function showOrden() {
    $.ajax({
        type: 'POST',
        url: BASE_URL+'index.php/Orden/showOrdenes',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html+='<tr>'+
                    '<td>'+data[i].codigo+'</td>'+
                    '<td>'+data[i].comentarios+'</td>'+
                    '<td>'+data[i].url+'</td>'+
                    '<td>'+data[i].nombreE+'</td>'+
                    '<td>'+
                    '<a class="btn btn-outline-info" href="javascript:;" data="'+data[i].idOrden+'" id="editar"><i class="fas fa-marker"></i></a>\n' +
                    '<a class="btn btn-outline-danger  href="javascript:;" data="\'+data[i].idOrden+\'" id="eliminar"><i class="far fa-trash-alt"></i></a>'+
                    '</td>'+
                    '</tr>';
            }
            $('#table').html(html);
        },

        error: function () {
            alert('Could not show data from database');
        }

    });
}



function history(formData) {

    $.ajax({
        type: 'post',
        url: BASE_URL+'index.php/Historial/addHistory',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
            showOrden();
        },

        error: function () {
            alert('Could not save history');
        }

    });
}




$.post(BASE_URL+'index.php/cotizacion/getAllCotizacion',
    function (data) {
        var cot = JSON.parse(data);
        $.each(cot,function (i,item) {
            $('#cotId').append('<option value="'+item.idCotizacion+'">'+item.idCotizacion+'</option>');
        });
    });

$.post(BASE_URL+'index.php/cotizacion/getAllCotizacion',
    function (data) {
        var cot = JSON.parse(data);
        $.each(cot,function (i,item) {
            $('#cotIdE').append('<option value="'+item.idCotizacion+'">'+item.idCotizacion+'</option>');
        });
    });

$.post(BASE_URL+'index.php/muestra/llenar',
    function (data) {
        var muestra = JSON.parse(data);
        $.each(muestra,function (i,item) {
            $('#muestraId').append('<option value="'+item.idMuestra+'">'+item.url+'</option>');
        });
    });

$.post(BASE_URL+'index.php/muestra/llenar',
    function (data) {
        var muestra = JSON.parse(data);
        $.each(muestra,function (i,item) {
            $('#muestraIdE').append('<option value="'+item.idMuestra+'">'+item.url+'</option>');
        });
    });

function statusLoad() {
    $.post(BASE_URL + 'index.php/estado2/showStatus',
        function (data) {
            var status = JSON.parse(data);
            $.each(status, function (i, item) {
                $('#estadoId').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
            });
        });
}

function status(data) {

    if (data==1){
        $('#estadoIdE').empty().append('Seleccione');
        $.post(BASE_URL + 'index.php/estado2/showAllStatus',
            function (data) {
                var status = JSON.parse(data);
                $.each(status, function (i, item) {
                    $('#estadoIdE').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
                });
            });
    }

    else if(data==2){
        $('#estadoIdE').empty().append('Seleccione');
        $.post(BASE_URL + 'index.php/estado2/showStatus1',
            function (data) {
                var status = JSON.parse(data);
                $.each(status, function (i, item) {
                    $('#estadoIdE').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
                });
            });
    }

    else if(data==3){
        $('#estadoIdE').empty().append('Seleccione');
        $.post(BASE_URL + 'index.php/estado2/showStatus2',
            function (data) {
                var status = JSON.parse(data);
                $.each(status, function (i, item) {
                    $('#estadoIdE').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
                });
            });
    }

    else if (data==4){
        $('#estadoIdE').empty().append('Seleccione');
        $.post(BASE_URL + 'index.php/estado2/showStatus3',
            function (data) {
                var status = JSON.parse(data);
                $.each(status, function (i, item) {
                    $('#estadoIdE').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
                });
            });
    }

}


//Parte para examinar cotizaciones

function llenarCotizacion(){
    $.ajax({
        type: 'POST',
        url: BASE_URL+'index.php/cotizacion/getAllCotizacion',
        async: false,
        dataType: 'json',
        success: function (data1) {
            var html = '';
            var i;
            for(i=0; i<data1.length; i++){
                html+='<tr>'+
                    '<td>'+data1[i].codigo+'</td>'+
                    '<td>'+data1[i].clNombre+'</td>'+
                    '<td>'+data1[i].clApellido+'</td>'+
                    '<td>'+
                    '<button class="btn-info"><a href="javascript:;" data1="'+data1[i].idCotizacion+'" id="select">Seleccionar</a></button>'+
                    '</td>'+
                    '</tr>';
            }
            $('#table1').html(html);
        },

        error: function () {
            alert('Could not show data from database');
        }

    });
}

$(document).on('click','#select',function(){
    event.preventDefault();
    var id = $(this).attr('data1');
    $('#cotId').val(id);
    $('#cotIdE').val(id);
    $("#modalCot").modal("hide");
    console.log(id);
});

