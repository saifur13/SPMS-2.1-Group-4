<?php
    include '../php/include/conn.php';

    if(isset($_POST['submit']))
    {
      $studentId = $_POST["studentId"];
      $course_Name = $_POST["course"];
    }

    $studentId = $_POST['studentId'];
    $view = $_POST['view'];

    $query = "SELECT * FROM marks WHERE studentId = $studentId";
    $result = $conn->query($query);

    while($row = mysqli_fetch_array($result))
    {

        $dataPoints = array( 
            array("y" => $row["mark1"], "label" => "Mark1" ),
            array("y" => $row["mark2"], "label" => "Mark2" ),
            array("y" => $row["mark3"], "label" => "Mark3" ),
            array("y" => $row["mark4"], "label" => "Mark4" ),
            array("y" => $row["mark5"], "label" => "Mark5" ),
            array("y" => $row["mark6"], "label" => "Mark6" ),
            array("y" => $row["mark7"], "label" => "Mark7" ),
            array("y" => $row["mark8"], "label" => "Mark8" ),
        );
    }
?>

<script>
        window.onload = function() {
     
     var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2",
     title:{
         text: "Individual Result"
     },
     axisY: {
         title: "Marks"
     },
     data: [{
         type: "column",
         yValueFormatString: "#,##0.##",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
});
chart.render();
}
</script>
 
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PLO Achievement| SPMS 
  </title>
   
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
 

  <style>
    .selectpicker{
      width: 100%;
      padding: 8px;
      border-radius: 20px;
      border-color: #E3E3E3;
    }
    .selectpicker:focus{
      outline: none;
      border-color: #F56332;
    }
    .text-primary{
      font-size: 13px;
    }
    .text-basic{
      font-size: 13px;
    }
    .submit-button{
      background-color: #F56332;
    }
  </style>

</head>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          FACULTY
        </a>
        <a href="#" class="simple-text logo-normal">
          SPMS
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <li class="">
            <a href="faculty-marks-entry.php">
              <i class="now-ui-icons design_app"></i>
              <p>Marks Entry</p>
            </a>
          </li>
          <li class="active ">
            <a href="view-student-result.php">
              <i class="now-ui-icons design_app"></i>
              <p>Student Result</p>
            </a>
          </li>
          <li class="">
              <a href="faculty-feedback.php">
              <i class="now-ui-icons design_app"></i>
              <p>Admin Feedback</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <form action="student-result-view.php" method="post">
                  <!-- <div class="row">
                    <div class="col-md-2 pl-1">
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" class="form-control"  placeholder="Ex. 194545645" name="studentId" id="studentId" required>
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="col-md-2 pl-1">
                    </div>
                    <div class="col-md-4 px-1">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Student Id</label>
                            <input type="text" class="form-control" name="studentId" placeholder="Student Id" >
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Select A Course</label>
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-block" name="course" id="view-picker" title="Select a Course">
                            <option disabled selected>Select a Course</option>
                            <option value="1">CSE-101</option>
                            <option value="2">CSE-203</option>
                            <option value="3">CSE-303</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <input id="current_id" value="<?php echo $studentId; ?>" hidden>
                  <div align="center">
                    <button type="submit" class="btn submit-button">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
            <h5 align="center"><?php echo "ID: ". $studentId ?></h5>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      </div>
    
    </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by Group-4. Coded by Group-4</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>

  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
 
  <script src="../assets/js/core/jquery.min.js"></script>
 
 </body>
 </html>    