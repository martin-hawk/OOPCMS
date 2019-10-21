
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- TinyMCE WYSIWYG HTML editor -->
<script
	src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"
	referrerpolicy="origin"></script>
<script src="js/scripts.js"></script>

<!-- Dropzone -->
<script src="js/dropzone.js"></script>

<!-- Google Chart -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Activity', 'Count'],
          ['Views', <?php echo $_SESSION['count']; ?>],
          ['Comments', <?php echo Comment::count_all(); ?>],
          ['Users', <?php echo User::count_all(); ?>],
          ['Photos', <?php echo Photo::count_all(); ?>]
        ]);

        var options = {
          title: 'Daily Activities',
          legend: 'none',
          pieSliceText: 'label',
          backgroundColor: 'transparent'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</body>

</html>
