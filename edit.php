<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$nama=$_POST['nama'];
	$harga=$_POST['harga'];
	$rating=$_POST['rating'];
    $likes=$_POST['likes'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE users SET name='$nama',harga='$harga',rating='$rating',likes='$likes' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$nama = $user_data['nama'];
	$harga = $user_data['harga'];
	$rating = $user_data['rating'];
    $likes = $user_data['likes'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga" value=<?php echo $harga;?>></td>
			</tr>
			<tr> 
				<td>Rating</td>
				<td><input type="text" name="rating" value=<?php echo $rating;?>></td>
			</tr>
            <tr> 
				<td>Likes</td>
				<td><input type="text" name="likes" value=<?php echo $likes;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>