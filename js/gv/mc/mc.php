<html>
  <head>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {'packages':['motionchart']});
      google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  new google.visualization.Query(
      'http://spreadsheets.google.com/tq?key=pCQbetd-CptE1ZQeQk8LoNw').send(
      function(response) {
        new google.visualization.MotionChart(
            document.getElementById('visualization')).
            draw(response.getDataTable(), {'width': 800, 'height': 400});
      });
}
     
    </script>
  </head>

  <body>
    <div id="visualization"></div>
  </body>
</html>

