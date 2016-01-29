<html>
	<body background="background.jpg">
		<p align="center"><font face="Calibri"><font size="30">
		<br>ABC Furniture Management<br>
		Admin Login<br>
		</font></p>
		<form action="#" method="post">
			<br><br><br><br><br><h1 align="center">USERNAME :  <input type="text" name="admin_username" style="height:30px; width:300px; font-size: 20pt"></h1>
			<h1 align="center">PASSWORD : <input type="password" name="admin_password" style ="height:30px; width:300px; font-size:20pt"></h1>
			<h1 align="center"><br><br><input type="submit" name='submit' value="Login" style="height:45px; width:200px; font-size: 15pt"></h1>
		</form>
		<?php
			session_start();
			if(isset($_POST['submit'])){
				$servername = "localhost";
				$username = "root";
				$password = "root";
				$db_name="furniture";
	
				// Create connection
				$conn = new mysqli($servername, $username, $password,$db_name);
		
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
			

				$admin_id=$_POST['admin_username'];
				$pwd=$_POST['admin_password'];
				if($admin_id!=''&&$pwd!='')
				{
					$query=mysqli_query($conn,"select * from admin where admin_id='".$admin_id."' and password='".$pwd."'");
					$res=mysqli_fetch_row($query);
					if($res)
					{
						$_SESSION['admin_id']=$admin_id;
						header('location:admin_home.php');
					}
					else
					{		
						echo"<p align='center'>The entered username or password is incorrect";
					}
				}
				else
				{
					echo"<p align='center'>Enter both username and password";
				}
			}
		?>
		<form action="login.php" method="post">
			<h1 align = "center"><br><input type="submit" value="Go Back" style="height:45px; width:200px; font-size: 15pt">
		</form></h1>
	</body>
</html>