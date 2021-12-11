<?php

$servername="localhost";
$user="root";
$password="";
$db="keshawa";
 
$conn =mysqli_connect($servername, $user, $password, $db);

if(!$conn)
{
	die("Connection failed" . mysqli_connect_error());
}

if(isset($_POST['submit'])) {

	$productname = $_POST['name'];
	$type = $_POST['type'];
	$size = $_POST['size'];
	$price = $_POST['price'];
	$image1 = $_POST['image1'];
	
	$discription = $_POST['description'];


$sql_query = "INSERT INTO adds ( productname , producttype ,  sizes , price , image  , description  ) VALUES ('$productname','$type' , '$size' , '$price' , '$image1'  , '$discription' )" ;

if(mysqli_query($conn, $sql_query))
{
	
	header('location: http://localhost/DiscountArena/newsfeed/kesh.php');

}

else 
{
	echo "error" . $sql . "" . mysql_error($conn);
}

mysqli_close($conn);
}



?>