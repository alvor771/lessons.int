<?php

/**
 * Enter correctly data for connect wwith Database
 * user
 * password
 * dbname
 * */

$db = new mysqli("localhost", "user", "******", "db_chat");
if ($db->connect_errno) {
	die($db->connect_errno);
}
$db->set_charset('UTF8');