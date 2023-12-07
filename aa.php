<!-- send data of asset table to Angular script -->
<?php

include '_db_Connect.php';

$sel = mysqli_query($conn, "SELECT * FROM asset");
$data = array();
$count = 1;
$act;
$dist;

while ($row = mysqli_fetch_array($sel)) {
    if (status($row['pc_sr']) == 'Active') {
        $act = "Active";
    } else {
        $act = "Inactive";
    }
    $data[] = array("school_name" => $row['school_name'], "district" => $row['district'], "block" => $row['block'], "village" => $row['village'], "pc_sr" => $row['pc_sr'], "TFT_id" => $row['TFT_id'], "Webcam_id" => $row['Webcam_id'], "Headphone_id" => $row['Headphone_id'], "sr" => $count, "status" => $act);
    $dist[] = array("district" => $row['district']);

    $count++;
}
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
?>
<!DOCTYPE html>
<html ng-app="myApp">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body ng-controller="customersCtrl">

    <select class="form-control select2bs4" name="district" ng-model="srchDistrict">
        <option value="">Select</option>
        <option ng-repeat="user in districts" value="{{user.district}}">{{user.district}}</option>
    </select>
    <select class="form-control" name="district" ng-model="srchDistrict" id="">
        <option value="">Select</option>
        <option ng-repeat="users in districts" value="{{users.district}}">{{users.district}}
        </option>
    </select>
    <table class="table">
        <thead>
            <tr>
                <th>Sr</th>
                <th>District</th>
                <th>Block</th>
                <th>Village</th>
                <th>School Name</th>
                <th>PC Sr</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="user in users | filter: { district: srchDistrict }"
                style="height:40px; font-size:14px;text-align:center;">
                <td>{{user.sr}}</td>
                <td>{{user.district}}</td>
                <td>{{user.block}}</td>
                <td>{{user.village}}</td>
                <td>{{user.school_name}}</td>
                <td>{{user.pc_sr}}</td>
                <td>{{user.status}}</td>
            </tr>
        </tbody>
    </table>

    <script>
        var app = angular.module('myApp', []);
        app.controller('customersCtrl', function ($scope) {
            // Assuming $data is a PHP variable containing the data
            $scope.users = <?php echo json_encode($data); ?>;
            $scope.districts = $scope.users.map(user => user.district);

            $scope.srchDistrict = '';
        });

        // Initialize Select2
        $(document).ready(function () {
            $('.select2bs4').select2();
        });
    </script>

</body>

</html>