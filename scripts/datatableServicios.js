$(document).ready(function () {
    const tableServices = $('#tableServicios').DataTable({

        responsive: true,
        autoWidth: true,
        searching: true,
        buttons: [
            {
                extend: 'searchPanes',
                config: {
                    cascadePanes: true
                }
            }
        ],
        dom: 'Bfrtip',
        // columns: [
        //     { data: 'id' },
        //     { data: 'fecha' },
        //     { data: 'tiporesiduo' },
        //     { data: 'direccion' },
        //     { data: 'localidad' },   
        //     { data: 'estado' }
        // ],
        "language": {
            "lengthMenu": "Mostrando _MENU_ resultados por pagina",
            "zeroRecords": "No se encontraron resultados",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay informacion disponible",
            "search": "Buscar:",
            "paginate": {
                "first": "Primara",
                "last": "Ultima",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
        // columnDefs: [
        //     {  targets: 6,
        //         'data': 'id',
        //        render: function (data, type, row, meta) {
        //           return '<div class="btn-group" role="group" aria-label="Basic example"><a type="button"  href="../views/editarServicio.php?id='+data+'&view=see" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a><a type="button"  href="../views/editarServicio.php?id='+data+'&view=edit" class="btn btn-warning color-btn"><i class="fa-solid fa-pen-to-square"></i></a><a type="button"  href="../actions/eliminarServicio.php?id='+data+'" class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i></a></div>';
        //        }

        //     }]
    });
})

