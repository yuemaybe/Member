<?php session_start(); ?>

<?php
	include ("SQLconnect.php");
	header('Content-Type: application/json; charset=UTF-8'); //設定資料類型為 json，編碼 utf-8
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_SESSION['username'];
		
		$getUser = "DELETE FROM user WHERE username = '$username'";
		$sqlUser = $mysqli->query($getUser);
		
		echo json_encode(array(
		'username' => $username
		));
	}
	
	else
	{
		echo json_encode(array(
        'errorMsg' => '請求無效，只允許 POST 方式訪問！'
    ));
	}
	
	mysqli_close($mysqli);

?>