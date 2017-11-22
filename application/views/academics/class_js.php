<script>
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
    });
    
    function modal_action(action) {
        $('#myModal').modal(action);
    }
    
    function modal_action_edit(action,id) {
        edit_class_reopen(id);
        $('#supportModal').modal(action);
    }

    function clearEditForm() {
        $('#supportModal').find('#modal-body').find('#class_name_edit').hide();
        $('#supportModal').find('#modal-body').find('#max_student_edit').hide();
        $('#supportModal').find('#modal-body').find('#note_edit').hide();
    }

    function clearForm() {
        $('#class_name').hide();
        $('#max_student').hide();
        $('#note').hide();
    }

</script>
<script>
     $(document).ready(function() {
<?php 
    if($this->session->flashdata('reply') == 'error') {
        echo "modal_action('show');";
        //echo "demo.showNotification('top','center','error',4,'Error');";
    }
    if($this->session->flashdata('reply') == 'success')
        // echo "demo.showNotification('top','center','check',2,'Class Added.');";
?>
<?php 
    if($this->session->flashdata('reply_edit') == 'error') {
        echo "modal_action_edit('show',".$this->session->flashdata('open_modal').");";
        //echo "demo.showNotification('top','center','error',4,'Class Name already exists');";
        echo "setTimeout(
                function() {
                  $('#supportModal').find('#modal-body').find('#myerror').html('Class Name already exists');
                },50);";
    }
    if($this->session->flashdata('reply_edit') == 'success')
        //echo "demo.showNotification('top','center','check',2,'Class Updated.');";
?>
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
                 url: "<?php echo base_url(); ?>classes/deleteClass",
                 data: data,
                 cache: false,
                 success: function(msg)
                 { 
                    if(msg=='fail'){
                        //alert(msg);
                        error();
                    }
                    else{
                        //alert(msg);
                        datatableDestroy();
                        row.parentNode.removeChild(row);
                        datatableSet();
                        //demo.showNotification('top','center', 'done',2, 'Class Deleted..');
                    }
                    
                 }
           });
        }
    );
}

function edit_class(id) {
    var data = "id="+id;
    var infoModal = $('#supportModal');
    $.ajax(
    {
        type: "post",
        url: "<?php echo base_url();?>classes/sendEditForm",
        data: data,
        success: function(result){
             infoModal.find('#modal-body')[0].innerHTML = result;
             clearEditForm();
             $('.selectpicker').selectpicker('render');
        }
    });
}

function edit_class_reopen(id) {
    var data = "id="+id;
    var infoModal = $('#supportModal');
    $.ajax(
    {
        type: "post",
        url: "<?php echo base_url();?>classes/sendEditForm",
        data: data,
        success: function(result){
             infoModal.find('#modal-body')[0].innerHTML = result;
             $('.selectpicker').selectpicker('render');
        }
    });
}
</script>

