$(document).ready(function() {
    $('.export-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5'
        ],
        order: [[0, 'desc']],
        scrollCollapse: true,
        scrollX: true
    } );
});
