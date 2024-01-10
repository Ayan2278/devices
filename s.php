<?php
include '_db_Connect.php';

// query for Active Status or Inactive Status
$qry = 'SELECT DISTINCT `school_name`,`district` FROM `asset`;';

// Total Inactive Status
$sqlDist = $qry;
$resDist = mysqli_query($conn, $sqlDist);
$totDist = mysqli_num_rows($resDist);

// Total Active Status  
$sqlDistt = $qry;
$resDistt = mysqli_query($conn, $sqlDistt);
$totDistt = mysqli_num_rows($resDistt);

// Total Number of District in Active or Inactive Status
$sqlDisttt = $qry;
$resDisttt = mysqli_query($conn, $sqlDisttt);
$totDisttt = mysqli_num_rows($resDisttt);

// Function For Active Status And Inactive Status
function status($pcNo)
{ 
    // Your function logic here
}

// Fetch chart data
$activeData = [];
$inactiveData = [];

if ($totDist != 0) {
    while ($rowDistt = $resDistt->fetch_assoc()) {
        $active = 0;
        $sqlA = "SELECT * from `asset` where `district`='" . $rowDistt["district"] . "';";
        $resultA = mysqli_query($conn, $sqlA);
        $totA = mysqli_num_rows($resultA);
        if ($totA != 0) {
            while ($rowA = $resultA->fetch_assoc()) {
                if (status($rowA['pc_sr']) != '') {
                    $active++;
                }
            }
            $activeData[] = $active;
        }
    }
}

if ($totDist != 0) {
    while ($rowDist = $resDist->fetch_assoc()) {
        $inactive = 0;
        $sqlINA = "SELECT * from `asset` where `district`='" . $rowDist["district"] . "';";
        $resultINA = mysqli_query($conn, $sqlINA);
        $totINA = mysqli_num_rows($resultINA);
        if ($totINA != 0) {
            while ($rowINA = $resultINA->fetch_assoc()) {
                if (status($rowINA['pc_sr']) != 'Active') {
                    $inactive++;
                }
            }
            $inactiveData[] = $inactive;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary libraries and stylesheets -->
    <!-- ... -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Include your chart configuration -->
</head>
<body>
    <!-- Your HTML content for sidebar.php -->
    <section class="col-lg-6">
        <!-- ... Your existing HTML content ... -->
        <!-- Chart container -->
        <div id="chartA" style="min-height: 100%; height: 350px; max-height: 500px; max-width: 100%;"></div>
    </section>

    <!-- Include your ApexCharts script in the AngularJS controller -->
    <script>
        var app = angular.module('myApp');

        app.controller('SidebarController', function ($scope, $timeout) {
            // Chart data
            var activeData = <?php echo json_encode($activeData); ?>;
            var inactiveData = <?php echo json_encode($inactiveData); ?>;
            var categories = <?php echo json_encode(array_column($resDisttt->fetch_all(MYSQLI_ASSOC), 'district')); ?>;

            var options = {
                series: [{
                    name: 'Active',
                    data: activeData,
                }, {
                    name: 'Inactive',
                    data: inactiveData,
                }],
                chart: {
                    type: 'bar',
                    height: 500,
                    stacked: true,
                    stackType: '100'
                },
                xaxis: {
                    categories: categories,
                },
                fill: {
                    colors: ['#4da0ff', '#38daba', '#393766'],
                },
                legend: {
                    position: 'right',
                    offsetX: 0,
                    offsetY: 50
                },
                dataLabels: {
                    style: {
                        colors: ['#000000', '#000000', '#000000']
                    }
                }
            };

            // Wait for the DOM to be ready
            $timeout(function () {
                // Create the chart
                var chart = new ApexCharts(document.querySelector("#chartA"), options);
                chart.render();
            });
        });
    </script>
</body>
</html>
