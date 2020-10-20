<?php
if(!isset($_SESSION)){
    session_start();
}


if(isset($_SESSION['logged_in']) 
&& isset($_SESSION['username']) 
&& isset($_SESSION['key'])){
?>
     








            <?php 
            
            $id = $_GET['id'] ?? 1;
            $sql = "SELECT * FROM vehicle WHERE id = '$id'";
            $result = mysqli_query($con,$sql);

           while($row = mysqli_fetch_assoc($result)){
               
               
               
               ?>
               
           
            <div id="layoutSidenav_content">
                <div class="container mt-5">
                <form method="POST" action="action.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Registration Number</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Registration Number" name="reg_no" required value="<?php echo $row['reg_no'];?>">
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Seating Capacity</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Seating Capacity" name="seat" required value="<?php echo $row['seat_capacity'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Purchase Date</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="yyyy-mm-dd" name="date" required value="<?php echo $row['purchase_date'];?>">
                    </div>
                    <div class="form-group">
                    
                      <input type="hidden" class="form-control" id="exampleInputPassword1"  name="id" required value="<?php echo $id ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-success" name="update_vehicle">update the vehicle</button>
                  </form>

            </div>
        </div>
        <?php
           }?>
     <?php }else{
    header("location:index.php");
     }          
       
          
   