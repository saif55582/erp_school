function getSection(ci, base, si) {
	var csi = 'ci=' +ci;
	$.ajax({
         type: "POST",
         url: base+"section/gS",
         data: csi,
         success: function(msg)
         { 
            if(msg=='fail'){
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

function gsbc(ci, base) {
    var x = 'x=' +ci;
    $.ajax({
        type: 'POST',
        url: base+'student/gSt',
        data: x,
        success: function(msg) 
        {
            //console.log(msg);
            datatableDestroy();
            setTimeout(function(){
                datatableSet();
            },1000);
            
        }
    });
}

function gsa(si,base) {
    var ci = $('#classesID').val();
    var y = 'y=' +ci+'&z='+si;
    $.ajax({
        type: 'POST',
        url: base+'student/gsa',
        data: y,
        success: function(msg) 
        {
            datatableDestroy();
            $('#tbody').html(msg);
            datatableSet();
            
        }
    });
}

function pop(arg, base, cm) {
     var row = document.getElementById(arg);
     var data = 'param=' + arg;
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
                 url: base+cm,
                 data: data,
                 cache: false,
                 success: function(msg)
                 {                         
                        datatableDestroy();
                        row.parentNode.removeChild(row);
                        datatableSet();
                        //demo.showNotification('top','center', 'done',2, 'Student Deleted..');
                    
                 }
           });
        }
    );
}

$('#tbody').on('click', '#present', function() {
  $(this).css('background-color','#4CAF50');
  $(this).children().css('color','#fff');
  $(this).next().css('background-color','#fff');
  $(this).next().children().css('color','#F44336');
  $(this).next().next().css('background-color','#fff');
  $(this).next().next().children().css('color','#FF9800');
  var si = $(this).attr('si');
  var base = $(this).attr('base');
  var data = 'sti='+si+ '&a=p';
  $.ajax({
    type: 'post',
    url: base+'attendance/sa',
    data: data,
  }).done(function(data) {
    alert(data);
  }).fail(function (errObject, status, error) {
    console.log(error);
  })
});

$('#tbody').on('click', '#absent', function() {
  $(this).css('background-color','#F44336');
  $(this).children().css('color','#fff');
  $(this).prev().css('background-color','#fff');
  $(this).prev().children().css('color','#4CAF50');
  $(this).next().css('background-color','#fff');
  $(this).next().children().css('color','#FF9800');
  var si = $(this).attr('si');
  var base = $(this).attr('base');
  var data = 'sti='+si+ '&a=a';
  $.ajax({
    type: 'post',
    url: base+'attendance/sa',
    data: data,
  }).done(function(data) {
    alert(data);
  }).fail(function (errObject, status, error) {
    console.log(error);
  })
});

$('#tbody').on('click', '#leave', function() {
  $(this).css('background-color','#FF9800');
  $(this).children().css('color','#fff');
  $(this).prev().css('background-color','#fff');
  $(this).prev().children().css('color','#F44336');
  $(this).prev().prev().css('background-color','#fff');
  $(this).prev().prev().children().css('color','#4CAF50');
  var si = $(this).attr('si');
  var base = $(this).attr('base');
  var data = 'sti='+si+ '&a=l';
  $.ajax({
    type: 'post',
    url: base+'attendance/sa',
    data: data,
  }).done(function(data) {
    alert(data);
  }).fail(function (errObject, status, error) {
    console.log(error);
  })
});

function inc() {
    var i = 1;
    $('#i').innerHTML = i++;
}

function setFocus() {
    setTimeout(function(){
        $('#mychange').focus();
    },250);
}

function getAge(dob) {
    var d = new Date(dob);
    var c = new Date();
    var age = new Date(c-d).getFullYear()-1970;
    $('#age').val(age);
}



//9569752221