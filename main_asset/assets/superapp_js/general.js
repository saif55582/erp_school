
  //finding last index of table
  var lastIndex = $('#datatables ').find('thead').first().find('th').last().index();
  //table export init
  TableExport.prototype.defaultButton = "btn btn-blue btn-xs";
  var liveTableData = $('#datatables').tableExport({
    filename: $('#datatables').attr('n'),
    ignoreCols: [lastIndex],
    footers: false
  });

  //student view attendance
  TableExport.prototype.defaultButton = "btn btn-blue btn-sm";
  var student_attendance = $('#datatable').tableExport({
    filename: $('#datatable').attr('n'),
    footers: false
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
    $('.myscroll').perfectScrollbar();
    
});

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
                    if(msg=='active') {
                      demo.showNotification('top','center', 'error', 4, "Can't delete active academic year" );
                    }
                    else {
                      datatableDestroy();
                      row.parentNode.removeChild(row);
                      datatableSet();
                    }
                    //demo.showNotification('top','center', 'done',2, 'Student Deleted..');
                 }
           });
        }
    );
}

$('#tbody').on('click', '.pop', function() {
  var arg = $(this).attr('id');
  var base = $(this).attr('base');
  var cm = $(this).attr('cm');
  var row = document.getElementById(arg);
  var parent = $(this).parent().parent();
  var data = 'param=' + arg;
  
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
                 }
           });
        }
    );
});

function getStudent(ci,si, base) {

    var clas = $('#class').find(":selected").text();
    var section = $('#sec').find(':selected').text();
    //var name = $('#mytable').attr('n')+ $("#export_year").val()+$('#export_month').val();
    TableExport.prototype.defaultFilename = $('#datatables').attr('n')+'sasasa';


    if(si) {
      var d = 'y=' +ci+'&z='+si;
    }
    else {
      var d = 'y=' +ci;
    }
    $.ajax({
        type: 'POST',
        url: base+'student/gSt',
        data: d,
        success: function(msg) 
        {
            datatableDestroy();
            $('#tbody').html(msg);
            datatableSet();

            //updating table to export export
            //TableExport.prototype.defaultFilename = name;
            liveTableData.update();
            liveTableData.reset();

        }
    });
}

function getSubject(ci) {

  var d = 'y='+ci;
  var base = $('#base').val();
  $.ajax({
        type: 'POST',
        url: base+'subject/get',
        data: d,
        success: function(msg) 
        {
            datatableDestroy();
            $('#tbody').html(msg);
            datatableSet();

            //TableExport.prototype.defaultFilename = name;
            liveTableData.update();
            liveTableData.reset();
        }
    });

}

$('#get_rows').on('change', function(){
  var ci = $(this).val();
  var d = 'y='+ci;
  var base = $(this).attr('base');
  var act = $(this).attr('act');
  $.ajax({
        type: 'POST',
        url: base+act,
        data: d,
        success: function(msg) 
        {
            datatableDestroy();
            $('#tbody').html(msg);
            datatableSet();

            //TableExport.prototype.defaultFilename = name;
            liveTableData.update();
            liveTableData.reset();
        }
    });

});


function gsa(ci, si, dt, base) {

    var y = 'y=' +ci+'&z='+si+'&dt='+dt;
    $('#setd').html(dt);
    $.ajax({
        type: 'POST',
        url: base+'attendance/gsa',
        data: y,
        success: function(msg) 
        { 
            if(msg!='No date') {
              datatableDestroy();
              $('#tbody').html(msg);
              datatableSet();
              $('#pa').css('display','block');
            }
            
        }
    });
}

 function gta(dt, base) {
    var y = 'dt='+dt;
    $('#setd').html(dt);
    $.ajax({
        type: 'POST',
        url: base+'attendance/gta',
        data: y,
        success: function(msg) 
        { 
            if(msg!='No date') {
              datatableDestroy();
              $('#tbody').html(msg);
              datatableSet();
              $('#pa').css('display','block');
            }
            
        }
    }).fail(function (errObject, status, error) {
    demo.showNotification('top','center', 'error',4, error);
  });
}



function present_all() {
  $('#tbody').children().each(function(){
    $(this).find('#present').click();
    
  });
}

$('#fetch_attendance').on('click', function() {
  var ci = $('#class').val();
  var si = $('#sec').val();
  var d = $('#setd').val();
  var base = $(this).attr('base');
  var d = 'y='+ci+'&z='+si+'&dt='+d;
  $.ajax({
    type: 'post',
    url: base+'attendance/getsta',
    data: d
  }).done(function(data) {
      datatableDestroy();
      $('#tbody').html(data);
      datatableSet();
      //TableExport.prototype.defaultFilename = name;
      student_attendance.update();
      student_attendance.reset();
    }).fail(function (errObject, status, error) {
    demo.showNotification('top','center', 'error',4, error);
  });
});

$('#fetch_teacher_attendance').on('click', function() {
  var d = $('#setd').val();
  var base = $(this).attr('base');
  var d = 'dt='+d;
  $.ajax({
    type: 'post',
    url: base+'attendance/getta',
    data: d
  }).done(function(data) {
      datatableDestroy();
      $('#tbody').html(data);
      datatableSet();
      //TableExport.prototype.defaultFilename = name;
      student_attendance.update();
      student_attendance.reset();
    }).fail(function (errObject, status, error) {
    demo.showNotification('top','center', 'error',4, error);
  });
});

$('#tbody').on('click', '#present', function() {
  var act = $(this).attr('act');
  var asi = $(this).attr('asi');
  var base = $(this).attr('base');
  var auth = $(this).attr('auth');
  var status = $(this).attr('status');
  if(auth=='admin' || auth!='admin' && status=='n') { 
    $(this).css('background-color','#4CAF50');
    $(this).children().css('color','#fff');
    $(this).next().css('background-color','#fff');
    $(this).next().children().css('color','#F44336');
    $(this).next().next().css('background-color','#fff');
    $(this).next().next().children().css('color','#FF9800');
  }
  var dt = $('#setd').html();
  var data = 'asi='+asi+'&dt='+dt+'&a=p'+'&auth='+auth+'&status='+status;
  $.ajax({
    type: 'post',
    url: base+act,
    data: data
  }).done(function(data) {
      if(data == 'not_allowed')
        demo.showNotification('top','center', 'error',4, 'Not Allowed..Only Admin can edit attendance');
      if(data == 'allowed'){
        //demo.showNotification('top','center', 'done',2, 'Attendance Updated..');
      }
    }).fail(function (errObject, status, error) {
    demo.showNotification('top','center', 'error',4, error);
  });
});


$('#tbody').on('click', '#absent', function() {
  var act = $(this).attr('act');
  var asi = $(this).attr('asi');
  var base = $(this).attr('base');
  var auth = $(this).attr('auth');
  var status = $(this).attr('status');

  if(auth=='admin' || auth!='admin' && status=='n') {
    $(this).css('background-color','#F44336');
    $(this).children().css('color','#fff');
    $(this).prev().css('background-color','#fff');
    $(this).prev().children().css('color','#4CAF50');
    $(this).next().css('background-color','#fff');
    $(this).next().children().css('color','#FF9800');
  }
  
  var dt = $('#setd').html();
  var data = 'asi='+asi+'&dt='+dt+'&a=a'+'&auth='+auth+'&status='+status;
  $.ajax({
    type: 'post',
    url: base+act,
    data: data
  }).done(function(data) {
   if(data == 'not_allowed')
      demo.showNotification('top','center', 'error',4, 'Not Allowed..Only Admin can edit attendance');
    if(data == 'allowed'){
      //demo.showNotification('top','center', 'done',2, 'Attendance Updated..');
    }
  }).fail(function (errObject, status, error) {
    demo.showNotification('top','center', 'error',4, error);
  })
});


$('#tbody').on('click', '#leave', function() {
  var act = $(this).attr('act');
  var asi = $(this).attr('asi');
  var base = $(this).attr('base');
  var auth = $(this).attr('auth');
  var status = $(this).attr('status');

  if(auth=='admin' || auth!='admin' && status=='n') {
    $(this).css('background-color','#FF9800');
    $(this).children().css('color','#fff');
    $(this).prev().css('background-color','#fff');
    $(this).prev().children().css('color','#F44336');
    $(this).prev().prev().css('background-color','#fff');
    $(this).prev().prev().children().css('color','#4CAF50');
  }
  
  var dt = $('#setd').html();
  var data = 'asi='+asi+'&dt='+dt+'&a=l'+'&auth='+auth+'&status='+status;
  $.ajax({
    type: 'post',
    url: base+act,
    data: data
  }).done(function(data) {
    if(data == 'not_allowed')
      demo.showNotification('top','center', 'error',4, 'Not Allowed..Only Admin can edit attendance');
    if(data == 'allowed'){
      //demo.showNotification('top','center', 'done',2, 'Attendance Updated..');
    }
  }).fail(function (errObject, status, error) {
    demo.showNotification('top','center', 'error',4, error);
  });
});


$('#tbody_academics_year').on('change', '#a', function() {
  var aci = $(this).val();
  var base = $(this).attr('base');
  var d = 'ac='+aci;
  $.ajax({
    type: 'post',
    url: base+'institute/up',
    data: d
  }).done(function(data) {
    demo.showNotification('top','center', 'done',2, 'Academic Session Change ..');
  }).fail(function (errObject, status, error) {
    console.log(error);
  });
});




//9569752221