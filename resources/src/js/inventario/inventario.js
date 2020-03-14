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
                var nMayor=0;
                $.each(data, function (key,val) {
                        var fila ='<tr><td><div align="center">';
                        fila=fila + val.fecha + '</div></td><td>';
                        fila=fila + val.subtotal + '</div></td><td>';
                        fila=fila + val.nombre + '</td>';
                        fila = fila +  '<td> <a class="btn btn-outline-dark btnVer" id="'+val.idCompras+'"><i class="far fa-eye"></i></a>';
                       /* if(nMayor<val.idCompras)
                        {
                            nMayor=val.idCompras;
                            fila = fila +  '&nbsp;<a class="btn btn-outline-info btnEditarCompra" id="'+val.idCompras+'"><i class="fas fa-marker"></i></a>\n' +
                                '                     <a class="btn btn-outline-danger btnEliminarCompra"id="'+val.idCompras+'"><i class="far fa-trash-alt"></i></a>';
                        }*/
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
                    fila=fila + val.nombre + '</div></td><td>';
                    fila=fila + val.stock + '</div></td><td>';
                    fila=fila + "$"+val.precio + '</div></td><td>';
                    fila=fila + "$"+(val.precio*val.stock).toFixed(2) + '</div></td><td>';
                    fila=fila + val.descripcion + '</div></td>';
                    fila = fila +  '<td> <a class="btn btn-outline-info btnEditarInv" id="'+val.idInventario+'"><i class="fas fa-marker"></i></a>\n' +
                        '                     <a class="btn btn-outline-danger btnEliminarInv"id="'+val.idInventario+'"><i class="far fa-trash-alt"></i></a>';
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
        for(var i = 0;i<r.length;i++){
            $("#selectProv").append("<option value='"+r[i].idProveedor+"'>"+r[i].nombre+"</option>");
        }
    });
    $("#selectProv").select2({
        width: "100%"
    });
}


function listProd(){
    let idP = localStorage.getItem("idProveedor");
    $.post("Inventario/mostrarProd",{idProveedor:idP},function(res){
        var r = JSON.parse(res);
        $("#selectProd option").remove();
        for(var i = 0;i<r.length;i++){
            $("#selectProd").append("<option value='"+r[i].idInventario+"'>"+r[i].nombreInv+"</option>");
        }
    });
}


function listProvEditarEx(){
    let idP = localStorage.getItem("idProveedor");
    $.post("Inventario/mostrarProdEdit",{idProveedor:idP},function(res){
        var d = JSON.parse(res);
        $("#selectProdE option").remove();
        for(var i = 0;i<d.length;i++){
            $("#selectProdE").append("<option value='"+d[i].idInventario+"'>"+d[i].nombreInv+"</option>");
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
                if(data!=""){
                    $("#tabla2").show();
                    $("#tablaEx").show();
                    $("#tablaEx").dataTable().fnDestroy();
                    $("#tablaEx tbody tr").remove();
                    $.each(data, function (key,val) {
                        var fila ='<tr><td><div align="center">';
                        fila=fila + val.nombreInv + '</div></td><td>';
                        fila=fila + val.cantidad + '</div></td><td>';
                        if(val.newPrecio>0)
                        {
                            fila=fila + "$"+val.newPrecio + '</div></td>';
                        }
                        else
                        {
                            fila=fila + "Mismo Precio" + '</div></td>';
                        }
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
                    $("#tabla2").hide();
                }

            },
        });
}

function llenarTablaNew()
{

    let idCompra = localStorage.getItem("idCompra");
    $.ajax(
        {
            url:"Inventario/mostrarNew",
            type: "POST",
            data: {idCompra},
            success:function (res) {
                let data = JSON.parse(res);
                if(data!=""){
                    $("#tabla1").show();
                    $("#tablaNew").show();
                    $("#tablaNew").dataTable().fnDestroy();
                    $("#tablaNew tbody tr").remove();
                    $.each(data, function (key,val) {
                        var fila ='<tr><td><div align="center">';
                        fila=fila + val.nombreInv + '</div></td><td>';
                        fila=fila + val.stock + '</div></td><td>';
                        fila=fila + "$"+val.precio + '</div></td><td>';
                        fila=fila + val.descripcion + '</div></td>';
                        fila = fila +  '<td> <a class="btn btn-outline-info btnEditarNew" id="'+val.idInventario+'"><i class="fas fa-marker"></i></a>\n' +
                            '                     <a class="btn btn-outline-danger btnEliminarNew"id="'+val.idInventario+'"><i class="far fa-trash-alt"></i></a>';
                        fila = fila + '</td></tr>';
                        $("#tablaNew tbody").append(fila);
                    });
                    $("#tablaNew").dataTable({
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
                    $("#tabla1").hide();
                }

            },
        });
}


$(document).ready(function () {

    $(".positive").numeric({ negative: false }, function() { alert("No negative values"); this.value = ""; this.focus(); });

    $(".integer").numeric(false, function() { alert("Integers only"); this.value = ""; this.focus(); });

    /*
    //Validar Letras
    $('.soloLetra').keypress(function (e) {
        var tecla = document.all ? tecla = e.keyCode : tecla = e.which;
        return !((tecla > 47 && tecla < 58) || tecla == 46);
    });
*/
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
    listProvEditarEx();

    $("#tabla1").hide();
    $("#tabla2").hide();
    $("#next1").show();
    $("#next2").hide();

    $(document).on("click","#compras",function () {
        llenarTablaCompras();
        $("#frmCompras").modal("show");
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


    $(document).on("click","#next1",function () {
        var fecha = $("#fecha").val();
        var sub = $("#subTotal").val();

        if(fecha == ""){
            $("#msjFecha").fadeIn("slow");
            return false;
        }
        else {
            $("#msjFecha").fadeOut();

            if(sub == ""){
                $("#msjSub").fadeIn("slow");
                return false;
            }
            else {
                $("#msjSub").fadeOut();


       event.preventDefault();
       var datos = $("#frmCompra").serializeArray();
       var proveedor= $("#selectProv").val();
       localStorage.setItem("idProveedor",proveedor);
       $.ajax({
           url:"Inventario/insertarCompras",
           type:"POST",
           data: datos
       }).done(function (res) {
           localStorage.setItem("idCompra",res);
           let idProveedor = localStorage.getItem("idProveedor");
           llenarTablaEx();
           llenarTablaNew();
           $.ajax({
               url:"Inventario/validarProdExi",
               type:"POST",
               data: {idProveedor:idProveedor}
           }).done(function (r) {
               let re = JSON.parse(r);
               if(re==true) {

                   listProd();
                   listProvEditarEx();


                   $("#cancelar").hide();

                   $("#paso1").hide();
                   $("#paso2").show();
                   $("#paso3").hide();

                   $("#next1").hide();
                   $("#next2").show();
                   $("#end").hide();

               }
               else if(re==false){
                   $("#paso1").hide();
                   $("#paso2").hide();
                   $("#paso3").show();

                   $("#next1").hide();
                   $("#next2").hide();
                   $("#end").show();

               }
           })


       })



            }
        }

    });

    $(document).on("click",".add1",function () {
        $("#agregarInventario").modal("hide");
        $("#addEx").modal("show");

    });


    //CRUD PRODUCTOS EXISTENTES


     $(document).on("click","#addExistentes",function () {

         var cantd = $("#cantidad").val();

         if(cantd == ""){
             $("#msjCantd").fadeIn("slow");
             return false;
         }
         else {
             $("#msjCantd").fadeOut();

             event.preventDefault();
             var datosEx = $("#frmEx").serializeArray();
             let idCompra = localStorage.getItem("idCompra");
             $.ajax({
                 url:"Inventario/validarDetalle",
                 type:"POST",
                 data: {datosEx,idCompra},
             }).done(function (res) {
                 let r = JSON.parse(res);
                 var rol=0;
                 if(r==false)
                 {
                     $("#addEx").modal("hide");
                     $("#siCamb").hide();
                     $("#btnSiCambiar").hide();
                     $("#cambiPrecio").show();
                     $("#modalCambiarPrecio").modal("show");


                 }
                 else if(r==true)
                 {
                     rol=2;
                     $.ajax({
                         url:"Inventario/insertarDetalle",
                         type:"POST",
                         data: {datosEx,idCompra,rol},
                     }).done(function () {
                         $("#agregarInventario").modal("show");
                         $("#addEx").modal("hide");
                         $('#frmEx')[0].reset();
                         llenarTablaEx();
                     })

                 }

             })

         }

     });


    $(document).on("click","#siCambiar",function () {
        $("#siCamb").show();
        $("#cambiPrecio").hide();
        $("#btnSiCambiar").show();
    });

    $(document).on("click","#btnSiCambiar",function () {

        var precioNew = $("#precioNew").val();

        if(precioNew == ""){
            $("#msjCambiarPrecio").fadeIn("slow");
            return false;
        }
        else {
            $("#msjCambiarPrecio").fadeOut();

            var newPrecio = $("#precioNew").val();
            var datosEx = $("#frmEx").serializeArray();
            let idCompra = localStorage.getItem("idCompra");
            rol = 1;
            $.ajax({
                url: "Inventario/insertarDetalle",
                type: "POST",
                data: {datosEx, idCompra, rol, newPrecio},
            }).done(function (res) {
                localStorage.setItem("idDetalle", res);
                $("#agregarInventario").modal("show");
                $("#addEx").modal("hide");
                $('#frmEx')[0].reset();
                $("#modalCambiarPrecio").modal("hide");
                llenarTablaEx();
            })

        }
    });


    $(document).on("click","#noCambiar",function () {
        $("#modalCambiarPrecio").modal("hide");
        var newPrecio= 0;
        var datosEx = $("#frmEx").serializeArray();
        let idCompra = localStorage.getItem("idCompra");
        rol=1;
        $.ajax({
            url:"Inventario/insertarDetalle",
            type:"POST",
            data: {datosEx,idCompra,rol,newPrecio},
        }).done(function (res) {
            localStorage.setItem("idDetalle",res);
            $("#agregarInventario").modal("show");
            $("#addEx").modal("hide");
            $('#frmEx')[0].reset();
            llenarTablaEx();
        })
    });




    $(document).on("click",".btnEditarEx",function ()  {

        var id= $(this).attr("id");

        $.ajax({
            url: "Inventario/mostrarEx",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {
                
                var datos = JSON.parse(data);
                $("#txtIdExit").val(datos[0].idDetalleInvCompra);
                $("#selectProdE").val(parseInt(datos[0].idInventario));
                $("#cantidadE").val(datos[0].cantidad);
                if(datos[0].newPrecio!=null)
                {
                    $("#inputNewPrecio").show();
                    $("#newPrecioE").val(datos[0].newPrecio);
                }
                else
                {
                 $("#inputNewPrecio").hide();
                }


            })
            .fail(function () {

            })
        $("#EditarEx").modal("show");

    });


    $(document).on("click","#editarExistentes",function () {
        var cantd = $("#cantidadE").val();
        var precio = $("#newPrecioE").val();

        if(cantd == ""){
            $("#msjCantdE").fadeIn("slow");
            return false;
        }
        else {
            $("#msjCantdE").fadeOut();

            if (precio == "") {
                $("#msjCambiarPrecioE").fadeIn("slow");
                return false;
            }
            else {
                $("#msjCambiarPrecioE").fadeOut();

                event.preventDefault();
                var datosEx = $("#frmExEdit").serializeArray();
                $.ajax({
                    url: "Inventario/modifiicarDetalle",
                    type: "POST",
                    data: datosEx,
                }).done(function (res) {
                    $("#EditarEx").modal("hide");
                    $('#frmExEdit')[0].reset();
                    llenarTablaEx();
                })
            }
        }
    });



    $(document).on("click",".btnEliminarEx",function ()  {

        var id= $(this).attr("id");

        $.ajax({
            url: "Inventario/eliminarEx",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {

                llenarTablaEx();
            })
            .fail(function () {

            })
        llenarTablaEx();
    });



    $(document).on("click","#next2",function () {
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").show();

        $("#next1").hide();
        $("#next2").hide();
        $("#end").show();
     });


    $(document).on("click",".add2",function () {
        $("#agregarInventario").modal("hide");
        $("#addNew").modal("show");

    });



        //CRUD PRODUCTOS NUEVOS

    $(document).on("click","#addNuevos",function () {

        var nombre = $("#nombreNuevo").val();
        var precio = $("#precioNuevo").val();
        var cantd = $("#cantNuevo").val();
        var desc = $("#descNuevo").val();

        if(nombre == ""){
            $("#msjNombreNuevo").fadeIn("slow");
            return false;
        }
        else {
            $("#msjNombreNuevo").fadeOut();


            if(precio == ""){
                $("#msjPrecioNuevo").fadeIn("slow");
                return false;
            }
            else {
                $("#msjPrecioNuevo").fadeOut();

                if(cantd == ""){
                    $("#msjCantNuevo").fadeIn("slow");
                    return false;
                }
                else {
                    $("#msjCantNuevo").fadeOut();

                    if(desc == ""){
                        $("#msjDescNuevo").fadeIn("slow");
                        return false;
                    }
                    else {
                        $("#msjDescNuevo").fadeOut();

                        event.preventDefault();
                        var datosNew = $("#frmNew").serializeArray();
                        let idProveedor = localStorage.getItem("idProveedor");
                        let idCompra = localStorage.getItem("idCompra");
                        $.ajax({
                            url:"Inventario/insertarNuevo",
                            type:"POST",
                            data: {datosNew,idProveedor,idCompra},
                        }).done(function (res) {
                            localStorage.setItem("idNewProdu",res);

                            let idNewProdu = localStorage.getItem("idNewProdu");
                            $.ajax({
                                url:"Inventario/insertarNuevoADetalle",
                                type:"POST",
                                data: {datosNew,idCompra,idNewProdu},
                            }).done(function () {
                                $("#agregarInventario").modal("show");
                                $("#addNew").modal("hide");
                                $('#frmNew')[0].reset();
                                llenarTablaNew();

                            })

                            $("#agregarInventario").modal("show");
                            $("#addNew").modal("hide");
                            $('#frmNew')[0].reset();
                            llenarTablaNew();
                        })

                    }
                }
            }
        }

    });




    $(document).on("click",".btnEditarNew",function ()  {

        var id= $(this).attr("id");

        $.ajax({
            url: "Inventario/mostrarNuevo",
            type: "post",
            data: {id: id}
        })
            .done(function (data) {

                var datos = JSON.parse(data);
                $("#txtIdNew").val(datos[0].idInventario);
                $("#nombreNuevoE").val(datos[0].nombreInv);
                $("#precioNuevoE").val(datos[0].precio);
                $("#cantNuevoE").val(datos[0].stock);
                $("#descNuevoE").val(datos[0].descripcion);
            })
            .fail(function () {

            })
        $("#editarNew").modal("show");

    });

    $(document).on("click","#editNuevos",function () {
        var nombre = $("#nombreNuevoE").val();
        var precio = $("#precioNuevoE").val();
        var cantd = $("#cantNuevoE").val();
        var desc = $("#descNuevoE").val();

        if(nombre == ""){
            $("#msjNombreNuevoE").fadeIn("slow");
            return false;
        }
        else {
            $("#msjNombreNuevoE").fadeOut();


            if(precio == ""){
                $("#msjPrecioNuevoE").fadeIn("slow");
                return false;
            }
            else {
                $("#msjPrecioNuevoE").fadeOut();

                if(cantd == ""){
                    $("#msjCantNuevoE").fadeIn("slow");
                    return false;
                }
                else {
                    $("#msjCantNuevoE").fadeOut();

                    if(desc == ""){
                        $("#msjDescNuevoE").fadeIn("slow");
                        return false;
                    }
                    else {
                        $("#msjDescNuevoE").fadeOut();

                        event.preventDefault();
                        var datosNew = $("#frmNewEdit").serializeArray();
                        $.ajax({
                            url:"Inventario/modifiicarNuevo",
                            type:"POST",
                            data: datosNew,
                        }).done(function (res) {
                            $("#editarNew").modal("hide");
                            $('#frmNewEdit')[0].reset();
                            llenarTablaNew();
                        })

                    }
                }
            }
        }

    });



    $(document).on("click",".btnEliminarNew",function ()  {

        var id= $(this).attr("id");
        let idCompra = localStorage.getItem("idCompra");

        $.ajax({
            url: "Inventario/eliminarNew",
            type: "post",
            data: {id: id,idCompra:idCompra}
        })
            .done(function (data) {

                llenarTablaNew();
            })
            .fail(function () {

            })
        llenarTablaNew();
    });



    $(document).on("click","#end",function () {
        let idCompra = localStorage.getItem("idCompra");
        $.ajax({
            url:"inventario/mostrarProdCompra",
            type:"POST",
            data: {idCompra:idCompra}
        }).done(function(res){
            const data = JSON.parse(res);
            if(data!="")
            {
                for(let i=0;i<data.length;i++){
                    $.ajax({
                        url:"inventario/actualizarStock",
                        type:"POST",
                        data:{idCompra:idCompra, idInventario:data[i].idInventario}
                    }).done(function(res){
                        Swal.fire(
                            'Inventario',
                            'Compra Registrada Exitosamente!',
                            'success'
                        );
                        llenarTablaInv();
                        llenarTablaCompras();
                        $('#frmCompra')[0].reset();
                        llenarTablaEx();
                        llenarTablaNew();
                        $("#next1").show();
                        $("#agregarInventario").modal("hide");
                    });
                }
            }
            else
            {
                $.ajax({
                    url:"inventario/eliminarCompra",
                    type:"POST",
                    data:{idCompra:idCompra}
                }).done(function () {
                    Swal.fire(
                        'Inventario',
                        'No ingresaste ningun Producto!',
                        'error'
                    );
                    llenarTablaInv();
                    llenarTablaCompras();
                    $('#frmCompra')[0].reset();
                    llenarTablaEx();
                    llenarTablaNew();
                    $("#next1").show();
                    $("#agregarInventario").modal("hide");
                })
            }

        })
    });



    //Para Botones Cancelar

    $(document).on("click","#cancelarAddEx",function () {
        $("#agregarInventario").modal("show");
        $("#addEx").modal("hide");

    });

    $(document).on("click","#cancelarEditEx",function () {
        $("#agregarInventario").modal("show");
        $("#EditarEx").modal("hide");

    });

    $(document).on("click","#cancelarAddNew",function () {
        $("#agregarInventario").modal("show");
        $("#addNew").modal("hide");

    });


    }); //.Ready


//Para CRUD TALA INV

$(document).on("click",".btnEditarInv",function ()  {

    var id= $(this).attr("id");

    $.ajax({
        url: "Inventario/mostrarNuevo",
        type: "post",
        data: {id: id}
    })
        .done(function (data) {

            var datos = JSON.parse(data);
            $("#txtIdInv").val(datos[0].idInventario);
            $("#nombreInvE").val(datos[0].nombreInv);
            $("#precioInvE").val(datos[0].precio);
            $("#cantInvE").val(datos[0].stock);
            $("#descInvE").val(datos[0].descripcion);
        })
        .fail(function () {

        })
    $("#editarInv").modal("show");

});

$(document).on("click","#editInv",function () {
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

        var datosNew = $("#frmEditInv").serializeArray();
        $.ajax({
            url:"Inventario/modifiicarInv",
            type:"POST",
            data: datosNew,
        }).done(function (res) {
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
                title: 'Producto Modificado con Exito'
            });
        });
        $("#editarInv").modal("hide");
        $('#frmEditInv')[0].reset();
        llenarTablaInv();

    }
})

});




$(document).on("click",".btnEliminarInv",function ()  {

    Swal.fire({
        title: '¿Estás seguro de Eliminar el Producto?',
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
            url: "Inventario/eliminarInv",
            type: "post",
            data: {id: id}
        })

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
            title: 'Producto Eliminado con Exito'
        });
        llenarTablaInv();
    }
});

});



$(document).on("click",".btnVer",function ()  {

    $("#frmDetalleCompra").modal("show");
    $("#frmCompras").modal("hide");
    var id= $(this).attr("id");
    llenarTablaExCompra(id);
    llenarTablaNewCompra(id);

});

$(document).on("click","#cancelarDetalleCompra",function ()  {
    $("#frmCompras").modal("show");
    $("#frmDetalleCompra").modal("hide");
});



function llenarTablaExCompra(id)
{
    let idCompra = id;
    $.ajax(
        {
            url:"Inventario/mostrarExt",
            type: "POST",
            data: {idCompra},
            success:function (res) {
                let data = JSON.parse(res);
                if(data!=""){
                    $("#compra1").show();
                    $("#tablaDetalle1").show();
                    $("#tablaDetalle1").dataTable().fnDestroy();
                    $("#tablaDetalle1 tbody tr").remove();
                    $.each(data, function (key,val) {
                        var fila ='<tr><td><div align="center">';
                        fila=fila + val.nombreInv + '</div></td><td>';
                        fila=fila + val.cantidad + '</div></td><td>';
                        if(val.newPrecio>0)
                        {
                            fila=fila + "$"+val.newPrecio + '</div></td>';
                        }
                        else
                        {
                            fila=fila + "Mismo Precio" + '</div></td>';
                        }
                        fila = fila + '</tr>';
                        $("#tablaDetalle1 tbody").append(fila);
                    });
                    $("#tablaDetalle1").dataTable({
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
                    $("#compra1").hide();
                }

            },
        });
}

function llenarTablaNewCompra(id)
{

    let idCompra = id;
    $.ajax(
        {
            url:"Inventario/mostrarNew",
            type: "POST",
            data: {idCompra},
            success:function (res) {
                let data = JSON.parse(res);
                if(data!=""){
                    $("#compra2").show();
                    $("#tablaDetalle2").show();
                    $("#tablaDetalle2").dataTable().fnDestroy();
                    $("#tablaDetalle2 tbody tr").remove();
                    $.each(data, function (key,val) {
                        var fila ='<tr><td><div align="center">';
                        fila=fila + val.nombreInv + '</div></td><td>';
                        fila=fila + val.stock + '</div></td><td>';
                        fila=fila + "$"+val.precio + '</div></td><td>';
                        fila=fila + val.descripcion + '</div></td>';
                        fila = fila + '</tr>';
                        $("#tablaDetalle2 tbody").append(fila);
                    });
                    $("#tablaDetalle2").dataTable({
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
                    $("#compra2").hide();
                }

            },
        });
}