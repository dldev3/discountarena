<?php
$con = mysqli_connect('localhost', 'root', '', 'tanya');

#server name
$sName = "localhost";

#username
$uName = "root";

#password
$pass = "";


#db name
$db_name = "tanya";


#creating db connection


$conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
