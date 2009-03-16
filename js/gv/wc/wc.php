<html>
  <head>
<!--
    <link rel="stylesheet" type="text/css" href="http://visapi-gadgets.googlecode.com/svn/trunk/wordcloud/wc.css"/>
<script type="text/javascript" src="http://visapi-gadgets.googlecode.com/svn/trunk/wordcloud/wc.js"></script>
-->
<link rel="stylesheet" type="text/css" href="wc/wc.css"/>
<script type="text/javascript" src="wc/wc.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>


  </head>
  <body>
    <div id="wcdiv"></div>
    <script type="text/javascript">
      google.load("visualization", "1");
      google.setOnLoadCallback(draw);
      function draw() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Text1');
        data.addRows(1);
        data.setCell(0, 0, '好 好 学 习 天 天 向 上 好 上 学 好');
        var outputDiv = document.getElementById('wcdiv');
        var wc = new WordCloud(outputDiv);
        wc.draw(data, null);
      }
    </script>
  </body>
</html>

