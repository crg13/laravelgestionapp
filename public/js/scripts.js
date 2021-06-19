
/* PARA LA TABLA INDEX CLIENTES*/
$(document).ready(function() {
    $('#example').DataTable();
} );


/*PARA LA TABLA DE INDEX EQUIPOS*/
// para crear filas hijas.
  /* Formatting function for row details - modify as you need */

function format ( d ) {
  // `d` is the original data object for the row
  return '<table class="display" style="padding-left:50px;">'+
      '<tr >'+
          '<td>Otros mantenimientos:</td>'+
          '<td>'+d[10]+'</td>'+

      '</tr>'+
      '<tr >'+
          '<td>Observaciones:</td>'+
          '<td>'+d[9]+'</td>'+

      '</tr>'+

  '</table>';
}

$(document).ready(function() {

    var table= $('#indexEquipos').DataTable({
      responsive: true,

      // para ocultar columnas de la tabla
      "columnDefs": [
            {
                "targets": [ 9 ],
                "visible": false,

            },
            {
                "targets": [ 10 ],
                "visible": false
            }

        ],




    });

    // Add event listener for opening and closing details
    $('#indexEquipos tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

});
