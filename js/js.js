$(document).ready(function(){
  engineData = [];
  propData = [];
  airframe =[];

  // user logic

  $("#addEngine").click(function(e){
    e.preventDefault();
    number = $("#engineNumber").val();
    serial_number = $("#engineSerialNumber").val();
    model = $('#engineModel').val();
    engine_hours = $("#teh").val();
    engine_cycles = $("#tec").val();

    td1 = '<tr><td>'+number+'</td>'
    td2 = '<td>'+model+'</td>'
    td3 = '<td>'+serial_number+'</td>'
    td4 = '<td>'+engine_hours+'</td>'
    td5 = '<td>'+engine_cycles+'</td></tr>'
    $("#engData").append(td1+td2+td3+td4+td5);

    data = {
      'number' : number,
      'serial_number' : serial_number,
      'model' : model,
      'engine_hours' : engine_hours,
      'engine_cycles' : engine_cycles
    }

    engineData.push(data);
  });

  $("#addProp").click(function(e){
    e.preventDefault();
    number = $("#propNumber").val();
    serial_number = $("#propSerialNumber").val();
    model = $('#propModel').val();
    prop_hours = $("#tph").val();
    prop_cycles = $("#tpc").val();

    td1 = '<tr><td>'+number+'</td>'
    td2 = '<td>'+model+'</td>'
    td3 = '<td>'+serial_number+'</td>'
    td4 = '<td>'+prop_hours+'</td>'
    td5 = '<td>'+prop_cycles+'</td></tr>'
    $("#propData").append(td1+td2+td3+td4+td5);

    data = {
      'number' : number,
      'serial_number' : serial_number,
      'model' : model,
      'prop_hours' : prop_hours,
      'prop_cycles' : prop_cycles
    }

    propData.push(data);
  });

  $("#aircraftAdd").submit(function(e){
    e.preventDefault();
    $("#engine_data").val(JSON.stringify(engineData));
    $("#prop_data").val(JSON.stringify(propData));
    aircraft_data = $(this).serialize();
    console.log(propData);

    $.ajax({
      url:'add_aircraft',
      method: 'POST',
      dataType:'json',
      data: aircraft_data,
      success: function(data){
        if (data == 1) {
          $("#response").removeClass("hidden");
          $("#response").addClass("alert-success");
          $("#response").html("<p>Aircraft added successfully!</p>");
          $('#aircraftAdd')[0].reset();
          $("#response").fadeOut(800);
        } else {
          $("#response").removeClass("hidden");
          $("#response").addClass("alert-danger");
          $("#response").html("<p>Aircraft adding failed!</p>");
          $("#response").fadeOut(800);
        }
      }
    });

  });

  // Techlog data entry
    $("#pirepsTab").click(function(){
      $("#pirepsTab").addClass("tab");
      $("#pirepsData").removeClass("hidden");
      $("#logTab").removeClass("tab");
      $("#logData").addClass("hidden");

    });

    $("#logTab").click(function(){
      $("#logTab").addClass("tab");
      $("#logData").removeClass("hidden");
      $("#pirepsTab").removeClass("tab");
      $("#pirepsData").addClass("hidden");
    });

    totalCycles = 0;
    totalHours = 0;
    logs = [];

    $("#landing").keyup(function(){
      takeoff = Date.parse($("#takeoff").val());
      landing = Date.parse($("#landing").val());
      hours = parseFloat((landing - takeoff)/3600000).toFixed(2)
      $("#hours").val(hours);
    });

    $("#add").click(function (e) {
      e.preventDefault();
      to = $("#to").val();
      from = $("#from").val();
      cycs = 1;
      takeoff = Date.parse($("#takeoff").val());
      landing = Date.parse($("#landing").val());
      hrs = parseFloat((landing-takeoff)/3600000);

      data = {
        'to': to,
        'from': from,
        'takeoff': $("#takeoff").val(),
        'landing': $("#landing").val(),
        'cycles': cycs,
        'hours': hrs
      }

      logs.push(data);

      totalCycles += cycs;
      $("#totalCycles").val(totalCycles);

      totalHours += hrs;
      $("#totalHours").val(parseFloat(totalHours).toFixed(2));

      td1 = '<tr><td>'+from+'</td>';
      td2 = '<td>'+to+'</td>';
      td3 = '<td>'+parseFloat(hrs).toFixed(2)+'</td>';
      td4 = '<td>'+cycs+'</td>';
      td5 = '<td class="text-center"><a href="#"><i class="fa fa-times" title="remove"></i></a></td></tr>';
      $("#entryRow").append(td1+td2+td3+td4+td5);

    });

    $("#flightAdd").submit(function(e){
      // e.preventDefault();
      $("#logs").val(JSON.stringify(logs));
      flight = $(this).serialize();

      $.ajax({
        url: 'add_flight',
        method: 'post',
        dataType: 'json',
        data : flight,
        success: function(data){
          if (data == 1) {
            $("#response").removeClass("hidden");
            $("#response").addClass("alert-success");
            $("#response").html("<p>Flight added successfully!</p>");
            $('#flightAdd')[0].reset();
            $("#response").fadeOut(8000);
          } else {
            $("#response").removeClass("hidden");
            $("#response").addClass("alert-danger");
            $("#response").html("<p>Flight adding failed!</p>");
            $("#response").fadeOut(8000);
          }
        }
      });

    });

    $("#aircraft_reg").change(function(e){
      e.preventDefault();
      $("#flightDisplay").empty();

      aircraft_id = $(this).serialize();
      $.ajax({
        url: 'flights/flight_by_aircraft',
        method: 'post',
        dataType: 'json',
        data: aircraft_id,
        success: function(data){
          if (data.length < 0) {
            $('#flightDisplay').html('<tr class="text-center">There is Flight data for this aircraft!</tr>')
          }else {
            j = 1;
            for (var i = 0; i < data.length; i++) {
              td1 = '<tr><td>'+j+'</td>';
              td2 = '<td>'+data[i].techlog+'</td>';
              td3 = '<td>'+data[i].aircraft_reg+'</td>';
              td4 = '<td>'+data[i].cycles+'</td>';
              td5 = '<td>'+data[i].hours+'</td>';
              td6 = '<td>'+data[i].date_posted+'</td>';
              td7 = '<td class="text-center"><a href="#"><i class="fa fa-pencil tableIcons" title="view flight ?>"></i></a></td></tr>'
              j++;
              $("#flightDisplay").append(td1+td2+td3+td4+td5+td6+td7);
            }
          }
        }
      });

    })

    // add task
    $('#scheduledTask').submit(function(e){
      e.preventDefault();

      task_data = $(this).serialize();

      $.ajax({
        url: 'maintenance/add_task',
        method: 'post',
        dataType: 'json',
        data: task_data,
        sucess: function(data){
          console.log(data);
        }
      })
    });

    //update task
    $('#scheduledTask_update').submit(function(e){
      e.preventDefault();

      task_data = $(this).serialize();

      $.ajax({
        url: 'maintenance/update_task',
        method: 'post',
        dataType: 'json',
        data: task_data,
        sucess: function(data){
          console.log(data);
        }
      })
    });

    //update task
    $('#scheduledTask_delete').submit(function(e){
      e.preventDefault();

      task_data = $(this).serialize();

      $.ajax({
        url: 'maintenance/delete_task',
        method: 'post',
        dataType: 'json',
        data: task_data,
        sucess: function(data){
          console.log(data);
        }
      })
    });

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

    // check if frequencies is empty. If empty; disable the calc button

    $("#calcDues").click(function(e){
      e.preventDefault();

      c_hrs = parseFloat($("#cum_hours").val());
      ld_hours = parseFloat($("#last_done_hours").val());
      discard_hrs = parseFloat($("#life_limit_hours").val());

      for (var i = 0; i < frequencies.length; i++) {
        nextDuehrs = ld_hours + parseFloat(frequencies[i].hours);
        if (frequencies[i].maint_type_id == 1 & nextDuehrs <= parseFloat(frequencies[i].hours) ) {
          $("#next_due_hours").val(nextDuehrs);
          break;
        } else if (frequencies[i].maint_type_id == 2 & nextDuehrs < discard_hrs) {
          $("#next_due_hours").val(nextDuehrs);
          break;
        } else if(frequencies[i].maint_type_id == 3) {
          nextDuehrs = parseFloat(frequencies[i].hours);
          $("#next_due_hours").val(nextDuehrs);
          break;
        }
      }
    });

    // due_hours = 0;
    // $("#cum_hours").keyup(function(e){
    //   e.preventDefault();
    //
    //   for (var i = 0; i < frequencies.length; i++) {
    //     if(frequencies[i].maint_type_id == 1 & parseInt($('#cum_hou15000rs').val()) <= parseInt(frequencies[i].hours)){
    //       due_hours = frequencies[i].hours;
    //       break;
    //       $("#next_due_hours").val(due_hours);
    //     } else if (frequencies[i].maint_type_id == 1 & parseInt($('#cum_hours').val()) > parseInt(frequencies[i].hours)) {
    //       due_hours = parseInt($('#last_done_hours').val()) + parseInt(frequencies[i].hours);
    //       $("#next_due_hours").val(due_hours);
    //       break;
    //     } else if (frequencies[i].maint_type_id == 2 ) {
    //       due_hours = parseInt($('#last_done_hours').val()) + parseInt(frequencies[i].hours);
    //       $("#next_due_hours").val(due_hours);
    //       break;
    //     } else if (frequencies[i].maint_type_id == 3) {
    //       due_hours = parseInt(frequencies[i].hours);
    //       $("#next_due_hours").val(due_hours);
    //     }
    //   }
    //
    // });


    $('#taskAdd').submit(function(e){
      e.preventDefault();
      $('#frequencies').val(JSON.stringify(frequencies));
      console.log(frequencies);
      console.log('Frequency is: '+frequencies[0].maint_type_id+', Cycle is: '+frequencies[0].cycles+'.');
      console.log('-----------------------------------');

      task_details = $(this).serialize();
      console.log(task_details);

      for (var i = 0; i < array.length; i++) {
        array[i]
      }
      //
      // $.ajax({
      //   url: 'maintenance/add_task',
      //   method: 'post',
      //   dataType: 'json',
      //   data: 'task_details',
      //   success: function(data){
      //     console.log(data);
      //   }
      // });

    });



  // Business logic


})
