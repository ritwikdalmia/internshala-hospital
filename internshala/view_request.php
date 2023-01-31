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
 
 $login_username=$_SESSION['login_username'];

 $select_display= "select * from users_internshala where login_username='$login_username'" ;
 $select_sql1 = mysqli_query($conn,$select_display);
 while($row1 = mysqli_fetch_array($select_sql1)){
 $login_username=$row1[1];
 
 }

 
 }
 

?>

	

<!DOCTYPE html>
<html lang="en">

<body>



    

    
    
<br><br><br>
<div class="wrapper">
<?php include 'nav.php';?>



    <div class="container">
		<div class="main-body">
            <!--list product-->

			<div class="row">
                <div class="col-lg-9 pl-5">
					<!--card form-->
					<div class="card"  style="width:95%; background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );
					-webkit-backdrop-filter: blur( 40px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 );" >
					
						
						
						<div class="card-body">
							<form action="manage_blood_type.php" method="POST">
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Blood Group</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control"  name="blood_type" id="blood_type" required>
								</div>
							</div>					
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Search">
								</div>
							</div>
						</div>
						</form>
					</div>
					
				</div>
	        </div>

            <div class='row'>
                <!--fetch product-->
                <?php



if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    $blood_type = $_POST["blood_type"];
 
    $select_display="select  * from blood_type where blood_type='$blood_type' and quantity>0 " ;
                   $sql1 = mysqli_query($conn,$select_display);
                   while($row=mysqli_fetch_assoc($sql1)){

                   
                    $blood_id=$row['blood_id'];
                    $blood_type=$row['blood_type'];
                    $hospital_name=$row['hospital_name'];
                    $quantity=$row['quantity'];
                 
   

echo "
<div class='col-lg-6'>

<div class='card' style='box-shadow: 0 0 0px rgb(0 0 0) !important;'>
<div class='card-body'>
    <div class='d-flex flex-column align-items-center text-center'>
        <img src='https://bootdey.com/img/Content/avatar/avatar6.png' alt='Admin' class='rounded-circle p-1 bg-primary' width='110'>
        <div class='mt-3'>
        <table>
                                    <tr>
                                        <th>Blood Id:</th> 
                                        <td>$blood_id</td>
                                        
                                    </tr>
                                    <tr>
                                        <th>Blood Type:</th> 
                                        <td>$blood_type</td>
                                        
                                    </tr>
                                    <tr>
                                        <th>Hospital Name:</th> 
                                        <td>$hospital_name</td>
                                    </tr>
                                    <tr>
                                    <th>quantity:</th> 
                                    <td>$quantity</td>
                                </tr>

                                    
                                    
                                    
        </table>
        
        <div><br><br></div>
       
        <a class='btn btn-primary' href='request_sample.php?blood_id=$blood_id'>request</a>
                    
                                       
                                     
            
        </div>
    </div>
    
</div>
</div>
</div>
";


}
			     
   

}
else{
    $select_display="select  * from blood_type " ;
    $sql1 = mysqli_query($conn,$select_display);
    while($row=mysqli_fetch_assoc($sql1)){

    
     $blood_id=$row['blood_id'];
     $blood_type=$row['blood_type'];
     $hospital_name=$row['hospital_name'];
     $quantity=$row['quantity'];
    }
    if($quantity>0){
            
         
        $select_display="select  * from blood_type order by blood_type and quantity>0 " ;
                   $sql1 = mysqli_query($conn,$select_display);
                   while($row=mysqli_fetch_assoc($sql1)){

                    $blood_id=$row['blood_id'];
                    $blood_type=$row['blood_type'];
                    $hospital_name=$row['hospital_name'];
                    $quantity=$row['quantity'];
                   
                    

                                                       
                               
                               
                
                        
                        echo "
                       
                        <div class='col-lg-6'>
                        <h2>Available</h2>
                        <br><br>
                        <div class='card' style='box-shadow: 0 0 0px rgb(0 0 0) !important;'>
                            <div class='card-body'>
                                <div class='d-flex flex-column align-items-center text-center'>
                                    <img src='https://bootdey.com/img/Content/avatar/avatar6.png' alt='Admin' class='rounded-circle p-1 bg-primary' width='110'>
                                    <div class='mt-3'>
                                   
                                    <table>
                                    <tr>
                                    <th>Blood Id:</th> 
                                    <td>$blood_id</td>
                                    
                                </tr>
                                <tr>
                                    <th>Blood Type:</th> 
                                    <td>$blood_type</td>
                                    
                                </tr>
                                <tr>
                                    <th>Hospital Name:</th> 
                                    <td>$hospital_name</td>
                                </tr>
                                <tr>
                                <th>quantity:</th> 
                                <td>$quantity</td>
                            </tr>

                                

                               
                                </table>

                                <div><br><br></div>
       
                                <a class='btn btn-primary' href='request_sample.php?blood_id=$blood_id'>request</a>
            
                                        
                                      
                                   
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    ";


                }
            }
            else{
                echo "out of stock or no hospital found with blood group";
            }
            }
                ?>
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
.table{
    border: 1px solid black;
    
}
td,th{
text-align: left;
  padding: 8px;
  
}
.me-2 {
    margin-right: .5rem!important;
}
</style>




   
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>
