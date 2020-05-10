<?php

	//SQL連線(include用)
	$mysqli = new mysqli('localhost', 'root', 'root', 'test');

	if($mysqli -> connect_error)
	{
		die ("資料庫連線失敗<br>");
	}

?>