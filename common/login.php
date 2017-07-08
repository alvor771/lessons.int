<?php
$errors = array();

if (isset($_POST['submit'])) {

	$user_email = $_POST['email'];
	$user_password = md5($_POST['password']);

	if (empty($errors)) {
		$user_data = $db->query("SELECT * FROM users WHERE email='$user_email' AND password='$user_password'");
		if (!$user_data) {
			header('Location: /?page=login');
		} else {
			while ($user = $user_data->fetch_assoc()) {

				$_SESSION['user']['id'] = $user['id'];
				$_SESSION['user']['login'] = $user['login'];
				$_SESSION['user']['email'] = $user['email'];
				$_SESSION['user']['f_name'] = $user['first_name'];
				$_SESSION['user']['l_name'] = $user['last_name'];
			}
			header('Location: /?page=chat');
		}
	} else {
		foreach ($errors as $id => $error) {
			echo "Kurwa $id: <b>" . $error . "</b>";
		}
	}
}
?>

<form method="post">
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email">
	</div>

	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password">
	</div>

	<div class="form-group">
		<input type="submit" value="Login" name="submit" class="btn btn-primary">
	</div>
</form>