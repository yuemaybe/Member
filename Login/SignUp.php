<!DOCTYPE html>

<html>
<head>

<title> 註冊頁面 </title>
<meta charset = "utf-8">

</head>
<body>
<p> 這個頁面為 SignUp.php </p>
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
請輸入信箱 : <input type="email" name="email" placeholder="電子郵件" required />
<br>
<br>
請選擇性別 : 
<input type="radio" name="gender" value="M" required /> 男
<input type="radio" name="gender" value="F" required /> 女
<br>
<br>
<input type="submit" name="submit" value="註冊" />
</form>

<?php
include ("SQLconnect.php");

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	
	//查詢語法
	$checkuser = "SELECT * FROM user WHERE username = '$username'";
	$sqlcheckuser = $mysqli->query($checkuser);
	$issignup = $sqlcheckuser->fetch_assoc();
	
	//判斷是否已經註冊
	if(!$issignup)
	{
		$isusername = "INSERT INTO user VALUES('', '$username', '$password', '$email', '$gender')";
		$sqlisusername = $mysqli->query($isusername);
		if(!$sqlisusername)
		{
			echo "<br>註冊失敗";
		}
		else
		{
			echo "<br>註冊成功";
			echo "<br>2秒後跳回主頁面";
			header("Refresh:2;url=index.php");
		}
	}
	else
	{
		echo "<br>已有相同帳號註冊";
	}
}
else
{
	echo "<br>尚未填寫完畢";
}

mysqli_close($mysqli);
?>


</body>
</html>