$(document).ready(function () {

    showUsers();
    $('#data').DataTable();
    $(document).on("click", "#agregarCliente", function () {
        $("#frmInsertarCliente").modal("show");
    })});


$(document).on('click','#btnSaveUserId',function(){
    event.preventDefault();
    var formData = new FormData($("#frmUserId")[0]);

    $.ajax({
        url: BASE_URL+'index.php/Usuario/addUser',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false

    })
        .done(function() {

            $("#frmInsertarCliente").modal("hide");
            $('#frmUserId')[0].reset();
            showUsers();

        })
        .fail(function() {
            alert("ocurrio un error");
        });

});

$(document).on('click','#editar',function () {

    var id = $(this).attr('data');
    $("#frmEditarUsuario").modal("show");

    $.ajax({
        type:'ajax',
        method: 'get',
        url: BASE_URL+'index.php/Usuario/updateUser',
        data: {idUser:id},
        async: false,
        dataType: 'json',
        success:function (data) {
            $('input[name=nombreE]').val(data.nombre);
            $('input[name=emailE]').val(data.correo);
            $('input[name=passE]').val(data.pass);
            $('select[name=rolE]').val(data.idRol);

            $('input[name=txtId]').val(data.idUser);
        },
        error:function () {
            alert('Could not edit data');
        }
    })

});


$(document).on('click','#btnEditUserId',function(){
    event.preventDefault();
    var formData = new FormData($("#frmUserIdEdit")[0]);
    $.ajax({
        url: BASE_URL+'index.php/Usuario/saveChanges',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    })
        .done(function() {

            $("#frmEditarUsuario").modal("hide");
            $('#frmUserIdEdit')[0].reset();
            showUsers();

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
            url: BASE_URL+'index.php/Usuario/eraseUser',
            data:{idUser:id},
            cache:false,
            dataType: 'json',
            success:function (response) {
                $("#deleteModal").modal("hide");
                showUsers();
            },
            error:function () {
                $("#deleteModal").modal("hide");
                showUsers();
            }
        })
    })

});

function showUsers() {
    $.ajax({
        type: 'POST',
        url: BASE_URL+'index.php/Usuario/showUsers',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html+='<tr>'+
                    '<td>'+data[i].nombre+'</td>'+
                    '<td>'+data[i].correo+'</td>'+
                    '<td> <img style="width: 100px; height: 100px;" src="../resources/images/uploads/'+data[i].image+'"></td>'+
                    '<td>'+
                    '<a class="btn btn-outline-info btnEditar" href="javascript:;" data="'+data[i].idUser+'" id="editar"><i class="fas fa-marker"></i></a>\n' +
                    '<a class="btn btn-outline-danger btnEliminar"href="javascript:;" data="'+data[i].idUser+'" id="eliminar"><i class="far fa-trash-alt"></i></a>'+
                    '</td>'+
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






