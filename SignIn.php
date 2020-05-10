<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>

<title> 登入頁面 </title>
<meta charset = "utf-8">

</head>
<body>
<p> 這個頁面為 SignIn.php </p>
<form action="./index.php">
<button>回到首頁</button>
</form>

<br>

<form method="POST">
請輸入帳號 : <input type="text" name="username" placeholder="請輸入帳號" required />
<br>
<br>
請輸入密碼 : <input type="password" name="password" placeholder="請輸入密碼" required />
<br>
<br>
<input type="submit" name="submit" value="登入" />
</form>

<?php
include ("SQLconnect.php");

if(isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//查詢語法
	$login = "SELECT * FROM user WHERE username = '$username'";
	$sqllogin = $mysqli->query($login);
	$islogin = $sqllogin->fetch_assoc();
	
	//判斷是否已經註冊
	if(!$islogin)
	{
		echo "<br>未註冊的使用者";
	}
	else if($islogin['password'] != $password)
	{
		echo "<br>密碼錯誤";
	}
	else
	{
		echo "<br>登入成功";
		$_SESSION['username'] = $username;
		header("Refresh:0.5;url = Member.php");
	}
}
mysqli_close($mysqli);

?>

</body>
</html>