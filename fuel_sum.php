<?php

function fuel_sum($con){
    

    $sql = "SELECT SUM(amount) FROM fuel_filling";
   
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_row($result);
   $sum = $row[0];
   return $sum;
  
}

