$(document).ready(function () {
    $("#dataProveedor").dataTable();

    $(document).on("click","#agregarProveedor",function () {
        $("#frmAgregar").modal("show");
    })

    $(document).on("click",".btnEditar",function () {

        var id= $(this).attr("id");

        $.ajax({
            url: "Proveedor/getProveedor",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {

                var datos = JSON.parse(data);
                $("#idProveedor").val(datos[0].idProveedor);
                $("#txtNombreE").val(datos[0].nombreInv);
                $("#txtEmpresaE").val(datos[0].empresa);
                $("#txtDireccionE").val(datos[0].direccion);
                $("#txtCorreoE").val(datos[0].correo);
                $("#txtTelefonoE").val(datos[0].telefono);
                $("#txtCelularE").val(datos[0].celular);
                $("#txtNitE").val(datos[0].nit);
                $("#txtDuiE").val(datos[0].dui);
                $("#txtRegistroE").val(datos[0].registroFiscal);

            })
            .fail(function () {
                
            })
        $("#frmModicicar").modal("show");

    })


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
                    timer: 6000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Proveedor Eliminado con Exito'
                })
            }
        })

    })

})