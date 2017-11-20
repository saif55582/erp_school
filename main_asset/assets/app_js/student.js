function getSection(ci,base) {
	var csi = 'ci=' +ci;
	$.ajax({
         type: "POST",
         url: base+"section/gS",
         data: csi,
         success: function(msg)
         { 
            if(msg=='fail'){
                //alert(msg);
            }
            else{
                console.log(msg);
                var m = JSON.parse(msg);
                var $select = $('#sec');
                listItem = '';
                $.each(m,function(key, value) {
                    listItem += '<option value=' + value.sectionID + '>' + value.section_name + '</option>';
                });
                $('#sec').html(listItem);
                $('.selectpicker').selectpicker('refresh');


            }
            
         }
   });
}

function getAge(dob) {
    var d = new Date(dob);
    var c = new Date();
    console.log(d);
    console.log(c);
    var age = new Date(c-d).getFullYear()-1970;
    $('#age').val(age);
}