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

        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();

        $("#cancelar").show();
        $("#back").hide();
        $("#next").show();


        $(document).on("click","#next",function () {

          $("#paso1").hide();
          $("#paso2").show();
          $("#paso3").hide();

            $("#cancelar").hide();
            $("#back").show();

            var fecha=document.getElementById("fecha").value;
            var idProveedor=document.getElementById("selectProv").value;
            var subTotal=document.getElementById("subTotal").value;





            /*var $infoCompra=new Array();

            $infoCompra["fecha"]=document.getElementById("fecha").value;
            $infoCompra["idProveedor"]=document.getElementById("selectProv").value;
            $infoCompra["subTotal"]=document.getElementById("subTotal").value;
            */

        })

        $(document).on("click","#back",function () {
            $("#paso1").show();
            $("#paso2").hide();
            $("#paso3").hide();

            $("#cancelar").show();
            $("#back").hide();
        })

    })

    $(document).on("click","#rest",function () {
        llenarTablaCompras();
    })

    $(document).on("click","#rest",function () {
        $("#frmCompras").modal("show");
    })



})