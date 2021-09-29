async  function totalEAccessibilityScoreChart(avg,desktop,mobile){
    await  $(".totalEAccessibilityScoreChart").html("<canvas id='myChart' height='50'></canvas>");
    var ctx = document.getElementById("myChart").getContext('2d');
    var balance_chart_bg_color = ctx.createLinearGradient(0, 0, 0, 200);
    balance_chart_bg_color.addColorStop(0, 'rgba(1, 98, 114,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(1, 98, 114,0)');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August","September ","October","November","December"],
            datasets: [
                {
                    label: 'AVG',
                    data:fromObjectToArray(avg),
                    backgroundColor: getColor(1,98,114),
                    borderWidth: 1,
                    borderColor: 'rgba(1,98,114,0.8)',
                    // borderColor: 'transparent',
                    pointBorderWidth: 0,
                    pointBorderColor: 'transparent',
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(1, 98, 114,1)',
                },
                {
                    label: 'Desktop',
                    data:fromObjectToArray(desktop),
                    borderWidth: 1,
                    backgroundColor: getColor(0,67,255),
                    borderColor: 'rgba(0,67,255,0.8)',
                    pointBorderWidth: 0 ,
                    pointBorderColor: 'transparent',
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(0,67,255,0.8)',
                },
                {
                    label: 'Mobile',
                    data:fromObjectToArray(mobile),
                    backgroundColor: getColor(246,30,30) ,
                    borderWidth: 1,
                    borderColor: 'rgba(246,30,30,0.8)',
                    pointBorderWidth: 0 ,
                    pointBorderColor: 'transparent',
                    pointRadius: 3.5,
                    pointBackgroundColor: 'transparent',
                    pointHoverBackgroundColor: 'rgba(246,30,30,0.8)',
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

}


function getColor(r,g,b) {
    var ctx = document.getElementById("myChart").getContext('2d');
    var balance_chart_bg_color = ctx.createLinearGradient(0, 0, 0, 200);
    balance_chart_bg_color.addColorStop(0, 'rgba('+r+', '+g+', '+b+',.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba('+r+', '+g+', '+b+',0)');
    return balance_chart_bg_color;
}


function fromObjectToArray(obj) {
    return Object.values(obj);
}



function usabilityScoreChart(usability_test){
    var sales_chart = document.getElementById("sales-chart").getContext('2d');

    var balance_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
    balance_chart_bg_color.addColorStop(0, 'rgba(1, 98, 114,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(1, 98, 114,0)');

    new Chart(sales_chart, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August","September ","October","November","December"],
            datasets: [{
                label: 'Usability average ',
                data: fromObjectToArray(usability_test),
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
}


function eAccessibilityScoreChart(avg){
    var  balance_chart= document.getElementById("balance-chart").getContext('2d');
    var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
    balance_chart_bg_color.addColorStop(0, 'rgba(1, 98, 114,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(1, 98, 114,0)');

    new Chart(balance_chart, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August","September ","October","November","December"],
            datasets: [{
                label: 'E-Accessibility Score',
                data:fromObjectToArray(avg),
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
}

async function medianChart(website,max,min){
    await  $(".medianChart").html("<canvas id='medianChartCanv' height='50'></canvas>");
    var ctx = document.getElementById("medianChartCanv").getContext('2d');
    var balance_chart_bg_color = ctx.createLinearGradient(0, 0, 0, 200);
    balance_chart_bg_color.addColorStop(0, 'rgba(1, 98, 114,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(1, 98, 114,0)');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August","September ","October","November","December"],
            datasets: medianChartJsonHelper(website,max,min)
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    indexAxis: 'y',
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
                    indexAxis: 'x',
                    gridLines: {
                        display: false,
                        tickMarkLength: 10,
                    }
                }]
            },
        }
    });
}

function medianChartJsonHelper(total,max,min){
    var retArray=[];
    var feed={};
    total=fromObjectToArray(total);
    console.log("max")
    retArray.push({
        label: 'AVG',
        data:total,
        backgroundColor: "transparent",
        borderWidth: 1,
        borderColor: 'rgba(1,98,114,0.8)',
        // borderColor: 'transparent',
        pointBorderWidth: 0,
        pointBorderColor: 'rgba(1,98,114,0.8)',
        pointRadius: 3.5,
        pointBackgroundColor: 'transparent',
        pointHoverBackgroundColor: 'rgba(1, 98, 114,1)',
    });
    for(var i=1;i<=12;i++){
        if(total[i-1]!==0) {
            var website = max[i];
            if (website != null) {
                var data=[];
                for(var j=0;j<i-1;j++){
                    data.push({});
                }
                data.push({
                    y: website.total_score,
                });
                 feed = {
                    label: website.en_name,
                    pointStyle: "line",
                    borderColor: "transparent",
                    pointBorderColor: "rgba(200,0,0,.5)",
                    pointRadius: 8,
                    pointHoverRadius: 15,
                    borderWidth: 0,
                    fill: false,
                    data: data,
                };
                retArray.push(feed);
            website = min[i];
                data=[];
                for(j=0;j<i-1;j++){
                    data.push({});
                }
                data.push({y: website.total_score,})
                feed = {
                    label: website.en_name,
                    pointStyle: "line",
                    rotation:60,
                    radius: 20,
                    borderColor: "transparent",
                    pointBorderColor: "rgba(200,0,0,.5)",
                    pointRadius: 8,
                    pointHoverRadius: 15,
                    borderWidth: 0,
                    fill: false,
                    data: data,
                };
                retArray.push(feed);
            }
        }
    }
    console.log(retArray);
    return retArray;
}

function rand(maxLimit = 100) { let rand = Math.random() * maxLimit; return Math.floor(rand);}
function randArray(){
    var arr=[];
    for(var i=0;i<12;i++){
        arr[i]=rand(100);
    }
    return arr;
}
