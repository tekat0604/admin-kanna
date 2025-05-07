(function ($) {
  // USE STRICT
  "use strict";

  try {
    //WidgetChart 1
    var ctx = document.getElementById("widgetChart1");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          type: 'line',
          datasets: [{
            data: [ document.getElementById('terjual1').value,
                    document.getElementById('terjual2').value,
                    document.getElementById('terjual3').value,
                    document.getElementById('terjual4').value,
                    document.getElementById('terjual5').value,
                    document.getElementById('terjual6').value,
                    document.getElementById('terjual7').value,
                    document.getElementById('terjual8').value,
                    document.getElementById('terjual9').value,
                    document.getElementById('terjual10').value,
                    document.getElementById('terjual11').value,
                    document.getElementById('terjual12').value,
                  ],
            label: 'job',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          layout: {
            padding: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 2
    var ctx = document.getElementById("widgetChart2");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels:['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          type: 'line',
          datasets: [{
            data: [ document.getElementById('terjual1').value,
                    document.getElementById('terjual2').value,
                    document.getElementById('terjual3').value,
                    document.getElementById('terjual4').value,
                    document.getElementById('terjual5').value,
                    document.getElementById('terjual6').value,
                    document.getElementById('terjual7').value,
                    document.getElementById('terjual8').value,
                    document.getElementById('terjual9').value,
                    document.getElementById('terjual10').value,
                    document.getElementById('terjual11').value,
                    document.getElementById('terjual12').value,
                  ],
            label: 'job',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }
    var ctx = document.getElementById("widgetChart2-2");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels:['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          type: 'line',
          datasets: [{
            data: [ document.getElementById('terjual21').value,
                    document.getElementById('terjual22').value,
                    document.getElementById('terjual23').value,
                    document.getElementById('terjual24').value,
                    document.getElementById('terjual25').value,
                    document.getElementById('terjual26').value,
                    document.getElementById('terjual27').value,
                    document.getElementById('terjual28').value,
                    document.getElementById('terjual29').value,
                    document.getElementById('terjual210').value,
                    document.getElementById('terjual211').value,
                    document.getElementById('terjual212').value,
                  ],
            label: 'job',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 3
    var ctx = document.getElementById("widgetChart3");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June'],
          type: 'line',
          datasets: [{
            data: [65, 59, 84, 84, 51, 55],
            label: 'Dataset',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 4
    var ctx = document.getElementById("widgetChart4");
    if (ctx) {
      ctx.height = 115;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          datasets: [
            {
              label: "keuntungan",
              data: [document.getElementById('bati1').value,
                     document.getElementById('bati2').value,
                     document.getElementById('bati3').value,
                     document.getElementById('bati4').value,
                     document.getElementById('bati5').value,
                     document.getElementById('bati6').value,
                     document.getElementById('bati7').value,
                     document.getElementById('bati8').value,
                     document.getElementById('bati9').value,
                     document.getElementById('bati10').value,
                     document.getElementById('bati11').value,
                     document.getElementById('bati12').value,],
              borderColor: "transparent",
              borderWidth: "0",
              backgroundColor: "rgba(255,255,255,.3)"
            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              display: false,
              categoryPercentage: 1,
              barPercentage: 0.65
            }],
            yAxes: [{
              display: false
            }]
          }
        }
      });
    }

   // Recent Report

   var elements = 10
   var data1 = [document.getElementById('pendapatan1').value, document.getElementById('pendapatan2').value, document.getElementById('pendapatan3').value, document.getElementById('pendapatan4').value, document.getElementById('pendapatan5').value, document.getElementById('pendapatan6').value, document.getElementById('pendapatan7').value, document.getElementById('pendapatan8').value, document.getElementById('pendapatan9').value, document.getElementById('pendapatan10').value, document.getElementById('pendapatan11').value, document.getElementById('pendapatan12').value ]
   var data2 = [document.getElementById('pendapatan21').value, document.getElementById('pendapatan22').value, document.getElementById('pendapatan23').value, document.getElementById('pendapatan24').value, document.getElementById('pendapatan25').value, document.getElementById('pendapatan26').value, document.getElementById('pendapatan27').value, document.getElementById('pendapatan28').value, document.getElementById('pendapatan29').value, document.getElementById('pendapatan210').value, document.getElementById('pendapatan211').value, document.getElementById('pendapatan212').value ]

   var ctx = document.getElementById("recent-rep-chart");
   if (ctx) {
     ctx.height  = 220;
     var myChart = new Chart(ctx, {
       type: 'line',
       data: {
         labels: [document.getElementById('bulan1').value, document.getElementById('bulan2').value, document.getElementById('bulan3').value, document.getElementById('bulan4').value, document.getElementById('bulan5').value,document.getElementById('bulan6').value ],
         datasets: [
           {
             label: 'pendapatan',
             backgroundColor: 'rgba(232,62,140,0.5)',
             borderColor: 'transparent',
             pointHoverBackgroundColor: 'transparent',
             borderWidth: 0,
             data: data1

           },
           {
             label: 'pendapatan2',
             backgroundColor: 'rgba(253,126,20,0.5) ',
             borderColor: 'transparent',
             pointHoverBackgroundColor: 'transparent',
             borderWidth: 0,
             data: data2

           }
         ]
       },
       options: {
         maintainAspectRatio: true,
          legend: {
            display: false
          },
         responsive: true,
         scales: {
           xAxes: [{
            borderWidth: 0,
             gridLines: {
               drawOnChartArea: false,
               color: '#f2f2f2'
             },
             ticks: {
               fontFamily: "Poppins",
               fontSize: 12
             }
           }],
           yAxes: [{
             ticks: {
               beginAtZero: false,
               maxTicksLimit: 2,
               stepSize: 5,
               max: 25,
               fontFamily: "Poppins",
               fontSize: 12
             },
             gridLines: {
               display: false,
               color: '#f2f2f2'

             }
           }]
         },
         elements: {
           point: {
             radius: 0,
             hitRadius: 10,
             hoverRadius: 4,
             hoverBorderWidth: 3,
             border:false
           }
         }
       }
     });
   } 
  }catch (error) {
    console.log(error);
  }

   
try {
    // Percent Chart
    var ctx = document.getElementById("percent-chart");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "My First dataset",
              data: [50,25],
              backgroundColor: [
                '#fd7e14',
                '#e83e8c'
              ],
              hoverBackgroundColor: [
                '#fd7e14',
                '#e83e8c'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Service',
            'Penjualan'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  try {

    // Percent Chart 2
    var ctx = document.getElementById("percent-chart2");
    if (ctx) {
      ctx.height = 209;
      if (document.getElementById("jumlah_produk").value > 3){
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            datasets: [
              {
                label: "My First dataset",
                data: [document.getElementById('pro1').value, document.getElementById('pro2').value, document.getElementById('pro3').value, document.getElementById('pro4').value],
                backgroundColor: [
                  '#fd7e14',
                  '#e83e8c',
                  '#1cc88a',
                  '#858796'
                ],
                hoverBackgroundColor: [
                  '#fd7e14',
                  '#e83e8c',
                  '#1cc88a',
                  '#858796'
                ],
                borderWidth: [
                  0, 0, 0, 0
                ],
                hoverBorderColor: [
                  'transparent',
                  'transparent',
                  'transparent',
                  'transparent'
                ]
              }
            ],
            labels: [
              document.getElementById('nama1').value ,
              document.getElementById('nama2').value ,
              document.getElementById('nama3').value ,
              'lain-lain'
            ]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            cutoutPercentage: 87,
            animation: {
              animateScale: true,
              animateRotate: true
            },
            legend: {
              display: false,
              position: 'bottom',
              labels: {
                fontSize: 14,
                fontFamily: "Poppins,sans-serif"
              }

            },
            tooltips: {
              titleFontFamily: "Poppins",
              xPadding: 15,
              yPadding: 10,
              caretPadding: 0,
              bodyFontSize: 16,
            }
          }
        });
      }else if (document.getElementById("jumlah_produk").value == 3){
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            datasets: [
              {
                label: "My First dataset",
                data: [document.getElementById('pro1').value, document.getElementById('pro2').value, document.getElementById('pro3').value],
                backgroundColor: [
                  '#fd7e14',
                  '#e83e8c',
                  '#1cc88a'
                ],
                hoverBackgroundColor: [
                  '#fd7e14',
                  '#e83e8c',
                  '#1cc88a'
                ],
                borderWidth: [
                  0, 0, 0
                ],
                hoverBorderColor: [
                  'transparent',
                  'transparent',
                  'transparent'
                ]
              }
            ],
            labels: [
              document.getElementById('nama1').value ,
              document.getElementById('nama2').value ,
              document.getElementById('nama3').value 
            ]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            cutoutPercentage: 87,
            animation: {
              animateScale: true,
              animateRotate: true
            },
            legend: {
              display: false,
              position: 'bottom',
              labels: {
                fontSize: 14,
                fontFamily: "Poppins,sans-serif"
              }

            },
            tooltips: {
              titleFontFamily: "Poppins",
              xPadding: 15,
              yPadding: 10,
              caretPadding: 0,
              bodyFontSize: 16,
            }
          }
        });
      }else if (document.getElementById("jumlah_produk").value == 2){
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            datasets: [
              {
                label: "My First dataset",
                data: [document.getElementById('pro1').value, document.getElementById('pro2').value],
                backgroundColor: [
                  '#fd7e14',
                  '#e83e8c'
                ],
                hoverBackgroundColor: [
                  '#fd7e14',
                  '#e83e8c'
                ],
                borderWidth: [
                  0, 0
                ],
                hoverBorderColor: [
                  'transparent',
                  'transparent'
                ]
              }
            ],
            labels: [
              document.getElementById('nama1').value ,
              document.getElementById('nama2').value 
            ]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            cutoutPercentage: 87,
            animation: {
              animateScale: true,
              animateRotate: true
            },
            legend: {
              display: false,
              position: 'bottom',
              labels: {
                fontSize: 14,
                fontFamily: "Poppins,sans-serif"
              }

            },
            tooltips: {
              titleFontFamily: "Poppins",
              xPadding: 15,
              yPadding: 10,
              caretPadding: 0,
              bodyFontSize: 16,
            }
          }
        });
      }else if (document.getElementById("jumlah_produk").value == 1){
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            datasets: [
              {
                label: "My First dataset",
                data: [document.getElementById('pro1').value],
                backgroundColor: [
                  '#fd7e14'
                ],
                hoverBackgroundColor: [
                  '#fd7e14'
                ],
                borderWidth: [
                  0
                ],
                hoverBorderColor: [
                  'transparent'
                ]
              }
            ],
            labels: [
              document.getElementById('nama1').value
            ]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            cutoutPercentage: 87,
            animation: {
              animateScale: true,
              animateRotate: true
            },
            legend: {
              display: false,
              position: 'bottom',
              labels: {
                fontSize: 14,
                fontFamily: "Poppins,sans-serif"
              }

            },
            tooltips: {
              titleFontFamily: "Poppins",
              xPadding: 15,
              yPadding: 10,
              caretPadding: 0,
              bodyFontSize: 16,
            }
          }
        });
      }
    }

  } catch (error) {
    console.log(error);
  }

  try {

    // Recent Report 2
    const bd_brandProduct2 = 'rgba(0,181,233,0.9)'
    const bd_brandService2 = 'rgba(0,173,95,0.9)'
    const brandProduct2 = 'rgba(0,181,233,0.2)'
    const brandService2 = 'rgba(0,173,95,0.2)'

    var data3 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
    var data4 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

    var ctx = document.getElementById("recent-rep2-chart");
    if (ctx) {
      ctx.height = 230;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
          datasets: [
            {
              label: 'My First dataset',
              backgroundColor: brandService2,
              borderColor: bd_brandService2,
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data3

            },
            {
              label: 'My Second dataset',
              backgroundColor: brandProduct2,
              borderColor: bd_brandProduct2,
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data4

            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                drawOnChartArea: true,
                color: '#f2f2f2'
              },
              ticks: {
                fontFamily: "Poppins",
                fontSize: 12
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 5,
                stepSize: 50,
                max: 150,
                fontFamily: "Poppins",
                fontSize: 12
              },
              gridLines: {
                display: true,
                color: '#f2f2f2'

              }
            }]
          },
          elements: {
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4,
              hoverBorderWidth: 3
            },
            line: {
              tension: 0
            }
          }


        }
      });
    }

  } catch (error) {
    console.log(error);
  }


  try {

    // Recent Report 3
    const bd_brandProduct3 = 'rgba(0,181,233,0.9)';
    const bd_brandService3 = 'rgba(0,173,95,0.9)';
    const brandProduct3 = 'transparent';
    const brandService3 = 'transparent';

    var data5 = [52, 60, 55, 50, 65, 80, 57, 115];
    var data6 = [102, 70, 80, 100, 56, 53, 80, 90];

    var ctx = document.getElementById("recent-rep3-chart");
    if (ctx) {
      ctx.height = 230;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', ''],
          datasets: [
            {
              label: 'My First dataset',
              backgroundColor: brandService3,
              borderColor: bd_brandService3,
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data5,
              pointBackgroundColor: bd_brandService3
            },
            {
              label: 'My Second dataset',
              backgroundColor: brandProduct3,
              borderColor: bd_brandProduct3,
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data6,
              pointBackgroundColor: bd_brandProduct3

            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                drawOnChartArea: true,
                color: '#f2f2f2'
              },
              ticks: {
                fontFamily: "Poppins",
                fontSize: 12
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 5,
                stepSize: 50,
                max: 150,
                fontFamily: "Poppins",
                fontSize: 12
              },
              gridLines: {
                display: false,
                color: '#f2f2f2'
              }
            }]
          },
          elements: {
            point: {
              radius: 3,
              hoverRadius: 4,
              hoverBorderWidth: 3,
              backgroundColor: '#333'
            }
          }


        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  try {
    //WidgetChart 5
    var ctx = document.getElementById("widgetChart5");
    if (ctx) {
      ctx.height = 220;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          datasets: [
            {
              label: "My First dataset",
              data: [78, 81, 80, 64, 65, 80, 70, 75, 67, 85, 66, 68],
              borderColor: "transparent",
              borderWidth: "0",
              backgroundColor: "#ccc",
            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              display: false,
              categoryPercentage: 1,
              barPercentage: 0.65
            }],
            yAxes: [{
              display: false
            }]
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }


  try {
    //Sales chart
    var ctx = document.getElementById("sales-chart");
    if (ctx) {
      ctx.height = 75;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          type: 'line',
          defaultFontFamily: 'Poppins',
          datasets: [{
            label: document.getElementById('thn').value,
            data : [document.getElementById('pendapatan1').value, 
                    document.getElementById('pendapatan2').value, 
                    document.getElementById('pendapatan3').value, 
                    document.getElementById('pendapatan4').value, 
                    document.getElementById('pendapatan5').value, 
                    document.getElementById('pendapatan6').value, 
                    document.getElementById('pendapatan7').value, 
                    document.getElementById('pendapatan8').value, 
                    document.getElementById('pendapatan9').value, 
                    document.getElementById('pendapatan10').value, 
                    document.getElementById('pendapatan11').value, 
                    document.getElementById('pendapatan12').value],
            backgroundColor: 'transparent',
            borderColor: 'rgba(232,62,140,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(232,62,140,0.9)',
          }]
        },
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Poppins',
            bodyFontFamily: 'Poppins',
            cornerRadius: 3,
            intersect: false,
          },
          legend: {
            display: false,
            labels: {
              usePointStyle: true,
              fontFamily: 'Poppins',
            },
          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: false,
                labelString: 'Month'
              },
              ticks: {
                display: false,
                fontFamily: "Poppins"
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: false,
                labelString: 'Value',
                fontFamily: "Poppins"

              },
              ticks: {
                display: false,
                fontFamily: "Poppins"
              }
            }]
          },
          title: {
            display: false,
            text: 'Normal Legend'
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }
  try {
    //Sales chart
    var ctx = document.getElementById("sales-chart2");
    if (ctx) {
      ctx.height = 220;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          type: 'line',
          defaultFontFamily: 'Poppins',
          datasets: [{
            label: "pendapatan",
            data : [document.getElementById('pendapatan21').value, 
                    document.getElementById('pendapatan22').value, 
                    document.getElementById('pendapatan23').value, 
                    document.getElementById('pendapatan24').value, 
                    document.getElementById('pendapatan25').value, 
                    document.getElementById('pendapatan26').value, 
                    document.getElementById('pendapatan27').value, 
                    document.getElementById('pendapatan28').value, 
                    document.getElementById('pendapatan29').value, 
                    document.getElementById('pendapatan210').value, 
                    document.getElementById('pendapatan211').value, 
                    document.getElementById('pendapatan212').value],
            backgroundColor: 'transparent',
            borderColor: 'rgba(253,126,20,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(253,126,20,0.9)',
          }, {
            label: "pendapatan2",
            data : [document.getElementById('pendapatan221').value,
                    document.getElementById('pendapatan222').value,
                    document.getElementById('pendapatan223').value,
                    document.getElementById('pendapatan224').value,
                    document.getElementById('pendapatan225').value,
                    document.getElementById('pendapatan226').value,
                    document.getElementById('pendapatan227').value,
                    document.getElementById('pendapatan228').value,
                    document.getElementById('pendapatan229').value,
                    document.getElementById('pendapatan2210').value,
                    document.getElementById('pendapatan2211').value,
                    document.getElementById('pendapatan2212').value ],
            backgroundColor: 'transparent',
            borderColor: 'rgba(232,62,140,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(232,62,140,0.9)',
          }]
        },
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Poppins',
            bodyFontFamily: 'Poppins',
            cornerRadius: 3,
            intersect: false,
          },
          legend: {
            display: false,
            labels: {
              usePointStyle: true,
              fontFamily: 'Poppins',
            },
          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: false,
                labelString: 'Month'
              },
              ticks: {
                display: false,
                fontFamily: "Poppins"
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: false,
                labelString: 'Value',
                fontFamily: "Poppins"

              },
              ticks: {
                display: false,
                fontFamily: "Poppins"
              }
            }]
          },
          title: {
            display: false,
            text: 'Normal Legend'
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }
  try {

    //Team chart
    var ctx = document.getElementById("team-chart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["2010", "2011", "2012", "2013", "2014", "2015", "2016"],
          type: 'line',
          defaultFontFamily: 'Poppins',
          datasets: [{
            data: [0, 7, 3, 5, 2, 10, 7],
            label: "Expense",
            backgroundColor: 'rgba(0,103,255,.15)',
            borderColor: 'rgba(0,103,255,0.5)',
            borderWidth: 3.5,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(0,103,255,0.5)',
          },]
        },
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Poppins',
            bodyFontFamily: 'Poppins',
            cornerRadius: 3,
            intersect: false,
          },
          legend: {
            display: false,
            position: 'top',
            labels: {
              usePointStyle: true,
              fontFamily: 'Poppins',
            },


          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: false,
                labelString: 'Month'
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: true,
                labelString: 'Value',
                fontFamily: "Poppins"
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }]
          },
          title: {
            display: false,
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {
    //bar chart
    var ctx = document.getElementById("barChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'bar',
        defaultFontFamily: 'Poppins',
        data: {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [
            {
              label: "My First dataset",
              data: [65, 59, 80, 81, 56, 55, 40],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)",
              fontFamily: "Poppins"
            },
            {
              label: "My Second dataset",
              data: [28, 48, 40, 19, 86, 27, 90],
              borderColor: "rgba(0,0,0,0.09)",
              borderWidth: "0",
              backgroundColor: "rgba(0,0,0,0.07)",
              fontFamily: "Poppins"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {

    //radar chart
    var ctx = document.getElementById("radarChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
          labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
          defaultFontFamily: 'Poppins',
          datasets: [
            {
              label: "My First dataset",
              data: [65, 59, 66, 45, 56, 55, 40],
              borderColor: "rgba(0, 123, 255, 0.6)",
              borderWidth: "1",
              backgroundColor: "rgba(0, 123, 255, 0.4)"
            },
            {
              label: "My Second dataset",
              data: [28, 12, 40, 19, 63, 27, 87],
              borderColor: "rgba(0, 123, 255, 0.7",
              borderWidth: "1",
              backgroundColor: "rgba(0, 123, 255, 0.5)"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scale: {
            ticks: {
              beginAtZero: true,
              fontFamily: "Poppins"
            }
          }
        }
      });
    }

  } catch (error) {
    console.log(error)
  }

  try {

    //line chart
    var ctx = document.getElementById("lineChart");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          defaultFontFamily: "Poppins",
          datasets: [
            {
              label: "My First dataset",
              borderColor: "rgba(0,0,0,.09)",
              borderWidth: "1",
              backgroundColor: "rgba(0,0,0,.07)",
              data: [22, 44, 67, 43, 76, 45, 12]
            },
            {
              label: "My Second dataset",
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "1",
              backgroundColor: "rgba(0, 123, 255, 0.5)",
              pointHighlightStroke: "rgba(26,179,148,1)",
              data: [16, 32, 18, 26, 42, 33, 44]
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true,
          tooltips: {
            mode: 'index',
            intersect: false
          },
          hover: {
            mode: 'nearest',
            intersect: true
          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }

        }
      });
    }


  } catch (error) {
    console.log(error);
  }


  try {

    //doughut chart
    var ctx = document.getElementById("doughutChart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [{
            data: [45, 25, 20, 10],
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ],
            hoverBackgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ]

          }],
          labels: [
            "Green",
            "Green",
            "Green",
            "Green"
          ]
        },
        options: {
          legend: {
            display: false,
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }


  } catch (error) {
    console.log(error);
  }


  try {

    //pie chart
    var ctx = document.getElementById("pieChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          datasets: [{
            data: [45, 25, 20, 10],
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ],
            hoverBackgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ]

          }],
          labels: [
            "Green",
            "Green",
            "Green"
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {

    // polar chart
    var ctx = document.getElementById("polarChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
          datasets: [{
            data: [15, 18, 9, 6, 19],
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.8)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0,0,0,0.2)",
              "rgba(0, 123, 255,0.5)"
            ]

          }],
          labels: [
            "Green",
            "Green",
            "Green",
            "Green"
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  try {

    // single bar chart
    var ctx = document.getElementById("singelBarChart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
          datasets: [
            {
              label: "My First dataset",
              data: [40, 55, 75, 81, 56, 55, 40],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

})(jQuery);



(function ($) {
    // USE STRICT
    "use strict";
    $(".animsition").animsition({
      inClass: 'fade-in',
      outClass: 'fade-out',
      inDuration: 900,
      outDuration: 900,
      linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([class^="chosen-single"])',
      loading: true,
      loadingParentElement: 'html',
      loadingClass: 'page-loader',
      loadingInner: '<div class="page-loader__spin"></div>',
      timeout: false,
      timeoutCountdown: 5000,
      onLoadEvent: true,
      browser: ['animation-duration', '-webkit-animation-duration'],
      overlay: false,
      overlayClass: 'animsition-overlay-slide',
      overlayParentElement: 'html',
      transition: function (url) {
        window.location.href = url;
      }
    });
  
  
  })(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Map
  try {

    var vmap = $('#vmap');
    if(vmap[0]) {
      vmap.vectorMap( {
        map: 'world_en',
        backgroundColor: null,
        color: '#ffffff',
        hoverOpacity: 0.7,
        selectedColor: '#1de9b6',
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: [ '#1de9b6', '#03a9f5'],
        normalizeFunction: 'polynomial'
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Europe Map
  try {
    
    var vmap1 = $('#vmap1');
    if(vmap1[0]) {
      vmap1.vectorMap( {
        map: 'europe_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true
      });
    }

  } catch (error) {
    console.log(error);
  }

  // USA Map
  try {
    
    var vmap2 = $('#vmap2');

    if(vmap2[0]) {
      vmap2.vectorMap( {
        map: 'usa_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true,
        selectedColor: null,
        hoverColor: null,
        colors: {
            mo: '#001BFF',
            fl: '#001BFF',
            or: '#001BFF'
        },
        onRegionClick: function ( event, code, region ) {
            event.preventDefault();
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Germany Map
  try {
    
    var vmap3 = $('#vmap3');
    if(vmap3[0]) {
      vmap3.vectorMap( {
        map: 'germany_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        onRegionClick: function ( element, code, region ) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();

            alert( message );
        }
      });
    }
    
  } catch (error) {
    console.log(error);
  }
  
  // France Map
  try {
    
    var vmap4 = $('#vmap4');
    if(vmap4[0]) {
      vmap4.vectorMap( {
        map: 'france_fr',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Russia Map
  try {
    var vmap5 = $('#vmap5');
    if(vmap5[0]) {
      vmap5.vectorMap( {
        map: 'russia_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        hoverOpacity: 0.7,
        selectedColor: '#999999',
        enableZoom: true,
        showTooltip: true,
        scaleColors: [ '#C8EEFF', '#006491' ],
        normalizeFunction: 'polynomial'
      });
    }


  } catch (error) {
    console.log(error);
  }
  
  // Brazil Map
  try {
    
    var vmap6 = $('#vmap6');
    if(vmap6[0]) {
      vmap6.vectorMap( {
        map: 'brazil_br',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        onRegionClick: function ( element, code, region ) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
            alert( message );
        }
      });
    }

  } catch (error) {
    console.log(error);
  }
})(jQuery);
(function ($) {
  // Use Strict
  "use strict";
  try {
    var progressbarSimple = $('.js-progressbar-simple');
    progressbarSimple.each(function () {
      var that = $(this);
      var executed = false;
      $(window).on('load', function () {

        that.waypoint(function () {
          if (!executed) {
            executed = true;
            /*progress bar*/
            that.progressbar({
              update: function (current_percentage, $this) {
                $this.find('.js-value').html(current_percentage + '%');
              }
            });
          }
        }, {
            offset: 'bottom-in-view'
          });

      });
    });
  } catch (err) {
    console.log(err);
  }
})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Scroll Bar
  try {
    var jscr1 = $('.js-scrollbar1');
    if(jscr1[0]) {
      const ps1 = new PerfectScrollbar('.js-scrollbar1');      
    }

    var jscr2 = $('.js-scrollbar2');
    if (jscr2[0]) {
      const ps2 = new PerfectScrollbar('.js-scrollbar2');

    }

  } catch (error) {
    console.log(error);
  }

})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Select 2
  try {

    $(".js-select2").each(function () {
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    });

  } catch (error) {
    console.log(error);
  }


})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Dropdown 
  try {
    var menu = $('.js-item-menu');
    var sub_menu_is_showed = -1;

    for (var i = 0; i < menu.length; i++) {
      $(menu[i]).on('click', function (e) {
        e.preventDefault();
        $('.js-right-sidebar').removeClass("show-sidebar");        
        if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = -1;
        }
        else {
          for (var i = 0; i < menu.length; i++) {
            $(menu[i]).removeClass("show-dropdown");
          }
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = jQuery.inArray(this, menu);
        }
      });
    }
    $(".js-item-menu, .js-dropdown").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
    });

  } catch (error) {
    console.log(error);
  }

  var wW = $(window).width();
    // Right Sidebar
    var right_sidebar = $('.js-right-sidebar');
    var sidebar_btn = $('.js-sidebar-btn');

    sidebar_btn.on('click', function (e) {
      e.preventDefault();
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
      right_sidebar.toggleClass("show-sidebar");
    });

    $(".js-right-sidebar, .js-sidebar-btn").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      right_sidebar.removeClass("show-sidebar");

    });
 

  // Sublist Sidebar
  try {
    var arrow = $('.js-arrow');
    arrow.each(function () {
      var that = $(this);
      that.on('click', function (e) {
        e.preventDefault();
        that.find(".arrow").toggleClass("up");
        that.toggleClass("open");
        that.parent().find('.js-sub-list').slideToggle("250");
      });
    });

  } catch (error) {
    console.log(error);
  }


  try {
    // Hamburger Menu
    $('.hamburger').on('click', function () {
      $(this).toggleClass('is-active');
      $('.navbar-mobile').slideToggle('500');
    });
    $('.navbar-mobile__list li.has-dropdown > a').on('click', function () {
      var dropdown = $(this).siblings('ul.navbar-mobile__dropdown');
      $(this).toggleClass('active');
      $(dropdown).slideToggle('500');
      return false;
    });
  } catch (error) {
    console.log(error);
  }
})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Load more
  try {
    var list_load = $('.js-list-load');
    if (list_load[0]) {
      list_load.each(function () {
        var that = $(this);
        that.find('.js-load-item').hide();
        var load_btn = that.find('.js-load-btn');
        load_btn.on('click', function (e) {
          $(this).text("Loading...").delay(1500).queue(function (next) {
            $(this).hide();
            that.find(".js-load-item").fadeToggle("slow", 'swing');
          });
          e.preventDefault();
        });
      })

    }
  } catch (error) {
    console.log(error);
  }

})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  try {
    
    $('[data-toggle="tooltip"]').tooltip();

  } catch (error) {
    console.log(error);
  }

  // Chatbox
  try {
    var inbox_wrap = $('.js-inbox');
    var message = $('.au-message__item');
    message.each(function(){
      var that = $(this);

      that.on('click', function(){
        $(this).parent().parent().parent().toggleClass('show-chat-box');
      });
    });
    

  } catch (error) {
    console.log(error);
  }

})(jQuery);