
$(document).ready(function () { 
    $('#tableServicios').DataTable({
        ajax: {
            'url': '../actions/getDatatableServicios.php'
        }
    });
})