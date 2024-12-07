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
  <form class="needs-validation" action="adddep.php" method="post" novalidate>
    <div class="alert alert-danger d-none">Please review the problems below:</div>

    <div class="mb-3">
      <label for="iid" class="form-label">Enter the Department</label>
      <input type="text" class="form-control" id="iid" name="iid" value=" ">
      <div class="invalid-feedback">Name can't be blank</div>
      <div class="valid-feedback">Looks good!</div>
    </div>

    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="department-show.php"> <button type="button" class="btn btn-primary">Back</button></a>
    <button type="submit" class="btn btn-primary">Submit</button>
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