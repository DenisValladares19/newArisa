$(document).ready(function () {
    llenarEstado();

    $(document).on("click", "#reporteC", function () {
        $("#reporteCModal").modal("show");
    });

    $(document).on("click", "#reporteG", function () {
        $("#reporteGModal").modal("show");
    });

    $(document).on("click", "#reporteF", function () {
        $("#reporteFModal").modal("show");
    });

    $(document).on("click", "#reporteRF", function () {
        $("#reporteFIModal").modal("show");
    });

    $(document).on("click", "#reporteOrden", function () {
        $("#reporteOrdenModal").modal("show");
    });

    $(document).on("click", "#reporteEstado", function () {
        $("#reporteEs").modal("show");
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
        $("#fechaF").datepicker();
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
        $("#fecha").datepicker();
    });


        //
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
        $("#fechaICliente").datepicker();
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
        $("#fechaFCliente").datepicker();
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
        $("#fechaIEstado").datepicker();
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
        $("#fechaFEstado").datepicker();
    });



    $('#clienteId').select2({
        width:"100%"
    })

});


$('#clienteId').empty().append('Seleccione');
$.post(BASE_URL + 'index.php/cliente/showClients',
    function (data) {
        var status = JSON.parse(data);
        $.each(status, function (i, item) {
            $('#clienteId').append('<option value="' + item.idCliente + '">' +item.empresa+'</option>');
        });
    });

$('#OrdenId').empty().append('Seleccione');
$.post(BASE_URL + 'index.php/orden/showOrdenes',
    function (data) {
        var status = JSON.parse(data);
        $.each(status, function (i, item) {
            $('#OrdenId').append('<option value="' + item.idCotizacion + '">' + item.idOrden +'</option>');
        });
    });

/*    Codigo de Reportes de cotizacion   */

function reporteCliente(e){
    e.preventDefault();
    let idCliente = $("#clienteId").val();
    let fechaI = $("#fechaICliente").val();
    let fechaF = $("#fechaFCliente").val();
    window.open("Reporte_cotizacion/cotizacionCliente?c="+idCliente+"&i="+fechaI+"&f="+fechaF,"_back");
}

function reporteFechaInicialFinal(e){
    e.preventDefault();
    let fechaI = $("#fechaI").val();
    let fechaF = $("#fechaF").val();
    window.open("Reporte_cotizacion/cotizacionRangoFecha?i="+fechaI+"&f="+fechaF,"_back");
}

function reporteFecha(e){
    e.preventDefault();
    let fecha = $("#fecha").val();
    window.open("Reporte_cotizacion/cotizacionFecha?f="+fecha,"_back");
}

function llenarEstado(){
    $.post("cotizacion/getAllEstados",{},function(res){
        var r = JSON.parse(res);   
        for(var i = 0;i<r.length;i++){
            $("#estado").append("<option value='"+r[i].idEstado1+"'>"+r[i].nombre+"</option>");
        }       
    });
}

function reporteEstado(e){
    e.preventDefault();
    let estado = $("#estado").val();
    let fechaI = $("#fechaIEstado").val();
    let fechaF = $("#fechaFEstado").val();
    window.open("Reporte_cotizacion/cotizacionEstado?e="+estado+"&i="+fechaI+"&f="+fechaF,"_back");
}