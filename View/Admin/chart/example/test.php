
<?php

use View\Admin\chart\src\ChartJS;

require '../src/ChartJS.php';
$data = [
    'labels' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
    'datasets' => [[
        'data' => [65, 59, 80, 81, 56, 55, 40],
        'backgroundColor' => [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(201, 203, 207, 1)'
        ],
        'borderWidth' => 1,
        'label' => 'My First Dataset',
        'hoverOffset' => 4,
        'borderAlign' => "center",
    ]]
];
$options = ['responsive' => false];
$attributes = ['id' => 'name', 'width' => 500, 'height' => 500];
$Doughnut = new ChartJS('bar', $data, $options, $attributes);

// Echo your line
echo $Doughnut;
?>
<html>
<body>
<!-- Your awesome project comes here -->
<!-- And here are Chart.js -->
<script src="../js/Chart.min.js"></script>
<script src="../js/driver.js"></script>
<script>
    (function() {
        loadChartJsPhp();
    })();
    document.getElementById("name").after("nhulol");
</script>

</body>
</html>
