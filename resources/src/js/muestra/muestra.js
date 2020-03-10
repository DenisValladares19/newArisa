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
                    '<!--<a class="btn btn-outline-dark" href="javascript:;" data="'+data[i].idMuestra+'" id="download"><i class="fas fa-cloud-download-alt"></i></a>-->\n'+
                    '</td>'+
                    '</tr>';
                '</tr>';

            }
            $('#table').html(html);

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
        $('#estadoIdE').empty();
        for(var i = 0;i<r.length;i++){
            $("#estadoIdE").append("<option value='"+r[i].idEstado1+"'>"+r[i].nombre+"</option>");
        }
    });
}



$(document).ready(function () {
    LlenarTabla();
    modificarEstado();
    $("#tabla").dataTable({
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
});

    $(document).on("click", "#agregarMuestra", function () {
        $("#frmInsertarMuestra").modal("show");
        agregarCot();
    })


$(document).on('click','#btnGuardar',function(){
    event.preventDefault();
    var formData = new FormData($("#frmInsertar")[0]);

    $.ajax({
        url: 'Muestra/Agregar',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    })
        .done(function(res) {

            localStorage.setItem("idM",res);

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

            Toast.fire({
                icon: 'success',
                title: 'Muestra Guardada Correctamente'
            })

            $("#frmInsertarMuestra").modal("hide");
            $('#frmInsertar')[0].reset();
            LlenarTabla();
        })
        .fail(function() {
            alert("ocurrio un error");
        });



});

$(document).on('click','#editar',function () {
    modificarCot();


    var id = $(this).attr('data');
    $("#frmEditarMuestra").modal("show");

    $.ajax({
        type:'ajax',
        method: 'get',
        url: 'Muestra/updateSample',
        data: {idMuestra:id},
        async: false,
        dataType: 'json',
        success:function (data) {

            $('#cotizacionE').val(data.idCotizacion);
            $('select[name=estadoE]').val(data.idEstado1);
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

    Swal.fire({
        title: 'Está seguro de Editar la Información?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, editarlo'
    }).then((result) => {
        if (result.value) {


    var formData = new FormData($("#frmSampleIdEdit")[0]);
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

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

            Toast.fire({
                icon: 'success',
                title: 'Muestra Editada Exitosamente'
            })
            LlenarTabla();

        })
        .fail(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

            Toast.fire({
                icon: 'error',
                title: 'Error al Editar Muestra'
            })
        });
    }
})
});


$(document).on('click','#eliminar',function(){
    event.preventDefault();
    Swal.fire({
        title: '¿Estás seguro de Eliminar la Muestra?',
        text: "Pueda que esta Información se Oculte de está Seccion",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Eliminaló!'
    }).then((result) => {
        if (result.value) {



    var id = $(this).attr('data');
        $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: 'Muestra/eraseSample',
            data:{idMuestra:id},
            cache:false,
            dataType: 'json',
            success:function (response) {
                $("#deleteModal").modal("hide");
                LlenarTabla();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

                Toast.fire({
                    icon: 'success',
                    title: 'Muestra Eliminada Exitosamente'
                })
            },
            error:function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

                Toast.fire({
                    icon: 'error',
                    title: 'Error Eliminar Muestra'
                })
            }
        })
    }
});

});

$(document).on('click','#download',function () {

    var id = $(this).attr('data');
    $('#txtIdText').val(id);
    var idText = $('#txtIdText').val();
        $.ajax({
        type:'ajax',
        method: 'get',
        url:'Muestra/download',
        data: {idSample:idText},
        async: false,

        success:function (data) {



        },
        error:function () {
            alert('Could not download file');
        }
    })

});

