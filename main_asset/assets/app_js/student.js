function getSection(ci,base,si) {
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
                
                var m = JSON.parse(msg);
                var $select = $('#sec');
                listItem = '';
                if(!$.isEmptyObject(m)) {
                    $.each(m,function(key, value) {
                        if(si) {
                            if(value.sectionID == si) {
                                listItem += '<option  selected value=' + value.sectionID + '>' + value.section_name + '</option>';
                            }
                            else {
                                listItem += '<option value=' + value.sectionID + '>' + value.section_name + '</option>';
                            }
                        }
                        else
                            listItem += '<option value=' + value.sectionID + '>' + value.section_name + '</option>';
                    });
                }
                else {
                    listItem = '<option selected value="">No Section Found</option>';
                }

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



//9569752221