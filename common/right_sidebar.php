<?php
	$users = $db->query("
		SELECT * FROM users;
	");
?>
<div class="list-group">
	<?php while($user = $users->fetch_assoc()): ?>

		<?php if ($user['id'] == $_SESSION['user']['id'] ): ?>
			<a href="#<?php echo $user['id']; ?>" class="list-group-item active">
				<?php echo $user['login']; ?>
			</a>
		<?php else: ?>
			<a href="#<?php echo $user['id']; ?>" class="list-group-item">
				<?php echo $user['login']; ?>
			</a>
		<?php endif; ?>

	<?php endwhile; ?>
</div>