<html>
<head>
	<title>Add Barang</title>
</head>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Id</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga"></td>
			</tr>
            <tr> 
				<td>Rating</td>
				<td><input type="text" name="rating"></td>
			</tr>
            <tr> 
				<td>Likes</td>
				<td><input type="text" name="likes"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$harga = $_POST['harga'];
        $rating = $_POST['rating'];
        $likes= $_POST['likes'];
		
		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(id,nama,harga,rating,likes) VALUES('$id','$nama','$harga','$rating','$likes')");
		
		// Show message when user added
		echo "Barang added successfully. <a href='index.php'>View Barang</a>";
	}
	?>
</body>
</html>