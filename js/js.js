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
    engine_hours = parseFloat($("#teh").val());
    engine_cycles = parseInt($("#tec").val());

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
    prop_hours = parseFloat($("#tph").val());
    prop_cycles = parseInt($("#tpc").val());

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

    $.ajax({
      url:'add_aircraft',
      method: 'POST',
      dataType:'json',
      data: aircraft_data,
      success: function(data){
        console.log(data);
        if (data == 1) {
          $("#response").removeClass("hidden");
          $("#response").addClass("alert-success");
          $("#response").html("Aircraft added successfully!");
          engineData = [];
          propData = [];
          $("#engData, #propData").empty();
          $('#aircraftAdd')[0].reset();
          // $("#response").fadeOut(8000);
        } else {
          $("#response").removeClass("hidden");
          $("#response").addClass("alert-danger");
          $("#response").html("Aircraft adding failed!");
          engineData = [];
          propData = [];
          $("#engData, #propData").empty();
          // $("#response").fadeOut(8000);
        }
      }
    });

  });

  // Techlog data entry
    $("#pirepsTab").click(function(){
      $("#pirepsTab").addClass("tab");
      $("#pirepsData").removeClass("hidden");
      $("#logTab, #trendTab").removeClass("tab");
      $("#logData, #trendData, #logDataEntry").addClass("hidden");

    });

    $("#logTab").click(function(){
      $("#logTab").addClass("tab");
      $("#logData, #logDataEntry").removeClass("hidden");
      $("#pirepsTab, #trendTab").removeClass("tab");
      $("#pirepsData, #trendData").addClass("hidden");
    });

    $("#trendTab").click(function(){
      $("#trendTab").addClass("tab");
      $("#trendData").removeClass("hidden");
      $("#pirepsTab, #logTab").removeClass("tab");
      $("#pirepsData, #logData, #logDataEntry").addClass("hidden");
    });

    totalCycles = 0;
    totalHours = 0;
    logs = [];
    pireps = [];
    trendMonitor = [];
    dfr_status = 0;

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

    dfr_status = 'No';
    $("#dfr_status").change(function(){
      if(this.checked){
        dfr_status = 'Yes';
      } else {
        dfr_status = 'No';
      }
    });

    // pireps data array create
    $("#addDefect").click(function(e){
      e.preventDefault();
      data = {
        'defect': $("#defect").val(),
        'ata_chapter_id': $("#ata_chapter_id").val(),
        'dfr_status': dfr_status,
        'limitations': $("#limitations").val(),
        'mel_reference': $("#mel_reference").val(),
        'dfr_reason': $("#dfr_reason").val(),
        'dfr_category': $("#dfr_category").val(),
        'dfr_date': $("#dfr_date").val(),
        'exp_date': $("#exp_date").val()
      }
      pireps.push(data);
      $("#tblDefects").empty();
      for (var i = 0; i < pireps.length; i++) {
        td1 = '<tr><td>'+pireps[i].defect+'</td>';
        td2 = '<td>'+pireps[i].mel_reference+'</td>';
        td3 = '<td class="text-center">'+pireps[i].dfr_category+'</td>';
        td4 = '<td class="text-center">'+pireps[i].dfr_status+'</td>';
        td5 = '<td>'+pireps[i].dfr_reason+'</td>';
        td6 = '<td class="text-center">'+pireps[i].dfr_date+'</td>';
        td7 = '<td><a href="#"><i class="fa fa-times" title="remove"></i></a></td></tr>';
        $("#tblDefects").append(td1+td2+td3+td4+td5+td6+td7);
      }
    });

    $("#flightAdd").submit(function(e){
      e.preventDefault();
      $("#logs").val(JSON.stringify(logs));
      $("#pireps").val(JSON.stringify(pireps));
      flight = $(this).serialize();

      $.ajax({
        url: 'http://localhost/avia/add_flight',
        method: 'post',
        dataType: 'json',
        data : flight,
        success: function(data){
          console.log(data);
          if (data == 1) {
            $("#response").removeClass("hidden");
            $("#response").addClass("alert-success");
            $("#response").html("<p>Flight added successfully!</p>");
            logs = [];
            pireps = [];
            $("#entryRow, #tblDefects").empty();
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
          if (data === undefined || data.length < 0) {
            $('#flightDisplay').html('<tr class="text-center">There is Flight data for this aircraft!</tr>')
          }else {
            j = 1;
            for (var i = 0; i < data.length; i++) {
              td1 = '<tr><td>'+j+'</td>';
              td2 = '<td>'+data[i].techlog+'</td>';
              td3 = '<td class="text-center">'+data[i].aircraft_reg+'</td>';
              td4 = '<td class="text-right">'+data[i].cycles+'</td>';
              td5 = '<td class="text-right">'+data[i].hours+'</td>';
              td6 = '<td class="text-center">'+data[i].date_posted+'</td>';
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
          if (nextDuecycs < discard_cycs) {
            $("#next_due_cycles").val(nextDuecycs);
          } else {
            $("#next_due_cycles").val(discard_cycs);
          }
          break;
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
          if (nextDuehrs < discard_hrs) {
            $("#next_due_hours").val(nextDuehrs);
          } else {
            $("#next_due_hours").val(discard_hrs);
          }
          break;
        }
      }
    });

    $('#last_done_date').keyup(function(){

      ld_date = Date.parse($("#last_done_date").val());
      for (var i = 0; i < frequencies.length; i++) {
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
      }
    })


    $('#taskAdd').submit(function(e){
      // e.preventDefault();
      $('#frequencies').val(JSON.stringify(frequencies));
      task_details = $(this).serialize();

      $.ajax({
        url: 'add_task',
        method: 'post',
        dataType: 'json',
        data: 'task_details',
        success: function(data){
          if(data == 0){
            $("#response").removeClass('hidden');
            $("#response").addClass('alert-danger');
            $("#response").html('Task was not added, try again!');
          }else {
            $("#response").removeClass('hidden');
            $("#response").addClass('alert-sucess');
            $("#response").html('Task was added successfully!');
            $('#flightAdd')[0].reset();
          }
        }
      });

    });

    $("#search_by").change(function(){
      id = $("#search_by").val();
      switch (id) {
        case '1':
          $("#c_aircraft_id").removeClass('hidden');
          $("#c_ata_chapter_id, #c_comp_cat_id, #c_inspection_id, #c_schedule_cat_id, #c_schedule_type_id, #c_task_category_id").addClass('hidden');
          break;
        case '2':
          $("#c_ata_chapter_id").removeClass('hidden');
          $("#c_aircraft_id, #c_comp_cat_id, #c_inspection_id, #c_schedule_cat_id, #c_schedule_type_id, #c_task_category_id").addClass('hidden');
          break;
        case '3':
          $("#c_comp_cat_id").removeClass('hidden');
          $("#c_aircraft_id, #c_ata_chapter_id, #c_inspection_id, #c_schedule_cat_id, #c_schedule_type_id, #c_task_category_id").addClass('hidden');
          break;
        case '4':
          $("#c_inspection_id").removeClass('hidden');
          $("#c_aircraft_id, #c_ata_chapter_id, #c_comp_cat_id, #c_schedule_cat_id, #c_schedule_type_id, #c_task_category_id").addClass('hidden');
          break;
        case '5':
          $("#c_schedule_cat_id").removeClass('hidden');
          $("#c_aircraft_id, #c_ata_chapter_id, #c_comp_cat_id, #c_inspection_id, #c_schedule_type_id, #c_task_category_id").addClass('hidden');
          break;
        case '6':
          $("#c_schedule_type_id").removeClass('hidden');
          $("#c_aircraft_id, #c_ata_chapter_id, #c_comp_cat_id, #c_inspection_id, #c_schedule_cat_id, #c_task_category_id").addClass('hidden');
          break;
        case '7':
          $("#c_task_category_id").removeClass('hidden');
        $ ("#c_aircraft_id, #c_ata_chapter_id, #c_comp_cat_id, #c_inspection_id, #c_schedule_cat_id, #c_schedule_type_id").addClass('hidden');
          break;
        default:
          $("#c_aircraft_id, #c_ata_chapter_id, #c_comp_cat_id, #c_inspection_id, #c_schedule_cat_id, #c_schedule_type_id, #c_task_category_id").addClass('hidden');

      }
    })

    $("#cs_craft_id").change(function(){
      cs_id = JSON.stringify($("#cs_craft_id").val());

      $.ajax({
        url: 'search_by_aircraft',
        method: 'post',
        dataType: 'json',
        data: cs_id,
        success: function(data){
          console.log(data);
        }
      });
    });

  // Business logic


})
