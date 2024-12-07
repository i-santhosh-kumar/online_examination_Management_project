<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student register-form</title><!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="student-register.css" />
	<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
	<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
</head>
<style>
	body
	{
		background-color: white;
	}
	#message 
	{
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
	.valid 
	{
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
</style>
<body>
<?php
session_start();
$name=$_SESSION['student_name'];
$dept=$_SESSION['student_department'];
$batch=$_SESSION['batch'];
$semester=$_SESSION['semester'];
$year=$_SESSION['years'];
$rollnumber=$_SESSION['roll_number'];
$gmail=$_SESSION['student_gmail'];
include_once('../dbconfig.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if($connection)
	{
		$select="SELECT * FROM student where student_name='$name' and department='$dept' and batch='$batch' and roll_number='$rollnumber' and years='$year' and semester='$semester' and gmail='$gmail'";
		$result=mysqli_query($connection,$select);
		$row=mysqli_fetch_array($result);
?>

<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">
				<form id="form" class="form-register" onsubmit="required(); return false;" method="post" action="update-profile-php.php" enctype="multipart/form-data">
					<div id="form-total">
						<!-- SECTION 1 -->
						<h2>
							<p class="step-icon"><span><b>01</b></span></p>
							<span class="step-text">Personal Info</span>
						</h2>
						<section>
							<div class="inner">
								<div class="wizard-header">
									<h3 class="heading">Personal Info</h3>
									<p>Please enter your infomation and proceed to the next step so we can build your
										accounts. </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Student Name</legend>
											<input type="text" id="sname" disabled name="sname" placeholder="Student Name" value="<?php echo($row[1]); ?>">
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Date of Birth </legend>
											<input type="date" disabled id="dob" value="<?php echo($row[2]); ?>" name="dob">
										</fieldset>
									</div>							
								</div>

								<div class="form-row">
									<div class="form-holder ">
										<fieldset>
											<legend>Phone Number</legend>
											<input type="text" id="phone" disabled  name="phone" placeholder="9876543210" value="<?php echo($row[3]); ?>">
										</fieldset>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>One thing do you think of the most each day?</legend>
											<select name="favques" id="favques">
												<option value="not selected" selected>select your option</option>
												<option value="family and friends">family and friends</option>
												<option value="happiness">Happiness</option>
												<option value="peace of mind">peace of mind</option>
												<option value="career and future">career and future</option>
											</select>
										</fieldset>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Favourite language</legend>
											<select name="language" id="language">
												<option value="not selected" selected>select your option</option>
												<option value="Tamil">Tamil</option>
												<option value="English">English</option>
												<option value="French">French</option>
												<option value="Mandarin">Mandarin</option>
											</select>
										</fieldset>
									</div>
								
									<div class="form-holder">
										<fieldset>
											<legend>Favourite place</legend>
											<select name="place" id="place">
												<option value="not selected" selected>select your option</option>
												<option value="India">India</option>
												<option value="USA">USA</option>
												<option value="France">France</option>
												<option value="Korea">Korea</option>
											</select>
										</fieldset>
									</div>
								</div>
							</div>
						</section>
						<!-- SECTION 2 -->
						<h2>
							<p class="step-icon"><span><b>02</b></span></p>
							<span class="step-text">Academic-details</span>
						</h2>
						<section>
							<div class="inner">
								<div class="wizard-header">
									<h3 class="heading">Academic-details</h3>
								</div>

								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Roll Number</legend>
											<input type="text" id="rno" name="rno" placeholder="Roll number" disabled value="<?php echo($row[10]); ?>">
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Shift</legend>
											<input type="text" id="shift" name="shift" disabled value="<?php echo($row[14]); ?>">
										</fieldset>
									</div>
								</div>

								<div class="form-row ">
									<div class="form-holder">
										<fieldset>
											<legend>Department:</legend>
											<input type="text" id="dept" name="dept" disabled value="<?php echo($row[8]); ?>">
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Batch</legend>
											<input type="text" id="batch" name="batch" disabled value="<?php echo($row[9]); ?>">
										</fieldset>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Year</legend>
											<input type="text" id="year" name="year" disabled value="<?php echo($row[11]); ?>">
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>semester</legend>
											<input type="text" id="sem" name="sem" disabled value="<?php echo($row[12]); ?>">
										</fieldset>
									</div>
								</div>
							</div>
							<br>
						</section>
						<!-- SECTION 3 -->
						<h2>
							<p class="step-icon"><span><b>03</b></span></p>
							<span class="step-text">Create-Profile</span>
						</h2>
						<section>
							<div class="inner">
								<div class="wizard-header">
									<h3 class="heading">Create-Profile</h3>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Create Username <span id=""></span> </legend>
											<input type="text" id="uname" name="uname" placeholder="Create Username" disabled value="<?php echo($row[15]); ?>">
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Your Email <span id=""></span> </legend>
											<input type="email" name="your_email" id="your_email"
												pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" disabled value="<?php echo($row[16]); ?>">
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>create strong password <span id=""></span> </legend>
											<input type="text" name="password" id="password"
												placeholder="create strong password"
												pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
												title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" disabled value="<?php echo($row[17]); ?>">
										</fieldset>
									</div>
								</div>
								<div id="message">
									<h3>Password must contain the following:</h3>
									<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
									<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
									<p id="number" class="invalid">A <b>number</b></p>
									<p id="length" class="invalid">Only <b>8 characters</b></p>
									<p id="symbol" class="invalid">A <b>Special Symbols</b></p>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>confirm password <span id="j1"></span> </legend>
											<input type="text" name="confirm-psw" onblur="matchPassword()" id="cpsw" placeholder="re-enter your password" disabled value="<?php echo($row[17]); ?>">
										</fieldset>
									</div>
								</div>
								<input type="submit" class="btn btn-primary" id="submit" name="submit" value="SUBMIT">
								</input>
							</div>
							<script>
								var myInput = document.getElementById("password");
								var letter = document.getElementById("letter");
								var capital = document.getElementById("capital");
								var number = document.getElementById("number");
								var length = document.getElementById("length");
								var symbol = document.getElementById("symbol");

								// When the user clicks on the password field, show the message box
								myInput.onfocus = function () {
									document.getElementById("message").style.display = "block";
								}

								// When the user clicks outside of the password field, hide the message box
								myInput.onblur = function () {
									document.getElementById("message").style.display = "none";
								}

								// When the user starts to type something inside the password field
								myInput.onkeyup = function () {
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
						</section>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php
	}
	else
	{
		die('could not connect with database'.mysqli_connect_error());
	}
}
?>
	<!--<script src="requiredregister.js"></script>-->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>