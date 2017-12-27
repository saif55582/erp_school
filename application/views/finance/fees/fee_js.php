<script type="text/javascript">



    $('#FeeType').DataTable({

        "pagingType": "simple_numbers",

        "bInfo":false,

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



    var table = $('#FeeType').DataTable();

    $('.card .material-FeeType label').addClass('form-group');

    





    $('#concession').DataTable({

        "pagingType": "simple_numbers",

        "bInfo":false,

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





    var table = $('#concession').DataTable();

    $('.card .material-concession label').addClass('form-group');


    $('#all').click(function(){     
        if($(this).prop("checked") == true){
            $('#stud').prop( "disabled", true );
        }
        else if($(this).prop("checked") == false){
            $('#stud').prop( "disabled", false );
        }
    });

    function PrintFunction() {
        window.print();
    }

</script>

