$(document).ready(function() {
    $('.export-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5'
        ],
        order: [[0, 'ASC']],
        scrollCollapse: true,
        scrollX: true,
        responsive: true
    } );
});
