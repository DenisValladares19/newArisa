$(document).ready(function () {


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



});


$('#clienteId').empty().append('Seleccione');
$.post(BASE_URL + 'index.php/cliente/showClients',
    function (data) {
        var status = JSON.parse(data);
        $.each(status, function (i, item) {
            $('#clienteId').append('<option value="' + item.idCliente + '">' + item.nombre + ' ' +item.apellido+'</option>');
        });
    });