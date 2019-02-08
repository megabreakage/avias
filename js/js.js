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
          $("#craft_response").removeClass("hidden");
          $("#craft_response").addClass("alert-success");
          $("#craft_response").html("Aircraft added successfully!");
          engineData = [];
          propData = [];
          $("#engData, #propData").empty();
          $('#aircraftAdd')[0].reset();
          // $("#response").fadeOut(8000);
        } else {
          $("#craft_response").removeClass("hidden");
          $("#craft_response").addClass("alert-danger");
          $("#craft_response").html("Aircraft adding failed!");
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
        $("#deferredDetails").removeClass("hidden");
      } else {
        dfr_status = 'No';
        $("#deferredDetails").addClass("hidden");
        $("#limitations, #mel_reference, #dfr_reason, #add_number, #dfr_category, #dfr_date, #exp_date").val("");
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
            $("#log_response").removeClass("hidden");
            $("#log_response").addClass("alert-success");
            $("#log_response").html("Flight added successfully!");
            logs = [];
            pireps = [];
            $("#entryRow, #tblDefects").empty();
            $('#flightAdd')[0].reset();
            $("#log_response").fadeOut(8000);
          } else {
            $("#log_response").removeClass("hidden");
            $("#log_response").addClass("alert-danger");
            $("#log_response").html("Flight adding failed!");
            $("#log_response").fadeOut(8000);
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

    });

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

    // update task
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

    // delete task
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


});

//Business Logic
