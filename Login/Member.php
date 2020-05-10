<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>

<title> 會員頁面 </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta charset = "utf-8">

</head>
<body>
<p> 這個頁面為 Member.php </p>
<form action="./index.php">
<button>回到首頁</button>
</form>
<br>

<button id="delete" style="color:red">刪除帳號</button>
<p id="result"></p>
<script type="text/javascript">
$(function() {
	$("#delete").click(function(){
		var ans = confirm("是否刪除帳號？");
		if(ans == true)
		{
			$.ajax({
				type : "POST",
				url : "Delete.php",
				dataType : "json",
				success: function(response){
					if(response.username != "")
					{
						alert(response.username + " 會員刪除成功！");
						window.location="./index.php";
					}
					else
					{
						$("#result").html(response.username + " 會員刪除失敗！");
					}
					
				},
				error: function(){
					$("#result").html("會員刪除失敗！");
				}
				
				
			})
			
		}
	});
	
});
</script>

<br>

<?php

//判斷是否已經登入
if(!isset($_SESSION['username']) || $_SESSION == null)
{
	echo "<br>您無權限觀看此頁面之內容 ( 尚未登入 )";
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<form action='./SignIn.php'>
		  <br>
		  <input type='submit' name='ToLogin' value='登入' />
		  </form>";
}
else
{
	include ("SQLconnect.php");
	$username = $_SESSION['username'];
	
	//在PHP中使用Html語法
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'; //網頁編碼宣告
	echo "<form action='./Logout.php'>
		  <input type='submit' name='submit' value='登出' />
		  </form>";
	echo "<br>歡迎來到會員頁面<br><br>";
	echo "以下是會員資料 : <br><br>";
	
	$getUser = "SELECT * FROM user WHERE username = '$username'";
	$sqlUser = $mysqli->query($getUser);
	$userIm = $sqlUser->fetch_assoc();
	if($userIm['gender'] == "M")
	{
		$gender = "男性";
	}
	else if($userIm['gender'] == "F")
	{
		$gender = "女性";
	}
	else
	{
		$gender = "未知";
	}
	
	echo "帳號 : " . $userIm['username'] . "<br><br>";
	echo "信箱 : " . $userIm['email'] . "<br><br>";
	echo "性別 : " . $gender . "<br>";
	echo "<br>";
	echo "<form action='./EditImfor.php'>
		  <input type='submit' name='submit' value='修改會員資料' />
		  </form>";
	
	mysqli_close($mysqli);
}

?>

</body>
</html>