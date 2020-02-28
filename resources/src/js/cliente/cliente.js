$(document).ready(function () {

    showClients();
});


$(document).on("click", "#agregarCliente", function () {
    $("#frmInsertarCliente").modal("show");
})

$(document).on('click','#btnSaveId',function(){
    event.preventDefault();
    var data = $('#frmCliente').serialize();
    $.ajax({
        url: 'Cliente/addClient',
        type: 'post',
        data: data,
    })
        .done(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

            Toast.fire({
                icon: 'success',
                title: 'Información Insertada con Exito!'
            })

            $("#frmInsertarCliente").modal("hide");
            $('#frmCliente')[0].reset();
            showClients();

        })
        .fail(function() {
            Swal.fire(
                'Cliente!',
                'Error al momento de Insertar la Información!',
                'error'
            )
        });

});



$(document).on('click','#editar',function () {

    var id = $(this).attr('data');
    $("#frmEditarCliente").modal("show");

    $.ajax({
        type:'ajax',
        method: 'get',
        url: BASE_URL+'index.php/Cliente/updateClient',
        data: {idCliente:id},
        async: false,
        dataType: 'json',
        success:function (data) {
            $('input[name=nombreE]').val(data.nombre);
            $('input[name=apellidoE]').val(data.apellido);
            $('input[name=empresaE]').val(data.empresa);
            $('input[name=telefonoE]').val(data.telefono);
            $('input[name=telefonoCE]').val(data.celular);
            $('input[name=emailE]').val(data.correo);
            $('input[name=direccionE]').val(data.direccion);
            $('input[name=registroFE]').val(data.registroFiscal);
            $('input[name=nitE]').val(data.nit);
            $('input[name=idCliente]').val(data.idCliente);
        },
        error:function () {
            Swal.fire(
                'Cliente!',
                'Error en la Comunicación con la Base de Datos!',
                'error'
            )
        }
    })

});



$(document).on('click','#btnEditId',function(){
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
        if (result.value)
    {

        var data = $('#frmEditar').serialize();
        $.ajax({
            url: BASE_URL + 'index.php/Cliente/saveChanges',
            type: 'post',
            data: data,
        })
            .done(function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

                Toast.fire({
                    icon: 'success',
                    title: 'Información Modificada con Exito!'
                })

                $("#frmEditarCliente").modal("hide");
                $('#frmEditar')[0].reset();
                showClients();

            })
            .fail(function () {
                Swal.fire(
                    'Cliente!',
                    'Error al momento de Editar la Información!',
                    'error'
                )
            });
    }
})
});

$(document).on('click','#btnDeleteId',function(){
    event.preventDefault();

});

$(document).on('click','#eliminar',function(){
    event.preventDefault();
    Swal.fire({
        title: 'Está seguro de Eliminar la Información?',
        text: "¡Pueda que esta Información se Oculte de está Seccion!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si,eliminarlo'
    }).then((result) => {
        if (result.value) {

    var id = $(this).attr('data');
        $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: 'Cliente/eraseClient',
            data:{idCliente:id},
            dataType: 'json',
            success:function () {

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

                Toast.fire({
                    icon: 'success',
                    title: 'Información Eliminada con Exito!'
                })
                showClients();
            },
            error:function () {
                Swal.fire(
                    'Cliente!',
                    'Error al momento de Eliminar la Información!',
                    'error'
                )
            }
        })

    }
})
});

$(document).on("click","#rest",function () {
    $("#modalRecu").modal("show");
    llenarTablaRecuperacion();
})


$(document).on("click",".btnRest",function () {
    $("#modalRecu").hide();

    Swal.fire({
        title: '¿Estás seguro de Recuperar la Info. del Cliente?',
        text: "Esta Info. se mostrará en la Tabla Principal",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Recuperárla!'
    }).then((result) => {
        if (result.value) {

        var id= $(this).attr("id");

        $.ajax({
            url: "Cliente/restaurar",
            type: "post",
            data: {id: id}
        })

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    });

        Toast.fire({
            icon: 'success',
            title: 'Cliente Recuperado con Exito'
        })
        showClients();
        llenarTablaRecuperacion();
        $("#modalRecu").modal("hide");
    }
        else{
        $("#modalRecu").modal("show");
    }
})

})




function llenarTablaRecuperacion()
{

    $.ajax(
        {
            url:"Cliente/mostrarEliminados",
            type: "POST",
            dataType: "JSON",
            success:function (data) {
                $("#dataClienteRest").dataTable().fnDestroy();
                $("#dataClienteRest tbody tr").remove();
                $.each(data, function (key,val) {
                    var fila ='<tr><td><div align="center">';
                    fila=fila + val.nombre + '</div></td><td>';
                    fila=fila + val.apellido + '</div></td><td>';
                    fila=fila + val.empresa + '</div></td><td>';
                    fila=fila + val.direccion + '</div></td><td>';
                    fila=fila + val.correo + '</div></td><td>';
                    fila=fila + val.registroFiscal + '</td>';
                    fila = fila +  '<td> <a class="btn btn-outline-info btnRest" id="'+val.idCliente+'"><i class="fas fa-trash-restore"></i></a>';
                    fila = fila + '</td></tr>';
                    $("#dataClienteRest tbody").append(fila);
                });
                $("#dataClienteRest").dataTable({
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
        });
}

function showClients() {
    $.ajax({
        type: 'POST',
        url: BASE_URL+'index.php/Cliente/showClients',
        async: false,
        dataType: 'json',
        success:function (data) {
            $("#dataCliente").dataTable().fnDestroy();
            $("#dataCliente tbody tr").remove();
            $.each(data, function (key,val) {
                var fila ='<tr><td><div>';
                fila=fila + val.nombre + '</div></td><td>';
                fila=fila + val.apellido + '</div></td><td width="10%">';
                fila=fila + val.empresa + '</div></td><td>';
                fila=fila + val.telefono + '</div></td><td>';
                fila=fila + val.celular + '</div></td><td>';
                fila=fila + val.correo + '</div></td><td>';
                fila=fila + val.direccion + '</div></td><td width="10%">';
                fila=fila + val.nit + '</div></td><td>';
                fila=fila + val.registroFiscal + '</td>';
                fila = fila +  '<td> <a class="btn btn-outline-info editarC" href="javascript:;" data="'+val.idCliente+'" id="editar"><i class="fas fa-marker"></i></a>\n' +
                    '<a class="btn btn-outline-danger eliminarC" href="javascript:;" data="'+val.idCliente+'" id="eliminar" ><i class="far fa-trash-alt"></i></a>';
                fila = fila + '</td></tr>';
                $("#dataCliente tbody").append(fila);
            });
            $("#dataCliente").dataTable({
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
            Swal.fire(
                'Cliente!',
                'Error en la Comunicación con la Base de Datos!',
                'error'
            )
        }

    });
}

