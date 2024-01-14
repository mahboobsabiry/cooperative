$(document).ready(function() {
    $('.export-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5'
        ],
        scrollCollapse: true,
        scrollX: true,
        responsive: true
    } );
});
