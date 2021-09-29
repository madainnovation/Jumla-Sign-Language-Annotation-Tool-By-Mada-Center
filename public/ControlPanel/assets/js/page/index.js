"use strict";

var ctx = document.getElementById("myChart").getContext('2d');
var balance_chart_bg_color = ctx.createLinearGradient(0, 0, 0, 0);
var balance_chart_bg_color2 = ctx.createLinearGradient(0, 0, 0, 700);
balance_chart_bg_color.addColorStop(0, 'rgba(1, 98, 114,.2)');
balance_chart_bg_color.addColorStop(1, 'rgba(1, 98, 114,0)');

 new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August","September ","October","November","December"],
    datasets: [
        {
      label: 'Mada',
      data: randArray(),
        backgroundColor: balance_chart_bg_color,
        borderWidth: 3,
        borderColor: 'rgba(1, 98  , 114,1)',
        pointBorderWidth: 0,
        pointBorderColor: 'transparent',
        pointRadius: 3.5,
        pointBackgroundColor: 'transparent',
        pointHoverBackgroundColor: 'rgba(1, 98  , 114,1)',
    },
        {
            label: 'Georgetown University Qatar',
            data: randArray(),
            borderWidth: 3,
            backgroundColor: balance_chart_bg_color,
            borderColor: 'rgba(0,252,5,.8)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(0,252,5,.8)',
        },
        {
            label: 'WebSite1',
            data: randArray(),
            borderWidth: 3,
            backgroundColor: balance_chart_bg_color,
            borderColor: 'rgba(155,0,1,0.8)',
            pointBorderWidth: 0 ,
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(155,0,1,0.8)',
        },
        {
            label: 'WebSite4',
            data:randArray(),
            borderWidth: 3,
            backgroundColor: balance_chart_bg_color,
            borderColor: 'rgba(254,215,0,0.8)',
            pointBorderWidth: 0 ,
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(254,215,0,0.8)',
        },
        {
            label: 'WebSite5',
            data:randArray(),
            borderWidth: 3,
            backgroundColor: balance_chart_bg_color,
            borderColor: 'rgb(0,0,0)',
            pointBorderWidth: 0 ,
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgb(0,0,0)',
        },
        {
            label: 'Mada',
            data:randArray(),
            backgroundColor: balance_chart_bg_color,
            borderWidth: 3,
            borderColor: 'rgba(1, 98, 114,1)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(1, 98, 114,1)',
        },
        {
            label: 'Innovation Lab - MOTC',
            data:randArray(),
            backgroundColor: balance_chart_bg_color,
            borderWidth: 3,
            borderColor: 'rgba(63,82,227,.8)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
        },
        {
            label: 'Georgetown University Qatar',
            data:randArray(),
            borderWidth: 3,
            backgroundColor: balance_chart_bg_color,
            borderColor: 'rgba(0,252,5,.8)',
            pointBorderWidth: 0,
            pointBorderColor: 'transparent',
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(0,252,5,.8)',
        },
        {
            label: 'WebSite1',
            data:randArray(),
            borderWidth: 3,
            backgroundColor: balance_chart_bg_color,
            borderColor: 'rgba(155,0,1,0.8)',
            pointBorderWidth: 0 ,
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(155,0,1,0.8)',
        },
        {
            label: 'WebSite2',
            data:randArray(),
            borderWidth: 3,
            backgroundColor: balance_chart_bg_color,
            borderColor: 'rgba(0,2,254,0.8)',
            pointBorderWidth: 0 ,
            pointRadius: 3.5,
            pointBackgroundColor: 'transparent',
            pointHoverBackgroundColor: 'rgba(0,2,254,0.8)',
        },

    ]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          // display: false,
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 20,
          callback: function(value, index, values) {
            return  value;
          }
        }
      }],
      xAxes: [{
        gridLines: {
          display: false,
          tickMarkLength: 10,
        }
      }]
    },
  }
});

var sales_chart = document.getElementById("sales-chart").getContext('2d');

var balance_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
balance_chart_bg_color.addColorStop(0, 'rgba(1, 98, 114,.2)');
balance_chart_bg_color.addColorStop(1, 'rgba(1, 98, 114,0)');

 new Chart(sales_chart, {
  type: 'line',
  data: {
    labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
    datasets: [{
      label: 'Usability average ',
      data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
      backgroundColor: balance_chart_bg_color,
      borderWidth: 3,
      borderColor: 'rgba(1, 98, 114,1)',
      pointBorderWidth: 0,
      pointBorderColor: 'transparent',
      pointRadius: 3,
      pointBackgroundColor: 'transparent',
      pointHoverBackgroundColor: 'rgba(1, 98, 114,1)',
    }]
  },
  options: {
    layout: {
      padding: {
        bottom: -1,
        left: -1
      }
    },
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: false,
        },
        ticks: {
          beginAtZero: true,
          display: false
        }
      }],
      xAxes: [{
        gridLines: {
          drawBorder: false,
          display: false,
        },
        ticks: {
          display: false
        }
      }]
    },
  }
});




var  balance_chart= document.getElementById("balance-chart").getContext('2d');
    var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
    balance_chart_bg_color.addColorStop(0, 'rgba(1, 98, 114,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(1, 98, 114,0)');

    new Chart(balance_chart, {
        type: 'line',
        data: {
            labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
            datasets: [{
                label: 'E-Accessibility Score',
                data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
                backgroundColor: balance_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(1, 98, 114,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(1, 98, 114,1)',
            }]
        },

        options: {
            responsive:true,
            layout: {
                padding: {
                    bottom: -1,
                    left: -1
                }
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false
                    }
                }]
            },
        }
    });

$("#products-carousel").owlCarousel({
  items: 3,
  margin: 10,
  autoplay: true,
  autoplayTimeout: 5000,
  loop: true,
  responsive: {
    0: {
      items: 2
    },
    768: {
      items: 2
    },
    1200: {
      items: 3
    }
  }
});

function rand(maxLimit = 100) { let rand = Math.random() * maxLimit; return Math.floor(rand);}
function randArray(){
    var arr=[];
    for(var i=0;i<12;i++){
        arr[i]=rand(100);
    }
    return arr;
}

