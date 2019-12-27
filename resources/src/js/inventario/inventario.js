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
                    fila=fila + val.cantidad + '</div></td><td>';
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
        for(var i = 0;i<r.length;i++){
            $("#selectProv").append("<option value='"+r[i].idProveedor+"'>"+r[i].nombre+"</option>");
        }
    });
}

$(document).ready(function () {
    llenarTablaInv();
    listProv();

    $(document).on("click","#addInv",function () {
        $("#agregarInventario").modal("show");
    })

    $(document).on("click","#rest",function () {
        llenarTablaCompras();
    })

    $(document).on("click","#rest",function () {
        $("#frmCompras").modal("show");
    })


    $("#p1").hide();
    $("#p2").hide();

    $(document).on("click","#btn1",function () {
        $("#p2").show();
        $("#p1").hide();
    })

    $(document).on("click","#btn2",function () {
        $("#p1").show();
        $("#p2").hide();
    })


})