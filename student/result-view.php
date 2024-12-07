
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
    td,
    th {
      text-align: center;
      font-size: 16px;
    }
  </style>
</head>

<body>
  <br><br>
  <table class="table align-middle mb-0 bg-white table-hover">
    <thead class="bg-light">
      <tr>
        <th>Serial Number</th>
        <th>Instructor Name</th>
        <th>Instructor department</th>
        <th>Year</th>
        <th>Semester</th>
        <th>Subjects</th>
        <th>Subject Code</th>
        <th>Exam Title</th>
        <th>Total Marks</th>
        <th>Secured Marks</th>
        <th>Exam Status</th>
      
      </tr>
    </thead>
    <tbody>
      <?php
      session_start();
      date_default_timezone_set("Asia/Kolkata");
      $today = date("Y-m-d") . 'T' . date("H:i");
      $department = $_SESSION['student_department'];
      $name = $_SESSION['student_name'];
      $gmail = $_SESSION['student_gmail'];
      $roll_number=$_SESSION['roll_number'];
      $year = $_SESSION['years'];
      $batch=$_SESSION['batch'];
      $semester=$_SESSION['semester'];
      include_once('../dbconfig.php');
      $connection1 = mysqli_connect('localhost', 'root', '', 'exam_management');
      if ($connection1 && $connection) {
        $select = "SELECT instructor_name,instructor_department,year,Semester,subject,subject_code,exam_title,total_marks,secured_marks from result where  student_name='$name' and roll_number='$roll_number' and student_gmail='$gmail' and student_department='$department' and year='$year' and Batch='$batch' and Semester='$semester'";
        $result = mysqli_query($connection1, $select);
        if (mysqli_num_rows($result) > 0) {
          $count = 1;
          while ($row = mysqli_fetch_array($result)) {
      ?>
            <tr>
              <!--serial number-->
              <td>
                <?php echo ($count); ?>
              </td>
              <!--instructor name-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[0]); ?></p>
                </div>
              </td>
              <!--department-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[1]); ?></p>
                </div>
              </td>
              <!--year-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[2]); ?></p>
                </div>
              </td>
              <!--semester-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[3]); ?></p>
                </div>
              </td>
              <!--subject-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[4]); ?></p>
                </div>
              </td>
              <!--subjectCode-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[5]); ?></p>
                </div>
              </td>
              <!--Exam title-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[6]); ?></p>
                </div>
              </td>
              <!--total marks-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[7]); ?></p>
                </div>
              </td>
              <!--secured marks-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[8]); ?></p>
                </div>
              </td>
              <?php
              if ($row[8] >= ($row[7]/2)) {
              ?>
                <td>
                  <div class="ms-3">           
                      <button type="submit" class="btn btn-success">Pass</button>
                  </div>
                </td>

              <?php
              } 
              else {
              ?>
                <td>
                  <div class="ms-3">
                    <button type="submit"  class="btn btn-danger">RC</button>
                  </div>
                </td>
              <?php
              }
              ?>
              <?php
              $count = $count + 1;
              } 
              ?>
            </tr>
          <?php
          }
         else {
          ?>
          <tr>
            <td colspan="11">currently you don't get any result update</td>
          </tr>
      <?php
        }
      } else {
        die('something went wrong with database' . mysqli_connect_error());
      }
      ?>