<?php

	$db = new mysqli("localhost", "root", "7714444", "lesson_chat");
	if ($db->connect_errno) {
		die($db->connect_errno);
	}
	$db->set_charset('UTF8');