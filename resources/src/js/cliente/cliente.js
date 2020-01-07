$(document).ready(function () {






    showClients();


    $('#data').DataTable();

    $(document).on("click", "#agregarCliente", function () {
        $("#frmInsertarCliente").modal("show");
    })});


$(document).on('click','#btnSaveId',function(){
    event.preventDefault();
    var data = $('#frmCliente').serialize();
    $.ajax({
        url: BASE_URL+'index.php/Cliente/addClient',
        type: 'post',
        data: data,
    })
        .done(function() {

            $("#frmInsertarCliente").modal("hide");
            $('#frmCliente')[0].reset();
            showClients();
            alert("Cliente Agregado con éxito");

        })
        .fail(function() {
            alert("ocurrio un error");
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
            alert('Could not edit data');
        }
    })

});



$(document).on('click','#btnEditId',function(){
    event.preventDefault();
    var data = $('#frmEditar').serialize();
    $.ajax({
        url: BASE_URL+'index.php/Cliente/saveChanges',
        type: 'post',
        data: data,
    })
        .done(function() {

            $("#frmEditarCliente").modal("hide");
            $('#frmEditar')[0].reset();
            showClients();
            alert("Cliente modificado con éxito");

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
            url: BASE_URL+'index.php/Cliente/eraseClient',
            data:{idCliente:id},
            dataType: 'json',
            success:function (response) {
                $("#deleteModal").modal("hide");
                showClients();
                alert("Cliente eliminado con éxito");
            },
            error:function () {
                alert('Error al eliminar');
            }
        })
    })

});





function showClients() {
    $.ajax({
        type: 'POST',
        url: BASE_URL+'index.php/Cliente/showClients',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){

                html+='<tr>'+
                    '<td>'+data[i].idCliente+'</td>'+
                    '<td>'+data[i].nombre+'</td>'+
                    '<td>'+data[i].empresa+'</td>'+
                    '<td>'+data[i].telefono+'</td>'+
                    '<td>'+data[i].celular+'</td>'+
                    '<td>'+data[i].correo+'</td>'+
                    '<td>'+data[i].direccion+'</td>'+
                    '<td>'+data[i].nit+'</td>'+
                    '<td>'+data[i].registroFiscal+'</td>'+
                    '<td>'+
                    '<button class="btn-info editarC"><a href="javascript:;" data="'+data[i].idCliente+'" id="editar">Editar</a></button>'+
                    '<button class="btn-danger eliminarC" id="eliminarB"><a href="javascript:;" data="'+data[i].idCliente+'" id="eliminar">Eliminar</a></button>'+
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



