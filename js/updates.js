$(document).ready(function(){
  v_frequencies = [];


  $('#v_add_freq').click(function(e){
    e.preventDefault();
    maint_type_id = $('#v_maint_type_id option:selected').text();
    freq_cycles = $('#v_freq_cycles').val();
    freq_hours = parseFloat($('#v_freq_hours').val()).toFixed(2);
    freq_calendar = $('#v_freq_calendar').val();
    freq_period = $('#v_freq_period').val();

    data = {
      'schedule_details_id': '0',
      'schedule_id': $("#v_schedule_id").val(),
      'maint_type_id': $('#v_maint_type_id').val(),
      'cycles': $('#v_freq_cycles').val(),
      'hours': $('#v_freq_hours').val(),
      'calendar': $('#v_freq_calendar').val(),
      'period': $('#v_freq_period').val()
    };
    task_frequencies.push(data);
    // console.log(task_frequencies);

    for (var i = 0; i < v_frequencies.length; i++) {
      if (v_frequencies[i].maint_type_id == 1) {
        initial_cycles = v_frequencies[i].cycles;
        initial_hours = v_frequencies[i].hours;
      }else if (v_frequencies[i].maint_type_id == 2) {
        f_cycles = v_frequencies[i].cycles;
        f_hours = v_frequencies[i].hours;
      } else if (v_frequencies[i].maint_type_id == 3) {
        discard_cycles = v_frequencies[i].cycles;
        discard_hours = v_frequencies[i].hours;
      };
    }

    freq_data = JSON.stringify(task_frequencies);
    $.ajax({
      url: 'http://localhost/avia/maintenance/update_frequencies',
      method: 'post',
      dataType: 'json',
      data: {freq_data},
      success: function(data){
        console.log(data);
        $("#v_freqScheduleDetails").empty();
        for (var i = 0; i < data.length; i++) {
          td1 = '<tr><td class="hidden">'+data[i].schedule_detail_id+'</td>';
          td2 = '<td>'+data[i].maint_type_id+'</td>';
          td3 = '<td class="text-right">'+data[i].cycles+'</td>';
          td4 = '<td class="text-right">'+data[i].hours+'</td>';
          td5 = '<td class="text-center">'+data[i].calendar+' '+data[i].period+'</td>';
          td6 = '<td class="text-center"> <i onclick="removeFreq()" class="fa fa-times iconDel"></i> </td></tr>'
          $('#v_freqScheduleDetails').append(td1+td2+td3+td4+td5+td6);
        }
      }
    });

    $("#v_frequencies").val(JSON.stringify(task_frequencies));

  });

  $("#v_cum_cycles").keyup(function(){

    c_cycs = parseInt($("#v_cum_cycles").val());
    ld_cycles = parseInt($("#v_last_done_cycles").val());
    discard_cycs = parseInt($("#v_life_limit_cycles").val());

    for (var i = 0; i < v_frequencies.length; i++) {
      nextDuecycs = ld_cycles + parseInt(v_frequencies[i].cycles);
      if (v_frequencies[i].maint_type_id == 1 & nextDuecycs <= parseInt(v_frequencies[i].cycles) ) {
        $("#v_next_due_cycles").val(nextDuecycs);
        break;
      } else if (v_frequencies[i].maint_type_id == 2) {
        $("#v_next_due_cycles").val(nextDuecycs);
        break;
      }else if (v_frequencies[i].maint_type_id == 3) {
        $("#v_next_due_cycles").val(discard_cycs);
      }
    }
  });

  $("#v_cum_hours").keyup(function(){

    c_hrs = parseFloat($("#v_cum_hours").val());
    ld_hours = parseFloat($("#v_last_done_hours").val());
    discard_hrs = parseFloat($("#v_life_limit_hours").val());

    for (var i = 0; i < v_frequencies.length; i++) {
      nextDuehrs = ld_hours + parseFloat(v_frequencies[i].hours);
      if (v_frequencies[i].maint_type_id == 1 & nextDuehrs <= parseFloat(v_frequencies[i].hours) ) {
        $("#v_next_due_hours").val(nextDuehrs);
        break;
      } else if (v_frequencies[i].maint_type_id == 2) {
        $("#v_next_due_hours").val(nextDuehrs);
        break;
      } else if (v_frequencies[i].maint_type_id == 3) {
        $("#v_next_due_hours").val(discard_hrs);
      }
    }
  });

  $('#v_last_done_date').keyup(function(){

    ld_date = Date.parse( $("#v_last_done_date").val());
    for (var i = 0; i < v_frequencies.length; i++) {
      if (v_frequencies[i].maint_type_id <= 2) {
        if (parseInt(v_frequencies[i].calendar) > 0) {
          switch (v_frequencies[i].period) {
            case 'D':
              freq = (parseInt(v_frequencies[i].calendar) * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#v_next_due_date').val((due_date));
              break;
            case 'M':
              freq = (parseInt(v_frequencies[i].calendar) * 30.5 * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#v_next_due_date').val((due_date));
              break;
            case 'Y':
              freq = (parseInt(v_frequencies[i].calendar) * 12 * 30.5 * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#v_next_due_date').val((due_date));
              break;
            default:
              $('#v_next_due_date').val(ld_date);
          }
        } else {
          switch ($("#v_life_limit_period").val()) {
            case 'D':
              freq = (parseInt($("#v_life_limit_calendar").val()) * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#v_next_due_date').val((due_date));
              break;
            case 'M':
              freq = (parseInt($("#v_life_limit_calendar").val()) * 30.5 * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#v_next_due_date').val((due_date));
              break;
            case 'Y':
              freq = (parseInt($("#v_life_limit_calendar").val()) * 12 * 30.5 * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#v_next_due_date').val((due_date));
              break;
            default:
              $('#v_next_due_date').val(ld_date);
          }
        }
        break;
      }
    }
  })


  $('#taskUpdate').submit(function(e){
    e.preventDefault();
    $('#v_frequencies').val(JSON.stringify(task_frequencies));
    task_details = $(this).serialize();

    $.ajax({
      url: 'http://localhost/avia/maintenance/update_task',
      method: 'post',
      dataType: 'json',
      data: task_details,
      success: function(data){
        console.log(data);
        if(data === 1){
          $("#v_task_response").removeClass('hidden');
          $("#v_task_response").addClass('alert-sucess');
          $("#v_task_response").html('Task updated successfully!');
          $("#v_schedule_details").empty();
          v_frequencies = [];
          $('#v_task_flightAdd')[0].reset();
          $("#v_task_response").fadeOut(10000);
        }else {
          $("#v_task_response").removeClass('hidden');
          $("#v_task_response").addClass('alert-danger');
          $("#v_task_response").html('Task was not updated, try again!');
        }
      }
    });

  });
});


function removeFreq(){
  var table = document.getElementsByTagName("table")[0];
  var tbody = table.getElementsByTagName("tbody")[0];
  tbody.onclick = function (e) {
      e = e || window.event;
      var data = [];
      var target = e.srcElement || e.target;
      while (target && target.nodeName !== "TR") {
          target = target.parentNode;
      }
      if (target) {
          var cells = target.getElementsByTagName("td");
          for (var i = 0; i < cells.length; i++) {
              data.push(cells[i].innerHTML);
          }
      }
      schedule_details_id =  { id:data[0] };

      $.ajax({
        url:'http://localhost/avia/maintenance/delete_frequency',
        method: 'post',
        data: schedule_details_id,
        dataType: 'json',
        success: function(data){
          console.log(data);
          location.reload();
        }
      });
  };
}
