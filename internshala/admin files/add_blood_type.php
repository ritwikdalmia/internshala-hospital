<?php
 session_start();

$showAlert=false;
$showError=false;

 if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
     header("location:login.php");
     exit;
 }
 else{
    
 include "dbconnect.php";
 $admin_username=$_SESSION['admin_username'];
 $select_display= "select * from admin_internshala where admin_username='$admin_username'" ;
 $sql1 = mysqli_query($conn,$select_display);
 while($row1 = mysqli_fetch_array($sql1)){

 $admin_username=$row1[1];
 $hospital_name=$row1[2];
 $email=$row1[3];
 }
}

?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
   $admin_username=$_SESSION['admin_username'];
   
   
  
   
   $blood_type=$_POST['blood_type'];
   $blood_id=$_POST['blood_id'];
   $quantity=$_POST['quantity'];
   $hospital_name=$_POST['hospital_name'];

   


   //$email=$_POST['email'];
   $select= "select * from admin_internshala where admin_username='$admin_username'";
   $sql = mysqli_query($conn,$select);
   $row = mysqli_fetch_assoc($sql);
   $res= $row['admin_username'];
   if($res === $admin_username)
   {
	 
        
        $ip_address = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date("Y-m-d H:i:s");
        $blood ="INSERT INTO `blood_type` ( `blood_id`,`blood_type`,`quantity`,`hospital_name`,`admin_username`,`timestamp`) VALUES ('$blood_id','$blood_type','$quantity','$hospital_name','$admin_username','$timestamp')";

	  $sql_=mysqli_query($conn,$blood); 
      
      $showAlert=true;
		  
		 
	  }
	  else
	  {
		  $showError="already available";
		 
	  }
   }


?>
	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>add_balance </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php require 'nav.php' ?>

<?php
    

    
        if($showError){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>already available went Wrong</strong> '. $showError.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';
            }
         
    ?>
    
<br><br><br>

<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-8">
					<div class="card" style="width:95%; background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );
-webkit-backdrop-filter: blur( 40px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 );">
						<div class="card-body">
							<form action="" method="post">
                            <?php			
				if($showAlert){
					echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>blood type  added  Sucessfully</strong> 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> ';
					}
							?>
                           



							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0" >Blood id</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                    <?php $blood_id= rand(999999, 111111);?>
									<input type="text" class="form-control" value="<?php echo $blood_id?>" name="blood_id"id="blood_id" readonly>
								</div>
		
							</div>



                            
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">hospital name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
                                	<?php 
									$sql_option="select * from admin_internshala where admin_username='$admin_username' ";
									$select_sql2 = mysqli_query($conn,$sql_option);
									while($row5 = mysqli_fetch_assoc($select_sql2)){
									 $hospital_name=$row5['hospital_name'];
                                     ?>
									<input type="text" class="form-control" value="<?php echo $hospital_name?>" name="hospital_name"id="hospital_name" readonly>
									
									<?php
									}
									?>
								
         							</select>
								</div>
							</div>



							
								
							
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">blood type</h6>
								</div>
							<div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="blood_type" id="blood_type" required>
								</div>
							</div>

                            
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Quantity</h6>
								</div>
							<div class="col-sm-9 text-secondary">
                            <input type="number" class="form-control" name="quantity" id="quantity" pattern="[0-9]" required>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="add blood"  required>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br>

<style type="text/css">
body{
    background: #f7f7ff !important;
   
}

.me-2 {
    margin-right: .5rem!important;
}
</style>


	

</script>
</body>
</html>