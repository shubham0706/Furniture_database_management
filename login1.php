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
			User Login
			<br>Your record has been successfully registered!
			</font>
		</p>
		<?php
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
			$firstname=$_POST["firstname"];
			$lastname=$_POST["lastname"];
			$name=$firstname." ".$lastname;
			$email=$_POST["email"];
			$contact=$_POST["contact"];
			$address=$_POST["address"];
			$city=$_POST["city"];
			$state=$_POST["state"];
			$pin=$_POST["pin"];
			$finaladd = $address.",".$city.",".$state.",".$pin;
			$pass=$_POST["pass"];
			$sql = "INSERT INTO customer (customer_name, Address,email_id,phone_no,password)
					VALUES ('$name', '$finaladd', '$email','$contact','$pass')";

				if ($conn->query($sql) === TRUE) {
				echo "";
				} else {
					echo"Error: " . $sql . "<br>" . $conn->error;
				}
	
			$conn->close();
		?>
		<form action="home.php" method="post">
			<br><br><br><br><br><h1 align="center">USERNAME :      
			<input type="text" name="username" style="height:50px; width:300px; font-size: 20pt">
			<h1 align="center">PASSWORD : <input type="password" name="password" style ="height:50px; width:300px; font-size:20pt">
			<br><br><input type="submit" value="LOGIN" style="height:60px; width:300px; font-size: 20pt">
		</form>
		<form action="signup.php" method="post">
			<br><br>New? <input type="submit" value="Sign Up" style="height:40px; width:150px; font-size: 12pt">
	</body>
</html>