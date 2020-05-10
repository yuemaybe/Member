<?php

	$mysqli = new mysqli('localhost', 'root', 'root', 'test');

	if($mysqli -> connect_error)
	{
		echo "資料庫連線失敗<br>";
	}
	echo "資料庫連線成功<br>";
	
	$user = "SELECT * FROM user";
	$sqluser = $mysqli->query($user);
	if(!$sqluser)
	{
		echo "搜尋user失敗";
		exit;
	}
	while($users = $sqluser->fetch_assoc())
	{
		echo "{$users['username']}" . " : " . "{$users['password']}<br>";
	}
	
	$uuser = "DELETE FROM user WHERE username = 'ddd'";
	$sqluuser = $mysqli->query($uuser);
	$deluser = $sqluuser->fetch_assoc();


?>