
$(document).ready(function () { 
    $('#tableInventory').DataTable({
        
        responsive: true,
        autoWidth: true,
        searching: true,
        ajax: {
            'url': '../actions/getInventario.php',
            dataSrc: 'data'
        },
        columns: [
            { data: 'id_residuo' },
            { data: 'nombre' },
            { data: 'peso' },
            { data: 'cantidad'}
        ],
        "language": {
            "lengthMenu": "Mostrando _MENU_ resultados por pagina",
            "zeroRecords": "No se encontraron resultados",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay informacion disponible",
            "search": "Buscar:",
            "paginate": {
                "first":      "Primara",
                "last":       "Ultima",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        },
    });
})

  

