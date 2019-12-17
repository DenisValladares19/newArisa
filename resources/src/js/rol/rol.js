$(document).ready(function () {


    showRoles();
    $('#data').DataTable();


});


$(document).on('click','#agregarRol',function () {
    $("#frmInsertarCliente").modal("show");

});

$(document).on('click','#btnSaveId',function(){
    event.preventDefault();
    var data = $('#formRol').serialize();
    $.ajax({
        url: BASE_URL+'index.php/Rol/addRol',
        type: 'post',
        data: data,
    })
        .done(function() {

            $("#frmInsertarCliente").modal("hide");
            $('#formRol')[0].reset();
            showRoles();
            alert("Rol agregado con éxito");

        })
        .fail(function() {
            alert("ocurrio un error");
        });

});

$(document).on('click','#editar',function () {

    var id = $(this).attr('data');
    $("#frmEditarRol").modal("show");

    $.ajax({
        type:'ajax',
        method: 'get',
        url: BASE_URL+'index.php/Rol/updateRol',
        data: {idRol:id},
        async: false,
        dataType: 'json',
        success:function (data) {
            $('input[name=nombreE]').val(data.nombre);
            $('input[name=txtId]').val(data.idRol);
        },
        error:function () {
            alert('Could not edit data');
        }
    })

});

$(document).on('click','#btnEditId',function(){
    event.preventDefault();
    var data = $('#editFormRol').serialize();
    $.ajax({
        url: BASE_URL+'index.php/Rol/saveChanges',
        type: 'post',
        data: data,
    })
        .done(function() {

            $("#frmEditarRol").modal("hide");
            $('#editFormRol')[0].reset();
            showRoles();
            alert("Rol modificado con éxito");

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
            url: BASE_URL+'index.php/Rol/eraseRol',
            data:{idRol:id},
            dataType: 'json',
            success:function (response) {
                $("#deleteModal").modal("hide");
                showRoles();
                alert("Rol eliminado con éxito");
            },
            error:function () {
                alert('Error al eliminar');
            }
        })
    })

});


function showRoles() {
    $.ajax({
        type: 'POST',
        url: BASE_URL+'index.php/Rol/showRoles',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html+='<tr>'+
                    '<td>'+data[i].idRol+'</td>'+
                    '<td>'+data[i].nombre+'</td>'+
                    '<td>'+
                    '<button class="btn-info"><a href="javascript:;" data="'+data[i].idRol+'" id="editar">Editar</a></button>'+
                    '<button class="btn-danger"><a href="javascript:;" data="'+data[i].idRol+'" id="eliminar">Eliminar</a></button>'+
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


