<!doctype html>
<html lang="en">

<head>
    <title>Department show</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
            font-size: 17px;
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
            font-size: 10px;
            color: #66615b;
        }

        .content-card {
            margin-top: 30px;
        }

        a:hover,
        a:focus {
            text-decoration: none;
        }

        /*======== COLORS ===========*/
        .card[data-color="blue"] {
            background: #b8d8d8;
        }

        .card[data-color="blue"] .description {
            color: #506568;
        }
    </style>
</head>

<body>
    <div class="container" style=" padding-left: 450px; padding-top: 25px;">
        <div class="row">
            <a href="adddep-html.php" class="btn btn-primary a-btn-slide-text">
                <span input type="submit" class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <span><strong>Add</strong></span>
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="deletedep-html.php" class="btn btn-danger a-btn-slide-text">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                <span><strong>Delete</strong></span>
            </a>
        </div>
    </div>
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="grey-bg container-fluid">
            <section id="minimal-statistics">
                <div class="container bootstrap snippets bootdeys">
                    <div class="row">
                        <?php
                        include_once('../dbconfig.php');
                        if ($connection) {
                            $query = 'select * from departments';
                            $result = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <div class="col-md-4 col-sm-6 content-card">
                                    <div class="card-big-shadow">
                                        <div class="card card-just-text" data-background="color" data-color="blue" data-radius="none">
                                            <div class="content">
                                                <!--<h6 class="category">Best cards</h6>-->
                                                <h4 class="title"><a href="#"><?php echo ($row[0]); ?></a></h4>
                                                <!--<p class="description">What moment. </p>-->
                                            </div>
                                        </div> <!-- end card -->
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            die('something went wrong' . mysqli_connect_error());
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>