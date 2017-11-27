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

</script>
<script>
<?php 
    $classesID = $this->session->flashdata('getSection');
    $sectionID = $this->session->flashdata('sectionID');
    if($classesID && $sectionID) { ?>
        getSection('<?=$classesID?>','<?=base_url()?>','<?=$sectionID?>');
    <?php }
    
?>
</script>