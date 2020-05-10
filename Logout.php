<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>

<title> 登出頁面 </title>
<meta charset = "utf-8">

</head>
<body>
<p> 這個頁面為 Logout.php </p>

<?php

	//清除Session來做登出
	unset($_SESSION['username']);
	echo "<br>登出中...";
	
	//跳轉頁面
	header("Refresh:1;url=index.php");

?>

</body>
</html>