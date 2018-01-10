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

    $('#fine_type').on('change', function(){
        
        if (this.value == 'Fixed') {

            $('#incremented').hide();
        }
        else{

            $('#incremented').show();   
        }
    });




<?php

    $result = $this->session->flashdata('result');

    if($result == 'assigned'){

        echo "demo.showNotification('top','center','error',4,'Invoice exists for the selected month..!!')";

    }

    if($result == 'invoice_added'){

        echo "demo.showNotification('top','center','done',2,'Invoice Added to Student....!!')";

    }

    if($result == 'invoice_updated'){

        echo "demo.showNotification('top','center','done',2,'Invoice Updated....!!')";

    }

    if($result == 'fee_added'){

        echo "demo.showNotification('top','center','done',2,'Fee Added....!!')";

    }

    if($result == 'fee_updated'){

        echo "demo.showNotification('top','center','done',2,'Fee Updated....!!')";

    }

    if($result == 'cons_updated'){

        echo "demo.showNotification('top','center','done',2,'Concession Updated....!!')";

    }

    if($result == 'payment_success'){

        echo "demo.showNotification('top','center','done',2,'Payment Successfull....!!')";

    }

    if($result == 'fine_added'){

        echo "demo.showNotification('top','center','done',2,'Fine Successfull Added....!!')";

    }

?>



</script>







