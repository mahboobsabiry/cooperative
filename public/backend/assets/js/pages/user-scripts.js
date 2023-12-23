$(document).ready(function(){
    //Data table example
    var table = $('#exportexample').DataTable( {
        scrollX: true,
        lengthChange: true,
        buttons: ['copy', 'excel', 'pdf', 'colvis']

    } );
    table.buttons().container()
        .appendTo( '#exportexample_wrapper .col-md-6:eq(0)' );
});
