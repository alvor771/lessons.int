<?php
$errors = array();

if (isset($_POST['submit'])) {

	$user_login = $_POST['login'];
	$user_email = $_POST['email'];
	if ($_POST['password'] == $_POST['r_password']) {
		$user_password = md5($_POST['password']);
	} else {
		$errors['password'] = "Passwords not equls";
	}
	$user_f_name = $_POST['f_name'];
	$user_l_name = $_POST['l_name'];

	if (empty($errors)) {
//		echo "INSERT INTO users (`id`, `login`, `email`, `password`, `first_name`, `last_name`) VALUES (null, '$user_login', '$user_email', '$user_password', '$user_f_name', '$user_l_name');"; die;
		$result = $db->query("INSERT INTO users (`id`, `login`, `email`, `password`, `first_name`, `last_name`) VALUES (null, '$user_login', '$user_email', '$user_password', '$user_f_name', '$user_l_name');");
		if (!$result) {
			header('Location: /?page=registration');
		} else {
			header('Location: /?page=login');
		}
	}
}

?>
<form method="post">
	<div class="form-group">
		<label id="basic-addon1">Login</label>
		<input type="text" name="login" class="form-control" placeholder="Login">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email">
	</div>

	<div class="form-group">
		<label>First name</label>
		<input type="text" name="f_name" class="form-control" placeholder="First name">
	</div>

	<div class="form-group">
		<label>Last name</label>
		<input type="text" name="l_name" class="form-control" placeholder="Last name">
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password">
	</div>

	<div class="form-group">
		<label>Repeat password</label>
		<input type="password" name="r_password" class="form-control" placeholder="Repeat password">
	</div>

	<div class="form-group">
		<input type="submit" value="Register me" name="submit" class="btn btn-primary">
	</div>
</form>