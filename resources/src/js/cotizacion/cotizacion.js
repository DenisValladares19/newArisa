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
    
    $(document).on("click", "#agregarCliente", function () {
        $("#frmInsertarCliente").modal("show");
    });
    
    
    
    
    $("#clienteI").select2({
        width: "100%"
    });
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
    
    $("#divDesc").hide("true");
    
    llenarEstado();
    llenarCLientes();
    llenarTipo();
    
    //Tabla Inventario
    $('#invent').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
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
    let a = 0;
    $("#addDes").click(function(){
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
    });
    $("#addDes").click(function(){
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

    $("#addDes").click(function(){
        let form = $("#frmDesc").serializeArray();
        let idCotizacion = localStorage.getItem("idCotizacion");
        let idDesc = localStorage.getItem("idDesc");
        if(a>2){
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
            $("#clienteI").append("<option value='"+r[i].idCliente+"'>"+r[i].nombre+" "+r[i].apellido+"</option>");
        }       
    });
}

function llenarTipo(){
    $.post("cotizacion/getAllTipo",{},function(res){
        var r = JSON.parse(res);   
        for(var i = 0;i<r.length;i++){
            $("#tipoI").append("<option value='"+r[i].idTipoImpresion+"'>"+r[i].nombre+" </option>");
        }       
    });
}

function llenarDescripcion(){
    let idCotizacion = localStorage.getItem("idCotizacion");
    let idDesc = localStorage.getItem("idDesc");
    $.ajax({
        url:"cotizacion/getDescripcion",
        type:"POST",
        dataType:"JSON",
        data:{idCotizacion,idDesc},
        success:function(w){
            /*var r = JSON.parse(w);
            console.log(r);
            */
        },
        error:function(jqXHR,status,exception){
            console.log(status+exception);
            console.warn(jqXHR.responseText);
        }
    }).done(function (res){
        let data = JSON.parse(JSON.stringify(res));
        if(data!=null){
            var tabla = "<table id='tablaDescripcion' class='table table-bordered dataTable' width='100%'><thead style='background-color: rgba(11, 23, 41 , 0.6);'><tr><th>Descripción</th><th>Cantidad</th><th>Precio</th><th>Total</th></tr></thead><tbody>";
            for(var i = 0;i<data.length;i++){
                tabla += "<tr><td>"+data[i].descripcion+"</td><td>"+data[i].cantidad+"</td><td>"+data[i].precio+"</td><td>"+data[i].total+"</td></tr>";
            }
            tabla += "</tbody><tfoot><tr><th>Descripción</th><th>Cantidad</th><th>Precio</th><th>Total</th></tr></tfoot></table>";
            $("#tablaDesc").empty();
            $("#tablaDesc").append(tabla);
            
            $('#tablaDescripcion').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
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
    });

}

function limpiar(){
    $("#descI").val('');
    $("#cantI").val('');
    $("#Precio").val('');
    $("#totalI").val('');
}


