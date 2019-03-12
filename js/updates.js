$(document).ready(function(){

  // Scheduled task updates
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

    for (var i = 0; i < task_frequencies.length; i++) {
      if (task_frequencies[i].maint_type_id == 1) {
        initial_cycles = task_frequencies[i].cycles;
        initial_hours = task_frequencies[i].hours;
      }else if (task_frequencies[i].maint_type_id == 2) {
        f_cycles = task_frequencies[i].cycles;
        f_hours = task_frequencies[i].hours;
      } else if (task_frequencies[i].maint_type_id == 3) {
        discard_cycles = task_frequencies[i].cycles;
        discard_hours = task_frequencies[i].hours;
      };
    }

    freq_data = JSON.stringify(task_frequencies);
    $.ajax({
      url: 'http://192.168.2.122/avia/maintenance/update_frequencies',
      method: 'post',
      dataType: 'json',
      data: {freq_data},
      success: function(data){
        console.log(data);
        $("#v_freqScheduleDetails").empty();
        task_frequencies = data;
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

    $("#task_frequencies").val(JSON.stringify(task_frequencies));

  });

  $("#v_cum_cycles").keyup(function(){

    c_cycs = parseInt($("#v_cum_cycles").val());
    ld_cycles = parseInt($("#v_last_done_cycles").val());
    discard_cycs = parseInt($("#v_life_limit_cycles").val());

    for (var i = 0; i < task_frequencies.length; i++) {
      nextDuecycs = ld_cycles + parseInt(task_frequencies[i].cycles);
      if (task_frequencies[i].maint_type_id == 1 & nextDuecycs <= parseInt(task_frequencies[i].cycles) ) {
        $("#v_next_due_cycles").val(nextDuecycs);
        break;
      } else if (task_frequencies[i].maint_type_id == 2) {
        $("#v_next_due_cycles").val(nextDuecycs);
        break;
      }else if (task_frequencies[i].maint_type_id == 3) {
        $("#v_next_due_cycles").val(discard_cycs);
      }
    }
  });

  $("#v_cum_hours").keyup(function(){

    c_hrs = parseFloat($("#v_cum_hours").val());
    ld_hours = parseFloat($("#v_last_done_hours").val());
    discard_hrs = parseFloat($("#v_life_limit_hours").val());

    for (var i = 0; i < task_frequencies.length; i++) {
      nextDuehrs = ld_hours + parseFloat(task_frequencies[i].hours);
      if (task_frequencies[i].maint_type_id == 1 & nextDuehrs <= parseFloat(task_frequencies[i].hours) ) {
        $("#v_next_due_hours").val(nextDuehrs);
        break;
      } else if (task_frequencies[i].maint_type_id == 2) {
        $("#v_next_due_hours").val(nextDuehrs);
        break;
      } else if (task_frequencies[i].maint_type_id == 3) {
        $("#v_next_due_hours").val(discard_hrs);
      }
    }
  });

  $('#v_last_done_date').keyup(function(){

    ld_date = Date.parse( $("#v_last_done_date").val());
    for (var i = 0; i < task_frequencies.length; i++) {
      if (task_frequencies[i].maint_type_id <= 2) {
        if (parseInt(task_frequencies[i].calendar) > 0) {
          switch (task_frequencies[i].period) {
            case 'D':
              freq = (parseInt(task_frequencies[i].calendar) * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#v_next_due_date').val((due_date));
              break;
            case 'M':
              freq = (parseInt(task_frequencies[i].calendar) * 30.5 * 24) * 3.6e+6;
              due_date = new Date((ld_date + freq)).toLocaleDateString();
              $('#v_next_due_date').val((due_date));
              break;
            case 'Y':
              freq = (parseInt(task_frequencies[i].calendar) * 12 * 30.5 * 24) * 3.6e+6;
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

  // Flights updates
  totalCycles = 0, totalHours = 0;
  logs = [], pireps = [], trends = [], trendMonitor = [];
  dfr_status = 0;

  $("#fv_landing").keyup(function(){
    takeoff = Date.parse($("#fv_takeoff").val());
    landing = Date.parse($("#fv_landing").val());
    hours = parseFloat((landing - takeoff)/3600000).toFixed(2)
    $("#fv_hours").val(hours);
  });

  $("#fv_add").click(function (e) {
    e.preventDefault();
    to = $("#fv_to").val();
    from = $("#fv_from").val();
    cycs = 1;
    takeoff = Date.parse($("#fv_takeoff").val());
    landing = Date.parse($("#fv_landing").val());
    hrs = parseFloat((landing-takeoff)/3600000);

    data = {
      'log_id' : '0',
      'flight_id': $("#fv_flight_id").val(),
      'origin': from,
      'destination': to,
      'takeoff': $("#fv_takeoff").val(),
      'landing': $("#fv_landing").val(),
      'cycles': cycs,
      'hours': hrs
    }

    newTotalCycles = parseInt($("#fv_totalCycles").val()) + cycs;
    newTotalHours = parseFloat($("#fv_totalHours").val())+ hrs;
    $("#fv_totalCycles").val(newTotalCycles);
    $("#fv_totalHours").val(newTotalHours);

    fv_logs.push(data);

    totalCycles += cycs;
    $("#fv_totalCycles").val(totalCycles);
    totalHours += hrs;
    $("#fv_totalHours").val(parseFloat(totalHours).toFixed(2));

    logs_data = JSON.stringify(fv_logs);
    console.log(fv_logs);
    $.ajax({
      url: 'http://192.168.2.122/avia/flights/update_logs',
      method: 'post',
      dataType: 'json',
      data: {logs_data},
      success: function(data){
        $("#fv_entryRow").empty();
        newTotalCycles = 0;
        newTotalCycles = 0;
        for (var i = 0; i < data.length; i++) {
          td1 = '<tr><td class="hidden">'+data[i].log_id+'</td>';
          td2 = '<td>'+data[i].origin+'</td>';
          td3 = '<td>'+data[i].destination+'</td>';
          td4 = '<td>'+parseFloat(data[i].hours).toFixed(2)+'</td>';
          td5 = '<td>'+data[i].cycles+'</td>';
          td6 = '<td class="text-center"><a href="#"><i onclick="logRemoveFreq()" class="fa fa-times iconDel" title="remove"></i></a></td></tr>';
          $("#fv_entryRow").append(td1+td2+td3+td4+td5+td6);
        }
        $('#fv_totalHours').val((newTotalHours).toFixed(2));
        $('#fv_totalCycles').val(newTotalCycles);
      }
    });

  });

  dfr_status = 'No';
  $("#fv_dfr_status").change(function(){
    if(this.checked){
      dfr_status = 'Yes';
      $("#fv_deferredDetails").removeClass("hidden");
    } else {
      dfr_status = 'No';
      $("#fv_deferredDetails").addClass("hidden");
      $("#fv_limitations, #mel_reference, #dfr_reason, #add_number, #dfr_category, #dfr_date, #exp_date").val("");
    }
  });

  // Pireps updates
  $("#fv_addDefect").click(function(e){
    e.preventDefault();
    defect = $("#fv_defect").val();
    chap_id = $("#fv_ata_chapter_id").val();
    if ( chap_id === '' || defect === '') {
      alert('Fields Empty!');
    } else {
      data = {
        'pirep_id': '0',
        'flight_id': $("#fv_flight_id").val(),
        'defect': $("#fv_defect").val(),
        'ata_chapter_id': $("#fv_ata_chapter_id").val(),
        'deferred': dfr_status,
        'limitations': $("#fv_limitations").val(),
        'mel_reference': $("#fv_mel_reference").val(),
        'dfr_reason': $("#fv_dfr_reason").val(),
        'dfr_category': $("#fv_dfr_category").val(),
        'dfr_date': $("#fv_dfr_date").val(),
        'exp_date': $("#fv_exp_date").val(),
        'rectification': $("#fv_rectification").val(),
        'techlog_number': $("#fv_techlog_number").val(),
        'cleared_date': $("#fv_cleared_date").val(),
        'wo_number': $("#fv_wo_number").val(),
        'remarks': $("#fv_remarks").val()
      }
      fv_pireps.push(data);
      fv_defects = {'defects':JSON.stringify(fv_pireps)};
      $.ajax({
        url: 'http://192.168.2.122/avia/flights/update_defects',
        method: 'post',
        dataType: 'json',
        data: fv_defects,
        success: function(data){
          console.log(data);
          $("#fv_tblDefects").empty();
          fv_pireps = data;
          for (var i = 0; i < data.length; i++) {
            td1 = '<tr><td class="hidden">'+data[i].pirep_id+'</td>';
            td2 = '<td>'+data[i].defect+'</td>';
            td3 = '<td>'+data[i].mel_reference+'</td>';
            td4 = '<td>'+data[i].dfr_category+'</td>';
            td5 = '<td>'+data[i].deferred+'</td>';
            td6 = '<td>'+data[i].dfr_reason+'</td>';
            td7 = '<td>'+data[i].dfr_date+'</td>';
            td8 = '<td class="text-center"><a href="#"><i id="'+data[i].pirep_id+'" onclick="defectRemove(this.id)" class="fa fa-times iconDel" title="remove"></i></a></td></tr>';
            $("#fv_tblDefects").append(td1+td2+td3+td4+td5+td6+td7+td8);
          }
        }

      });
    }
  });

  $("#fv_addTrend").click(function(e){
    e.preventDefault();
    trend_id = $("#fv_trend").val();
    trend_desc = $("#fv_trend option:selected").text();
    lh_eng_trend = $("#fv_lh_eng_trend").val();
    rh_eng_trend = $("#fv_rh_eng_trend").val();

    if($("#fv_trend, #fv_lh_eng_trend, #fv_rh_eng_trend").val() === ''){
      $("#fv_trendAlert").html('*Fill in all necessary field to add engine trend monitor.');
    } else {
      data = {
        'id': '0',
        'flight_id': $("#fv_flight_id").val(),
        'trend_id': $("#fv_trend").val(),
        'trend': trend_desc,
        'engine_1': lh_eng_trend,
        'engine_2': rh_eng_trend
      }
      fv_trends.push(data);
      fv_new_trends = {'trends': JSON.stringify(fv_trends)};
      $.ajax({
        url:'http://192.168.2.122/avia/flights/update_trends',
        method: 'post',
        data: fv_new_trends,
        dataType: 'json',
        success: function(data){
          $("#fv_trendTable").empty();
          fv_trends = data;
          console.log(data);
          for (var i = 0; i < data.length; i++) {
            td1 = '<tr><td class="hidden">'+data[i].id+'</td>';
            td2 = '<td>'+data[i].trend+'</td>';
            td3 = '<td>'+data[i].engine_1+'</td>';
            td4 = '<td>'+data[i].engine_2+'</td>';
            td5 = '<td class="text-center"><a href="#"><i id="'+data[i].id+'" onclick="trendRemove(this.id)" class="fa fa-times iconDel" title="remove"></i></a></td></tr>';
            $("#fv_trendTable").append(td1+td2+td3+td4+td5);
          }
        }
      });


      // $("#fv_trendTable").empty();
      // for (var i = 0; i < trends.length; i++) {
      //   td1 = '<tr><td>'+trends[i].trend+'</td>';
      //   td2 = '<td class="text-center">'+trends[i].engine_1+'</td>';
      //   td3 = '<td class="text-center">'+trends[i].engine_2+'</td>';
      //   td4 = '<td class="text-center"> <a href="#"><i class="fa fa-times" title="remove"></i></a> </td></tr>';
      //   $("#fv_trendTable").append(td1+td2+td3+td4);
      // }
    }
  });

  $("#fv_flightAdd").submit(function(e){
    e.preventDefault();
    $("#fv_logs").val(JSON.stringify(logs));
    $("#fv_pireps").val(JSON.stringify(pireps));
    $("#fv_trendMonitor").val(JSON.stringify(trends));
    flight = $(this).serialize();

    $.ajax({
      url: 'http://192.168.2.122/avia/add_flight',
      method: 'post',
      dataType: 'json',
      data : flight,
      success: function(data){
        if (data == 1) {
          $("#fv_log_response").removeClass("hidden");
          $("#fv_log_response").addClass("alert-success");
          $("#fv_log_response").html("Flight added successfully!");
          logs = [];
          pireps = [];
          trends = [];
          $("#fv_entryRow, #tblDefects, #trendTable").empty();
          $('#fv_flightAdd')[0].reset();
          $("#fv_log_response").fadeOut(8000);
        } else {
          $("#fv_log_response").removeClass("hidden");
          $("#fv_log_response").addClass("alert-danger");
          $("#fv_log_response").html("Flight adding failed!");
          $("#fv_log_response").fadeOut(8000);
        }
      }
    });
  });

  // Overall task updates
  $('#taskUpdate').submit(function(e){
    e.preventDefault();
    $('#task_frequencies').val(JSON.stringify(task_frequencies));
    task_details = $(this).serialize();

    $.ajax({
      url: 'http://192.168.2.122/avia/maintenance/update_task',
      method: 'post',
      dataType: 'json',
      data: task_details,
      success: function(data){
        console.log(data);
        if(data === 1){
          $("#v_task_response").removeClass('hidden');
          $("#v_task_response").addClass('alert-success');
          $("#v_task_response").fadeIn(3000);
          $("#v_task_response").html('Task updated successfully!');
          $("#v_schedule_details").empty();
          task_frequencies = [];
          $('#v_task_flightAdd')[0].reset();
          $("#v_task_response").fadeOut(5000);
        }else {
          $("#v_task_response").removeClass('hidden');
          $("#v_task_response").addClass('alert-danger');
          $("#v_task_response").html('Task was not updated, try again!');
        }
      }
    });

  });

  //Deletes task
  $("#fv_delete").click(function(){
    flight_id = $("#fv_flight_id").val();
    delete_flight(flight_id);
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
        url:'http://192.168.2.122/avia/maintenance/delete_frequency',
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

function logRemoveFreq(){
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
      log_id =  { id:data[0] };

      console.log(log_id);

      $.ajax({
        url:'http://192.168.2.122/avia/flights/delete_log',
        method: 'post',
        data: log_id,
        dataType: 'json',
        success: function(data){
          console.log(data);
          $("#fv_entryRow").empty();
          newTotalHours = 0;
          newTotalCycles = 0;
          for (var i = 0; i < data.length; i++) {
            td1 = '<tr><td class="hidden">'+data[i].log_id+'</td>';
            td2 = '<td>'+data[i].origin+'</td>';
            td3 = '<td>'+data[i].destination+'</td>';
            td4 = '<td>'+parseFloat(data[i].hours).toFixed(2)+'</td>';
            td5 = '<td>'+data[i].cycles+'</td>';
            td6 = '<td class="text-center"><a href="#"><i onclick="logRemoveFreq()" class="fa fa-times iconDel" title="remove"></i></a></td></tr>';
            $("#fv_entryRow").append(td1+td2+td3+td4+td5+td6);
            newTotalCycles += parseInt(data[i].cycles);
            newTotalHours += parseFloat(data[i].hours);
          }
          $('#fv_totalHours').val((newTotalHours).toFixed(2));
          $('#fv_totalCycles').val(newTotalCycles);
        }
      });
  };
}

function defectRemove(idClicked){
      pirep_id =  { id:idClicked };
      $.ajax({
        url:'http://192.168.2.122/avia/flights/delete_defect',
        method: 'post',
        data: pirep_id,
        dataType: 'json',
        success: function(data){
          console.log(data);
          $("#fv_tblDefects").empty();
          for (var i = 0; i < data.length; i++) {
            td1 = '<tr><td class="hidden">'+data[i].pirep_id+'</td>';
            td2 = '<td>'+data[i].defect+'</td>';
            td3 = '<td>'+data[i].mel_reference+'</td>';
            td4 = '<td>'+data[i].dfr_category+'</td>';
            td5 = '<td>'+data[i].deferred+'</td>';
            td6 = '<td>'+data[i].dfr_reason+'</td>';
            td7 = '<td>'+data[i].dfr_date+'</td>';
            td8 = '<td class="text-center"><a href="#"><i id="'+data[i].pirep_id+'" onclick="defectRemove(this.id)" class="fa fa-times iconDel" title="remove"></i></a></td></tr>';
            $("#fv_tblDefects").append(td1+td2+td3+td4+td5+td6+td7+td8);
          }
        }
      });
}

function trendRemove(idClicked){
      trend_id =  { id:idClicked };
      console.log(trend_id);
      $.ajax({
        url:'http://192.168.2.122/avia/flights/delete_trend',
        method: 'post',
        data: trend_id,
        dataType: 'json',
        success: function(data){
          $("#fv_trendTable").empty();
          for (var i = 0; i < data.length; i++) {
            td1 = '<tr><td class="hidden">'+data[i].id+'</td>';
            td2 = '<td>'+data[i].trend+'</td>';
            td3 = '<td>'+data[i].engine_1+'</td>';
            td4 = '<td>'+data[i].engine_2+'</td>';
            td5 = '<td class="text-center"><a href="#"><i id="'+data[i].id+'" onclick="trendRemove(this.id)" class="fa fa-times iconDel" title="remove"></i></a></td></tr>';
            $("#fv_trendTable").append(td1+td2+td3+td4+td5);
          }
        }
      });
}

function delete_flight(id){
  flight_id = {'flight_id': id};
  console.log(flight_id);
  $.ajax({
    url: 'http://192.168.2.122/avia/flights/delete_flight',
    method: 'post',
    dataType: 'json',
    data: flight_id,
    success: function(data){
      console.log(data);
      if (data = 1) {
        $(location).attr('href', 'http://192.168.2.122/avia/flights');
      } else {
        alert('Flight not deleted');
      }
    }
  })


}
