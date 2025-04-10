$(function() {
  'use strict';


  if($('#chartjsDoughnut').length) {
    new Chart($('#chartjsDoughnut'), {
      type: 'doughnut',
      data: {
        labels: ["Africa", "Asia", "Europe"],
        datasets: [
          {
            label: "Population (millions)",
            backgroundColor: ["#4e73df","#1cc88a","#36b9cc"],
            data: [2478,4267,1334]
          }
        ]
      }
    });
  }

  if($('#chartjsArea').length) {
    new Chart($('#chartjsArea'), {
      type: 'line',
      data: {
        labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
        datasets: [{ 
            data: [86,114,106,106,107,111,133,221,783,2478],
            label: "Africa12",
            borderColor: "#7ee5e5",
            backgroundColor: "#c2fdfd",
            fill: true
          }, { 
            data: [282,350,411,502,635,809,947,1402,3700,5267],
            label: "Asia",
            borderColor: "#f77eb9",
            backgroundColor: "#ffbedd",
            fill: true
          }, { 
            data: [282,350,411,502,635,809,947,1402,3700,5267],
            label: "Asia",
            borderColor: "#f77eb9",
            backgroundColor: "#ffbedd",
            fill: true
          }
        ]
      }
    });
  }



  if($('#chartjsBubble').length) {
    new Chart($('#chartjsBubble'), {
      type: 'bubble',
      data: {
        labels: "Africa",
        datasets: [
          {
            label: ["China"],
            backgroundColor: "#c2fdfd",
            borderColor: "#7ee5e5",
            data: [{
              x: 21269017,
              y: 5.245,
              r: 15
            }]
          }, {
            label: ["Denmark"],
            backgroundColor: "#ffbedd",
            borderColor: "#f77eb9",
            data: [{
              x: 258702,
              y: 7.526,
              r: 10
            }]
          }, {
            label: ["Germany"],
            backgroundColor: "#bbd4ff",
            borderColor: "#4d8af0",
            data: [{
              x: 3979083,
              y: 6.994,
              r: 15
            }]
          }, {
            label: ["Japan"],
            backgroundColor: "#ffe69d",
            borderColor: "#fbbc06",
            data: [{
              x: 4931877,
              y: 5.921,
              r: 15
            }]
          }
        ]
      },
      options: {
        scales: {
          yAxes: [{ 
            scaleLabel: {
              display: true,
              labelString: "Happiness"
            }
          }],
          xAxes: [{ 
            scaleLabel: {
              display: true,
              labelString: "GDP (PPP)"
            }
          }]
        }
      }
    });
  }

  if($('#chartjsRadar').length) {
    new Chart($('#chartjsRadar'), {
      type: 'radar',
      data: {
        labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        datasets: [
          {
            label: "1950",
            fill: true,
            backgroundColor: "#ffbedd",
            borderColor: "#f77eb9",
            pointBorderColor: "#f77eb9",
            pointBackgroundColor: "#ffbedd",
            data: [8.77,55.61,21.69,6.62,6.82]
          }, {
            label: "2050",
            fill: true,
            backgroundColor: "#c2fdfd",
            borderColor: "#7ee5e5",
            pointBorderColor: "#7ee5e5",
            pointBackgroundColor: "#c2fdfd",
            pointBorderColor: "#fff",
            data: [25.48,54.16,7.61,8.06,4.45]
          }
        ]
      }
    });
  }

  if($('#chartjsPolarArea').length) {
    new Chart($('#chartjsPolarArea'), {
      type: 'polarArea',
      data: {
        labels: ["Africa", "Asia", "Europe", "Latin America"],
        datasets: [
          {
            label: "Population (millions)",
            backgroundColor: ["#f77eb9", "#7ee5e5","#4d8af0","#fbbc06"],
            data: [2478,5267,734,784]
          }
        ]
      }
    });
  }

  if($('#chartjsGroupedBar').length) {
    new Chart($('#chartjsGroupedBar'), {
      type: 'bar',
      data: {
        labels: ["1900", "1950", "1999", "2050","2222"],
        datasets: [
          {
            label: "Open Complaint",
            backgroundColor: "#4e73df",
            data: [133,221,783,2478,1233]
          }, {
            label: "Close Complaint",
            backgroundColor: "#1cc88a",
            data: [408,547,675,734,123]
          }, {
            label: "In Prograss Complaint",
            backgroundColor: "#36b9cc",
            data: [708,747,475,134,454]
          }
        ]
      }
    });
  }

  if($('#chartjsMixedBar').length) {
    new Chart($('#chartjsMixedBar'), {
      type: 'bar',
      data: {
        labels: ["1900", "1950", "1999", "2050"],
        datasets: [{
            label: "Europe",
            type: "line",
            borderColor: "#66d1d1",
            backgroundColor: "rgba(0,0,0,0)",
            data: [408,547,675,734],
            fill: false
          }, {
            label: "Africa",
            type: "line",
            borderColor: "#ff3366",
            backgroundColor: "rgba(0,0,0,0)",
            data: [133,221,783,2478],
            fill: false
          }, {
            label: "Europe",
            type: "bar",
            backgroundColor: "#f77eb9",
            // backgroundColor: "rgba(0,0,0,0)",
            data: [408,547,675,734],
          }, {
            label: "Africa",
            type: "bar",
            backgroundColor: "#7ee5e5",
            backgroundColorHover: "#3e95cd",
            // backgroundColor: "rgba(0,0,0,0)",
            data: [133,221,783,2478]
          }
        ]
      }
    });
  }

});