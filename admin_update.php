<html>
	<body background="background.jpg">
	<font face="Calibri">
		<form action="signout.php" method="post"><p align="right"><input type="submit" value="LOGOUT" style="height:30px; width:150px; font-size: 10pt"></p></form>
		<p align="center"><font size="30">
		ABC Furniture Management<br>
		Admin Update<br>
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
			$result = mysqli_query($conn,"SELECT * FROM items");
			echo "<table border='1' style='width:60%' align='center' bgcolor='lightgrey'>
					<tr>
					<th><h1>Item ID</h1></th>
					<th><h1>Item Name</h1></th>
					<th><h1>Brand</h1></th>
					<th><h1>Quantity</h1></th>
					<th><h1>Warehouse Number</h1></th>
					<th><h1>Price</h1></th>
					</tr>";
			
			while($row = mysqli_fetch_array($result))
			{
				echo "<td><h2>" .$row['item_id']. " </h2></td>";
				echo "<td><h2>" .$row['item_name']. " </h2></td>";
				echo "<td><h2>" .$row['brand']. " </h2></td>";
				echo "<td><h2>" .$row['quantity']. " </h2></td>";
				echo "<td><h2>" .$row['warehouse_no']. " </h2></td>";
				echo "<td><h2>" .$row['Price']. " </h2></td>";
				echo "</tr>";
			}
			
			echo "</table>";
			mysqli_close($conn);
?>
		<form action="admin_homeupdate.php" method="post">
			<h1 align="center">ItemID :      <input type="text" name="itemid" style="height:30px; width:200px; font-size: 17pt">
			<br><h1 align="center">Choose the column you wish to update</h1>
			<h1 align="center"><select name="column" style="height:30px; width:200px; font-size: 17pt">
				<option value="item_id">Item ID</h2></option>
				<option value="item_name">Item Name</option>
				<option value="brand">Brand</option>
				<option value="quantity">Quantity</option>
				<option value="warehouse_no">Warehouse No</option>
				<option value="Price">Price</option>
			</select></h1>
			<h1 align="center">Set New Value :      <input type="text" name="newvalue" style="height:30px; width:200px; font-size: 17pt">
			<br><br><input type="submit" value="Update Item" style="height:45px; width:200px; font-size: 15pt">
		</form>
		<form action="admin_home.php" method="post">
		<br><br><input type="submit" value="Go Back" style="height:45px; width:200px; font-size: 15pt">
		</form>
	</body>
</html>