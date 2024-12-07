<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .row {
            padding-left: 450px;
            padding-top: 25px;
        }

        td,
        th {
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <a href="addsubject-html.php" class="btn btn-primary a-btn-slide-text">
                <span input type="submit" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <span><strong>Add</strong></span>
            </a>
        </div>
    </div>
    <?php
    echo  "<br><br>";

    ?>

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
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();

            include_once('../dbconfig.php');
            if ($connection) {
                $count = 1;
                $name = $_SESSION['instructor_name'];
                $id=$_SESSION['instructor_id'];
                $gmail=$_SESSION['instructor_gmail'];
                $query="select * from instructorsubject where instructor_name='$name' and instructor_id='$id' and instructor_gmail='$gmail'";
                $result = mysqli_query($connection, $query);
                if(mysqli_num_rows($result)>0)
                {
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
                        <!--delete-->
                        <td>
                            <form action="delete-subject.php?department=<?php echo($row[5]);?>&subjectcode=<?php echo($row[7]);?>" method="POST">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>

            <?php
                    $count = $count + 1;
                }
            }
            else
            {
             ?>
                <tr>
                        <td colspan="10">no records found</td>
                </tr>
            <?php
            }
            } 
            else 
            {
                die('could not connect with database' . mysqli_connect_error());
            }
            ?>
        </tbody>
    </table>

</body>

</html>