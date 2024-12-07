<?php
$connection = mysqli_connect('localhost', 'root', '', 'exam_management');
if ($connection) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $count = 1;
        $dept = $_GET['dept'];
        $batch = $_GET['batch'];
        $year = $_GET['year'];
        $semester = $_GET['semester'];
        $subject = $_POST['sub'];
        $select = "SELECT student_name,roll_number,year,Batch,Semester,instructor_name,instructor_department,subject_code,exam_title,unique_exam_name,total_marks,secured_marks,entry_time,exit_time from result where student_department='$dept' and year='$year' and Batch='$batch' and Semester='$semester' and subject='$subject'";
        $result = mysqli_query($connection, $select);
?>
        <html>
        <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <br>
            <div class="container">
                <div class="row">
                    <div class="co1">
                        <a href="export.php?dept=<?php echo($dept) ?>&batch=<?php echo($batch) ?>&year=<?php echo($year)?>&semester=<?php echo($semester);?>&sub=<?php echo($subject);?>"><button type="button" class="btn btn-success">Export</button></a>
                    </div>
                    <div class="col">
                        <a href="result-management.php"> <button type="button" class="btn btn-primary">Back</button></a>
                    </div>
                </div>
            </div>
            <br>
            <table class="table align-middle mb-0 bg-white table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>Serial Number</th>
                        <th>Student Name</th>
                        <th>Student Roll No</th>
                        <th>Year</th>
                        <th>Batch</th>
                        <th>Semester</th>
                        <th>Instructor Name</th>
                        <th>Instructor Department</th>
                        <th>Subject Code</th>
                        <th>Exam Title</th>
                        <th>Unique Exam Name</th>
                        <th>Total Marks</th>
                        <th>Secured Marks</th>
                        <th>Logged In</th>
                        <th>Logged Out</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <!--serial number-->
                                <td>
                                    <?php echo ($count); ?>
                                </td>
                                <!--student name-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[0]); ?></p>
                                    </div>
                                </td>
                                <!--Student roll no-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[1]); ?></p>
                                    </div>
                                </td>
                                <!-- year-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[2]); ?></p>
                                    </div>
                                </td>
                                <!--batch-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[3]); ?></p>
                                    </div>
                                </td>
                                <!--semester-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[4]); ?></p>
                                    </div>
                                </td>
                                <!--instructor name-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[5]); ?></p>
                                    </div>
                                </td>
                                <!--instructor department-->
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
                                <!--exam title-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[8]); ?></p>
                                    </div>
                                </td>
                                <!--unique exam name-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[9]); ?></p>
                                    </div>
                                </td>
                                <!--total marks-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[10]); ?></p>
                                    </div>
                                </td>
                                <!--secured marks-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[11]); ?></p>
                                    </div>
                                </td>
                                <!--entry time-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[12]); ?></p>
                                    </div>
                                </td>
                                <!--exit time-->
                                <td>
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo ($row[13]); ?></p>
                                    </div>
                                </td>
                            </tr>

                        <?php
                            $count = $count + 1;
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="15">no results found</td>
                        </tr>
            <?php
                    }
                }
            } else {
                die('something went wrong with database' . mysqli_connect_error());
            }
            ?>