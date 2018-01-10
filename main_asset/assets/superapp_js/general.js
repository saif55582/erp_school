$(document).ready(function() {
    $('#datatables').DataTable({
       
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }

    });

    var table = $('#datatables').DataTable();
    $('.card .material-datatables label').addClass('form-group');
    demo.initFormExtendedDatetimepickers();
    $('.myscroll').perfectScrollbar();
});


