<!doctype html>
<html lang=en>
<head>

<?php
// The link to the database is moved to the top of the PHP code.
require ('connect-mysql.php'); // Connect to the db.
// This query INSERTs a record in the users table.
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$errors = array(); // Initialize an error array.
// Check for a name:
if (empty($_POST['name'])) {
$errors[] = 'You forgot to enter your Name.';
} else {
$name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
}
// Check for phone number
if (empty($_POST['phone'])) {
$errors[] = 'You forgot to enter your phone number.';
} else {
$phone = mysqli_real_escape_string($dbcon, trim($_POST['phone']));
}








// Check for age
if (empty($_POST['age']) ) {
$errors[] = 'You forgot to enter your age.';
}
if($_POST['age'] > 90)
{
	$errors[] = 'age should be below 80.';
}
 else {
$age = mysqli_real_escape_string($dbcon, trim($_POST['age']));
}
// Check for an address
if (empty($_POST['address'])) {
$errors[] = 'You forgot to enter your address.';
} else {
$address = mysqli_real_escape_string($dbcon, trim($_POST['address']));
}
// Check for an email address
if (empty($_POST['email'])) {
$errors[] = 'You forgot to enter your email address.';
} else {
$email = mysqli_real_escape_string($dbcon, trim($_POST['email']));
}
// Check for a password and match it against the confirmed password
if (!empty($_POST['psword1'])) {
if ($_POST['psword1'] != $_POST['psword2']) {
$errors[] = 'Your two passwords did not match.';
} else {
$p = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
}
} else {
$errors[] = 'You forgot to enter your password.';
}
if (empty($errors)) { // If it runs
// Register the user in the database...
// Make the query:
$q = "INSERT INTO signup (userid, name, age, phone, address,email, password, registration_date)
VALUES (' ', '$name', '$age', '$phone','$address','$email', '$p', NOW() )";
$result = @mysqli_query ($dbcon, $q); // Run the query.
if ($result) { // If it runs
header ("location: index.html");
exit();
} else { // If it did not run
// Message:
echo '<h2>System Error</h2>
<p class="error">You could not be registered due to a system error. We apologize 
for any inconvenience.</p>';
// Debugging message:
echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection.
// Include the footer and quit the script:
include ('footer.php');
exit();
} else { // Report the errors.
	echo '<h2 class="error">Error!</h2>
<p class="error">The following error(s) occurred:<br>';
foreach ($errors as $msg) { // Extract the errors from the array and echo them
echo "<p class='error'> - $msg<br></p>\n";
}
echo '</p><h3 class="error">Please try again.</h3><p><br></p>';
}// End of if (empty($errors))
} // End of the main Submit conditional.
?>



<head>
	<title>Register User</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Create Account
				</span>
			
				<form class="login100-form validate-form p-b-33 p-t-5" action="signup.php" method="post" class="form">
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="name" name="name" placeholder="Name"
						value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"></p>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="phone" name="phone" placeholder="Phone" pattern="[789][0-9]{9}"
						value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"></p>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>




<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="age" name="age" placeholder="Age"
						value="<?php if (isset($_POST['age'])) echo $_POST['age']; ?>"></p>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>


<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="address" name="address" placeholder="Address"
						value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"></p>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>


<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Email"
						value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>


<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="password" name="psword1" placeholder="Password"
						value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" ></p>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>



					

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="psword2" placeholder="password"
						value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" ></p>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" input id="submit">
							Register
							
						</button>
						
						
						
					</div>
<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p23> Already our patient? <a href="login.php">click to login </a> </p23>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</form>
</body>
</html>



