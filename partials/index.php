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
                    include 'db.php';
                    include 'fuel_sum.php';
                    $vehicle_array = array();
                    $sql = "SELECT * FROM vehicle";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            array_push($vehicle_array,$row);
                            
                        }
                    }
                  
                    ?>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Number Of Vehicles : <?php echo count($vehicle_array);?></div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Fual Cost :  <?php echo fuel_sum($con);?> </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Vehicle Details
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Vehicle Reg : No</th>
                                                <th>Seating Capacity</th>
                                                
                                                <th>Edit Vehicle Details</th>
                                                <th>Delete Vehicle</th>
                                                <th>Add fuel Filling Data</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            <?php foreach($vehicle_array as $key):?>
                                              
                                            <tr>
                                                <td><?php echo $key['reg_no'];?></td>
                                                <td><?php echo $key['seat_capacity'];?></td>
                                                <td><a class="btn btn-primary" href="edit.php?id=<?php echo $key['id'];?>">edit</a>
                                                
                                                <td><form method="POST" action="action.php">
                                                    <input type="hidden" value="<?php echo $key['id'];?>" name ="vehicle_id">

                                                    <button class="btn btn-danger" type="submit" name="delete_vehicle" >Delete</button>
                                                </form>
                                            </td>
                                            <td><a class="btn btn-warning" href="addfuel.php?id=<?php echo $key['id'];?>">Add Fuel Details</a>
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
                                            <?php }
                                            else{
                                                header("PHP_SELF");
                                            }
                                                ?>             