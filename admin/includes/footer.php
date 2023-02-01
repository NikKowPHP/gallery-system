
    <!-- jQuery -->
<!--    <script src="js/jquery.js"></script>-->

    <script
            src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function () {
            let image_id;
            let user_id = $("#user_id").data('user-id');
            $("#user_image").click(function () {
                alert(user_id);

                $('#modal1').modal();
                $(".modal_thumbnail").click(function () {
                    image_id = $(this).data('id');
                    console.log(image_id)
                    $("#set_user_image").prop("disabled", false);
                })

            });
        });
    </script>

</body>

</html>
