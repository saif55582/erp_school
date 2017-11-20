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
    getEditReopen(id);
    $('#supportModal').modal(action);
}

$(document).ready(function() {
<?php 
    if($this->session->flashdata('reply_insert') == 'error') {
        echo "modal_action('show');";
        //echo "demo.showNotification('top','center','error',4,'Error');";
    }
    if($this->session->flashdata('reply_insert') == 'success') {
        //echo "demo.showNotification('top','center','check',2,'Section Added.');";
    }

        $c = $this->session->flashdata('classesID');
        if($c)
        echo "selectClass(".$c.");";

?>
<?php 
    $reply_edit = $this->session->flashdata('reply_edit');
    if($reply_edit == 'error') {
        echo "modal_action_edit('show',".$this->session->flashdata('open_modal').");";
        //echo "demo.showNotification('top','center','error',4,'Class Name already exists');";
        // echo "setTimeout(
        //         function() {
        //           $('#supportModal').find('#modal-body').find('#myerror').html('Class Name already exists');
        //         },5000);";
    }
    if($this->session->flashdata('reply_edit') == 'success')
        echo "setTimeout(function() {
            demo.showNotification('top','center','check',2,'Section Updated.');
        },500)";
?>

});


function setFocus() {
    setTimeout(function(){
        $('#mychange').focus();
    },250);
}



function selectClass(classesID) {
    var data = 'classesID='+classesID;
    $.ajax(
    {
        type: "POST",
        url: "<?php echo base_url();?>section/getSection",
        data: data,
        success: function(result) {
            if(result == 'nosection')
                $('#tbody')[0].innerHTML = '<tr><td colspan="6"><center>No Section Found</center></td></tr>';
            else {
                datatableDestroy();
                $('#tbody')[0].innerHTML = result;
                datatableSet();
            }
        }
    });
}

function clear_form() {
    $('#section_name_add').hide();
    $('#classesID_add').hide();
    $('#teacherID_add').hide();
    $('#max_student_add').hide();
}

function clear_edit_form() {
        $('#supportModal').find('#modal-body').find('#section_name_edit').hide();
        $('#supportModal').find('#modal-body').find('#max_student_edit').hide();
        $('#supportModal').find('#modal-body').find('#note_edit').hide();
}
 

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
                 url: "<?php echo base_url(); ?>section/deleteSection",
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
                        demo.showNotification('top','center', 'done',2, 'Section Deleted..');
                    }
                    
                 }
           });
        }
    );
}

function getEdit(sectionID) {

    var data = "sectionID="+sectionID;
    var infoModal = $('#supportModal');
    $.ajax({
        type: "post",
        url: "<?= base_url();?>section/editForm",
        data: data,
        success: function(result) {
             infoModal.find('#modal-body')[0].innerHTML = result;
             clear_edit_form();
             $('.selectpicker').selectpicker('render');
        }
    });

}

function getEditReopen(sectionID) {

    var data = "sectionID="+sectionID;
    var infoModal = $('#supportModal');
    $.ajax({
        type: "post",
        url: "<?= base_url();?>section/editForm",
        data: data,
        success: function(result) {
             infoModal.find('#modal-body')[0].innerHTML = result;
             $('.selectpicker').selectpicker('render');
        }
    });

}

</script>