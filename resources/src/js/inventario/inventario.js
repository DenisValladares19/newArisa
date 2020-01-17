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
        $("#selectProv option").remove();
        $("#selectProv").append("<option>Elige el Proveedor</option>");
        for(var i = 0;i<r.length;i++){
            $("#selectProv").append("<option value='"+r[i].idProveedor+"'>"+r[i].nombre+"</option>");
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

function btnNext(){

    $("#cancelar").hide();
    $("#back").show();

    if($("#paso1").show()) {
        $("#paso1").hide();
        $("#paso2").show();
        $("#paso3").hide();
        $("#next").show();
        $("#end").hide();

        $(document).on("click","#next",function () {
                $("#paso1").hide();
                $("#paso2").hide();
                $("#paso3").show();

                $("#next").hide();
                $("#end").show();

        $(document).on("click","#back",function () {
                btnBack();

            });

        });

    }

}

function btnBack(){
    $("#next").show();
    $("#end").hide();

    if($("#paso3").show()){
        $("#paso1").hide();
        $("#paso2").show();
        $("#paso3").hide();

        $("#cancelar").hide();
        $("#back").show();


        $(document).on("click","#back",function () {
                $("#paso1").show();
                $("#paso2").hide();
                $("#paso3").hide();

                $("#cancelar").show();
                $("#back").hide();


            $(document).on("click","#next",function () {
               btnNext();

            });

        });

    }





}


$(document).ready(function () {
    llenarTablaInv();
    listProv();
    listProd();

    $(document).on("click","#addInv",function () {
        $("#agregarInventario").modal("show");

        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();

        $("#cancelar").show();
        $("#back").hide();
        $("#next").show();
        $("#end").hide();


        $(document).on("click","#next",function () {
            btnNext();

        });

        $(document).on("click","#back",function () {
           btnBack();
        })

    });

    $(document).on("click","#rest",function () {
        llenarTablaCompras();
    });

    $(document).on("click","#rest",function () {
        $("#frmCompras").modal("show");
    });





    $('.add1').click(function(){

        $(".list1").append(
            '<div class="mb-2 row justify-content-between px-3">\n' +
            '<div class="mob"> <label class="text-grey mr-1">Producto</label> <select id="selectProd">'+ listProd() +'</select> </div>\n' +
            '<div class="mob mb-2"> <label class="text-grey mr-4">Cantidad</label> <input type="number" min="1"> </div>\n' +
            '<div class="mt-1 cancel fa fa-times text-danger"></div>\n' +
            '</div>');
        listProd();
    });

    $(".list1").on('click', '.cancel', function(){
        $(this).parent().remove();
    });

    $('.add2').click(function(){

        $(".list2").append(
            '<div class="mb-2 row justify-content-between px-3">\n' +
            '<div class="mob"><label class="text-grey mr-2">Nombre</label><input type="text"></div>\n' +
            '<div class="mob mb-2"> <label class="text-grey mr-2">Cantidad</label> <input type="number" min="1"> </div>\n' +
            '<div class="mt-1 cancel fa fa-times text-danger"></div>\n' +
            '<div class="mob"> <label class="text-grey mr-2">Precio</label> <input type="text"> </div>\n' +
            '<div class="mb-0"> <label class="text-grey mr-2">Descripcion</label> <input type="text"></div>\n' +
            '<div class="mt-1"></div>\n' +
            '</div><br>');
        listProd();
    });

    $(".list2").on('click', '.cancel', function(){
        $(this).parent().remove();
    });

})