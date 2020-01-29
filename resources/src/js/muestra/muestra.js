function LlenarTabla() {
    $.ajax({
        type: 'POST',
        url: 'Muestra/llenar',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html+='<tr>'+
                    '<td>'+data[i].codigo+'</td>'+
                    '<td>'+data[i].nombre+'</td>'+
                    '<td>'+data[i].fecha+'</td>'+
                    '<td>'+data[i].url+'</td>'+
                    '<td>'+data[i].comentarios+'</td>'+
                    '<td>'+
                    '<a class="btn btn-outline-info"  href="javascript:;" data="'+data[i].idMuestra+'" id="editar" ><i class="fas fa-marker"></i></a>\n' +
                    '<a class="btn btn-outline-danger" href="javascript:;" data="'+data[i].idMuestra+'" id="eliminar"><i class="far fa-trash-alt"></i></a>\n'+
                    '<a class="btn btn-outline-dark" href="javascript:;" data="'+data[i].idMuestra+'" id="download"><i class="fas fa-cloud-download-alt"></i></a>\n'+
                    '</td>'+
                    '</tr>';
                '</tr>';

            }
            $('#table').html(html);
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
        },

        error: function () {
            alert('Could not show data from database');
        }

    });
}


function agregarCot(){
    $.post("Muestra/mostrarCotiz",{},function(res){
        var r = JSON.parse(res);
        $("#cotizacion option").remove();
        $("#cotizacion").append("<option>Elige la Cotizacion</option>");
        for(var i = 0;i<r.length;i++){
            $("#cotizacion").append("<option value='"+r[i].idCotizacion+"'>"+r[i].codigo+"</option>");
        }
    });
}

function modificarCot(){
    $.post("Muestra/mostrarCotiz",{},function(res){
        var r = JSON.parse(res);
        $("#cotizacionE option").remove();
        for(var i = 0;i<r.length;i++){
            $("#cotizacionE").append("<option value='"+r[i].idCotizacion+"'>"+r[i].codigo+"</option>");
        }
    });
}

function modificarEstado(){
    $.post("Muestra/mostrarEstado1",{},function(res){
        var r = JSON.parse(res);
        $("#estadoIdE option").remove();
        for(var i = 0;i<r.length;i++){
            $("#estadoIdE").append("<option value='"+r[i].idEstado1+"'>"+r[i].nombre+"</option>");
        }
    });
}





$(document).ready(function () {
    LlenarTabla();

    $(document).on("click", "#agregarMuestra", function () {
        $("#frmInsertarMuestra").modal("show");
        agregarCot();
    })


$(document).on('click','#btnGuardar',function(){
    event.preventDefault();
    var formData = new FormData($("#frmInsertar")[0]);

    $.ajax({
        url: 'Muestra/agregar',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    })
        .done(function(res) {

            localStorage.setItem("idM",res);


            Swal.fire({
                title: 'Aprobar la Cotización?',
                text: "De lo contrario esta permanecerá No Aprobada",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si,Aprobar!',
                confirmButtonText: 'No!'
            }).then((result) => {
                if (result.value) {

                let id = localStorage.getItem("idM");
                $.ajax({
                    url: 'Muestra/modificarEstado',
                    type: 'post',
                    data: id,
                    cache: false,
                    contentType: false,
                    processData: false

                })
            }
        })



        })
        .fail(function() {
            alert("ocurrio un error");
        });
});

$(document).on('click','#editar',function () {
    modificarCot();
    modificarEstado();

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
            $('#cotizacionE').val(data.idCotizacion);
            $('#estadoIdE').val(data.idEstado1);
            $('input[name=comentE]').val(data.comentarios);


            $('#txtIdText').val(data.idMuestra);
        },
        error:function () {
            alert('Could not edit data');
        }
    })

});

$(document).on('click','#btnEditSampleId',function(){
    event.preventDefault();
    var formData = $("#frmSampleIdEdit").serializeArray();

    $.ajax({
        url: 'Muestra/saveChanges',
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

});