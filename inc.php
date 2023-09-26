$id=$_SESSION['pc_sr'];
$qry11="SELECT * FROM `asset` WHERE `pc_sr`= '$id'  ORDER BY `asset`.`pc_sr` ASC";
$result11 = mysqli_query($conn, $qry11);
// $total = mysqli_num_rows($result);



if ( isset($_POST['PC']) ) {
  // $schl = $_POST['school'];
  $PC = $_POST['PC'];
  // $village = $_POST['Village'];
  // $Dis = $_POST['DIST'];
  // $Bl = $_POST['Block'];

  $sql12= "SELECT * FROM `asset` WHERE `pc_sr`='$PC'";
  $result12 = mysqli_query($conn, $sql12);
  $total12 = mysqli_num_rows($result12);

  if (isset($_POST['PC']) && $_POST['PC'] != "All") {
    // fetch data from json file
    $cd = 1;
    $file = "JSON PC/" . $_POST['PC'] . ".json";
    $data = file_get_contents($file);
    $data = json_decode($data, true);
    // $data = array_unique($data, true);
    $cd++;

  }
}