let a = 0;

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
        $("#fechaI").datepicker();
    });

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
        $("#fechaE").datepicker();
    });
    
    $(document).on("click", "#agregarCliente", function () {
        $.ajax({
            url:"cotizacion/getUltimoId",
            type:"POST"
        }).done(function(res){
            let data = JSON.parse(res);
            $("#nCot").html(parseInt(data[0].idCotizacion)+1);
        });
        $("#frmInsertarCliente").modal("show");
    });

    $("#formModalEditar").show("true");
       
    $("#clienteI").select2({
        width: "100%"
    });
     
    $("#divDesc").hide('true');
    llenarEstado();
    llenarCLientes();
    llenarCotizacion();
    
    /*$(document).on("click",".editar",function(e){
        e.preventDefault();
        $("#frmEditDesc").modal("show");
        var id = $(this).attr("data-idDetalle");
        $.ajax({
            url:"cotizacion/getDescripcionEdit",
            type:"POST",
            dataType:"JSON",
            data:{id:id},
            error:function(jqXHR,status,exception){
                console.log(status+exception);
                console.warn(jqXHR.responseText);
            }
        }).done(function(res){
            var data = JSON.parse(JSON.stringify(res));
            $("#descE").val(data[0].descripcion);
            $("#cantE").val(data[0].cantidad);
            $("#PrecioE").val(data[0].precio);
            $("#idDescE").val(data[0].idDetalle);
        });
    });*/

    $(document).on("click",".editar",function(e){
        e.preventDefault();
        let modal = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        if(modal.getAttribute("role") === "dialog"){
            $("#frmEditDesc").modal("show");
            $(`#${modal.getAttribute("id")}`).modal("hide");
            localStorage.setItem("idModal", modal.getAttribute("id"));
        
        
        var id = $(this).attr("data-idDetalle");
        $.ajax({
            url:"cotizacion/getDescripcionEdit",
            type:"POST",
            dataType:"JSON",
            data:{id:id},
            error:function(jqXHR,status,exception){
                console.log(status+exception);
                console.warn(jqXHR.responseText);
            }
        }).done(function(res){
            var data = JSON.parse(JSON.stringify(res));
            $("#descE").val(data[0].descripcion);
            $("#cantE").val(data[0].cantidad);
            $("#totalE").val(data[0].total);
            $("#idDescE").val(data[0].idDetalle);
        });
    }
    });

    $(document).on("click","#btnGuardarE",function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Descripción',
            text: "Realmente desea modificar esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, modificaló!'
          }).then((result) => {
            if (result.value) {
                var data = $("#frmDescE").serializeArray();
                let idDesc = localStorage.getItem("idDesc");
                $.ajax({
                    url:"cotizacion/updateDescripcion",
                    type:"POST",
                    dataType:"JSON",
                    data:{data,idDesc},
                    error:function(jqXHR,status,exception){
                        console.log(status+exception);
                        console.warn(jqXHR.responseText);
                    }
                }).done(function(res){
                    Swal.fire(
                        'Descripción',
                        'Se modifico exitosamente',
                        'success'
                      )
                      llenarDescripcion2();
                      $("#frmEditDesc").modal("hide");
                      $(`#${localStorage.getItem("idModal")}`).modal("show"); 
                })
            }
          })
    });

    $(document).on("click",".elimina",function(e){
        e.preventDefault();
        var id = $(this).attr("data-idDetalle");
        let idDesc = localStorage.getItem("idDesc");
        Swal.fire({
            title: 'Descripción',
            text: "Realmente desea eliminar esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminaló!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"cotizacion/deleteDescDetalle",
                    type:"POST",
                    data:{id:id,idDesc:idDesc},
                    error:function(jqXHR,status,exception){
                        console.log(status+exception);
                        console.warn(jqXHR.responseText);
                    }
                }).done(function(res){
                    Swal.fire(
                        'Descripción',
                        'Se elimino exitosamente',
                        'success'
                      )
                      llenarDescripcion();
                      $("#frmEditDesc").modal("hide"); 
                })
            }
          })
    });
    $(document).on("click",".eliminarCot",function(e){
        e.preventDefault();
        var id = $(this).attr("data-idDetalle");
        let idDesc = localStorage.getItem("idDesc");
        Swal.fire({
            title: 'Descripción',
            text: "Realmente desea eliminar esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminaló!'
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"cotizacion/deleteDescDetalle",
                    type:"POST",
                    data:{id:id,idDesc:idDesc},
                    error:function(jqXHR,status,exception){
                        console.log(status+exception);
                        console.warn(jqXHR.responseText);
                    }
                }).done(function(res){
                    Swal.fire(
                        'Descripción',
                        'Se elimino exitosamente',
                        'success'
                      )
                      llenarDescripcion2();
                      $("#frmEditDesc").modal("hide"); 
                })
            }
          })
    });

    $(document).on("click","#btnGuardar",function(e){
        e.preventDefault();
        let idCotizacion = localStorage.getItem("idCotizacion");
        let idDesc = localStorage.getItem("idDesc");
        $.ajax({
            url:"cotizacion/getDescripcion",
            type:"POST",
            data:{idCotizacion,idDesc},
            error:function(jqXHR,status,exception){
                console.log(status+exception);
                console.warn(jqXHR.responseText);
            }
        }).done(function(res){
            var data = JSON.parse(res);
            if(data["desc"]!=""){
                
                /*Swal.fire({
                    title: 'Cotización',
                    text: "Esta cotización esta aprobada?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Aprobala!'
                  }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url:"cotizacion/updateEstado",
                            type:"POST",
                            data:{idCotizacion:idCotizacion},
                            error:function(jqXHR,status,exception){
                                console.log(status+exception);
                                console.warn(jqXHR.responseText);
                            }
                        }).done(function(res){
                            llenarCotizacion();
                        })
                    }
                  })*/

                  Swal.fire(
                    'Cotización',
                    'Se guardo exitosamente!',
                    'success'
                );
                $("#inputDesc").show();

                  $("#frmInsertarCliente").modal("hide");
                llenarCotizacion();
                limpiarCot();
                
            }else{
                var id = localStorage.getItem("idCotizacion");
                $.ajax({
                    url:"cotizacion/deleteCotizacion",
                    type:"POST",
                    data:{id:id},
                    error:function(jqXHR,status,exception){
                        console.log(status+exception);
                        console.warn(jqXHR.responseText);
                    }
                });
                Swal.fire(
                    'Descripción',
                    'No se pudo guardar la cotización por falta de descripción',
                    'warning'
                );
                $("#frmInsertarCliente").modal("hide");
                limpiarCot();
            }
        });
    });
});
$(document).on("click","#btnGuardarEdit",function(e){
    e.preventDefault();
    let idCotizacion = localStorage.getItem("idCotizacion");
    let idDesc = localStorage.getItem("idDesc");
    $.ajax({
        url:"cotizacion/getDescripcion",
        type:"POST",
        data:{idCotizacion,idDesc},
        error:function(jqXHR,status,exception){
            console.log(status+exception);
            console.warn(jqXHR.responseText);
        }
    }).done(function(res){
        var data = JSON.parse(res);
        if(data["desc"]!=""){
            Swal.fire(
                'Cotización',
                'Se guardo exitosamente la cotización',
                'success'
            )
            $("#modalCotizacionEditar").modal("hide");
            llenarCotizacion();
            $("#formModalEditar").show("true");
        }else{
            var id = localStorage.getItem("idCotizacion");
            $.ajax({
                url:"cotizacion/deleteCotizacion",
                type:"POST",
                data:{id:id},
                error:function(jqXHR,status,exception){
                    console.log(status+exception);
                    console.warn(jqXHR.responseText);
                }
            });
            Swal.fire(
                'Descripción',
                'No se pudo guardar la cotización por falta de descripción',
                'warning'
            );
            $("#modalCotizacionEditar").modal("hide");
            $("#formModalEditar").show("true");
        }
    });
});


$(document).on("click","#addDes",function(){
    let form = $("#formModal").serializeArray();
    if(a==0){
        $.ajax({
            url:"cotizacion/insertarCotizacion",
            type:"POST",
            data:form,
            dataType:'JSON',
            success: function(res){
                localStorage.setItem("idCotizacion",res);
            }
        });
      $("#formModal").hide();
      $("#divDesc").show("true");
    }
    a++;
    document.getElementById("nCaracter").innerHTML="0";
});
$(document).on("click","#addDes",function(){
    let form = $("#frmDesc").serializeArray();
    let idCotizacion = localStorage.getItem("idCotizacion");
    if(a===2){
        $.ajax({
            url:"cotizacion/insertarDesc",
            type:"POST",
            data:{form,idCotizacion},
            dataType:'JSON',
            success: function(res){
                localStorage.setItem("idDesc",res);
            }
        }).done(function(){
            limpiar();
            llenarDescripcion();
        });
    }
});

$(document).on("click","#addDes",function(){
    let form = $("#frmDesc").serializeArray();
    let idCotizacion = localStorage.getItem("idCotizacion");
    let idDesc = localStorage.getItem("idDesc");
    if(a>2 && a<=10){
        $.ajax({
            url:"cotizacion/insertarDescripcion",
            type:"POST",
            data:{form,idCotizacion,idDesc},
            dataType:'JSON'
        }).done(function(){
            limpiar();
            llenarDescripcion();
        });
    }
});


$(document).on("click","#addDes",function(){
    if(a>10){
        swal.fire(
            "Cotización",
            "Ha alcanzado el maximo de detalles",
            "warning"
        )
        $("#inputDesc").hide();
    }
});

$(document).on("click","#addDesEdit",function(){
    let form = $("#frmDescEditar").serializeArray();
    let idCotizacion = localStorage.getItem("idCotizacion");
    let idDesc = localStorage.getItem("idDesc");
        $.ajax({
            url:"cotizacion/insertarDescripcion",
            type:"POST",
            data:{form,idCotizacion,idDesc},
            dataType:'JSON'
        }).done(function(){
            limpiar2();
            llenarDescripcion2();
        });
});



$(document).on("click",".eliminarC",function(){
    var id = $(this).attr("data-idCot");
    Swal.fire({
        title: 'Cotización',
        text: "Realmente desea eliminar esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminaló!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"cotizacion/deleteCotizacion",
                type:"POST",
                data:{id:id},
                error:function(jqXHR,status,exception){
                    console.log(status+exception);
                    console.warn(jqXHR.responseText);
                }
            }).done(function(res){
                Swal.fire(
                    'Descripción',
                    'Se elimino exitosamente',
                    'success'
                  );
                  llenarCotizacion();
            })
        }
    })
}); 

$(document).on("click",".editarC",function(e){
    var idCotizacion = $(this).attr("data-idCot");
    var idDetalle = $(this).attr("data-idDetalle");
    var idDesc = $(this).attr("data-idDesc");
    localStorage.setItem("idCotizacion",idCotizacion);
    localStorage.setItem("idDesc",idDesc);
    $("#modalCotizacionEditar").modal("show");
    $("#frmDescEditar").hide("true");
    $("#estadoE").empty();
    $("#clienteE").empty();
    /*$("#clienteE").select2({
        width: "100%"
    });*/
    $.post("cotizacion/getAllEstados",{},function(res){
        var r = JSON.parse(res);   
        for(var i = 0;i<r.length;i++){
            $("#estadoE").append("<option value='"+r[i].idEstado1+"'>"+r[i].nombre+"</option>");
        }       
    });
    $.post("cotizacion/getAllCliente",{},function(res){
        var r = JSON.parse(res);   
        for(var i = 0;i<r.length;i++){
            $("#clienteE").append("<option value='"+r[i].idCliente+"'>"+r[i].empresa+" </option>");
        }       
    });

    $.ajax({
        url:"cotizacion/getCotizacion",
        type:"POST",
        data:{idCotizacion:idCotizacion}
    }).done(function(res){
        var data = JSON.parse(res);
        $("#clienteE").val(data[0].idCliente);
        $("#fechaE").val(data[0].fecha);
        $("#tipoE").val(data[0].idTipoImpresion);
        $("#estadoE").val(data[0].idEstado1);
        $("#descripcionE").val(data[0].descripcion);
    });
    
});

$(document).on("click","#btnCambios",function(e){
    e.preventDefault();
    var form = $("#formModalEditar").serializeArray();
    let idCotizacion = localStorage.getItem("idCotizacion");
    Swal.fire({
        title: 'Cotización',
        text: "Realmente desea modificar esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, modificalo!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:"cotizacion/updateCotizacion",
                type:"POST",
                data:{form:form,idCotizacion:idCotizacion},
                error:function(jqXHR,status,exception){
                    console.log(status+exception);
                    console.warn(jqXHR.responseText);
                }
            }).done(function(res){
                Swal.fire(
                    'Cotización',
                    'Se modifico exitosamente',
                    'success'
                  );
                  $("#modalCotizacionEditar").modal("hide");
                  $("#formModalEditar").hide("true");
                  $("#frmDescEditar").show("true");
                  llenarDescripcion2();
            });
        }
    })
});

$(document).on("click","#btnNext",function(e){
    e.preventDefault();
    $("#formModalEditar").hide("true");
    $("#frmDescEditar").show("true");
    llenarDescripcion2();
});

$(document).on("click",".printC",function(e){
    let idCotizacion = $(this).attr("data-idCot");
    let idDesc = $(this).attr("data-idDesc");
    window.open("cotizacion/reporte?c="+idCotizacion+"&d="+idDesc,"_back");
});


function llenarEstado(){
    $.post("cotizacion/getAllEstados",{},function(res){
        var r = JSON.parse(res);   
        for(var i = 0;i<r.length;i++){
            $("#estadoI").append("<option value='"+r[i].idEstado1+"'>"+r[i].nombre+"</option>");
        }       
    });
}

function llenarCLientes(){
    $.post("cotizacion/getAllCliente",{},function(res){
        var r = JSON.parse(res);   
        for(var i = 0;i<r.length;i++){
            $("#clienteI").append("<option value='"+r[i].idCliente+"'>"+r[i].empresa+"</option>");
        }       
    });
}

function llenarDescripcion(){
    let idCotizacion = localStorage.getItem("idCotizacion");
    let idDesc = localStorage.getItem("idDesc");
    $.ajax({
        url:"cotizacion/getDescripcion",
        type:"POST",
        data:{idCotizacion,idDesc},
        error:function(jqXHR,status,exception){
            console.log(status+exception);
            console.warn(jqXHR.responseText);
        }
    }).done(function (res){
        let data = JSON.parse(res);
        if(data!=null){
            if(data["desc"]!=""){
                var tabla = "<table id='tablaDescripcion' class='table table-bordered dataTable' width='100%'><thead style='background-color: rgba(11, 23, 41 , 0.6);'><tr><th>Descripción</th><th>Cantidad</th><th>Precio</th><th>Total</th><th>Acciones</th></tr></thead><tbody>";
                for(var i = 0;i<data["desc"].length;i++){
                    tabla += "<tr><td>"+data["desc"][i].descripcion+"</td><td>"+data["desc"][i].cantidad+"</td><td>$ "+data["desc"][i].precio+"</td><td>$ "+data["desc"][i].total+"</td><td><button class='btn btn-outline-info mr-1 editar' data-idDetalle='"+data["desc"][i].idDetalle+"'><i class='fas fa-marker'></i></button><button class='btn btn-outline-danger elimina' data-idDetalle='"+data["desc"][i].idDetalle+"'><i class='fas fa-trash-alt'></i></button></td></tr>";
                }
                tabla += "<tr><td colspan='4' class='text-right'>Subtotal</td><td> $"+data["desc2"][0].subtotal+"</td></tr><tr><td colspan='4' class='text-right'>IVA</td><td>$ "+data["desc2"][0].iva+"</td></tr><tr><td colspan='4' class='text-right'>Total a pagar</td><td>$ "+data["desc2"][0].vTotal+"</td></tr></tbody></table>";
            }
            $("#tablaDesc").empty();
            $("#tablaDesc").hide();
            $("#tablaDesc").append(tabla);
            $("#tablaDesc").show();
        }
    });

}

function llenarDescripcion2(){
    let idCotizacion = localStorage.getItem("idCotizacion");
    let idDesc = localStorage.getItem("idDesc");
    $.ajax({
        url:"cotizacion/getDescripcion",
        type:"POST",
        data:{idCotizacion,idDesc},
        error:function(jqXHR,status,exception){
            console.log(status+exception);
            console.warn(jqXHR.responseText);
        }
    }).done(function (res){
        let data = JSON.parse(res);
        if(data!=null){
            if(data["desc"]!=""){
                var tabla = "<table id='tablaDescripcion' class='table table-bordered dataTable' width='100%'><thead style='background-color: rgba(11, 23, 41 , 0.6);'><tr><th>Descripción</th><th>Cantidad</th><th>Precio</th><th>Total</th><th>Acciones</th></tr></thead><tbody>";
                for(var i = 0;i<data["desc"].length;i++){
                    tabla += "<tr><td>"+data["desc"][i].descripcion+"</td><td>"+data["desc"][i].cantidad+"</td><td>$ "+data["desc"][i].precio+"</td><td>$ "+data["desc"][i].total+"</td><td><button class='btn btn-outline-info mr-1 editar' data-idDetalle='"+data["desc"][i].idDetalle+"'><i class='fas fa-marker'></i></button><button class='btn btn-outline-danger eliminarCot' data-idDetalle='"+data["desc"][i].idDetalle+"'><i class='fas fa-trash-alt'></i></button></td></tr>";
                }
                tabla += "<tr><td colspan='4' class='text-right'>Subtotal</td><td> $"+data["desc2"][0].subtotal+"</td></tr><tr><td colspan='4' class='text-right'>IVA</td><td>$ "+data["desc2"][0].iva+"</td></tr><tr><td colspan='4' class='text-right'>Total a pagar</td><td>$ "+data["desc2"][0].vTotal+"</td></tr></tbody></table>";
            }
            $("#tablaDescEditar").empty();
            $("#tablaDescEditar").hide();
            $("#tablaDescEditar").append(tabla);
            $("#tablaDescEditar").show();
        }
    });

}

function llenarCotizacion(){
    $.ajax({
        url:"cotizacion/getAllCotizacion",
        type:"POST",
        dataType:"JSON",
        error:function(jqXHR,status,exception){
            console.log(status+exception);
            console.warn(jqXHR.responseText);
        }
    }).done(function(res){
        var data = JSON.parse(JSON.stringify(res));
        var tabla = '<table class="table table-bordered" width="100%" cellspacing="0" id="data"><thead style="background-color: rgba(11, 23, 41 , 0.6); color:white;"><td>Codigo</td><td>Cliente</td><td>Fecha</td><td>Estado</td><td>Descripción</td><td>Total</td><td>Acciones</td></thead><tbody>';
        for(var i=0;i<data.length;i++){
            tabla += "<tr><td>"+data[i].codigo+"</td><td>"+data[i].empresa+" </td><td>"+data[i].fecha+"</td><td>"+data[i].estado+"</td><td>"+data[i].descripcion+"</td><td>"+data[i].vTotal+"</td><td><button class=' btn btn-outline-info mr-1 editarC' data-idDetalle='"+data[i].idDetalle+"' data-idCot='"+data[i].idCotizacion+"' data-idDesc='"+data[i].idDescripcion+"'><i class='fas fa-marker'></i></button><button class=' btn btn-outline-dark mr-1 printC' data-idDetalle='"+data[i].idDetalle+"' data-idCot='"+data[i].idCotizacion+"' data-idDesc='"+data[i].idDescripcion+"'><i class='fas fa-print'></i></button><button class='btn btn-outline-danger mr-1 eliminarC' data-idDetalle='"+data[i].idDetalle+"' data-idCot='"+data[i].idCotizacion+"' data-idDesc='"+data[i].idDescripcion+"'><i class='fas fa-trash-alt'></i></button></td></tr>";
        }
        tabla += "</tbody><tfoot style='font-weight: bold;'><td>Cliente</td><td>Tipo de Impresión</td><td>Fecha</td><td>Estado</td><td>Descripción</td><td>Total</td><td>Acciones</td></tfoot></table>";
        
        $("#tablaCot").empty();
        $("#tablaCot").append(tabla);

        //Tabla Cotizacion
        $('#data').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
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

        validarRol($("#rol").val());
    });
}


function limpiar(){
    $("#descI").val('');
    $("#cantI").val('');
    $("#totalI").val('');
}

function limpiar2(){
    $("#descEdit").val('');
    $("#cantEdit").val('');
    $("#totalEdit").val('');
}

function limpiarCot(){
    a = 0;
    $("#descripcionI").val("");
    $("#fechaI").val("");
    $("#clienteI").empty();
    $("#estadoI").empty();
    llenarCLientes();
    llenarEstado();
    $("#tablaDesc").empty();
    $("#formModal").show("true");
    $("#divDesc").hide("true");
}

function validarCampo(event){
    let element = event.target.parentNode.parentNode.parentNode.childNodes;
    let elementSpan = element[7].childNodes[1].childNodes[1];
    //console.log(element[1].childNodes[0])
    //element[1].childNodes[0].childNodes[0].maxLength = 100;
    
    if(event.target.value === ""){
        elementSpan.innerHTML = 0;
    }else{
        elementSpan.innerHTML = event.target.value.length;
        if(event.target.value.length >= 100){
            alert("Has sobrepasado el limite permitido")
        }
    }
}

function validarRol(rol){
    if(rol==="Diseñador"){
        $("#agregarCliente").hide();
        const fila = document.getElementById("data").getElementsByTagName('tr');
        for(let i=0;i<fila.length;i++){
            fila[i].getElementsByTagName('td')[5].style.display="none";
            fila[i].getElementsByTagName('td')[6].style.display="none";
        }
    }
}


