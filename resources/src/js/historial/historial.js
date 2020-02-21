$(document).ready(function () {


    showHistory();
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


});


function showHistory() {
    $.ajax({
        type: 'POST',
        url: BASE_URL+'index.php/historial/showHistory',
        async: false,
        dataType: 'json',
        success: function (data) {
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
                html+='<tr>'+
                    '<td>'+data[i].data_historial+'</td>'+
                    '</tr>';
            }
            $('#table').html(html);
        },

        error: function () {
            alert('Could not show data from database');
        }

    });

}