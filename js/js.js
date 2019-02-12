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
    trends = [];
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
        'exp_date': $("#exp_date").val(),
        'rectification': $("#rectification").val(),
        'techlog_number': $("#techlog_number").val(),
        'cleared_date': $("#cleared_date").val(),
        'wo_number': $("#wo_number").val(),
        'remarks': $("#remarks").val()
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

    $("#addTrend").click(function(e){
      e.preventDefault();
      trend_id = $("#trend").val();
      trend_desc = $("#trend option:selected").text();
      lh_eng_trend = $("#lh_eng_trend").val();
      rh_eng_trend = $("#rh_eng_trend").val();

      if($("#trend, #lh_eng_trend, #rh_eng_trend").val() === ''){
        $("#trendAlert").html('*Fill in all necessary field to add engine trend monitor.');
      } else {
        data = {
          'trend_id': $("#trend").val(),
          'trend': trend_desc,
          'engine_1': lh_eng_trend,
          'engine_2': rh_eng_trend
        }
        trends.push(data);
        $("#trendTable").empty();
        for (var i = 0; i < trends.length; i++) {
          td1 = '<tr><td>'+trends[i].trend+'</td>';
          td2 = '<td class="text-center">'+trends[i].engine_1+'</td>';
          td3 = '<td class="text-center">'+trends[i].engine_2+'</td>';
          td4 = '<td class="text-center"> <a href="#"><i class="fa fa-times" title="remove"></i></a> </td></tr>';
          $("#trendTable").append(td1+td2+td3+td4);
        }
      }
    });

    $("#flightAdd").submit(function(e){
      e.preventDefault();
      $("#logs").val(JSON.stringify(logs));
      $("#pireps").val(JSON.stringify(pireps));
      $("#trendMonitor").val(JSON.stringify(trends));
      flight = $(this).serialize();

      $.ajax({
        url: 'http://192.168.2.114/avia/add_flight',
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
            trends = [];
            $("#entryRow, #tblDefects, #trendTable").empty();
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
      cs_id = { cs_id: $("#cs_craft_id").val() };
      $.ajax({
        url: 'cs_search_by_aircraft',
        method: 'post',
        dataType: 'json',
        data: cs_id,
        success: function(data){
          $("#tblComponents").empty();
          j = 1
          for (var i = 0; i < data.length; i++) {
            td1 = '<tr><td>'+j+'.</td>';
            td2 = '<td>'+data[i].aircraft_reg+'</td>';
            td3 = '<td>'+data[i].ata_chapter+'00</td>';
            td4 = '<td> <a href="maintenance/view_task/'+data[i].schedule_id+'">'+data[i].task+data[i].part_name+'</a> </td>';
            td5 = '<td class="text-center">'+data[i].task_category+'</td>';
            td6 = '<td class="text-center">'+data[i].date_checked+'</td>';
            td7 = '<td class="text-center cat1">'+data[i].cycles+'</td>';
            td8 = '<td class="text-center cat1">'+data[i].hours+'</td>';
            td9 = '<td class="text-center cat1">'+data[i].calendar+data[i].period+'</td>';
            td10 = '<td class="text-center cat2">'+data[i].cum_cycles+'</td>';
            td11 = '<td class="text-center cat2">'+data[i].cum_hours+'</td>';
              let today = new Date(), date_done = new Date(data[i].date_checked);
              let diff_days = Math.abs(today.getTime() - date_done.getTime());
              let since_days = Math.ceil(diff_days / (1000 * 3600 * 24));
            td12 = '<td class="text-center cat2">'+since_days+'D</td>';
            td13 = '<td class="text-center cat3">'+( (data[i].next_due_cycles)-(data[i].cum_cycles) )+'</td>';
            td14 = '<td class="text-center cat3">'+( (data[i].next_due_hours)-(data[i].cum_hours) )+'</td>';
              let next_date = new Date(data[i].next_due_date), date_due = new Date(data[i].date_checked);
              let timeDiff = Math.abs(next_date.getTime() - date_due.getTime());
              let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            td15 = '<td class="text-center cat3">'+diffDays+'D</td>';
            td16 = '<td class="text-center"> <a href="maintenance/edit_task/'+data[i].schedule_id+'"><i class="fa fa-pencil tableIcons" title="edit"'+data[i].schedule_id+'></i></a> </td></tr>'
            $("#tblComponents").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10+td11+td12+td13+td14+td15+td16);
            j++;
          }
        }
      });
    });

    $("#cs_ata_id").change(function(){
      cs_ata_id = { cs_ata_id: $("#cs_ata_id").val() };
      $.ajax({
        url: 'cs_search_by_ata',
        method: 'post',
        dataType: 'json',
        data: cs_ata_id,
        success: function(data){
          $("#tblComponents").empty();
          j = 1
          for (var i = 0; i < data.length; i++) {
            td1 = '<tr><td>'+j+'.</td>';
            td2 = '<td>'+data[i].aircraft_reg+'</td>';
            td3 = '<td>'+data[i].ata_chapter+'00</td>';
            td4 = '<td> <a href="maintenance/view_task/'+data[i].schedule_id+'">'+data[i].task+data[i].part_name+'</a> </td>';
            td5 = '<td class="text-center">'+data[i].task_category+'</td>';
            td6 = '<td class="text-center">'+data[i].date_checked+'</td>';
            td7 = '<td class="text-center cat1">'+data[i].cycles+'</td>';
            td8 = '<td class="text-center cat1">'+data[i].hours+'</td>';
            td9 = '<td class="text-center cat1">'+data[i].calendar+data[i].period+'</td>';
            td10 = '<td class="text-center cat2">'+data[i].cum_cycles+'</td>';
            td11 = '<td class="text-center cat2">'+data[i].cum_hours+'</td>';
              let today = new Date(), date_done = new Date(data[i].date_checked);
              let diff_days = Math.abs(today.getTime() - date_done.getTime());
              let since_days = Math.ceil(diff_days / (1000 * 3600 * 24));
            td12 = '<td class="text-center cat2">'+since_days+'D</td>';
            td13 = '<td class="text-center cat3">'+( (data[i].next_due_cycles)-(data[i].cum_cycles) )+'</td>';
            td14 = '<td class="text-center cat3">'+( (data[i].next_due_hours)-(data[i].cum_hours) )+'</td>';
              let next_date = new Date(data[i].next_due_date), date_due = new Date(data[i].date_checked);
              let timeDiff = Math.abs(next_date.getTime() - date_due.getTime());
              let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            td15 = '<td class="text-center cat3">'+diffDays+'D</td>';
            td16 = '<td class="text-center"> <a href="maintenance/edit_task/'+data[i].schedule_id+'"><i class="fa fa-pencil tableIcons" title="edit"'+data[i].schedule_id+'></i></a> </td></tr>'
            $("#tblComponents").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10+td11+td12+td13+td14+td15+td16);
            j++;
          }
        }
      });
    });

    $("#cs_comp_cat_id").change(function(){
      comp_cat_id = { comp_cat_id: $("#cs_comp_cat_id").val() };
      $.ajax({
        url: 'cs_search_by_comp_cat',
        method: 'post',
        dataType: 'json',
        data: comp_cat_id,
        success: function(data){
          $("#tblComponents").empty();
          j = 1
          for (var i = 0; i < data.length; i++) {
            td1 = '<tr><td>'+j+'.</td>';
            td2 = '<td>'+data[i].aircraft_reg+'</td>';
            td3 = '<td>'+data[i].ata_chapter+'00</td>';
            td4 = '<td> <a href="maintenance/view_task/'+data[i].schedule_id+'">'+data[i].task+data[i].part_name+'</a> </td>';
            td5 = '<td class="text-center">'+data[i].task_category+'</td>';
            td6 = '<td class="text-center">'+data[i].date_checked+'</td>';
            td7 = '<td class="text-center cat1">'+data[i].cycles+'</td>';
            td8 = '<td class="text-center cat1">'+data[i].hours+'</td>';
            td9 = '<td class="text-center cat1">'+data[i].calendar+data[i].period+'</td>';
            td10 = '<td class="text-center cat2">'+data[i].cum_cycles+'</td>';
            td11 = '<td class="text-center cat2">'+data[i].cum_hours+'</td>';
              let today = new Date(), date_done = new Date(data[i].date_checked);
              let diff_days = Math.abs(today.getTime() - date_done.getTime());
              let since_days = Math.ceil(diff_days / (1000 * 3600 * 24));
            td12 = '<td class="text-center cat2">'+since_days+'D</td>';
            td13 = '<td class="text-center cat3">'+( (data[i].next_due_cycles)-(data[i].cum_cycles) )+'</td>';
            td14 = '<td class="text-center cat3">'+( (data[i].next_due_hours)-(data[i].cum_hours) )+'</td>';
              let next_date = new Date(data[i].next_due_date), date_due = new Date(data[i].date_checked);
              let timeDiff = Math.abs(next_date.getTime() - date_due.getTime());
              let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            td15 = '<td class="text-center cat3">'+diffDays+'D</td>';
            td16 = '<td class="text-center"> <a href="maintenance/edit_task/'+data[i].schedule_id+'"><i class="fa fa-pencil tableIcons" title="edit"'+data[i].schedule_id+'></i></a> </td></tr>'
            $("#tblComponents").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10+td11+td12+td13+td14+td15+td16);
            j++;
          }
        }
      });
    });

    $("#cs_insp_id").change(function(){
      insp_id = { insp_id: $("#cs_insp_id").val() };
      $.ajax({
        url: 'cs_search_by_inspection_type',
        method: 'post',
        dataType: 'json',
        data: insp_id,
        success: function(data){
          $("#tblComponents").empty();
          j = 1
          for (var i = 0; i < data.length; i++) {
            td1 = '<tr><td>'+j+'.</td>';
            td2 = '<td>'+data[i].aircraft_reg+'</td>';
            td3 = '<td>'+data[i].ata_chapter+'00</td>';
            td4 = '<td> <a href="maintenance/view_task/'+data[i].schedule_id+'">'+data[i].task+data[i].part_name+'</a> </td>';
            td5 = '<td class="text-center">'+data[i].task_category+'</td>';
            td6 = '<td class="text-center">'+data[i].date_checked+'</td>';
            td7 = '<td class="text-center cat1">'+data[i].cycles+'</td>';
            td8 = '<td class="text-center cat1">'+data[i].hours+'</td>';
            td9 = '<td class="text-center cat1">'+data[i].calendar+data[i].period+'</td>';
            td10 = '<td class="text-center cat2">'+data[i].cum_cycles+'</td>';
            td11 = '<td class="text-center cat2">'+data[i].cum_hours+'</td>';
              let today = new Date(), date_done = new Date(data[i].date_checked);
              let diff_days = Math.abs(today.getTime() - date_done.getTime());
              let since_days = Math.ceil(diff_days / (1000 * 3600 * 24));
            td12 = '<td class="text-center cat2">'+since_days+'D</td>';
            td13 = '<td class="text-center cat3">'+( (data[i].next_due_cycles)-(data[i].cum_cycles) )+'</td>';
            td14 = '<td class="text-center cat3">'+( (data[i].next_due_hours)-(data[i].cum_hours) )+'</td>';
              let next_date = new Date(data[i].next_due_date), date_due = new Date(data[i].date_checked);
              let timeDiff = Math.abs(next_date.getTime() - date_due.getTime());
              let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            td15 = '<td class="text-center cat3">'+diffDays+'D</td>';
            td16 = '<td class="text-center"> <a href="maintenance/edit_task/'+data[i].schedule_id+'"><i class="fa fa-pencil tableIcons" title="edit"'+data[i].schedule_id+'></i></a> </td></tr>'
            $("#tblComponents").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10+td11+td12+td13+td14+td15+td16);
            j++;
          }
        }
      });
    });

    $("#d_search_by").change(function(){
      search = $("#d_search_by").val()
      switch (search) {
        case '1':
          aircraft_id = { "aircraft_id": $("#dfr_aircraft_id").val() };
          $.ajax({
            url: 'flights/get_defects_by_aircraft',
            method: 'POST',
            data: aircraft_id,
            dataType: 'json',
            success: function(defects){
              $("#defectsDisplay").empty();
              j = 1;
              for (var i = 0; i < defects.length; i++) {
                td1 = '<tr><td>'+j+'.</td>';
                td2 = '<td>'+defects[i].techlog+'</td>';
                td3 = '<td class="text-center">'+defects[i].aircraft_reg+'</td>';
                td4 = '<td class="text-center">'+defects[i].ata_chapter+'00</td>';
                td5 = '<td>'+defects[i].defect+'</td>';
                td6 = '<td class="text-center">'+defects[i].deferred+'</td>';
                td7 = '<td class="text-center">'+defects[i].dfr_category+'</td>';
                td8 = '<td class="text-center">'+defects[i].dfr_date+'</td>';
                td9 = '<td class="text-center">'+defects[i].exp_date+'</td>';
                td10 = '<td class="text-center"><a href="#"><i class="fa fa-pencil tableIcons" title="view defect>"></i></a></td></tr>';
                $("#defectsDisplay").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10);
                j++;
              }
            }
          });
          $("#d_aircraft_id").removeClass('hidden');
          $("#d_ata_id, #d_status, #d_dates").addClass('hidden');
          break;
        case '2':
          ata_id = { 'ata_id': $("#dfr_ata_id").val() };
          $.ajax({
            url: 'flights/get_defects_by_ata',
            method: 'POST',
            data: ata_id,
            dataType: 'json',
            success: function(defects){
              $("#defectsDisplay").empty();
              j = 1;
              for (var i = 0; i < defects.length; i++) {
                td1 = '<tr><td>'+j+'.</td>';
                td2 = '<td>'+defects[i].techlog+'</td>';
                td3 = '<td class="text-center">'+defects[i].aircraft_reg+'</td>';
                td4 = '<td class="text-center">'+defects[i].ata_chapter+'00</td>';
                td5 = '<td>'+defects[i].defect+'</td>';
                td6 = '<td class="text-center">'+defects[i].deferred+'</td>';
                td7 = '<td class="text-center">'+defects[i].dfr_category+'</td>';
                td8 = '<td class="text-center">'+defects[i].dfr_date+'</td>';
                td9 = '<td class="text-center">'+defects[i].exp_date+'</td>';
                td10 = '<td class="text-center"><a href="#"><i class="fa fa-pencil tableIcons" title="view defect>"></i></a></td></tr>';
                $("#defectsDisplay").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10);
                j++;
              }
            }
          });
          $("#d_ata_id").removeClass('hidden');
          $("#d_status, #d_dates, #d_aircraft_id").addClass('hidden');
          break;
        case '3':
          dfr_status = { 'dfr_status': $("#dfr_status").val() };
          $.ajax({
            url: 'flights/get_defects_by_status',
            method: 'POST',
            data: dfr_status,
            dataType: 'json',
            success: function(defects){
              $("#defectsDisplay").empty();
              j = 1;
              for (var i = 0; i < defects.length; i++) {
                td1 = '<tr><td>'+j+'.</td>';
                td2 = '<td>'+defects[i].techlog+'</td>';
                td3 = '<td class="text-center">'+defects[i].aircraft_reg+'</td>';
                td4 = '<td class="text-center">'+defects[i].ata_chapter+'00</td>';
                td5 = '<td>'+defects[i].defect+'</td>';
                td6 = '<td class="text-center">'+defects[i].deferred+'</td>';
                td7 = '<td class="text-center">'+defects[i].dfr_category+'</td>';
                td8 = '<td class="text-center">'+defects[i].dfr_date+'</td>';
                td9 = '<td class="text-center">'+defects[i].exp_date+'</td>';
                td10 = '<td class="text-center"><a href="#"><i class="fa fa-pencil tableIcons" title="view defect>"></i></a></td></tr>';
                $("#defectsDisplay").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10);
                j++;
              }
            }
          });
          $("#d_status").removeClass('hidden');
          $("#d_dates, #d_aircraft_id, #d_ata_id").addClass('hidden');
          break;
        case '4':
          dates = {
            'to': $("#dfr_to_date").val(),
            'from': $("#dfr_from_date").val()
          };
          $.ajax({
            url: 'flights/get_defects_by_date',
            method: 'POST',
            data: dates,
            dataType: 'json',
            success: function(defects){
              $("#defectsDisplay").empty();
              j = 1;
              for (var i = 0; i < defects.length; i++) {
                td1 = '<tr><td>'+j+'.</td>';
                td2 = '<td>'+defects[i].techlog+'</td>';
                td3 = '<td class="text-center">'+defects[i].aircraft_reg+'</td>';
                td4 = '<td class="text-center">'+defects[i].ata_chapter+'00</td>';
                td5 = '<td>'+defects[i].defect+'</td>';
                td6 = '<td class="text-center">'+defects[i].deferred+'</td>';
                td7 = '<td class="text-center">'+defects[i].dfr_category+'</td>';
                td8 = '<td class="text-center">'+defects[i].dfr_date+'</td>';
                td9 = '<td class="text-center">'+defects[i].exp_date+'</td>';
                td10 = '<td class="text-center"><a href="#"><i class="fa fa-pencil tableIcons" title="view defect>"></i></a></td></tr>';
                $("#defectsDisplay").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10);
                j++;
              }
            }
          });
          $("#d_dates").removeClass('hidden');
          $("#d_aircraft_id, #d_ata_id, #d_status").addClass('hidden');
          break;
        default:
          $("#d_aircraft_id, #d_ata_id, #d_status, #d_dates").addClass('hidden');
      }

    });

    $("#dfr_aircraft_id").change(function(){
      aircraft_id = { aircraft_id: $("#dfr_aircraft_id").val() };
      $.ajax({
        url: 'flights/get_defects_by_aircraft',
        method: 'POST',
        data: aircraft_id,
        dataType: 'json',
        success: function(defects){
          $("#defectsDisplay").empty();
          j = 1;
          for (var i = 0; i < defects.length; i++) {
            td1 = '<tr><td>'+j+'.</td>';
            td2 = '<td>'+defects[i].techlog+'</td>';
            td3 = '<td class="text-center">'+defects[i].aircraft_reg+'</td>';
            td4 = '<td class="text-center">'+defects[i].ata_chapter+'00</td>';
            td5 = '<td>'+defects[i].defect+'</td>';
            td6 = '<td class="text-center">'+defects[i].deferred+'</td>';
            td7 = '<td class="text-center">'+defects[i].dfr_category+'</td>';
            td8 = '<td class="text-center">'+defects[i].dfr_date+'</td>';
            td9 = '<td class="text-center">'+defects[i].exp_date+'</td>';
            td10 = '<td class="text-center"><a href="#"><i class="fa fa-pencil tableIcons" title="view defect>"></i></a></td></tr>';
            $("#defectsDisplay").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10);
            j++;
          }
        }
      });
    });

    $("#dfr_ata_id").change(function(){
      ata_id = { ata_id : $("#dfr_ata_id").val() };
      $.ajax({
        url: 'flights/get_defects_by_ata',
        method: 'POST',
        data: ata_id,
        dataType: 'json',
        success: function(defects){
          $("#defectsDisplay").empty();
          j = 1;
          for (var i = 0; i < defects.length; i++) {
            td1 = '<tr><td>'+j+'.</td>';
            td2 = '<td>'+defects[i].techlog+'</td>';
            td3 = '<td class="text-center">'+defects[i].aircraft_reg+'</td>';
            td4 = '<td class="text-center">'+defects[i].ata_chapter+'00</td>';
            td5 = '<td>'+defects[i].defect+'</td>';
            td6 = '<td class="text-center">'+defects[i].deferred+'</td>';
            td7 = '<td class="text-center">'+defects[i].dfr_category+'</td>';
            td8 = '<td class="text-center">'+defects[i].dfr_date+'</td>';
            td9 = '<td class="text-center">'+defects[i].exp_date+'</td>';
            td10 = '<td class="text-center"><a href="#"><i class="fa fa-pencil tableIcons" title="view defect>"></i></a></td></tr>';
            $("#defectsDisplay").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10);
            j++;
          }
        }
      });
    });

    $("#dfr_status").change(function(){
      dfr_status = { dfr_status : $("#dfr_status").val() }
      $.ajax({
        url: 'flights/get_defects_by_status',
        method: 'POST',
        data: dfr_status,
        dataType: 'json',
        success: function(defects){
          $("#defectsDisplay").empty();
          j = 1;
          for (var i = 0; i < defects.length; i++) {
            td1 = '<tr><td>'+j+'.</td>';
            td2 = '<td>'+defects[i].techlog+'</td>';
            td3 = '<td class="text-center">'+defects[i].aircraft_reg+'</td>';
            td4 = '<td class="text-center">'+defects[i].ata_chapter+'00</td>';
            td5 = '<td>'+defects[i].defect+'</td>';
            td6 = '<td class="text-center">'+defects[i].deferred+'</td>';
            td7 = '<td class="text-center">'+defects[i].dfr_category+'</td>';
            td8 = '<td class="text-center">'+defects[i].dfr_date+'</td>';
            td9 = '<td class="text-center">'+defects[i].exp_date+'</td>';
            td10 = '<td class="text-center"><a href="#"><i class="fa fa-pencil tableIcons" title="view defect>"></i></a></td></tr>';
            $("#defectsDisplay").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10);
            j++;
          }
        }
      });
    });

    $("#dfr_to_date").keyup(function(){
      dates = {
        'to': $("#dfr_to_date").val(),
        'from': $("#dfr_from_date").val()
      };
      $.ajax({
        url: 'flights/get_defects_by_date',
        method: 'POST',
        data: dates,
        dataType: 'json',
        success: function(defects){
          $("#defectsDisplay").empty();
          j = 1;
          for (var i = 0; i < defects.length; i++) {
            td1 = '<tr><td>'+j+'.</td>';
            td2 = '<td>'+defects[i].techlog+'</td>';
            td3 = '<td class="text-center">'+defects[i].aircraft_reg+'</td>';
            td4 = '<td class="text-center">'+defects[i].ata_chapter+'00</td>';
            td5 = '<td>'+defects[i].defect+'</td>';
            td6 = '<td class="text-center">'+defects[i].deferred+'</td>';
            td7 = '<td class="text-center">'+defects[i].dfr_category+'</td>';
            td8 = '<td class="text-center">'+defects[i].dfr_date+'</td>';
            td9 = '<td class="text-center">'+defects[i].exp_date+'</td>';
            td10 = '<td class="text-center"><a href="#"><i class="fa fa-pencil tableIcons" title="view defect>"></i></a></td></tr>';
            $("#defectsDisplay").append(td1+td2+td3+td4+td5+td6+td7+td8+td9+td10);
            j++;
          }
        }
      });
    })


});

//Business Logic
