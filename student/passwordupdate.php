<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
	<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>

<style>
	#message {
		display: none;
		background: white;
		color: #000;
		position: relative;
		padding: 20px;
		margin-top: 10px;
	}

	#message p {
		padding: 10px 35px;
		font-size: 18px;
	}

	/* Add a green text color and a checkmark when the requirements are right */
	.valid {
		color: rgb(74, 233, 74);
	}

	.valid:before {
		position: relative;
		left: -35px;
		content: "✔";
	}

	/* Add a red text color and an "x" when the requirements are wrong */
	.invalid {
		color: rgb(230, 17, 17);
	}

	.invalid:before {
		position: relative;
		left: -35px;
		content: "✖";
	}

	.container-md {
		margin-top: 100px;
	}

	.form-front {
		border: 2px solid black;
		border-radius: 50px;
		margin-right: 20%;
		margin-left: 20%;
	}

	.form-control {
		text-align: center;
		width: 300px;
		margin-left: 27%;
	}
</style>
</head>
<body>
	<div class="container-md text-center">
		<div class="form-front">
			<form action="pupdate.php" method="post">
				<br>
				<fieldset>
					<legend>create strong password <span id=""></span> </legend>
					<input type="text" name="password" id="password" class="form-control" placeholder="create strong password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
				</fieldset>
				<br>
				<div id="message">
					<h3>Password must contain the following:</h3>
					<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
					<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
					<p id="number" class="invalid">A <b>number</b></p>
					<p id="length" class="invalid">Only <b>8 characters</b></p>
					<p id="symbol" class="invalid">A <b>Special Symbols</b></p>
				</div>

				<fieldset>
					<legend>Re-enter the confirm password </legend>
					<input type="text" name="cpw" onblur="matchPassword()" class="form-control" id="cpsw" placeholder="re-enter your password">
				</fieldset>

				<script>
					var myInput = document.getElementById("password");
					var letter = document.getElementById("letter");
					var capital = document.getElementById("capital");
					var number = document.getElementById("number");
					var length = document.getElementById("length");
					var symbol = document.getElementById("symbol");

					// When the user clicks on the password field, show the message box
					myInput.onfocus = function() {
						document.getElementById("message").style.display = "block";
					}

					// When the user clicks outside of the password field, hide the message box
					myInput.onblur = function() {
						document.getElementById("message").style.display = "none";
					}

					// When the user starts to type something inside the password field
					myInput.onkeyup = function() {
						// Validate lowercase letters
						var lowerCaseLetters = /[a-z]/g;
						if (myInput.value.match(lowerCaseLetters)) {
							letter.classList.remove("invalid");
							letter.classList.add("valid");
						} else {
							letter.classList.remove("valid");
							letter.classList.add("invalid");
						}

						// Validate capital letters
						var upperCaseLetters = /[A-Z]/g;
						if (myInput.value.match(upperCaseLetters)) {
							capital.classList.remove("invalid");
							capital.classList.add("valid");
						} else {
							capital.classList.remove("valid");
							capital.classList.add("invalid");
						}

						// Validate numbers
						var numbers = /[0-9]/g;
						if (myInput.value.match(numbers)) {
							number.classList.remove("invalid");
							number.classList.add("valid");
						} else {
							number.classList.remove("valid");
							number.classList.add("invalid");
						}

						// Validate length
						if (myInput.value.length == 8) {
							length.classList.remove("invalid");
							length.classList.add("valid");
						} else {
							length.classList.remove("valid");
							length.classList.add("invalid");
						}

						//var symbol=/[@]/g;
						if (myInput.value.match('@')) {
							symbol.classList.remove("invalid");
							symbol.classList.add("valid");
						} else {
							symbol.classList.remove("valid");
							symbol.classList.add("invalid");
						}
					}

					function matchPassword() {
						var pw1 = document.getElementById("password").value;
						var pw2 = document.getElementById("cpsw").value;
						if (pw1 == pw2) {
							alert("Password created successfully");
						} else {
							alert("Passwords did not match");
						}
					}
				</script>

				<br>

				<input type="submit" class="btn btn-primary" id="submit" name="submit" value="SUBMIT">

			</form>
			<br>
		</div>
	</div>
</body>
</html>