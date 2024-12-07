<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Student Details</title>
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
        <th>Student RollNumber</th>
        <th>Student Name</th>
        <th>Student Photo</th>
        <th>Batch</th>
        <th>Semester</th>
        <th>Phone Number</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $year = $_GET['year'];
      include_once('../dbconfig.php');
      session_start();
      $dept = $_SESSION['instructor_department'];
      if ($connection) {
        $count = 1;
        $query = "SELECT roll_number,student_name,upload,batch,semester,phonenumber,devices FROM student WHERE department='$dept' AND years='$year'";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)) {
          $file = 'http://localhost/online_examination_with_security/admin/student/upload/' . $row[2];
      ?>
          <tr>
            <!--serial number-->
            <td>
              <?php echo ($count); ?>
            </td>
            <!--student roll number-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[0]); ?></p>
              </div>
            </td>
            <!--student name-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[1]); ?></p>
              </div>
            </td>
            <!--student photo-->
            <td>
              <div class="d-flex align-items-center">
                <img src="<?php echo ($file); ?>" alt="" style="width: 75px; height: 75px; object-fit: fill;" class="rounded-circle" />
              </div>
            </td>
            <!--batch-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[3]); ?></p>
              </div>
            </td>
            <!-- semester-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[4]); ?></p>
              </div>
            </td>
            <!--phone number-->
            <td>
              <p class="text-muted mb-0"><?php echo ($row[5]); ?></p>
            </td>
         
            <!--devices logged in or logged out-->
            <?php
            if ($row[6] == 1) {
            ?>
              <td>
                <span class="badge badge-success rounded-pill d-inline">Logged In</span>
              </td>
            <?php
            } else {
            ?>
              <td>
                <span class="badge badge-danger rounded-pill d-inline">Logged Out</span>
              </td>
            <?php
            }
            ?>

          </tr>
      <?php
          $count = $count + 1;
        }
      } else {
        die('could not connect with database' . mysqli_connect_error());
      }
      ?>
    </tbody>
  </table>
</body>

</html>