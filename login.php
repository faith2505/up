<?php
	include("connection.php");

	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql="SELECT * FROM login_tbl  WHERE username='$username'AND password='$password'";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
			echo "<script> alert ('success') 
			window.location='index.php'</script>";
		}
		else
		{
			echo "<script> alert ('failed to login') 
			window.location='login.php'</script>";
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
      <link rel="stylesheet" type="text/css" href="style.css">
<body>
	<div class= "loginbox">
	<img src="avatar.jpg" class="avatar">
         <form method="POST">
         	<h1>Log in Here</h1>
         	<label>Username</label>
         	<input type="text" name="username" placeholder="Enter Username">
         	<label>Password</label>
         	<input type="Password" name="password" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
            <a href="#">Lost your password?</a><br>
            <a href="#">Don't have an account?</a>
         </form>
	</div>
<style>
body{
	margin: 0;
	padding: 0;
	background: url(pic1.jpg);
	background-size: cover;
	background-position: center;
	font-family: sans-serif; 
}

.loginbox{
	width: 320;
	height: 420px;
	background: #000;
	color: #fff;
	top: 50%;
	left: 50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 70px 30px;
}

.avatar{
	width: 100px;
	height: 100px;
	border-radius: 50%;
	position: absolute;
	top: -50px;
	left: calc(50% - 50px);

}

h1{
	margin: 0;
	padding: 0 0 20px;
	text-align: center;
	font-size: 22px;
}

.loginbox p{
	margin: 0;
	padding: 0;
	font-weight: bold;
}

.loginbox input{
	width: 100%;
	margin-bottom: 20px;
}

.loginbox input[type="text"], input[type="password"]
{
   border: none;
   border-bottom: 1px solid #fff;
   background: transparent;
   outline: none;
   height: 40px;
   color: #fff;
   font-size: 16px;
}
.loginbox input[type="submit"]{
	border: none;
	outline: none;
	height: 40px;
	background: #fb2525;
	color: #fff;
	font-size: 18px;
	border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
	cursor: pointer;
	background: #ffc107;
	color: #000;
}
.loginbox a{
	text-decoration: none;
	font-size: 12px;
	line-height: 20px;
	color: darkgrey;
}

</style>
</body>
</head>
</html>