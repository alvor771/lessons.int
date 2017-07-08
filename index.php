<?php
session_start();
//	session_destroy();
require_once "db.php";
?>

<html>
<?php require_once "common/header.php" ?>
<body>
<?php require_once "common/top_menu.php" ?>
<div class="container">
	<div class="col-md-8">


		<?php
		if (isset($_GET['page']) AND !empty($_GET['page'])) {
			switch ($_GET['page']) {
				case 'home':
					require_once 'common/chat.php';
					break;
				case 'chat':
					require_once 'common/chat.php';
					break;
				case 'login':
					require_once 'common/login.php';
					break;
				case 'registration':
					require_once 'common/registration.php';
					break;
				case 'logout':
					session_destroy();
					header('Location: /');
					break;
				default:
					header('Location: /?page=chat');
					break;
			}
		} else {
			require_once 'common/chat.php';
		}
		?>


	</div>
	<div class="col-md-4">
		<?php require_once 'common/right_sidebar.php'; ?>
	</div>
</div>
</body>
<?php require_once "common/footer.php" ?>
</html>