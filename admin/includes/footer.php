
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
    <script>

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Photos',     <?= Photo::count() ?>],
                ['Users',     <?= User::count() ?>],
                ['Comments',     <?= Comment::count() ?>],
                ['Views',     <?= $session->count ?>],
            ]);

            var options = {
                backgroundColor: 'transparent',
                legend: 'none',
                pieSliceText: 'label',
                title: 'Activity'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

</body>

</html>
