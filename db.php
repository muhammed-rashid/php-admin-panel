<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = '';

$con = mysqli_connect($host,$user,$password,$db);
if($con->connect_error){
    echo "error connecting with the database";
}