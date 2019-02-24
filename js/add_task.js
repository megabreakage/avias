$(document).ready(function(){
  frequencies = [];

  $('#add_freq').click(function(e){
    e.preventDefault();
    maint_type_id = $('#maint_type_id option:selected').text();
    freq_cycles = $('#freq_cycles').val();
    freq_hours = parseFloat($('#freq_hours').val()).toFixed(2);
    freq_calendar = $('#freq_calendar').val();
    freq_period = $('#freq_period').val();

    data = {
      'maint_type_id': $('#maint_type_id').val(),
      'cycles': $('#freq_cycles').val(),
      'hours': $('#freq_hours').val(),
      'calendar': $('#freq_calendar').val(),
      'period': $('#freq_period').val()
    };
    frequencies.push(data);
    console.log(frequencies);

    for (var i = 0; i < frequencies.length; i++) {
      if (frequencies[i].maint_type_id == 1) {
        initial_cycles = frequencies[i].cycles;
        initial_hours = frequencies[i].hours;
      }else if (frequencies[i].maint_type_id == 2) {
        f_cycles = frequencies[i].cycles;
        f_hours = frequencies[i].hours;
      } else if (frequencies[i].maint_type_id == 3) {
        discard_cycles = frequencies[i].cycles;
        discard_hours = frequencies[i].hours;
      };
    }

    td1 = '<tr><td>'+maint_type_id+'</td>';
    td2 = '<td class="text-right">'+freq_cycles+'</td>';
    td3 = '<td class="text-right">'+freq_hours+'</td>';
    td4 = '<td class="text-center">'+freq_calendar+' '+freq_period+'</td>';
    td5 = '<td class="text-center"> <i class="fa fa-times"></i> </td></tr>'

    $('#schedule_details').append(td1+td2+td3+td4+td5);

  });

  $("#cum_cycles").keyup(function(){

    c_cycs = parseInt($("#cum_cycles").val());
    ld_cycles = parseInt($("#last_done_cycles").val());
    discard_cycs = parseInt($("#life_limit_cycles").val());

    for (var i = 0; i < frequencies.length; i++) {
      nextDuecycs = ld_cycles + parseInt(frequencies[i].cycles);
      if (frequencies[i].maint_type_id == 1 & nextDuecycs <= parseInt(frequencies[i].cycles) ) {
        $("#next_due_cycles").val(nextDuecycs);
        break;
      } else if (frequencies[i].maint_type_id == 2) {
        $("#next_due_cycles").val(nextDuecycs);
        break;
      }else if (frequencies[i].maint_type_id == 3) {
        $("#next_due_cycles").val(discard_cycs);
      }
    }
  });

  $("#cum_hours").keyup(function(){

    c_hrs = parseFloat($("#cum_hours").val());
    ld_hours = parseFloat($("#last_done_hours").val());
    discard_hrs = parseFloat($("#life_limit_hours").val());

    for (var i = 0; i < frequencies.length; i++) {
      nextDuehrs = ld_hours + parseFloat(frequencies[i].hours);
      if (frequencies[i].maint_type_id == 1 & nextDuehrs <= parseFloat(frequencies[i].hours) ) {
        $("#next_due_hours").val(nextDuehrs);
        break;
      } else if (frequencies[i].maint_type_id == 2) {
        $("#next_due_hours").val(nextDuehrs);
        break;
      } else if (frequencies[i].maint_type_id == 3) {
        $("#next_due_hours").val(discard_hrs);
      }
    }
  });

  $('#last_done_date').keyup(function(){

    ld_date = Date.parse($("#last_done_date").val());
    for (var i = 0; i < frequencies.length; i++) {
      if (frequencies[i].maint_type_id <= 2) {
        if (parseInt(frequencies[i].calendar) > 0) {
          switch (frequencies[i].period) {
            case 'D':
              freq = (parseInt(frequencies[i].calendar) * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#next_due_date').val((due_date));
              break;
            case 'M':
              freq = (parseInt(frequencies[i].calendar) * 30.5 * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#next_due_date').val((due_date));
              break;
            case 'Y':
              freq = (parseInt(frequencies[i].calendar) * 12 * 30.5 * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#next_due_date').val((due_date));
              break;
            default:
              $('#next_due_date').val(ld_date);
          }
        } else {
          switch ($("#life_limit_period").val()) {
            case 'D':
              freq = (parseInt($("#life_limit_calendar").val()) * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#next_due_date').val((due_date));
              break;
            case 'M':
              freq = (parseInt($("#life_limit_calendar").val()) * 30.5 * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#next_due_date').val((due_date));
              break;
            case 'Y':
              freq = (parseInt($("#life_limit_calendar").val()) * 12 * 30.5 * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#next_due_date').val((due_date));
              break;
            default:
              $('#next_due_date').val(ld_date);
          }
        }
        break;
      }
    }
  })


  $('#taskAdd').submit(function(e){
    // e.preventDefault();
    $('#frequencies').val(JSON.stringify(frequencies));
    task_details = $(this).serialize();

    $.ajax({
      url: 'http://localhost/avia/maintenance/add_task',
      method: 'post',
      dataType: 'json',
      data: 'task_details',
      success: function(data){
        console.log(data);
        if(data === 1){
          $("#task_response").removeClass('hidden');
          $("#task_response").addClass('alert-sucess');
          $("#task_response").html('Task added successfully!');
          $("#schedule_details").empty();
          frequencies = [];
          $('#task_flightAdd')[0].reset();
          $("#task_response").fadeOut(10000);
        }else {
          $("#task_response").removeClass('hidden');
          $("#task_response").addClass('alert-danger');
          $("#task_response").html('Task was not added, try again!');
        }
      }
    });

  });
})
