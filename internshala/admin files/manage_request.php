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
 $select_sql1 = mysqli_query($conn,$select_display);
 while($row1 = mysqli_fetch_array($select_sql1)){
 $admin_username=$row1[1];
 $hospital_name=$row1[2];

 
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

			

            <div class='row'>
                <!--fetch product-->
                <?php



  
 
    $select_display="select  * from application_request where hospital_name='$hospital_name' order by application_request_id asc" ;
                   $sql1 = mysqli_query($conn,$select_display);
                   while($row=mysqli_fetch_assoc($sql1)){

                    $application_request_id=$row['application_request_id'];
                    $blood_id=$row['blood_id'];
                    $full_name =$row['full_name'];
                    $login_username=$row['login_username'];
                    $blood_type=$row['blood_type']; 
                    $hospital_name=$row['hospital_name'];    
                   
                    $quantity =$row['quantity'];
                    $application_time=$row['application_time'];
                    $acceptance =$row['acceptance'];
                    

                                                                               
                                                                
   

echo "
<div class='col-lg-6'>

<div class='card' style='box-shadow: 0 0 0px rgb(0 0 0) !important;'>
<div class='card-body'>
    <div class='d-flex flex-column align-items-center text-center'>
        <img src='https://bootdey.com/img/Content/avatar/avatar6.png' alt='Admin' class='rounded-circle p-1 bg-primary' width='110'>
        <div class='mt-3'>
        <table>
                                    <tr>
                                        <th>application Id:</th> 
                                        <td>$application_request_id</td>
                                        
                                    </tr>
                                    <tr>
                                        <th>full name:</th> 
                                        <td>$full_name</td>
                                        
                                    </tr>
                                    <tr>
                                        <th>login username:</th> 
                                        <td>$login_username</td>
                                    </tr>
                                    <tr>
                                        <th>blood type id:</th> 
                                        <td>$blood_type</td>
                                    </tr>
                                    <tr>
                                        <th>Hospital name:</th> 
                                        <td>$hospital_name</td>
                                    </tr>
                                    <tr>
                                        <th>Quantity:</th> 
                                        <td>$quantity</td>
                                    </tr>

                               
                                    <tr>
                                        <th>approval :</th> 
                                        <td>$acceptance</td>
                                    </tr>
                                    <tr>
                                        <th>application  time:</th> 
                                        <td>$application_time</td>
                                    </tr>
                                    


                                   

                                    
                                    
                                    
        </table>
        
        <div><br><br></div>";
       
                                       
                echo"                     
            
        </div>
    </div>
    
</div>
</div>
</div>
";
}
			     
   



                ?>
                </div>
				<p>note this can be updated when you click on the button
        </p>
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
