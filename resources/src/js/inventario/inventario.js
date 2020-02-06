function llenarTablaCompras()
{
    $.ajax(
        {
            url:"Inventario/mostrarCompras",
            type: "POST",
            dataType: "JSON",
            success:function (data) {
                $("#tablaCompras").dataTable().fnDestroy();
                $("#tablaCompras tbody tr").remove();
                $.each(data, function (key,val) {
                    var fila ='<tr><td><div align="center">';
                    fila=fila + val.nombreInv + '</div></td><td>';
                    fila=fila + val.fecha + '</div></td><td>';
                    fila=fila + val.subtotal + '</div></td><td>';
                    fila=fila + val.nombre + '</td>';
                    fila = fila + '</td></tr>';
                    $("#tablaCompras tbody").append(fila);
                });
                $("#tablaCompras").dataTable({
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

function llenarTablaInv()
{
    $.ajax(
        {
            url:"Inventario/mostrarInv",
            type: "POST",
            dataType: "JSON",
            success:function (data) {
                $("#tablaProd").dataTable().fnDestroy();
                $("#tablaProd tbody tr").remove();
                $.each(data, function (key,val) {
                    var fila ='<tr><td><div align="center">';
                    fila=fila + val.nombreInv + '</div></td><td>';
                    fila=fila + val.precio + '</div></td><td>';
                    fila=fila + val.stock + '</div></td><td>';
                    fila=fila + val.descripcion + '</div></td>';
                    fila = fila +  '<td> <a class="btn btn-outline-info btnEditar" id="'+val.idInventario+'"><i class="fas fa-marker"></i></a>\n' +
                        '                     <a class="btn btn-outline-danger btnEliminar"id="'+val.idInventario+'"><i class="far fa-trash-alt"></i></a>';
                    fila = fila + '</td></tr>';
                    $("#tablaProd tbody").append(fila);
                });
                $("#tablaProd").dataTable({
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


function listProv(){
    $.post("Inventario/mostrarProv",{},function(res){
        var r = JSON.parse(res);
        $("#selectProv option").remove();
        $("#selectProv").append("<option>Elige el Proveedor</option>");
        for(var i = 0;i<r.length;i++){
            $("#selectProv").append("<option value='"+r[i].idProveedor+"'>"+r[i].nombre+"</option>");
        }
    });
}

function listProvEditarEx(){
    $.post("Inventario/mostrarProv",{},function(res){
        var r = JSON.parse(res);
        $("#selectProdE option").remove();
        $("#selectProdE").append("<option>Elige el Proveedor</option>");
        for(var i = 0;i<r.length;i++){
            $("#selectProdE").append("<option value='"+r[i].idProveedor+"'>"+r[i].nombre+"</option>");
        }
    });
}

function listProd(){
    $.post("Inventario/mostrarProd",{},function(res){
        var r = JSON.parse(res);
        $("#selectProd option").remove();
        $("#selectProd").append("<option>Elige el Producto</option>");
        for(var i = 0;i<r.length;i++){
            $("#selectProd").append("<option value='"+r[i].idInventario+"'>"+r[i].nombreInv+"</option>");
        }
    });
}


function llenarTablaEx()
{
    let idCompra = localStorage.getItem("idCompra");
    $.ajax(
        {
            url:"Inventario/mostrarExt",
            type: "POST",
            data: {idCompra},
            success:function (res) {
                let data = JSON.parse(res);
                if(data!=null){
                    $("#tablaEx").show();
                    $("#tablaEx").dataTable().fnDestroy();
                    $("#tablaEx tbody tr").remove();
                    $.each(data, function (key,val) {
                        var fila ='<tr><td><div align="center">';
                        fila=fila + val.idInventario + '</div></td><td>';
                        fila=fila + val.cantidad + '</div></td>';
                        fila = fila +  '<td> <a class="btn btn-outline-info btnEditarEx" id="'+val.idDetalleInvCompra+'"><i class="fas fa-marker"></i></a>\n' +
                            '                     <a class="btn btn-outline-danger btnEliminarEx"id="'+val.idDetalleInvCompra+'"><i class="far fa-trash-alt"></i></a>';
                        fila = fila + '</td></tr>';
                        $("#tablaEx tbody").append(fila);
                    });
                    $("#tablaEx").dataTable({
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
                    $("#tablaEx").hide();
                }

            },
        });
}


$(document).ready(function () {

    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy/mm/dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $(function () {
        $("#fecha").datepicker();
    });

    llenarTablaInv();
    listProv();
    listProd();
    $("#tablaEx").hide();


    $(document).on("click","#rest",function () {
        llenarTablaCompras();
        $("#frmCompras").modal("show");
    });

    $(document).on("click",".add1",function () {
        $("#agregarInventario").modal("hide");
        $("#addEx").modal("show");

    });

    $(document).on("click","#addInv",function () {
        $("#agregarInventario").modal("show");

        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();

        $("#cancelar").show();
        $("#next").show();
        $("#end").hide();

        });


    $(document).on("click","#next",function () {
        event.preventDefault();
        var datos = $("#frmCompra").serializeArray();
        $.ajax({
            url:"Inventario/insertarCompras",
            type:"POST",
            data: datos
        }).done(function (res) {
            localStorage.setItem("idCompra",res);

            $("#cancelar").hide();
            if($("#paso1").show()) {
                $("#paso1").hide();
                $("#paso2").show();
                $("#paso3").hide();
                $("#next").show();
                $("#end").hide();

            }

        })

    });


     $(document).on("click","#addExistentes",function () {
            event.preventDefault();
            var datosEx = $("#frmEx").serializeArray();
            let idCompra = localStorage.getItem("idCompra");
            $.ajax({
                url:"Inventario/insertarDetalle",
                type:"POST",
                data: {datosEx,idCompra},
            }).done(function (res) {
                    localStorage.setItem("idDetalle",res);
                $("#agregarInventario").modal("show");
                $("#addEx").modal("hide");
                $('#frmEx')[0].reset();
                llenarTablaEx();
            })
     });


    $(document).on("click",".btnEditarEx",function ()  {
        listProvEditarEx();
        var id= $(this).attr("id");

        $.ajax({
            url: "Inventario/mostrarEx",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {

                var datos = JSON.parse(data);
                $("#selectProdE").val(datos[0].idProveedor);
                $("#cantidadE").val(datos[0].cantidad);

            })
            .fail(function () {

            })
        $("#EditarEx").modal("show");

    })




    }); //.Ready


/* $(document).on("click","#next",function () {
               $("#paso1").hide();
               $("#paso2").hide();
               $("#paso3").show();

               $("#next").hide();
               $("#end").show();
           });*/