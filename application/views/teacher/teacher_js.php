<script>
    $(function()
    {
        $(document).on('click', '.btn-add', function(e)
        {
            e.preventDefault();

            var controlForm = $('.controls form:first'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });

    $(document).ready(function(){
        $("#doc_id").click(function(){
            $(".entry").toggle();
        });
    });

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
});

function del(id)
{
    //alert(id+added_date);
    //var id = $(this).parent().parent().attr('id');
     var id= id;
     var row = document.getElementById(id);
     var data = 'id=' + id;
     var parent = $(this).parent().parent();

    swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Yes, delete it!',
            buttonsStyling: false
        }).then(function() {
          $.ajax(
          {
                 type: "POST",
                 url: "<?php echo base_url(); ?>teacher/deleteTeacher",
                 data: data,
                 cache: false,
                 success: function(msg)
                 { 
                    if(msg=='fail'){
                        //alert(msg);
                        error();
                    }
                    else{
                        alert(msg);
                        datatableDestroy();
                        row.parentNode.removeChild(row);
                        datatableSet();
                        //demo.showNotification('top','center', 'done',2, 'Teacher Deleted..');
                    }
                    
                 }
           });
        }
    );
}
</script>