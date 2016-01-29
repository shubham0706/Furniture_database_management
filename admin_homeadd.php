<html>
	<body background="background.jpg">
	<font face="Calibri">
		<form action="signout.php" method="post"><p align="right"><input type="submit" value="LOGOUT" style="height:30px; width:150px; font-size: 10pt"></p></form>
		<p align="center"><font size="30">
		ABC Furniture Management<br>
		Admin Home<br>
		</font></p>
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
			$itemid=$_POST["itemid"];
			$itemname=$_POST["itemname"];
			$brand=$_POST["brand"];
			$quantity=$_POST["quantity"];
			$warehouse=$_POST["warehouse"];
			$price=$_POST["price"];
			$sql = "INSERT INTO items (item_id, item_name,brand,quantity,warehouse_no,Price)
					VALUES ('$itemid', '$itemname', '$brand','$quantity','$warehouse','$price')";

				if ($conn->query($sql) === TRUE) {
				echo "";
				} else {
					echo"Error: " . $sql . "<br>" . $conn->error;
				}
	
			$conn->close();
		?>
		<form action="admin_update.php" method="post">
			<br><br><br><p align="center"><input type="submit" value="Update Inventory" style="height:45px; width:200px; font-size: 15pt"></p>
		</form>
		<form action="admin_add.php" method="post">
			<br><br><p align="center"><input type="submit" value="Add Items" style="height:45px; width:200px; font-size: 15pt"></p>
		</form>
		<form action="admin_delete.php" method="post">
			<br><br><p align="center"><input type="submit" value="Delete Items" style="height:45px; width:200px; font-size: 15pt"></p>
		</form>
		<form action="admin_view.php" method="post">
			<br><br><p align="center"><input type="submit" value="View Inventory" style="height:45px; width:200px; font-size: 15pt"></p>
		</form>
	</body>
</html>