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
        <th>Instructor ID</th>
        <th>Instructor Name</th>
        <th>Department</th>
        <th>Subjects</th>
        <th>Subject Code</th>
        <th>Year</th>
        <th>Batch</th>
        <th>Semester</th>
        <th>Exam</th>
      </tr>
    </thead>
    <tbody>
      <?php
      session_start();

      include_once('../dbconfig.php');
      if ($connection) {
        $count = 1;
        $inst_id = $_SESSION['instructor_id'];
        $instructor_name = $_SESSION['instructor_name'];
        $instructor_gmail=$_SESSION['instructor_gmail'];
        $query = "select * from instructorsubject where instructor_id='$inst_id' and instructor_name='$instructor_name' and instructor_gmail='$instructor_gmail'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
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
              <!-- Department-->
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
              <!--subjectCode-->
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
              <!--exam-->
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1">
                    <html>

                    <body>
                      <form method="post" action="create-exam-html.php?department=<?php echo ($row[5]); ?>&subject=<?php echo ($row[6]); ?>& subjectcode=<?php echo ($row[7]); ?>&year=<?php echo ($row[8]); ?>&batch=<?php echo ($row[9]); ?>&sem=<?php echo ($row[10]); ?>">
                        <input type="submit" class="btn btn-success" value="Add Question ">
                      </form>
                    </body>

                    </html>

                  </p>
                </div>
              </td>
            </tr>

          <?php
            $count = $count + 1;
          }
        } else {
          ?>
          <tr>
            <td colspan="8">no records found</td>
          </tr>
      <?php
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