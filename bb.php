<!-- send data of asset table to Angular script -->
<?php

include '_db_Connect.php';

$sel = mysqli_query($conn, "SELECT * FROM asset");
$data = array();
$districtsAll = array();
$count = 1;
$act;
function status($pcNo)
{
    $file = "JSON PC/" . $pcNo . ".json";
    $data = file_get_contents($file);
    $data = json_decode($data, true);
    date_default_timezone_set('Asia/Kolkata');
    $date = date('H:i:s');
    $datee = date("d/m/Y");
    $newDate = date('H:i:s', strtotime($date . ' -5 minutes'));

    foreach ($data as $row) {
        if ($newDate < $row['End time'] && $datee == $row['Date']) {
            return 'Active';
        }
    }
}
while ($row = mysqli_fetch_array($sel)) {
    if (status($row['pc_sr']) == 'Active') {
        $act="Active";
    } else {
        $act="Inactive";
    }
    $data[] = array("school_name" => $row['school_name'], "district" => $row['district'], "block" => $row['block'], "village" => $row['village'], "pc_sr" => $row['pc_sr'], "TFT_id" => $row['TFT_id'], "Webcam_id" => $row['Webcam_id'], "Headphone_id" => $row['Headphone_id'], "sr" => $count, "status" => $act);
    $districtsAll[] = array("district" => $row['district']);
    $count++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="Angular/angular.min.js"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('customersCtrl', function ($scope) {
            var users = <?php echo json_encode($data); ?>;
            var districts = <?php echo json_encode($districtsAll); ?>;
            $scope.users = users;
            $scope.districts = districts;
        });
        
    </script>
</head>
<body ng-app="myApp" ng-controller="customersCtrl">
    {{districts}}
</body>
</html>