$(document).ready(function () {

    showOrden();

    $('#data').DataTable();
    $(document).on("click", "#agregarOrden", function () {
        $("#frmInsertarCliente").modal("show");

})});



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

            $("#frmInsertarCliente").modal("hide");
            $('#frmOrden')[0].reset();
            showOrden();

        })
        .fail(function() {
            alert("ocurrio un error");
        });

});



$(document).on('click','#editar',function () {

    var id = $(this).attr('data');
    $("#frmEditarOrden").modal("show");

    $.ajax({
        type:'ajax',
        method: 'get',
        url: BASE_URL+'index.php/Orden/updateOrden',
        data: {idOrden:id},
        async: false,
        dataType: 'json',
        success:function (data) {
            $('select[name=cotE]').val(data.idCotizacion);
            $('input[name=ordenE]').val(data.nombre);
            $('input[name=descE]').val(data.comentarios);
            $('input[name=tamañoE]').val(data.tamaño);
            $('select[name=muestraE]').val(data.idMuestra);
            $('select[name=estadoE]').val(data.idEstado2);

            $('input[name=txtId]').val(data.idOrden);
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
            $('#editFormOrden')[0].reset();
            showOrden();

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
                    '<td>'+data[i].idOrden+'</td>'+
                    '<td>'+data[i].idCotizacion+'</td>'+
                    '<td>'+data[i].nombre+'</td>'+
                    '<td>'+data[i].comentarios+'</td>'+
                    '<td>'+data[i].tamaño+'</td>'+
                    '<td>'+data[i].cArchivo+'</td>'+
                    '<td>'+data[i].url+'</td>'+
                    '<td>'+data[i].nombreE+'</td>'+
                    '<td>'+
                    '<button class="btn-info"><a href="javascript:;" data="'+data[i].idOrden+'" id="editar">Editar</a></button>'+
                    '<button class="btn-danger"><a href="javascript:;" data="'+data[i].idOrden+'" id="eliminar">Eliminar</a></button>'+
                    '<button class="btn-success"><a href="javascript:;" data="'+data[i].idOrden+'" id="download">Descargar</a></button>'+
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

$.post(BASE_URL+'index.php/muestra/showSamples',
    function (data) {
        var muestra = JSON.parse(data);
        $.each(muestra,function (i,item) {
            $('#muestraId').append('<option value="'+item.idMuestra+'">'+item.url+'</option>');
        });
    });

$.post(BASE_URL+'index.php/muestra/showSamples',
    function (data) {
        var muestra = JSON.parse(data);
        $.each(muestra,function (i,item) {
            $('#muestraIdE').append('<option value="'+item.idMuestra+'">'+item.url+'</option>');
        });
    });

$.post(BASE_URL+'index.php/estado2/showStatus',
    function (data) {
        var status = JSON.parse(data);
        $.each(status,function (i,item) {
            $('#estadoId').append('<option value="'+item.idEstado2+'">'+item.nombre+'</option>');
        });
    });

$.post(BASE_URL+'index.php/estado2/showStatus',
    function (data) {
        var status = JSON.parse(data);
        $.each(status,function (i,item) {
            $('#estadoIdE').append('<option value="'+item.idEstado2+'">'+item.nombre+'</option>');
        });
    });