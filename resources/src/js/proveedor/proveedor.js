function llenarTabla()
{
    $.ajax(
        {
            url:"Proveedor/mostrar",
            type: "POST",
            dataType: "JSON",
            success:function (data) {
                $("#dataProveedor").dataTable().fnDestroy();
                $("#dataProveedor tbody tr").remove();
                $.each(data, function (key,val) {
                    var fila ='<tr><td width="15%"><div>';
                    fila=fila + val.nombre + '</div></td><td>';
                    fila=fila + val.empresa + '</div></td><td>';
                    fila=fila + val.direccion + '</div></td><td width="10%">';
                    fila=fila + val.correo + '</div></td><td>';
                    fila=fila + val.telefono + '</div></td><td>';
                    fila=fila + val.celular + '</div></td><td width="10%">';
                    fila=fila + val.nit + '</div></td><td width="12%">';
                    fila=fila + val.registroFiscal + '</td>';
                    fila = fila +  '<td> <a class="btn btn-outline-info btnEditar" id="'+val.idProveedor+'"><i class="fas fa-marker"></i></a>\n' +
                        '<a class="btn btn-outline-danger btnEliminar"id="'+val.idProveedor+'"><i class="far fa-trash-alt"></i></a>';
                    fila = fila + '</td></tr>';
                    $("#dataProveedor tbody").append(fila);
                });
                $("#dataProveedor").dataTable({
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

function llenarTablaRecuperacion()
{

    $.ajax(
        {
            url:"Proveedor/mostrarEliminados",
            type: "POST",
            dataType: "JSON",
            success:function (data) {
                $("#dataProveedorRest").dataTable().fnDestroy();
                $("#dataProveedorRest tbody tr").remove();
                $.each(data, function (key,val) {
                    var fila ='<tr><td><div align="center">';
                    fila=fila + val.nombre + '</div></td><td>';
                    fila=fila + val.empresa + '</div></td><td>';
                    fila=fila + val.direccion + '</div></td><td>';
                    fila=fila + val.correo + '</div></td><td>';
                    fila=fila + val.registroFiscal + '</td>';
                    fila = fila +  '<td> <a class="btn btn-outline-info btnRest" id="'+val.idProveedor+'"><i class="fas fa-trash-restore"></i></a>';
                    fila = fila + '</td></tr>';
                    $("#dataProveedorRest tbody").append(fila);
                });
                $("#dataProveedorRest").dataTable({
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


//Expresión para validar un correo electrónico
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

$(document).ready(function () {
    llenarTabla();


    //Mascaras
    $("#txtTelefono").mask("2000-0000");
    $("#txtCelular").mask("0000-0000");
    $("#txtNit").mask("0000-000000-000-0");

    $("#txtTelefonoE").mask("2000-0000");
    $("#txtCelularE").mask("0000-0000");
    $("#txtNitE").mask("0000-000000-000-0");


    //Validar Letras
    $('.soloLetra').keypress(function (e) {
        var tecla = document.all ? tecla = e.keyCode : tecla = e.which;
        return !((tecla > 47 && tecla < 58) || tecla == 46);
    });


    $(document).on("click","#agregarProveedor",function () {
        $("#frmAgregar").modal("show");
    })

    $(document).on("click", "#btnGuardar", function () {
        var nombre = $("#txtNombre").val();
        var empresa = $("#txtEmpresa").val();
        var telefono = $("#txtTelefono").val();
        var celular = $("#txtCelular").val();
        var email = $("#txtCorreo").val();
        var dir = $("#txtDireccion").val();
        var nit = $("#txtNit").val();
        var fiscal = $("#txtRegistro").val();



        if(nombre == "")
        {
            $("#msjNombre").fadeIn("slow");
            return false;
        }
        else{
            $("#msjNombre").fadeOut();


                if(empresa == "")
                {
                    $("#msjEmpresa").fadeIn("slow");
                    return false;
                }
                else {
                    $("#msjEmpresa").fadeOut();

                    if(email == "" || !expr.test(email))
                    {
                        $("#msjEmail").fadeIn("slow");
                        return false;
                    }
                    else {
                        $("#msjEmail").fadeOut();

                        if(dir == "")
                        {
                            $("#msjDireccion").fadeIn("slow");
                            return false;
                        }
                        else {
                            $("#msjDireccion").fadeOut();

                            if(telefono == "")
                            {
                                $("#msjTelefono").fadeIn("slow");
                                return false;
                            }
                            else {
                                $("#msjTelefono").fadeOut();

                                if(celular == "")
                                {
                                    $("#msjCelular").fadeIn("slow");
                                    return false;
                                }
                                else {
                                    $("#msjCelular").fadeOut();

                                    if(nit == "")
                                    {
                                        $("#msjNit").fadeIn("slow");
                                        return false;
                                    }
                                    else {
                                        $("#msjNit").fadeOut();

                                        if(fiscal == "")
                                        {
                                            $("#msjFiscal").fadeIn("slow");
                                            return false;
                                        }
                                        else {
                                            $("#msjFiscal").fadeOut();

                                            event.preventDefault();
                                            var datos = $("#frmAgregarDatos").serializeArray();
                                            $.ajax({
                                                url:"Proveedor/insertar",
                                                type:"POST",
                                                data: datos
                                            }).done(function(){

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
                                                    title: 'Proveedor Ingresado con Exito!'
                                                })
                                                $("#frmAgregar").modal("hide");
                                                $('#frmAgregarDatos')[0].reset();
                                                llenarTabla();
                                            });

                                        }
                                    }
                                }
                            }
                        }
                    }
                }

        }

    });

    $(document).on("click",".btnEditar",function ()  {

        var id= $(this).attr("id");

        $.ajax({
            url: "Proveedor/getProveedor",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {

                var datos = JSON.parse(data);
                $("#idProveedor").val(datos[0].idProveedor);
                $("#txtNombreE").val(datos[0].nombre);
                $("#txtEmpresaE").val(datos[0].empresa);
                $("#txtDireccionE").val(datos[0].direccion);
                $("#txtCorreoE").val(datos[0].correo);
                $("#txtTelefonoE").val(datos[0].telefono);
                $("#txtCelularE").val(datos[0].celular);
                $("#txtNitE").val(datos[0].nit);
                $("#txtRegistroE").val(datos[0].registroFiscal);

            })
            .fail(function () {

            })
        $("#frmModicicar").modal("show");

    })


    $(document).on("click", "#btnGuardarEdit", function () {
        var nombre = $("#txtNombreE").val();
        var empresa = $("#txtEmpresaE").val();
        var telefono = $("#txtTelefonoE").val();
        var celular = $("#txtCelularE").val();
        var email = $("#txtCorreoE").val();
        var dir = $("#txtDireccionE").val();
        var nit = $("#txtNitE").val();
        var fiscal = $("#txtRegistroE").val();



        if(nombre == "")
        {
            $("#msjNombreE").fadeIn("slow");
            return false;
        }
        else{
            $("#msjNombreE").fadeOut();


            if(empresa == "")
            {
                $("#msjEmpresaE").fadeIn("slow");
                return false;
            }
            else {
                $("#msjEmpresaE").fadeOut();

                if(email == "" || !expr.test(email))
                {
                    $("#msjEmailE").fadeIn("slow");
                    return false;
                }
                else {
                    $("#msjEmailE").fadeOut();

                    if(dir == "")
                    {
                        $("#msjDireccionE").fadeIn("slow");
                        return false;
                    }
                    else {
                        $("#msjDireccionE").fadeOut();

                        if(telefono == "")
                        {
                            $("#msjTelefonoE").fadeIn("slow");
                            return false;
                        }
                        else {
                            $("#msjTelefonoE").fadeOut();

                            if(celular == "")
                            {
                                $("#msjCelularE").fadeIn("slow");
                                return false;
                            }
                            else {
                                $("#msjCelularE").fadeOut();

                                if(nit == "")
                                {
                                    $("#msjNitE").fadeIn("slow");
                                    return false;
                                }
                                else {
                                    $("#msjNitE").fadeOut();

                                    if(fiscal == "")
                                    {
                                        $("#msjFiscalE").fadeIn("slow");
                                        return false;
                                    }
                                    else {
                                        $("#msjFiscalE").fadeOut();

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

                                            var datos = $("#frmEdit").serializeArray();
                                            $.ajax({
                                                url:"Proveedor/modificar",
                                                type:"POST",
                                                data: datos
                                            }).done(function(){
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
                                                    title: 'Proveedor Modificado con Exito'
                                                });
                                            });
                                            $("#frmModicicar").modal("hide");
                                            $('#frmEdit')[0].reset();
                                            llenarTabla();

                                        }
                                    })

                                    }
                                }
                            }
                        }
                    }
                }
            }

        }

    });


    $(document).on("click",".btnEliminar",function () {

        Swal.fire({
            title: '¿Estás seguro de Eliminar el Proveedor?',
            text: "Pueda que esta Información se Oculte de está Seccion",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, Eliminaló!'
        }).then((result) => {
            if (result.value) {

                var id= $(this).attr("id");

                $.ajax({
                    url: "Proveedor/eliminar",
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
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Proveedor Eliminado con Exito'
                });
                llenarTabla();
            }
        });

        llenarTabla();

    })

    $(document).on("click","#rest",function () {
        $("#modalRecu").modal("show");
        llenarTablaRecuperacion();
    })



    $(document).on("click",".btnRest",function () {
        $("#modalRecu").modal("hide");

        Swal.fire({
            title: '¿Estás seguro de Recuperar la Info. del Proveedor?',
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
                    url: "Proveedor/restaurar",
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
                    title: 'Proveedor Recuperado con Exito'
                })
                llenarTabla();
                llenarTablaRecuperacion();
            $("#modalRecu").modal("hide");
            }
            else
             {
                 llenarTablaRecuperacion();
            $("#modalRecu").modal("show");
             }
        })

    });


llenarTabla();

})