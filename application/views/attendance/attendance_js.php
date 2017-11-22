<script>
   
    $(document).ready(function(){
        
        //-------DtatTable----------//
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

        
        //-----------------Attendance------------------//
        $(document).on('click', '#present', function(e){
            
            //var student_ID = $(this).data('student_ID');
            var attendance = 'Present';
            alert(attendance);

            $('#present').css({'background-color' : '#64DD17'});
            $('#absent').css({'background-color' : '#999999'});
            $('#leave').css({'background-color' : '#999999'});

            $.ajax({
                type: "POST",
                url: 'attendance_insert.php',
                data:({'attendance':'Present'}),
                dataType: "json",
                contentType: false,
                processData: false,
                success:  function(data){
                    alert("Successfull Inserted.....!!!!");
                    window.location.reload(true);
                }
            });

        });
        $(document).on('click', '#absent', function(e){
            
            var student_ID = $(this).data('student_ID');
            var attendance = 'Absent';
            alert(attendance);

            $('#present').css({'background-color' : '#999999'});
            $('#absent').css({'background-color' : '#d50000'});
            $('#leave').css({'background-color' : '#999999'});

        });
        $(document).on('click', '#leave', function(e){
            
            var student_ID = $(this).data('student_ID');
            var attendance = 'Leave';
            alert(attendance);

            $('#present').css({'background-color' : '#999999'});
            $('#absent').css({'background-color' : '#999999'});
            $('#leave').css({'background-color' : '#FFAB00'});

        });


        $('#show').click(function(){
            $('#info').show();
            $('#stud').show();
        });


    });

</script>



