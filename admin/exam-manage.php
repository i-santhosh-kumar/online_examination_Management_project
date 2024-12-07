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

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <style>
    td,
    th {
      text-align: center;
    }
  </style>
</head>

<body>
<br><br>
  <table class="table align-middle mb-0 bg-white table-hover">
    <thead class="bg-light">
      <tr>
        <th>Serial Number</th>
        <th>Instructor ID</th>
        <th>Instructor Name</th>
        <th>gmail</th>
        <th>Instructor Department</th>
        <th>Department</th>
        <th>Subjects</th>
        <th>Subject Code</th>
        <th>Year</th>
        <th>Batch</th>
        <th>Semester</th>
        <th>Exam Title</th>
        <th>Start time</th>
        <th>Duration</th>
        <th>Unique exam Id</th>
        <th>Exam Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $connection=mysqli_connect("localhost","root","","exam_management");
      session_start();
      date_default_timezone_set("Asia/Kolkata");
      $today = date("Y-m-d") . 'T' . date("H:i");
      
      if ($connection) {
        $count = 1;
        $query = 'select * from exams ';
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($result)) {
      ?>
          <tr>
            <!--serial number-->
            <td>
              <?php echo ($count); ?>
            </td>
            <!--instructor id-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[1]); ?></p>
              </div>
            </td>
            <!--instructor name-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[2]); ?></p>
              </div>
            </td>
            <!-- instructor gmail-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[3]); ?></p>
              </div>
            </td>
            <!--instructor department-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[4]); ?></p>
              </div>
            </td>
            <!--department-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[5]); ?></p>
              </div>
            </td>
            <!--subject-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[6]); ?></p>
              </div>
            </td>
            <!--subject code-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[7]); ?></p>
              </div>
            </td>
            <!--year-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[8]); ?></p>
              </div>
            </td>
            <!--batch-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[9]); ?></p>
              </div>
            </td>
            <!--semester-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[10]); ?></p>
              </div>
            </td>
            <!--exam title-->
            <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[11]); ?></p>
              </div>
            </td>
             <!--start time-->
             <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[12]); ?></p>
              </div>
            </td>
             <!--duration-->
             <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[13]); ?></p>
              </div>
            </td>
             <!--unique exam name-->
             <td>
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php echo ($row[14]); ?></p>
              </div>
            </td>
            <!--Exam status-->
            <?php
              if ($today >= $row[12]) {
              ?>
                <td>
                  <div class="ms-3">             
                      <button type="button" class="btn btn-success">Completed</button>
                  </div>
                </td>
                <?php
              } 
              else {
              ?>
                <td>
                  <div class="ms-3">
                    <button type="button"  class="btn btn-danger">Pending</button>
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
        die('could not connect with database' . mysqli_connect_error());
      }
      ?>
    </tbody>
  </table>
  </div>
</body>
</html>