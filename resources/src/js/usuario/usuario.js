//Expresión para validar un correo electrónico
var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

$(document).ready(function () {

    showUsers();

    $("#error").hide();

    $("#nombres").change(function () {
        validarUsuario();
    });


});




function validarUsuario(){
    var usuario = $("#nombres").val();

    $.ajax(
        {
            url:"Usuario/validarUsuario",
            type: "POST",
            data: {usuario},
            dataType: "JSON",
            success:function (r) {
                if(r==false)
                {
                    $("#error").hide();
                    $('#inputs').show();

                }
                else
                {
                    $("#error").show();
                    $('#inputs').hide();
                }

            },
        });
}







$(document).on("click", "#agregarCliente", function () {
    $("#frmInsertarCliente").modal("show");
});

$(document).on('click','#btnSaveUserId',function(){

    var nombre = $("#nombres").val();
    var correo = $("#emailId").val();
    var pass = $("#passId").val();
    var img = $("#imagenId").val();

    if(nombre == ""){
        $("#msjNombre").fadeIn("slow");
        return false;
    }
    else{
        $("#msjNombre").fadeOut();

        if(correo == "" || !expr.test(correo)){
            $("#msjEmail").fadeIn("slow");
            return false;
        }
        else{
            $("#msjEmail").fadeOut();

            if(pass == ""){
                $("#msjPass").fadeIn("slow");
                return false;
            }
            else{
                $("#msjPass").fadeOut();

                if(img == ""){
                    $("#msjImg").fadeIn("slow");
                    return false;
                }
                else{
                    $("#msjImg").fadeOut();


                    //Nada esta vacio
                    //Se envian los datos para ser agregados


                    event.preventDefault();
                    var formData = new FormData($("#frmUserId")[0]);

                    $.ajax({
                        url: 'Usuario/addUser',
                        type: 'post',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false

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
                                title: 'Información Insertada Correctamente'
                            })

                            $("#frmInsertarCliente").modal("hide");
                            $('#frmUserId')[0].reset();
                            showUsers();

                        })
                        .fail(function() {
                            Swal.fire(
                                'Usuario!',
                                'Error en el Intentó de Inserción de Información',
                                'error'
                            )
                        });



                }

            }



        }

    }





});

$(document).on('click','#editar',function () {

    var id = $(this).attr('data');
    $("#frmEditarUsuario").modal("show");

    $.ajax({
        type:'ajax',
        method: 'get',
        url: 'Usuario/updateUser',
        data: {idUser:id},
        async: false,
        dataType: 'json',
        success:function (data) {
            $('input[name=nombreE]').val(data.nombre);
            $('input[name=emailE]').val(data.correo);
            $('input[name=passE]').val(data.pass);
            $('select[name=rolE]').val(data.idRol);
            $('#imagenEId').val('<img="../resources/images/uploads/'+data.image+'">');
            $('input[name=txtId]').val(data.idUser);
        },
        error:function () {
            Swal.fire(
                'Usuario!',
                'Error en la Comunicación con la Base de Datos',
                'error'
            )
        }
    })

});


$(document).on('click','#btnEditUserId',function(){


    var nombre = $("#nombresId").val();
    var correo = $("#emailEId").val();
    var pass = $("#passEId").val();

    if(nombre == ""){
        $("#msjNombreE").fadeIn("slow");
        return false;
    }
    else{
        $("#msjNombreE").fadeOut();

        if(correo == "" || !expr.test(correo)){
            $("#msjEmailE").fadeIn("slow");
            return false;
        }
        else{
            $("#msjEmailE").fadeOut();

            if(pass == ""){
                $("#msjPassE").fadeIn("slow");
                return false;
            }
            else{
                $("#msjPassE").fadeOut();

                //ENVIAR DATA

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

    var formData = new FormData($("#frmUserIdEdit")[0]);
    $.ajax({
        url: 'Usuario/saveChanges',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false
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
                title: 'Información Editada Correctamente'
            })

            $("#frmEditarUsuario").modal("hide");
            $('#frmUserIdEdit')[0].reset();
            showUsers();

        })
        .fail(function() {
            Swal.fire(
                'Usuario!',
                'Error en el Intentó de Editar la Información',
                'error'
            )
        });
    }
})



            }



        }

    }

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
            url: 'Usuario/eraseUser',
            data:{idUser:id},
            cache:false,
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
                    title: 'Información eliminada Correctamente'
                })

                showUsers();
            },
            error:function () {
                Swal.fire(
                    'Usuario!',
                    'Error en el intento de Eliminar la Información',
                    'error'
                )
                showUsers();
            }
        })
    }
})
});

function showUsers() {
    $.ajax({
        type: 'POST',
        url: 'Usuario/showUsers',
        async: false,
        dataType: 'json',
        success:function (data) {
            $("#dataUsuario").dataTable().fnDestroy();
            $("#dataUsuario tbody tr").remove();
            $.each(data, function (key,val) {
                var fila ='<tr><td width="15%"><div>';
                fila=fila + val.nombre + '</div></td><td>';
                fila=fila + val.nombreRol + '</div></td><td>';
                fila=fila + val.correo + '</div></td>';
                fila = fila +  '<td>  <img style="width: 100px; height: 100px;" src="../resources/images/uploads/'+val.image+'"></td>';
                fila = fila +  '<td> <a class="btn btn-outline-info btnEditar" href="javascript:;" data="'+val.idUser+'" id="editar"><i class="fas fa-marker"></i></a>\n' +
                    '<a class="btn btn-outline-danger btnEliminar"href="javascript:;" data="'+val.idUser+'" id="eliminar"><i class="far fa-trash-alt"></i></a>';
                fila = fila + '</td></tr>';
                $("#dataUsuario tbody").append(fila);
            });
            $("#dataUsuario").dataTable({
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
                'Usuario!',
                'Error en la Comunicación con la Base de Datos',
                'error'
            )
        }

    });
}


//Método para listar roles

$.post(BASE_URL+'index.php/Rol/showRoles',
        function (data) {
            var rol = JSON.parse(data);
            $.each(rol,function (i,item) {
                $('#rolId').append('<option value="'+item.idRol+'">'+item.nombre+'</option>');
            });
        });



$.post(BASE_URL+'index.php/Rol/showRoles',
    function (data) {
        var rol = JSON.parse(data);
        $.each(rol,function (i,item) {
            $('#rolEId').append('<option value="'+item.idRol+'">'+item.nombre+'</option>');
        });
    });



$('#rolId').change(function () {
    $('#rolId option:selected').each(function () {
        var id = $('#rolId').val();
        alert(id)
    });
});


