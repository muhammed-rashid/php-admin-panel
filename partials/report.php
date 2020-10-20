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

                    
                    
                  
                    $fuel_array = array();
                    $sql = "SELECT * FROM vehicle join fuel_filling where vehicle.id=fuel_filling.vehicle_id";
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
                                                <th>Vehicle id</th>
                                                <th>Reg No</th>
                                                <th>Vehicle Purchase Date</th>
                                                <th>seat_capacity</th>
                                                
                                                <th>quantity</th>
                                                <th>Amount</th>
                                                <th>Fuel filled Time</th>
                                                <th>See Single Vehicle Details</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php foreach($fuel_array as $key):?>
                                              
                                            <tr>
                                                <td><?php echo $key['vehicle_id'];?></td>
                                                <td><?php echo $key['reg_no'];?></td>
                                                <td><?php echo $key['purchase_date'];?></td>
                                                <td><?php echo $key['seat_capacity'];?></td>
                                                <td><?php echo $key['quantity'];?></td>
                                                <td><?php echo $key['amount'];?></td>
                                                <td><?php echo $key['time'];?></td>
                                                <td><a class="btn btn-primary" href="single_fuel.php?id=<?php echo $key['vehicle_id'];?>">View this vehicle fuel Details</a>
                                                
                                                
</td>
                                               
                                            </tr>
                                            <?php endforeach?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Fual Cost :  <?php echo fuel_sum($con);?> </div>
                                    
                                </div>
                            </div>
                                            <?php }else{
                                                header("location:index.php");}
                                                
                                                ?>