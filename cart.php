<html>
<body>
	<?php     
				//session_start();
				//$cust_id=$_SESSION['cust_id'];     
				
				$servername = "localhost";
				$username = "root";
				$password = "root";
				$db_name="furniture";
				
				$c_itemid=$_POST['cart_itemid'];
				$c_quantity=$_POST['cart_quantity'];
				// Create connection
				$conn = new mysqli($servername, $username, $password, $db_name);
				
				// Check connection
				if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
				} 
				
				$res = mysqli_query($conn,"SELECT * FROM items WHERE item_id='$itemid'");
				$row1 = mysqli_fetch_row($res);
					$c_itemname = $row1['item_name'];
					$c_brand = $row1['brand'];
					$c_price = $row1['price'];
				$price1=$c_price*$c_quantity;
				
				$sql1 = mysqli_query($conn,"INSERT INTO cart (item_id, item_name, brand, quantity, price) VALUES ('$c_itemid','$c_itemname','$c_brand','$c_quantity','$price1')");

				mysqli_close($conn);
				header('location:home.php');
		?>
</body>
</html>