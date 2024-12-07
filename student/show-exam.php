<!DOCTYPE html>
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
        <th>Department</th>
        <th>Subjects</th>
        <th>Subject Code</th>
        <th>Semester</th>
        <th>Exam Title</th>
        <th>Start time</th>
        <th>Duration in MIN</th>
        <th>Attend Exam</th>
      </tr>
    </thead>
    <tbody>
      <?php
      session_start();
      date_default_timezone_set("Asia/Kolkata");
      $today = date("Y-m-d") . 'T' . date("H:i");
      $department = $_SESSION['student_department'];
      $year = $_SESSION['years'];
      $batch=$_SESSION['batch'];
      $semester=$_SESSION['semester'];
      include_once('../dbconfig.php');
      $connection1 = mysqli_connect('localhost', 'root', '', 'exam_management');
      if ($connection1 && $connection) {
        $select = "select instructor_id,instructor_name,gmail,instructor_department,department,subjects, subject_code, Semester, exam_title, start_time, duration, unique_exam_name from exams where department='$department' and years='$year' and Batch='$batch' and Semester='$semester'";
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
                  <p class="fw-bold mb-1"><?php echo ($row[1]); ?></p>
                </div>
              </td>
              <!--department-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[4]); ?></p>
                </div>
              </td>
              <!--subject-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[5]); ?></p>
                </div>
              </td>
              <!--subjectCode-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[6]); ?></p>
                </div>
              </td>
              <!--semester-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[7]); ?></p>
                </div>
              </td>
              <!--Exam title-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[8]); ?></p>
                </div>
              </td>
              <!--Start time-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[9]); ?></p>
                </div>
              </td>
              <!--Duration-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo ($row[10]); ?></p>
                </div>
              </td>
              <!--attend exam-->
              <?php
              if ($today >= $row[9]) {
              ?>
                <td>
                  <div class="ms-3">
                    <a href="quiz.php?insid=<?php echo($row[0]); ?>&insnm=<?php echo(trim($row[1])); ?>&insgmail=<?php echo($row[2]); ?>&insdept=<?php echo($row[3]); ?>&subject=<?php echo($row[5]); ?>&subjectcode=<?php echo($row[6]); ?>&title=<?php echo ($row[8]); ?>&duration=<?php echo ($row[10]); ?>&examtable=<?php echo ($row[11]); ?>" target="_blank">
                      <button type="submit" class="btn btn-success">Attend</button>
                    </a>
                  </div>
                </td>

              <?php
              } 
              else {
              ?>
                <td>
                  <div class="ms-3">
                    <button type="submit" disabled class="btn btn-success">Attend</button>
                  </div>
                </td>
              <?php
              }
              ?>
            </tr>
          <?php
            $count = $count + 1;
          }
        } else {
          ?>
          <tr>
            <td colspan="10">currently no exams</td>
          </tr>
      <?php
        }
      } else {
        die('something went wrong with database' . mysqli_connect_error());
      }
      ?>