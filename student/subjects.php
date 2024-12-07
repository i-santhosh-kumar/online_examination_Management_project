<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            margin-top: 0px;
        }

        .card-big-shadow {
            max-width: 320px;
            position: relative;
        }

        .coloured-cards .card {
            margin-top: 30px;
        }

        .card[data-radius="none"] {
            border-radius: 0px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
            background-color: #FFFFFF;
            color: #252422;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .card[data-background="image"] .title,
        .card[data-background="image"] .stats,
        .card[data-background="image"] .category,
        .card[data-background="image"] .description,
        .card[data-background="image"] .content,
        .card[data-background="image"] .card-footer,
        .card[data-background="image"] small,
        .card[data-background="image"] .content a,
        .card[data-background="color"] .title,
        .card[data-background="color"] .stats,
        .card[data-background="color"] .category,
        .card[data-background="color"] .description,
        .card[data-background="color"] .content,
        .card[data-background="color"] .card-footer,
        .card[data-background="color"] small,
        .card[data-background="color"] .content a {
            color: black;
            font-size: 16px;
        }

        .card.card-just-text .content {
            padding: 50px 65px;
            text-align: center;
        }

        .card .content {
            padding: 20px 20px 10px 20px;
        }

        .card[data-color="blue"] .category {
            color: #7a9e9f;
        }

        .card .category,
        .card .label {
            font-size: 14px;
            margin-bottom: 0px;
        }

        .card-big-shadow:before {
            background-image: url("http://static.tumblr.com/i21wc39/coTmrkw40/shadow.png");
            background-position: center bottom;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            bottom: -12%;
            content: "";
            display: block;
            left: -12%;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 0;
        }

        h4,
        .h4 {
            font-size: 1.5em;
            font-weight: 600;
            line-height: 1.2em;
        }

        h6,
        .h6 {
            font-size: 0.9em;
            font-weight: 600;
            text-transform: uppercase;
        }

        .card .description {
            font-size: 16px;
            color: #66615b;

        }

        .content-card {
            margin-top: 5px;

        }

        a:hover,
        a:focus {
            text-decoration: none;
        }

        /*======== COLORS ===========*/
        .card[data-color="blue"] {
            background: #9cd6d6;
        }

        .card[data-color="blue"] .description {
            color: #506568;
            padding-left: 10px;
        }

        i {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="grey-bg container-fluid">
                <section id="minimal-statistics">
                    <div class="container bootstrap snippets bootdeys">
                        <div class="row">
                            <?php
                            include('../dbconfig.php');
                            session_start();
                            $years = $_SESSION['years'];
                            $batch=$_SESSION['batch'];
                            $semester=$_SESSION['semester'];
                            $department=$_SESSION['student_department'];
                            if ($connection) {
                                $query = "SELECT instructor_name, subject,Semester FROM instructorsubject WHERE Year='$years' AND Batch='$batch' AND department='$department' AND Semester='$semester'";
                                $result = mysqli_query($connection, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                            ?>
                                        <div class="col-md-4 col-sm-6 content-card">
                                            <div class="card-big-shadow">
                                                <div class="card card-just-text" data-background="color" data-color="blue" data-radius="none">
                                                    <div class="content">
                                                        <p class="description"> <i class="fa fa-book " style="font-size: 3rem;" aria-hidden="true"></i><br><b>subject:</b> <br> <?php echo $row[1]; ?><br><b>Instructor:</b><br><?php echo($row[0]); ?><br><b>semester:</b> <br> <?php echo $row[2]; ?> </p>
                                                    </div>
                                                </div> <!-- end card -->
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                                else{
                                    echo 'no records';
                                }

                            } 
                            else {
                                die('something went wrong' . mysqli_connect_error());
                            }
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>