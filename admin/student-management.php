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
      th,td
      {
        font-size: 13px;
        text-align: center;
      }
    </style>
</head>
<body>
    <div class="container" style=" padding-left: 450px; padding-top: 25px;">
        <div class="row">
            <a href="student/student-register.html" class="btn btn-primary a-btn-slide-text">
                <span input type="submit" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <span><strong>Add</strong></span>
            </a>
        </div>
    </div>
    <br>
    <table class="table align-middle mb-0 bg-white table-hover">
        <thead class="bg-light">
          <tr>
            <th>Serial Number</th>
            <th>Student RollNumber</th>
            <th>Student Name</th>
            <th>Student Photo</th>
            <th>Department</th>
            <th>Batch</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Self / Aided</th>
            <th>Username</th>
            <th>Gmail</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
        <?php
            include_once('../dbconfig.php');
            if($connection)
            {
                $count=1;
                $query='select * from student';
                $result=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array($result))
                {
                    $file='http://localhost/online_examination_with_security/admin/student/upload/'.$row[4];
        ?>
          <tr>
            <!--serial number-->
            <td>
                <?php echo($count); ?>
            </td>
            <!--student roll number-->
            <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo($row[10]); ?></p>
                </div>
            </td>
            <!--student name-->
            <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo($row[1]); ?></p>
                </div>
            </td>
            <!--student photo-->    
            <td>
              <div class="d-flex align-items-center">
                <img
                    src="<?php echo($file); ?>"
                    alt=""
                    style="width: 75px; height: 75px; object-fit: fill;"
                    class="rounded-circle"
                    />
              </div>
            </td>
            <!--department-->
            <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?php echo($row[8]); ?></p>
                </div>
            </td>
            <!--batch-->
            <td>
                <div class="ms-3">
                  <p class="text-muted mb-0"><?php echo($row[9]); ?></p>
                </div>
            </td>
             <!--year-->
             <td>
                <div class="ms-3">
                  <p class="text-muted mb-0"><?php echo($row[11]); ?></p>
                </div>
            </td>
             <!--semester-->
             <td>
                <div class="ms-3">
                  <p class="text-muted mb-0"><?php echo($row[12]); ?></p>
                </div>
            </td>
            <!--self / aided-->        
            <td>
              <p class="fw-normal mb-1"><?php echo($row[14]); ?></p>
            </td>
            <!--username-->        
            <td>
              <p class="text-muted mb-0"><?php echo($row[15]); ?></p>
            </td>
            <!--gmail-->        
            <td>
              <p class="text-muted mb-0"><?php echo($row[16]); ?></p>
            </td>
            <!--phone number-->        
            <td>
              <p class="text-muted mb-0"><?php echo($row[3]); ?></p>
            </td>
        <!--devices logged in or logged out-->
        <?php
        if($row[17]==1)
        {
        ?>
            <td>
              <span class="badge badge-success rounded-pill d-inline">Logged In</span>
            </td>
        <?php
        }
        else
        {
        ?>
            <td>
              <span class="badge badge-danger rounded-pill d-inline">Logged Out</span>
            </td>
        <?php
        }
        ?>

            <td>
              <form action="delete-student.php?roll_no=<?php echo($row[10]); ?>&student_name=<?php echo ($row[1]); ?>&department=<?php echo($row[8]); ?>&batch=<?php echo($row[9]); ?>&year=<?php echo($row[11]); ?>&sem=<?php echo($row[12]); ?>&gmail=<?php echo($row[16]); ?>&sa=<?php echo($row[14]); ?>&username=<?php echo($row[15]); ?>" method="post">
                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
              </form>
            </td>

          </tr>
        <?php
            $count=$count+1;
                }      
            }
            else
            {
                die('could not connect with database'.mysqli_connect_error());
            }   
        ?> 
        </tbody>
      </table>
</body>
</html>