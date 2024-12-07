<?php session_start(); ?>
<?php
$instructor_id = $_GET['insid'];
$instructor_name = $_GET['insnm'];
$instructor_gmail = $_GET['insgmail'];
$instructor_department = $_GET['insdept'];
$subject = $_GET['subject'];
$subjectcode = $_GET['subjectcode'];
$title = $_GET['title'];
$time = (int)$_GET['duration'];
$examtable = $_GET['examtable'];
date_default_timezone_set("Asia/Kolkata");
$entry_time=date("Y-m-d")." ".date("H-i-s");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Exam Title</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
  <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
  <style>
    body {
      background-color: #eee;
    }
    label.radio {
      cursor: pointer;
    }
    label.radio input {
      position: absolute;
      top: 0;
      left: 0;
      visibility: hidden;
      pointer-events: none;
    }

    label.radio span {
      padding: 10px 10px;
      border: 1px solid green;
      display: inline-block;
      color: red;
      text-align: center;
      border-radius: 3px;
      margin-top: 7px;
      text-transform: uppercase;
    }

    label.radio input:checked+span {
      border-color: green;
      background-color: green;
      color: #fff;
    }

    .ans {
      margin-left: 36px !important;
    }

    .btn:focus {
      outline: 0 !important;
      box-shadow: none !important;
    }

    .btn:active {
      outline: 0 !important;
      box-shadow: none !important;
    }

    .error
    {
      font-style: oblique;
      margin-left: 3%;
      margin-top: 10%;
      text-align: center;
    }
  </style>

  <script type="text/javascript">
    function timeout() {
      //var hours=Math.floor(timeLeft/60);
      var minute = Math.floor(timeLeft / 60);  
      var second = timeLeft % 60;
      var sec = checktime(second);
      if (timeLeft <= 0) {
        clearTimeout(tm);
        document.getElementById("form1").submit();
      } else {
        document.getElementById("time").innerHTML = minute + ":" + sec;
      }
      timeLeft--;
      var tm = setTimeout(function() {
        timeout()
      }, 1000)
    }

    function checktime(msg) {
      if (msg < 10) {
        msg = "0" + msg;
      }
      return msg;
    }

    function glines()
      {
       swal( { title: "READ CAREFULLY!", 
        text: "1. Once exam starts, do not switch to any other tab/window!! 2. Make sure you have stable internet connectivity!!",
        confirmButtonText:'ok'},
        function(isconfirm)
        {
          if(isconfirm)
          {
              timeout();
              checktime();
          }
        });
      }

  </script>
    <script type="text/javascript">
    function toggleFullScreen() {
      if(!document.fullscreenElement) 
      {
        document.documentElement.requestFullscreen();
      }
  }
  </script>   
</head>

<body onload="glines()" onclick="toggleFullScreen()">
  <script type="text/javascript">
    var timeLeft = <?php echo ($time * 60); ?>;
  </script>
<script  type="text/javascript">
        document.addEventListener("visibilitychange", (event) => {
            if (document.visibilityState == "hidden") {
              let form = document.getElementById("form1");
                form.submit();
            }
        });

        window.addEventListener('beforeunload',()=>{
          event.preventDefault();
          event.returnValue="";
        });
        document.onkeydown=function(event){
          if(event.keycode==116){
            event.preventDefault();
          }
        }
    </script>

  <?php
  $student_name = $_SESSION['student_name'];
  $roll_number = $_SESSION['roll_number'];
  $department = $_SESSION['student_department'];
  $gmail = $_SESSION['student_gmail'];
  $year = $_SESSION['years'];
  $batch=$_SESSION['batch'];
  $semester=$_SESSION['semester'];
  $dev = '1';
  $connection = mysqli_connect('localhost', 'root', '', 'exam_management');
  if ($connection) {
    $check = "SELECT devices from result where student_name='$student_name' and roll_number='$roll_number' and student_gmail='$gmail' and student_department='$department' and year='$year' and Batch='$batch' and Semester='$semester' and instructor_name='$instructor_name' and instructor_department='$instructor_department' and subject='$subject' and subject_code='$subjectcode' and exam_title='$title' and unique_exam_name='$examtable'";
    $results = mysqli_query($connection, $check);
    if (mysqli_num_rows($results)) 
    {
      $row = mysqli_fetch_row($results);
      if ((strcmp($dev, $row[0]) == 0)) 
      {
  ?>
        <div class="error">
          <p> You cannot attend this exam more than one time</p>
          <p><?php echo($title); ?></p>
          <form action="index.php" onsubmit="closeWindow();">
             <button type="submit" class="btn btn-primary">Back</button>
              <script type="text/javascript">
                  function closeWindow() {
                      let new_window =open(location, '_self');
                      new_window.close();
                      return false;
                    }
              </script>
          </form>
        </div>
        
    <?php 
      } 
    else 
    {
        run($connection,$instructor_id,$instructor_name,$instructor_gmail,$instructor_department,$subject,$subjectcode,$title,$examtable,$entry_time);
    }
    }
    else
    {
          run($connection,$instructor_id,$instructor_name,$instructor_gmail,$instructor_department,$subject,$subjectcode,$title,$examtable,$entry_time);
    }
  } 
  else
  {
    die('something happened' . mysqli_connect_error());
  }
?>
</body>
</html>

<?php
function run($connection,$instructor_id,$instructor_name,$instructor_gmail,$instructor_department,$subject,$subjectcode,$title,$examtable,$entry_time)
{ 
?>
  <form id="form1" action="result.php?insid=<?php echo ($instructor_id); ?>&insnm=<?php echo ($instructor_name); ?>&insgmail=<?php echo ($instructor_gmail); ?>&insdept=<?php echo ($instructor_department); ?>&subject=<?php echo ($subject); ?>&subjectcode=<?php echo ($subjectcode); ?>&title=<?php echo ($title); ?>&examtable=<?php echo ($examtable); ?>&entrytime=<?php echo($entry_time); ?>" method="post">
    <h1><?php echo ($title); ?><div id="time" style="float:right">Timer</div>
    </h1>
    <?php
      $count=1;
      $show = 'SELECT * FROM ' . $examtable.' ORDER BY RAND()';
      $result = mysqli_query($connection, $show);
      while ($row = mysqli_fetch_array($result))
      {
    ?>

        <div class="container mt-5">
          <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
              <div class="border">
                <div class="question bg-white p-3 border-bottom">
                  <div class="d-flex flex-row align-items-center question-title">

                    <h5 class="text-danger"><?php echo ($count); ?></h5>
                    <h5 class="mt-1 ml-2"><?php echo ($row[1]); ?></h5>
                  </div>
                  <div class="ans ml-2">
                    <label class="radio"> <input type="radio" name="<?php echo ($row[0]); ?>" value="<?php echo ($row[2]); ?>"> <span><?php echo ($row[2]); ?></span>
                    </label>
                  </div>
                  <div class="ans ml-2">
                    <label class="radio"> <input type="radio" name="<?php echo ($row[0]); ?>" value="<?php echo ($row[3]); ?>"> <span><?php echo ($row[3]); ?></span>
                    </label>
                  </div>
                  <div class="ans ml-2">
                    <label class="radio"> <input type="radio" name="<?php echo ($row[0]); ?>" value="<?php echo ($row[4]); ?>"> <span><?php echo ($row[4]); ?></span>
                    </label>
                  </div>
                  <div class="ans ml-2">
                    <label class="radio"> <input type="radio" name="<?php echo ($row[0]); ?>" value="<?php echo ($row[5]); ?>"> <span><?php echo ($row[5]); ?></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php
    $count=$count+1;
      }
    ?>
    <br>
    <center><input type="submit" class="btn btn-success" value="submit"></center>
    <br>
  </form>
<?php
}
?>

