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
                <form method="POST" action ="action.php">
                <div class="form-group">
                     <input type="text" class="form-control"  name="vehicle_id" value="<?php echo $_GET['id']??1?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Quantity</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter the quantity" name ="quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Amount</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter the amount" name="amount">
                      </div>
                    
                    <button type="submit" class="btn btn-warning" name = "addfuel">Add Fuel Details</button>
                  </form>

            </div>
        </div>

        <?php }else{
    header("location:index.php");
}              
       