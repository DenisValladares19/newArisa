$(document).ready(function () {


    showHistory();
    $('#data').DataTable();


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