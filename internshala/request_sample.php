<?php
$showAlert=false;
$showError=false;
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
}
else{
    include 'dbconnect.php';
    $blood_id=$_GET['blood_id'];
     
    
    $select_display= "select blood_type,hospital_name from blood_type where blood_id='$blood_id'" ;
 $sql2 = mysqli_query($conn,$select_display);
 while($row1 = mysqli_fetch_array($sql2)){
    $blood_type=$row1[0];
    $hospital_name=$row1[1];
    
    
 
 }
 $login_username=$_SESSION['login_username'];
 $select_display= "select * from profile_internshala where login_username='$login_username'" ;
 $sql1 = mysqli_query($conn,$select_display);
 while($row1 = mysqli_fetch_array($sql1)){

 $login_username=$row1[1];

 $full_name=$row1[2];
 }

  
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $blood_id=$_GET['blood_id'];
   
    date_default_timezone_set('Asia/Kolkata');
    $timestamp = date("Y-m-d H:i:s");
  
   
    
    $insert ="INSERT INTO `application_request` ( `blood_id`,`login_username`,`full_name`,`blood_type`,`hospital_name`,`quantity`,`application_time`) VALUES ('$blood_id','$login_username','$full_name','$blood_type','$hospital_name','1','$timestamp')";


	  $sql3=mysqli_query($conn,$insert);
if($sql3)
	  { 
		  $showAlert=true;
          header('location:view_application_request.php');
    
		 
	  }
	  else
	  {
		  //$showError=true;
		 
	  }
   }
}



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>


  </head>
  <body>
   















	
<?php
    

    if($showAlert){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Details Updated</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
        if($showError){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Something went Wrong</strong> '. $showError.'
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
					<div class="card" style="box-shadow: 0 0 0px rgb(0 0 0) !important;">
						<div class="card-body">
							<form action="" method="POST">
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">full name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $full_name?>" name="full_name"id="full_name" disabled>
								</div>
		
							</div>

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">blood type</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $blood_type?>" name="blood_type"id="blood_type" disabled>
								</div>
		
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Hospital Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?php echo $hospital_name?>" name="hospital_name" id="hospital_name" disabled>
								</div>
							</div>
							
							
							
                            
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="request"  required>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<style type="text/css">
body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
</style>

<script type="text/javascript">

</script>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
