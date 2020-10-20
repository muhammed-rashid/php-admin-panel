<?php
if(!isset($_SESSION)){
    session_start();
}


if(isset($_SESSION['logged_in']) 
&& isset($_SESSION['username']) 
&& isset($_SESSION['key'])){
?>
            <div id="layoutSidenav_content">
                <div class="container mt-5">
                <form method="POST" action="action.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Registration Number</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Registration Number" name="reg_no" required>
                     
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Seating Capacity</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Seating Capacity" name="seat" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Purchase Date</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="yyyy-mm-dd" name="date" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success" name="add_vehicle">Add the vehicle</button>
                  </form>

            </div>
        </div>

<?php }else{
    header("location:login.php");
}           
     