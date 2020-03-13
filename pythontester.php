<?php
	$command = escapeshellcmd('python /var/www/html/test.py');
	$output = shell_exec($command);
	var_dump($output);
?>
