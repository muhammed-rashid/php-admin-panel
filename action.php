<?php
require 'db.php';

if(isset($_POST['add_vehicle'])){
    $reg_no = $_POST['reg_no'];
    $seat = $_POST['seat'];
    $date = $_POST['date'];
    $err = array();
    if(empty($reg_no)||empty($seat)){
        array_push($err,'all fields are required');
    }else{
        $sql = "INSERT INTO vehicle (reg_no,seat_capacity,purchase_date) VALUES ('$reg_no','$seat','$date')";
        $result = mysqli_query($con,$sql);

        if($result){
            header("location:index.php");
        }
    }

}
if(isset($_POST['delete_vehicle'])){
    $id = $_POST['vehicle_id'];
    $sql = "DELETE from vehicle where id = $id";

   $result = mysqli_query($con,$sql);
   if($result){
       header("location:index.php");
   }

}

if(isset($_POST['update_vehicle'])){
    $id = $_POST['id'];
    $reg_no = $_POST['reg_no'];
    $seat = $_POST['seat'];
    $puechase_date = $_POST['date'];

    $sql = "UPDATE vehicle SET reg_no = $reg_no,seat_capacity = $seat,
            purchase_date = $puechase_date where id = $id";
    $result = mysqli_query($con,$sql);
    if($result){
        header("location:index.php");
    }else{
        echo 'error';
    }

}

if(isset($_POST['addfuel'])){
   $quantity = $_POST['quantity'];
   $amount = $_POST['amount'];
   $vehicle_id = $_POST['vehicle_id'];


   $sql = "INSERT INTO fuel_filling (vehicle_id,quantity,amount) VALUES ('$vehicle_id','$quantity','$amount')";
   $result = mysqli_query($con,$sql);

   if($result){
      header("location:index.php");
   }
}






session_start();
unset($_SESSION['err']);
$err = array();

if(isset($_POST['login'])){
     
     $email=$_POST['email'];
     $password = $_POST['password'];
     echo $email;
     echo $password;
     if(empty(trim($email))||empty(trim($password))){
             array_push($err,'all fields are required');
     }
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
      if(strlen($password)<4){
              array_push($err,'password must contain 4 letters');
      }
      
      if(count($err)==0){
         
        $sql = "SELECT * from user where username = '$email' and password = '$password'"; 
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count ==1){
            $_SESSION['logged_in'] = true;
             $_SESSION['username'] = $email;
             $_SESSION['key'] = 'admin';
             header("location:index.php");
             
      }
      else{
           array_push($err,'invalid email or password');
           $_SESSION['err'] = $err;
           header("location: login.php");
   }

       
       
    

 }else{
    $_SESSION['err'] = $err;
    header("location: login.php");
 }
    
            
}

if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
}
           
           
     
      




















?>