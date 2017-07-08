<?php

$message_query = $db->query("
		SELECT *
		FROM messages AS m
		LEFT JOIN users AS u
		ON (u.id = m.user_id)
	") OR DIE($db->error);

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title">Chat</div>
	</div>
	<div class="panel-body">
		<?php while ($message = $message_query->fetch_assoc()): ?>
			<!-- message -->
			<div class="media">
				<div class="media-body">
					<h4 class="media-heading">
						<?php echo $message['first_name'] . " " . $message['last_name']; ?>
						<div class="pull-right"><span
									style="font-size: 10px;"><?php echo $message['post_date'] ?></span></div>
					</h4>
					<p><?php echo $message['message']; ?></p>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>