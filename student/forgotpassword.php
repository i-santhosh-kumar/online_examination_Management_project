<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
	<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
<style>
	.container-md 
	{
		margin-top: 50px;
	}

	.form-front 
	{
		border: 2px solid black;
		border-radius: 5%;
		margin-right: 20%;
		margin-left: 20%;
	}

	.form-control 
	{
		text-align: center;
		width: 300px;
		margin-left: 27%;
	}
</style>
</head>
<body>
	<?php
	if (isset($_GET['message'])) 
	{
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><center>';
		echo ($_GET["message"]);
		echo '</center><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
	}
	?>
	<div class="container-md text-center">
		<div class="form-front">
			<form action="confirmation.php" method="post">
				<br>
				<fieldset>
					<legend>Your Email <span id=""></span> </legend>
					<input type="email" class="form-control" name="email" id="email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com">
				</fieldset>

				<br>

				<fieldset>
					<legend>One thing do you think of the most each day?</legend>
					<select class="form-control" name="favques" id="favques">
						<option value="not selected" selected>select your option</option>
						<option value="family and friends">family and friends</option>
						<option value="happiness">Happiness</option>
						<option value="peace of mind">peace of mind</option>
						<option value="career and future">career and future</option>
					</select>
				</fieldset>

				<br>

				<fieldset>
					<legend>Favourite place</legend>
					<select name="place" id="place" class="form-control">
						<option value="not selected" selected>select your option</option>
						<option value="India">India</option>
						<option value="USA">USA</option>
						<option value="France">France</option>
						<option value="Korea">Korea</option>
					</select>
				</fieldset>

				<br>

				<fieldset>
					<legend>Favourite language</legend>
					<select name="language" id="language" class="form-control">
						<option value="not selected" selected>select your option</option>
						<option value="Tamil">Tamil</option>
						<option value="English">English</option>
						<option value="French">French</option>
						<option value="Mandarin">Mandarin</option>
					</select>
				</fieldset>
				<br>
				<input type="submit" value="submit" class="btn btn-primary">
			</form>
		</div>
	</div>
</body>
</html>