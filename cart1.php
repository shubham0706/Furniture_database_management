<html>
	<body background="background.jpg">
	<font face="Calibri">
		<form action="signout.php" method="post"><p align="right"><input type="submit" value="LOGOUT" style="height:30px; width:150px; font-size: 10pt"></p></form>
		<p align="center"><font size="30">
			ABC Furniture Management<br>
			Cart<br>
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
			$result = mysqli_query($conn,"SELECT * FROM cart");
			echo "<table border='1' style='width:60%' align='center' bgcolor='lightgrey'>
					<tr>
					<th><h1>Item ID</h1></th>
					<th><h1>Item Name</h1></th>
					<th><h1>Brand</h1></th>
					<th><h1>Quantity</h1></th>
					<th><h1>Price</h1></th>
					</tr>";
			
			while($row = mysqli_fetch_array($result))
			{
				echo "<td><h2>" .$row['item_id']. " </h2></td>";
				echo "<td><h2>" .$row['item_name']. " </h2></td>";
				echo "<td><h2>" .$row['brand']. " </h2></td>";
				echo "<td><h2>" .$row['quantity']. " </h2></td>";
				echo "<td><h2>" .$row['price']. " </h2></td>";
				echo "</tr>";
			}
			
			echo "</table>";
			echo "<br><br><br><form action='home.php' method='post'><p align='center'><input type='submit' value='Go Back' style='height:45px; width:200px; font-size: 15pt'></p></form>";
			mysqli_close($conn);
?>
	</body>
</html>