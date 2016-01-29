<html>
	<body background="background.jpg"><font face="Calibri">
		<form action="signup.php" method="post">
			<h1 align="right">
			<font size = 5>New? <input type="submit" value="Sign Up" style="height:30px; width:150px; font-size: 10pt">
			</h1>
			</font>
		</form>
		<p align="center">
			<font size = "30">ABC Furniture Management<br>
			User Login<br>
			</font>
		</p>
		<form action="#" method="post">
			<br><br><br><br><br><h1 align="center">USERNAME : <input type="text" name="username" style="height:30px; width:300px; font-size: 20pt"></h1>
			<h1 align = "center">PASSWORD : <input type="password" name="password" style ="height:30px; width:300px; font-size:20pt"></h1>
			<h1 align="center"><br><br><input type="submit" name="submit" value="Login" style="height:45px; width:200px; font-size: 15pt"></h1>
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
			

				$cust_id=$_POST['username'];
				$pwd=$_POST['password'];
				if($cust_id!=''&&$pwd!='')
				{
					$query=mysqli_query($conn,"select * from customer where customer_id='".$cust_id."' and password='".$pwd."'");
					$res=mysqli_fetch_row($query);
					if($res)
					{
						$_SESSION['cust_id']=$cust_id;
						header('location:home.php');
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
		<form action="admin_login.php" method="post">
			<h1 align = "center"><br><input type="submit" value="Admin Login" style="height:45px; width:200px; font-size: 15pt">
		</form></h1>
	</body>
</html>