<html>
	<body background="background.jpg">
	<font face="Calibri">
		<form action="signout.php" method="post"><p align="right"><input type="submit" value="LOGOUT" style="height:30px; width:150px; font-size: 10pt"></p></form>
		<p align="center"><font size="30">
			ABC Furniture Management<br>
			Home Page<br>
		</font></p>
		<br><br><br>
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
			
			$result = mysqli_query($conn,"SELECT * FROM items");
			echo "<table border='1' style='width:60%' align='center' bgcolor='lightgrey'>
					<tr>
					<th><h1>Item ID</h1></th>
					<th><h1>Item Name</h1></th>
					<th><h1>Brand</h1></th>
					<th><h1>Price</h1></th>
					</tr>";
			
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr><form action='home.php' method='post'>";
				echo "<td><h2>".$row['item_id']."</h2></td>";
				echo "<td><h2>".$row['item_name']. "</h2></td>";
				echo "<td><h2>".$row['brand']. "</h2></td>";
				echo "<td><h2>".$row['Price']. "</h2></td>";
				echo "</tr>";
			}
			echo "</table>";
			mysqli_close($conn);
			?>
			<form action ="cart.php" method="post">
			<h1 align="center">Item ID :      <input type="text" name="cart_itemid" style="height:30px; width:200px; font-size: 17pt"></h1>
			<h1 align="center">Quantity :      <input type="text" name="cart_quantity" style="height:30px; width:200px; font-size: 17pt"><br><br></h1>
			<p align = "center"><input type="submit" value="Add to Cart" style="height:45px; width:150px; font-size: 15pt"></p></form>
			
			
			<form action="cart1.php" method="post"><p align="center"><input type="submit" value="View Cart" style="height:45px; width:150px; font-size: 15pt"></p></form>			
	</body>
</html>




