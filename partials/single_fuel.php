<?php
if(!isset($_SESSION)){
    session_start();
}


if(isset($_SESSION['logged_in']) 
&& isset($_SESSION['username']) 
&& isset($_SESSION['key'])){
?>



<div id="layoutSidenav_content">
                <main>
                    <?php

                    
                    $id = $_GET['id'];
                  
                    $fuel_array = array();
                    $sql = "SELECT * FROM vehicle join fuel_filling where vehicle.id=fuel_filling.vehicle_id && vehicle_id ='$id'";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            array_push($fuel_array,$row);
                            
                        }
                    }
                   
                
                    ?>
                    <div class="container-fluid">
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Fuel Report
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                              
                                                <th>Reg No</th>
                                                
                                                
                                                
                                                <th>quantity</th>
                                                <th>Amount</th>
                                                <th>Fuel filled Time</th>
                                               
                                               
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php foreach($fuel_array as $key):?>
                                              
                                            <tr>
                                              
                                                <td><?php echo $key['reg_no'];?></td>
                                            
                                                <td><?php echo $key['quantity'];?></td>
                                                <td><?php echo $key['amount'];?></td>
                                                <td><?php echo $key['time'];?></td>
                                               
                                                
                                                
</td>
                                               
                                            </tr>
                                            <?php endforeach?>

                                            
                                            
                                        </tbody>
                                    </table>
                                    <?php 
                                    $total = array();
                                    foreach($fuel_array as $val){
                                        if($val['amount']){
                                            $valu = intval($val['amount']);
                                           array_push($total,$valu);
                                        }
                                       

                                    }
                                    ?>

                                </div>
                                <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Fual Cost :  <?php echo array_sum($total);?> </div>
                                    
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php }else{
                                                header("location:index.php");}
                                                
                                                ?>