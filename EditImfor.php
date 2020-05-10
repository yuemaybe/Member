<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>

<title> 修改會員資料頁面 </title>
<meta charset = "utf-8">

</head>
<body>
<p> 這個頁面為 EditImfor.php </p>
<form action="./index.php">
<button>回到首頁</button>
</form>

<br>

<form action="./Member.php">
<button>回到會員資料</button>
</form>

<br>

<form method="POST">
修改密碼 : <input type="password" name="password" placeholder="請輸入密碼" />
<br>
<br>
修改信箱 : <input type="email" name="email" placeholder="請輸入信箱" />
<br>
<br>
修改性別 :
<input type="radio" name="gender" value="M" />男
<input type="radio" name="gender" value="F" />女
<br>
<br>
<input type="submit" name="submit" value="修改" />
	<script>
	function Funconfirm()
	{
		confirm("確定要刪除帳號？");
	}
	</script>
<input type="submit" name="delete" value="刪除帳號" onclick="Funconfirm()" />
</form>

<?php
	include ("SQLconnect.php");
	
	$username = $_SESSION['username'];
	$user = "SELECT * FROM user WHERE username = '$username'";
	$sqluser = $mysqli->query($user);
	$getIm = $sqluser->fetch_assoc();

	if(isset($_POST['password']))
	{	

		$password = $_POST['password'];
		
		if($password != "")
		{
			if($password == $getIm['password'])
			{
				echo "新密碼不可與舊密碼相同";
			}
			else
			{
				$pass = "UPDATE user SET password = '$password' WHERE username = '$username'";
				$sqlpass = $mysqli->query($pass);
				echo "<br>修改密碼成功";
			}
		}
	}
	
	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
		if($email != "")
		{
			if($email == $getIm['email'])
			{
				echo "新信箱不可與舊信箱相同";
			}
			else
			{
				$mail = "UPDATE user SET email = '$email' WHERE username = '$username'";
				$sqlmail = $mysqli->query($mail);
				echo "<br>修改信箱成功";
			}
		}
	}
	
	if(isset($_POST['gender']))
	{
		$gender = $_POST['gender'];
		if($gender != "")
		{
			$gender = "UPDATE user SET gender = '$gender' WHERE username = '$username'";
			$sqlgender = $mysqli->query($gender);
			echo "<br>修改性別成功";
		}
	}
	
	mysqli_close($mysqli);

?>

</body>
</html>