function listaCliente(){
    $.post("Orden/mostrarCliente",{},function(res){
        var r = JSON.parse(res);
        $("#idCliente option").remove();
        for(var i = 0;i<r.length;i++){
            $("#idCliente").append("<option value='"+r[i].idCliente+"'>"+r[i].empresa+"</option>");
        }
    });
    $("#idCliente").select2({
        width: "100%"
    });
}

function llenarCotiz(){

    var idCliente = $("#idCliente").val();

    $.ajax(
        {
            url:"Orden/mostrarCotiz",
            type: "POST",
            data: {idCliente},
            dataType: "JSON",
            success:function (r) {
                if(r!="")
                {
                    $("#idCotiz option").remove();
                    $("#idCotiz").append("<option>Elige la Cotizacion</option>");
                    for(var i = 0;i<r.length;i++){
                        $("#idCotiz").append("<option value='"+r[i].idCotizacion+"'>"+r[i].codigo+"</option>");
                    }
                    llenarMuestra();
                }
                else
                {
                    $("#idCotiz option").remove();
                    $("#idCotiz").append("<option>Este Cliente no tiene Ninguna Cotizacion</option>");
                    llenarMuestra();
                }

            },
        });
}

function llenarMuestra(){

    var idCotiz = $("#idCotiz").val();

    $.ajax(
        {
            url:"Orden/mostrarMuestra",
            type: "POST",
            data: {idCotiz},
            dataType: "JSON",
            success:function (r) {
                if(r!="")
                {
                    $("#idMuestra option").remove();
                    $("#idMuestra").append("<option>Elige la Muestra</option>");
                    for(var i = 0;i<r.length;i++){
                        $("#idMuestra").append("<option value='"+r[i].idMuestra+"'>"+r[i].url+"</option>");
                    }
                }
                else
                {
                    $("#idMuestra option").remove();
                    $("#idMuestra").append("<option>Este Cotizacion no tiene Ninguna Muestra</option>");
                }

            },
        });
}


function listProd(){
    $.post("Inventario/mostrarProds",{},function(res){
        var r = JSON.parse(res);
        $("#selectProd option").remove();
        $("#selectProd").append("<option>Elige el Producto</option>");
        for(var i = 0;i<r.length;i++){
            $("#selectProd").append("<option value='"+r[i].idInventario+"'>"+r[i].nombreInv+"</option>");
        }
    });
}

function listProvEditarUtilizados(){
    $.post("Inventario/mostrarProds",{},function(res){
        var r = JSON.parse(res);
        $("#selectProdE option").remove();
        $("#selectProdE").append("<option>Elige el Producto</option>");
        for(var i = 0;i<r.length;i++){
            $("#selectProdE").append("<option value='"+r[i].idInventario+"'>"+r[i].nombreInv+"</option>");
        }
    });
}

function listProdDesp(){
    $.post("Inventario/mostrarProds",{},function(res){
        var r = JSON.parse(res);
        $("#selectProdD option").remove();
        $("#selectProdD").append("<option>Elige el Producto</option>");
        for(var i = 0;i<r.length;i++){
            $("#selectProdD").append("<option value='"+r[i].idInventario+"'>"+r[i].nombreInv+"</option>");
        }
    });
}

function listProvEditarDesp(){
    $.post("Inventario/mostrarProds",{},function(res){
        var r = JSON.parse(res);
        $("#selectProdDE option").remove();
        $("#selectProdDE").append("<option>Elige el Producto</option>");
        for(var i = 0;i<r.length;i++){
            $("#selectProdDE").append("<option value='"+r[i].idInventario+"'>"+r[i].nombreInv+"</option>");
        }
    });
}



function llenarTablaUtilizados()
{
    let idOrden = localStorage.getItem("idOrden");
    $.ajax(
        {
            url:"Orden/MostrarUtilizados",
            type: "POST",
            data: {idOrden},
            success:function (res) {
                let data = JSON.parse(res);
                if(data!=""){
                    $("#tablaUtilizados").show();
                    $("#tablaUtilizados").dataTable().fnDestroy();
                    $("#tablaUtilizados tbody tr").remove();
                    $.each(data, function (key,val) {
                        var fila ='<tr><td><div align="center">';
                        fila=fila + val.nombreInv + '</div></td><td>';
                        fila=fila + val.cantidad + '</div></td>';
                        fila = fila +  '<td> <a class="btn btn-outline-info btnEditarUtilizados" id="'+val.idDetalleMaterial+'"><i class="fas fa-marker"></i></a>\n' +
                            '                     <a class="btn btn-outline-danger btnEliminarUtilizados" id="'+val.idDetalleMaterial+'"><i class="far fa-trash-alt"></i></a>';
                        fila = fila + '</td></tr>';
                        $("#tablaUtilizados tbody").append(fila);
                    });
                    $("#tablaUtilizados").dataTable({
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
                }
                else{
                    $("#tablaUtilizados").hide();
                }

            },
        });
}


function llenarTablaDesp()
{
    let idOrden = localStorage.getItem("idOrden");
    $.ajax(
        {
            url:"Orden/MostrarDesp",
            type: "POST",
            data: {idOrden},
            success:function (res) {
                let data = JSON.parse(res);
                if(data!=""){
                    $("#tablaDesp").show();
                    $("#tablaDesp").dataTable().fnDestroy();
                    $("#tablaDesp tbody tr").remove();
                    $.each(data, function (key,val) {
                        var fila ='<tr><td><div align="center">';
                        fila=fila + val.nombreInv + '</div></td><td>';
                        fila=fila + val.cantidad + '</div></td><td>';
                        fila=fila + val.comentario + '</div></td>';
                        fila = fila +  '<td> <a class="btn btn-outline-info btnEditarDesp" id="'+val.idDesperdicio+'"><i class="fas fa-marker"></i></a>\n' +
                            '                     <a class="btn btn-outline-danger btnEliminarDesp" id="'+val.idDesperdicio+'"><i class="far fa-trash-alt"></i></a>';
                        fila = fila + '</td></tr>';
                        $("#tablaDesp tbody").append(fila);
                    });
                    $("#tablaDesp").dataTable({
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
                }
                else{
                    $("#tablaDesp").hide();
                }

            },
        });
}



$(document).ready(function () {
    showOrden();
    statusLoad();
    listaCliente();
    listProvEditarUtilizados();
    listProvEditarDesp();
    $("#tablaUtilizados").hide();

    $('#data1').DataTable();
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

    $("#idCliente").change(function () {
        llenarCotiz();
    });

    $("#idCotiz").change(function () {
        llenarMuestra();
    });


    $(document).on("click", "#agregarOrden", function () {
        $('#frmOrden')[0].reset();
        $("#frmInsertarOrden").modal("show");
    });


    $(document).on("click", ".add1", function () {

        $("#prodUt").modal("show");
        $('#frmUtilizados')[0].reset();
        listProd();
    })


    $(document).on("click","#addUtilizados",function () {
        event.preventDefault();
        var datosEx = $("#frmUtilizados").serializeArray();
        let idOrden = localStorage.getItem("idOrden");
        $.ajax({
            url:"Orden/insertarUtilizado",
            type:"POST",
            data: {datosEx,idOrden},
        }).done(function (res) {
            localStorage.setItem("idDetalle",res);
            $("#prodUtilizados").modal("show");
            $("#prodUt").modal("hide");
            $('#frmUtilizados')[0].reset();
            llenarTablaUtilizados();
        })
    });



    $(document).on("click",".btnEditarUtilizados",function ()  {

        var id= $(this).attr("id");

        $.ajax({
            url: "Orden/mostrarUt",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {

                var datos = JSON.parse(data);
                $("#txtIdExit").val(datos[0].idDetalleMaterial);
                $("#selectProdE").val(parseInt(datos[0].idInventario));
                $("#cantidadE").val(datos[0].cantidad);
            })
            .fail(function () {

            })
        $("#EditarUtilizados").modal("show");


    });


    $(document).on("click","#editarUtilizados",function () {
        event.preventDefault();
        var datosEx = $("#frmUtilizadosEdit").serializeArray();
        $.ajax({
            url:"Orden/modifiicarUtilizados",
            type:"POST",
            data: datosEx,
        }).done(function (res) {
            $("#prodUtilizados").modal("show");
            $("#EditarUtilizados").modal("hide");
            $('#frmUtilizados')[0].reset();
            llenarTablaUtilizados();
        })
    });



    $(document).on("click",".btnEliminarUtilizados",function ()  {

        var id= $(this).attr("id");

        $.ajax({
            url: "Orden/eliminarUtilizado",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {

                llenarTablaUtilizados();
            })
            .fail(function () {

            })
        llenarTablaUtilizados();
    });



    $(document).on("click", "#next", function () {
        $("#prodUtilizados").modal("hide");
        $("#prodDesp").modal("show");
        llenarTablaDesp();
    });


    $(document).on("click", ".add2", function () {

        $("#insertarDesp").modal("show");
        $('#frmDesp')[0].reset();
        listProdDesp();
    })


    $(document).on("click","#addDesp",function () {
        event.preventDefault();
        var datosDesp = $("#frmDesp").serializeArray();
        let idOrden = localStorage.getItem("idOrden");
        $.ajax({
            url:"Orden/insertarDesp",
            type:"POST",
            data: {datosDesp,idOrden},
        }).done(function (res) {
            localStorage.setItem("idDetalle",res);
            $("#prodDesp").modal("show");
            $("#insertarDesp").modal("hide");
            $('#frmDesp')[0].reset();
            llenarTablaDesp();
        })
    });




    $(document).on("click","#endDesp", function(e){
        e.preventDefault();
        let idOrden = localStorage.getItem("idOrden");
        $.ajax({
            url:"orden/MostrarUtilizados",
            type:"POST",
            data:{idOrden:idOrden}
        }).done(function(res){
            let data = JSON.parse(res);
            for(let i=0;i<data.length;i++){
                $.ajax({
                    url:"orden/disminuirStock",
                    type:"POST",
                    data:{idInventario:data[i].idInventario,cantidad:data[i].cantidad}
                }).done(function(res){
                    swal.fire(
                        "Orden de Trabajo",
                        "Se guardo exitosamente!",
                        "success"
                    );
                    showOrden();
                    $("#prodDesp").modal("hide");
                })
            }
        })
    })




    $(document).on("click",".btnEditarDesp",function ()  {

        var id= $(this).attr("id");

        $.ajax({
            url: "Orden/mostrarDespe",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {

                var datos = JSON.parse(data);
                $("#txtIdExitD").val(datos[0].idDesperdicio);
                $("#selectProdDE").val(parseInt(datos[0].idInventario));
                $("#cantidadDE").val(datos[0].cantidad);
                $("#comentarioDE").val(datos[0].comentario);
            })
            .fail(function () {

            })
        $("#EditarDesp").modal("show");


    });


    $(document).on("click","#editarDesp",function () {
        event.preventDefault();
        var datosEx = $("#frmDespEdit").serializeArray();
        $.ajax({
            url:"Orden/modifiicarDesp",
            type:"POST",
            data: datosEx,
        }).done(function (res) {
            $("#EditarDesp").modal("hide");
            $("#prodDesp").modal("show");
            $('#frmDespEdit')[0].reset();
            llenarTablaDesp();
        })
        llenarTablaDesp();
    });



    $(document).on("click",".btnEliminarDesp",function ()  {

        var id= $(this).attr("id");

        $.ajax({
            url: "Orden/eliminarDesp",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {

                llenarTablaDesp();
            })
            .fail(function () {

            })
        llenarTablaDesp();
    });













        });

$(document).on('click','#cotShowId',function(){
    event.preventDefault();

        llenarCotizacion();


});

$(document).on("click", "#cotShowId", function () {
    llenarCotizacion();
    $("#modalCot").modal("show");

});

$(document).on('click','#btnSaveOrdenId',function(){
    event.preventDefault();
    var formData = new FormData($("#frmOrden")[0]);

    $.ajax({
        url: 'Orden/addOrden',
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
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

            Toast.fire({
                icon: 'success',
                title: 'Orden Ingresada con Exito'
            })
            $("#frmInsertarOrden").modal("hide");
            $('#frmOrden')[0].reset();
            showOrden();

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
                title: 'Error al Insertar Orden'
            })
        });

});



$(document).on('click','#editar',function () {

    var id = $(this).attr('data');
    localStorage.setItem("idOrden",id);
    $("#frmEditarOrden").modal("show");

    $.ajax({
        type:'ajax',
        method: 'get',
        url: 'Orden/updateOrden',
        data: {idOrden:id},
        async: false,
        dataType: 'json',
        success:function (data) {
            $('input[name=idC]').val(data.idCotizacion);
            $('input[name=idCotizE]').val(data.codigo);
            $('input[name=ordenE]').val(data.nombre);
            $('input[name=descE]').val(data.comentarios);
            $('input[name=tamañoE]').val(data.tamaño);
            $('input[name=idM]').val(data.idMuestra);
            $('input[name=idMuestraE]').val(data.url);
            $('select[name=estadoE]').val(data.idEstado2);

            $('input[name=txtId]').val(data.idOrden);
            $('input[name=txtIdEst]').val(data.idEstado2);
            status(data.idEstado2);


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
                title: 'Error con la Conexion'
            })
        }
    })

});

$(document).on('click','#download',function () {

    var id = $(this).attr('data');
    $('#txtIdText').val(id);
    var idText = $('#txtIdText').val();
    $.ajax({
        type:'ajax',
        method: 'get',
        url:'Orden/download',
        data: {idOrden:idText},
        async: false,

        success:function (data) {



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
                title: 'Error con la Conexion'
            })
        }
    })

});



$(document).on('click','#btnEditOrdenId',function(){
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


    var formData = new FormData($("#editFormOrden")[0]);

    $.ajax({
        url: 'Orden/saveChanges',
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
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

            Toast.fire({
                icon: 'success',
                title: 'Orden Editada Correctamente'
            })

            $("#frmEditarOrden").modal("hide");
            history(formData);
            showOrden();


            var estado=$("#estadoIdE").val();

            if(estado==3){
                let idOrden = localStorage.getItem("idOrden");
                $.ajax({
                    url:"orden/verficarEstado",
                    type:"POST",
                    data:{idOrden:idOrden}
                }).done(function(res){
                    let data = JSON.parse(res);

                    if(data==""){
                        llenarTablaUtilizados();
                        $("#prodUtilizados").modal("show");
                        $('#frmUtilizados')[0].reset();
                    }
                })     

            }


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
                title: 'Error al Editar Orden'
            })
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
        title: '¿Estás seguro de Eliminar la Orden?',
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
            url: 'Orden/eraseOrden',
            data:{idOrden:id},
            cache:false,
            dataType: 'json',
            success:function (response) {
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
                    title: 'Orden Eliminada Correctamente'
                })
                $("#deleteModal").modal("hide");
                showOrden();
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
                    title: 'Error al Elimanr Orden'
                })
                $("#deleteModal").modal("hide");
                showOrden();
            }
        })
    }
});
});




function showOrden() {
    $.ajax({
        type: 'POST',
        url: 'Orden/showOrdenes',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html+='<tr>'+
                    '<td>'+data[i].codigo+'</td>'+
                    '<td>'+data[i].comentarios+'</td>'+
                    '<td>'+data[i].url+'</td>'+
                    '<td>'+data[i].nombreE+'</td>'+
                    '<td>'+
                    '<button class="btn btn-outline-info" href="javascript:;" data="'+data[i].idOrden+'" id="editar"><i class="fas fa-marker"></i></button>\n' +
                    '<button class="btn btn-outline-dark mr-1" onClick="print('+data[i].idOrden+', '+data[i].idCotizacion+')" ><i class="fas fa-print"></i></button><button class="btn btn-outline-danger  href="javascript:;" data="'+data[i].idOrden+'" id="eliminar"><i class="fas fa-trash-alt"></i></button> <button class="btn btn-outline-dark ver" id="'+data[i].idOrden+'" > <i class="far fa-eye"></i></button>'+
                    '</td>'+
                    '</tr>';
            }
            $('#table').html(html);
        },

        error: function () {
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
                title: 'Error con la Conexion'
            })
        }

    });
}



function history(formData) {

    $.ajax({
        type: 'post',
        url: 'Historial/addHistory',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
            showOrden();
        },

        error: function () {
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
                title: 'Error con la Conexion'
            })
        }

    });
}




$.post('cotizacion/getAllCotizacion',
    function (data) {
        var cot = JSON.parse(data);
        $.each(cot,function (i,item) {
            $('#cotId').append('<option value="'+item.idCotizacion+'">'+item.idCotizacion+'</option>');
        });
    });

$.post('cotizacion/getAllCotizacion',
    function (data) {
        var cot = JSON.parse(data);
        $.each(cot,function (i,item) {
            $('#cotIdE').append('<option value="'+item.idCotizacion+'">'+item.idCotizacion+'</option>');
        });
    });

$.post('muestra/llenar',
    function (data) {
        var muestra = JSON.parse(data);
        $.each(muestra,function (i,item) {
            $('#muestraId').append('<option value="'+item.idMuestra+'">'+item.url+'</option>');
        });
    });

$.post('muestra/llenar',
    function (data) {
        var muestra = JSON.parse(data);
        $.each(muestra,function (i,item) {
            $('#muestraIdE').append('<option value="'+item.idMuestra+'">'+item.url+'</option>');
        });
    });

function statusLoad() {
    $.post('estado2/showStatus',
        function (data) {
            var status = JSON.parse(data);
            $.each(status, function (i, item) {
                $('#estadoId').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
            });
        });
}

function status(data) {

    if (data==1){
        $('#estadoIdE').empty().append('Seleccione');
        $.post('estado2/showAllStatus',
            function (data) {
                var status = JSON.parse(data);
                $.each(status, function (i, item) {
                    $('#estadoIdE').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
                });
            });
    }

    else if(data==2){
        $('#estadoIdE').empty().append('Seleccione');
        $.post('estado2/showStatus1',
            function (data) {
                var status = JSON.parse(data);
                $.each(status, function (i, item) {
                    $('#estadoIdE').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
                });
            });
    }

    else if(data==3){
        $('#estadoIdE').empty().append('Seleccione');
        $.post('estado2/showStatus2',
            function (data) {
                var status = JSON.parse(data);
                $.each(status, function (i, item) {
                    $('#estadoIdE').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
                });
            });
    }

    else if (data==4){
        $('#estadoIdE').empty().append('Seleccione');
        $.post('estado2/showStatus3',
            function (data) {
                var status = JSON.parse(data);
                $.each(status, function (i, item) {
                    $('#estadoIdE').append('<option value="' + item.idEstado2 + '">' + item.nombre + '</option>');
                });
            });
    }

}


//Parte para examinar cotizaciones

function llenarCotizacion(){
    $.ajax({
        type: 'POST',
        url: 'cotizacion/getAllCotizacion',
        async: false,
        dataType: 'json',
        success: function (data1) {
            var html = '';
            var i;
            for(i=0; i<data1.length; i++){
                html+='<tr>'+
                    '<td>'+data1[i].codigo+'</td>'+
                    '<td>'+data1[i].clNombre+'</td>'+
                    '<td>'+data1[i].clApellido+'</td>'+
                    '<td>'+
                    '<button class="btn-info"><a href="javascript:;" data1="'+data1[i].idCotizacion+'" id="select">Seleccionar</a></button>'+
                    '</td>'+
                    '</tr>';
            }
            $('#table1').html(html);
        },

        error: function () {
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
                title: 'Error con la Conexion'
            })
        }

    });
}

$(document).on('click','#select',function(){
    event.preventDefault();
    var id = $(this).attr('data1');
    $('#cotId').val(id);
    $('#cotIdE').val(id);
    $("#modalCot").modal("hide");
    console.log(id);
});



///// Codigo agregado por Denis XD
function print(idOrden, idCotizacion){
    window.open("orden/print?o="+idOrden+"&d="+idCotizacion,"_back");
}


$(document).on("click",".ver", function(e){
    e.preventDefault();
    let idOrden = $(this).attr("id");
    $.ajax({
        url:"historial/verHistorial",
        type:"POST",
        data: {idOrden:idOrden}
    }).done(function (res){
        let data = JSON.parse(res);
        $("#tablaHistorial").dataTable().fnDestroy();
        $("#tablaHistorial tbody tr").remove();
        for(let i=0;i<data.length;i++){
            var fila ='<tr><td><div align="center">';
            fila=fila + data[i].descripcion+ ' '+ data[i].fecha+'</div></td></tr>';
            $("#tablaHistorial tbody").append(fila);
        }
        $("#tablaHistorial").dataTable({
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

        $("#modalHistorial").modal("show");
    })    
})
