      function chartOne(){

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Designation', 'Dollars'],
            ['Private Donations',     4069907],
            ['Magazine Sales',      833016],
            ['Events',  343707],
            ['Other', 156133]
          ]);

          var options = {
          chartArea: {'width': '100%', 'height': '80%'},
          backgroundColor: "transparent",
          fontName: "Lato",
          pieSliceBorderColor: "transparent",
          slices: {
              0: { color: '#EA5213' },
              1: { color: '#6D2919'},
              2: { color: '#B24E2B' },
              3: { color: '#EF8160'}
            }
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart-1'));

          chart.draw(data, options);
        }
      } chartOne();

      function chartTwo(){

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

          var data = google.visualization.arrayToDataTable([
            ['Designation', 'Dollars'],
            ['Programs',     3807171],
            ['Management & General',      476138],
            ['Fundraising',  550580]
          ]);

          var options = {
          chartArea: {'width': '100%', 'height': '80%'},
          backgroundColor: "transparent",
          fontName: "Lato",
          pieSliceBorderColor: "transparent",
          slices: {
              0: { color: '#084d93' },
              1: { color: '#345C7A'},
              2: { color: '#498CBF' }
            }
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart-2'));

          chart.draw(data, options);
        }
      } chartTwo();

//Code Formatting used from http://jsfiddle.net/user/mblase75/fiddles/ =========

var doit;

window.addEventListener("resize", function(){
  clearTimeout(doit);
  doit = setTimeout(function() {
    chartOne();
    chartTwo();
  }, 200);
}, false);
