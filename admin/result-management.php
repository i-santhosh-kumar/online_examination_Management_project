<html>

<head>
    <style>
        .mb-3 {
            width: 450px;
            padding-left: 25px;
        }

        .container {
            margin-left: 20%;
            margin-top: 5%;
            border: 2px solid #978794;
            border-radius: 20px;
            padding: 20px;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <form class="needs-validation" action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" novalidate>
            <div class="alert alert-danger d-none">Please review the problems below:</div>
            <div class="row">
                <div class="mb-3">
                    <label for="idep" class="form-label">Department</label>
                    <select name="dep" id="idep" class="form-control" required>
                        <option value="Tamil">Tamil</option>
                        <option value="English">English</option>
                        <option value="Economics">Economics</option>
                        <option value="Business Administration">Business Administration</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Physics">Physics</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Botany">Botany</option>
                        <option value="Zoology">Zoology</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Biotech">Biotech</option>
                        <option value="CA/IT">CA/IT</option>
                        <option value="Psycology">Psycology</option>
                    </select>
                    <div class="invalid-feedback">Dept can't be blank</div>
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <div class="mb-3">
                    <label for="ibatch" class="form-label">Batch</label>
                    <select name="batch" id="ibatch" class="form-control" required>
                        <option value="2020-2023">2020-2023</option>
                        <option value="2021-2024">2021-2024</option>
                        <option value="2022-2025">2022-2025</option>
                    </select>
                    <div class="invalid-feedback">Batch can't be blank</div>
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <fieldset class="mb-3">
                    <legend class="col-form-label pt-0">Choose a Year</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="year" id="1st year" value="I" required>
                        <label class="form-check-label" for="1st year">I YEAR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="year" id="2nd year" value="II" required>
                        <label class="form-check-label" for="2nd year">II YEAR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="year" id="3rd year" value="III" required>
                        <label class="form-check-label" for="3rd year">III YEAR</label>
                    </div>
                </fieldset>

                <div class="mb-3">
                    <label for="isem" class="form-label">Semester</label>
                    <select name="sem" id="isem" class="form-control" required>
                        <option value="I">I semester</option>
                        <option value="II">II semester</option>
                        <option value="III">III semester</option>
                        <option value="IV">IV semester</option>
                        <option value="V">V semester</option>
                        <option value="VI">VI semester</option>
                    </select>
                    <div class="invalid-feedback">Batch can't be blank</div>
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>
            <div class="row">
                <div class="col-5"></div>
                <div class="col"><button type="submit" class="btn btn-primary">Submit</button></div>
            </div>
        </form>
    </div>
</body>
<script>
    // Disable form submissions if there are invalid fields
    (function() {
        "use strict";
        window.addEventListener("load", function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener("submit", function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                }, false);
            });
        }, false);
    })();
</script>

</html>
<?php
include_once('../dbconfig.php');
if ($connection) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $department = $_POST['dep'];
        $batch = $_POST['batch'];
        $year = $_POST['year'];
        $semester = $_POST['sem'];
?>
        <html>

        <head>
            <style>
                .mb-3 {
                    width: 450px;
                    padding-left: 25px;
                }
            </style>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        </head>

        <body>
            <div class="container">
                <form class="needs-validation" action="show-result.php?dept=<?php echo ($department) ?>&batch=<?php echo ($batch) ?>&year=<?php echo ($year) ?>&semester=<?php echo ($semester) ?>" method="post" novalidate>
                    <div class="alert alert-danger d-none">Please review the problems below:</div>

                    <div class="mb-3">
                        <label for="dept" class="form-label">Choose the Subject</label>
                        <select name="sub" class="form-control" id="dept">
                            <option value="sub" class="form-control" selected>Subject</option>
                            <?php
                            $select = "SELECT subject from instructorsubject where department='$department' and Year='$year' and Batch='$batch' and Semester='$semester'";
                            $result = mysqli_query($connection, $select);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option value="<?php echo ($row[0]); ?>"><?php echo ($row[0]); ?></option>
                                <div class="invalid-feedback"> Subject can't be blank</div>
                                <div class="valid-feedback">Looks good!</div>
                            <?php

                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
        </body>
        <script>
            // Disable form submissions if there are invalid fields
            (function() {
                "use strict";
                window.addEventListener("load", function() {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName("needs-validation");
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener("submit", function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add("was-validated");
                        }, false);
                    });
                }, false);
            })();
        </script>

        </html>
<?php
    }
} else {
    die('something went wrong with the database' . mysqli_connect_error());
}
?>