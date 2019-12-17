$(document).ready(function () {

    showSamples();
    $('#data').DataTable();
    $(document).on("click", "#agregarCliente", function () {
        $("#frmInsertarCliente").modal("show");
    })});


$(document).on('click','#btnSaveSampleId',function(){
    event.preventDefault();
    var formData = new FormData($("#frmSampleId")[0]);

    $.ajax({
        url: BASE_URL+'index.php/Muestra/addSample',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    })
        .done(function() {

            $("#frmInsertarCliente").modal("hide");
            $('#frmSampleId')[0].reset();
            showSamples();
            alert("Muestra agregada con éxito");

        })
        .fail(function() {
            alert("ocurrio un error");
        });

});

$(document).on('click','#editar',function () {

    var id = $(this).attr('data');
    $("#frmEditarMuestra").modal("show");

    $.ajax({
        type:'ajax',
        method: 'get',
        url: BASE_URL+'index.php/Muestra/updateSample',
        data: {idMuestra:id},
        async: false,
        dataType: 'json',
        success:function (data) {
            $('input[name=estadoE]').val(data.idEstado1);
            $('input[name=comentE]').val(data.comentarios);


            $('input[name=txtId]').val(data.idMuestra);
        },
        error:function () {
            alert('Could not edit data');
        }
    })

});

$(document).on('click','#btnEditSampleId',function(){
    event.preventDefault();
    var formData = new FormData($("#frmSampleIdEdit")[0]);
    $.ajax({
        url: BASE_URL+'index.php/Muestra/saveChanges',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function() {

            $("#frmEditarMuestra").modal("hide");
            $('#frmSampleIdEdit')[0].reset();
            showSamples();
            alert("Muestra modificada con éxito");

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
            url: BASE_URL+'index.php/Muestra/eraseSample',
            data:{idMuestra:id},
            cache:false,
            dataType: 'json',
            success:function (response) {
                $("#deleteModal").modal("hide");
                showSamples();
                alert("Muestra eliminada con éxito");
            },
            error:function () {
                alert('Error al eliminar');
            }
        })
    })

});

$(document).on('click','#download',function () {

    var id = $(this).attr('data');
    $('#txtIdText').val(id);
    var idText = $('#txtIdText').val();
        $.ajax({
        type:'ajax',
        method: 'get',
        url:BASE_URL+'index.php/Muestra/download',
        data: {idSample:idText},
        async: false,

        success:function (data) {



        },
        error:function () {
            alert('Could not download file');
        }
    })

});



function showSamples() {
    $.ajax({
        type: 'POST',
        url: BASE_URL+'index.php/Muestra/showSamples',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html+='<tr>'+
                    '<td>'+data[i].idMuestra+'</td>'+
                    '<td>'+data[i].nombre+'</td>'+
                    '<td>'+data[i].url+'</td>'+
                    '<td>'+data[i].comentarios+'</td>'+
                    '<td>'+
                    '<button class="btn-info"><a href="javascript:;" data="'+data[i].idMuestra+'" id="editar">Editar</a></button>'+
                    '<button class="btn-danger"><a href="javascript:;" data="'+data[i].idMuestra+'" id="eliminar">Eliminar</a></button>'+
                    '<button class="btn-success"><a href="javascript:;" data="'+data[i].idMuestra+'" id="download">Descargar</a></button>'+
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




$.post(BASE_URL+'index.php/Estado1/showStatus',
    function (data) {
        var rol = JSON.parse(data);
        $.each(rol,function (i,item) {
            $('#estadoId').append('<option value="'+item.idEstado1+'">'+item.nombre+'</option>');
        });
    });