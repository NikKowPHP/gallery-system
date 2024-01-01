
<!-- jQuery via CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JavaScript Bundle via CDN (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="js/script.js"></script>



<script>

    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Photos', <?= Photo::count() ?>],
            ['Users', <?= User::count() ?>],
            ['Comments', <?= Comment::count() ?>],
            ['Views', <?= $session->count ?>],
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