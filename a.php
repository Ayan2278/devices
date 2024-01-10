
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
  // add Json file
//   $EMP_NAME=$_SESSION['username'];
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
    <!-- Your HTML content for index.php -->
    

    <!-- Include your ApexCharts script -->
    <section class="col-lg-6 ">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="card shadow" style="min-height: 500px;">
      <div class="card-header" style="border:0px;">
        <h3 class="card-title"><i class='bx bxs-bar-chart-alt-2 mx-1 ' style=" font-size:25px;"></i>Active/Inactive
          Status</h3>
      </div>
      <div class="card-body">
        <div id="chartA" style="min-height: 100%; height: 350px; max-height: 500px; max-width: 100%;"></div>
      </div>

    </div>

  </section>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  

  <script>
    var options = {
      series: [{
        name: 'Active',
        data: [<?php
        if ($totDist != 0) {
          while ($rowDistt = $resDistt->fetch_assoc()) {
            $active = 0;
            $sqlA = "SELECT * from `asset` where `district`='" . $rowDistt["district"] . "';";
            $resultA = mysqli_query($conn, $sqlA);
            $totA = mysqli_num_rows($resultA);
            if ($totA != 0) {
              while ($rowA = $resultA->fetch_assoc()) {
                if (status($rowA['pc_sr']) != '') {
                  # code...
                  $active++;
                }
              }
              echo $active, ",";
            }
          }
        }

        ?>],
      }, {
        name: 'Inactive',
        data: [

          <?php
          if ($totDist != 0) {
            while ($rowDist = $resDist->fetch_assoc()) {
              $inactive = 0;
              $sqlINA = "SELECT * from `asset` where `district`='" . $rowDist["district"] . "';";
              $resultINA = mysqli_query($conn, $sqlINA);
              $totINA = mysqli_num_rows($resultINA);
              if ($totINA != 0) {
                while ($rowINA = $resultINA->fetch_assoc()) {
                  if (status($rowINA['pc_sr']) != 'Active') {
                    # code...
                    $inactive++;
                  }
                }
                echo $inactive, ",";
              }
            }
          }
          ?>
        ]
      }],
      chart: {
        type: 'bar',
        height: 500,
        stacked: true,
        stackType: '100'
      },
      responsive: [{
        breakpoint: 480,
        options: {
          legend: {
            position: 'bottom',
            offsetX: 10,
            offsetY: 0
          }
        }
      }],
      xaxis: {
        categories: [
          <?php if ($totDisttt != 0) {
            while ($rowDisttt = $resDisttt->fetch_assoc()) {
              echo "'" . $rowDisttt['district'] . "',";
            }
          }
          ?>
        ],
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

    var chart = new ApexCharts(document.querySelector("#chartA"), options);
    chart.render();
  </script>
</body>
</html>

  