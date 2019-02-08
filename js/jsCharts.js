

let barChart = document.getElementById('barChart').getContext('2d');
let cycles = [47594, 41045, 39060, 35519, 41512, 40072];
// Global options
// Chart.defaults.global.defaultFontFamily = 'Lato';
// Chart.defaults.global.defaultFontSize = '11';
// Chart.defaults.global.defaultFontColor = '#777';

let massBarChart =  new Chart(barChart, {
  type: 'bar',
  data: {
    labels: ['5Y-BXB', '5Y-BXC', '5Y-CGL', '5Y-CGH', '5Y-BUZ'],
    datasets: [{
      label: 'Cycles',
      data: cycles,
      backgroundColor: ['red', 'yellow', 'green', 'blue', 'orange'],
      boderWidth: 1,
      borderColor: '#777',
      hoverBorderWidth: 1,
      hoverBorderColor: '#000'
    },
    {
      label: 'Mid Life',
      data: [40000, 40000, 40000, 40000, 40000, 40000],
      type: 'line',
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
        gridLines: {
          display: false
        }
      }],
      yAxes:[{
        stacked: true
      }]
    }
  },
});

let pieChart = document.getElementById('pieChart').getContext('2d');
let massPieChart = new Chart(pieChart, {
  type: 'pie',
  data: {
    labels: ['5Y-BXB', '5Y-BXC', '5Y-CGL', '5Y-CGH', '5Y-BUZ'],
    datasets: [{
      label: 'Cycles',
      data: cycles,
      backgroundColor: ['red', 'yellow', 'green', 'blue', 'orange'],
      boderWidth: 1,
      // borderColor: '#777',
      hoverBorderWidth: 1,
      hoverBorderColor: '#000'
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
  },
});

let lineChart = document.getElementById('lineChart').getContext('2d');
let massLineChart =  new Chart(lineChart, {
  type: 'line',
  data: {
    labels: ['5Y-BXB', '5Y-BXC', '5Y-CGL', '5Y-CGH', '5Y-BUZ'],
    datasets: [{
      label: 'Cycles',
      data: cycles,
      backgroundColor: 'rgba(255, 255, 255, 0)',
      boderWidth: 1,
      borderColor: 'red',
      hoverBorderWidth: 1,
      hoverBorderColor: '#000'
    }, {
      label: 'Mid Life',
      data: [40000, 40000, 40000, 40000, 40000, 40000],
      type: 'line',
      backgroundColor: 'rgba(255, 255, 255, 0)',
      borderColor: 'purple'
    }]
  },
  options:{
    title:{
      display: true,
      text: 'Aircraft Cycles'
    }, legend: {
      display: false,
      position: 'right',
      labels: {
        fontColor: '#000'
      }
    }, scales: {
      xAxes:[{
        // stacked: true,
        gridLines: {
          display: false
        }
      }],
      yAxes:[{
        // stacked: true
      }]
    }
  },
});

let radarChart = document.getElementById('radarChart').getContext('2d');
let massRadarChart =  new Chart(radarChart, {
  type: 'radar',
  data: {
    labels: ['5Y-BXB', '5Y-BXC', '5Y-CGL', '5Y-CGH', '5Y-BUZ'],
    datasets: [{
      label: 'Cycles',
      data: cycles,
      backgroundColor: 'pink',
      boderWidth: 1,
      borderColor: 'pink',
      hoverBorderWidth: 1,
      hoverBorderColor: '#000'
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
  },
});
