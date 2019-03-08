$(document).ready(function(){
  // get graph data
  $.get('http://192.168.2.122/avia/charts/fleet_data', function(data){
    data = JSON.parse(data);
    reg = [];
    craft_cycs = [];
    margin = [];

    for (var i = 0; i < data.length; i++) {
      reg.push(data[i].aircraft_reg);
      craft_cycs.push(data[i].cum_cycles);
      margin.push(40000);
    }

    // Bar chart
    let barChart = $("#barChart");
    let cycBarChart = new Chart(barChart, {
      type: 'bar',
      data: {
        labels: reg,
        datasets: [{
          label: 'Cycles',
          data: craft_cycs,
          backgroundColor: ['red', 'yellow', 'green', 'blue', 'orange', 'grey']
        }, {
          type: 'line',
          label: 'Mid Life',
          data: margin,
          backgroundColor: 'rgba(255, 255, 255, 0)',
          borderColor: 'purple'
        }]
      },
      options:{
        title:{
          display: true,
          text: 'Aircraft Cycles'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000'
          }
        },
        scales: {
          xAxes:[{
            stacked: true,
            gridLines: {
              display: false
            }
          }],
          yAxes:[{
            stacked: true
          }]
        }
      }
    });

    // Pie chart
    let pieChart = $("#pieChart");
    let cycPieChart = new Chart(pieChart, {
      type: 'pie',
      data: {
        labels: reg,
        datasets: [{
          label: 'Cycles',
          data: craft_cycs,
          backgroundColor: ['red', 'yellow', 'green', 'blue', 'orange', 'grey']
        }]
      },
      options:{
        title:{
          display: true,
          text: 'Aircraft Cycles'
        },
        legend: {
          position: 'right',
          labels: {
            fontColor: '#000'
          }
        }
      }
    });

    // Line chart
    let lineChart = $("#lineChart");
    let cycLineChart = new Chart(lineChart, {
      type: 'line',
      data: {
        labels: reg,
        datasets: [{
          label: 'Cycles',
          data: craft_cycs,
          backgroundColor: 'rgba(255, 255, 255, 0)',
          borderColor: 'red'
        }, {
          label: 'Mid Life',
          data: margin,
          backgroundColor: 'rgba(255, 255, 255, 0)',
          borderColor: 'purple',
        }]
      },
      options:{
        title:{
          display: true,
          text: 'Aircraft Cycles'
        },
        legend: {
          display: false,
        },
        scales: {
          xAxes:[{
            stacked: true,
            gridLines: {
              display: false
            }
          }],
          yAxes:[{
            stacked: false
          }]
        }
      }
    });

    // Radar chart
    let radarChart = $("#radarChart");
    let cycRadarChart = new Chart(radarChart, {
      type: 'radar',
      data: {
        labels: reg,
        datasets: [{
          label: 'Cycles',
          data: craft_cycs
        }]
      },
      options:{
        title:{
          display: true,
          text: 'Aircraft Cycles'
        },
        legend: {
          display: false,
          position: 'right',
          labels: {
            fontColor: '#000'
          }
        }
      }
    });

  });
});
