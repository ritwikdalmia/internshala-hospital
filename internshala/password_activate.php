<?php
$showAlert=false;
$showError=false;
// if($_SERVER["REQUEST_METHOD"] == "GET"){
include 'dbconnect.php';
if(!empty($_GET['password_token']) && isset($_GET['password_token'])){
  $password_token=$_GET['password_token'];
 
   $sql=mysqli_query($conn,"SELECT user_id FROM users_internshala WHERE password_token='$password_token' and password_verification=0");
   $num=mysqli_fetch_array($sql);
   if($num>0)
  {
// $is_verified='active';
$result1=mysqli_query($conn,"UPDATE users_internshala SET password_verification=1 WHERE password_token='$password_token'");

$showAlert=true;
header('location:new_password.php');

}
else
{
$showError=true;
header('location:new_password.php');

}
}
else{
  $showError=true;

}


//     $updatequery= "UPDATE users_internshala SET is_verified='active' where token='$token'";
//     $query=$mysqli_query($conn,$updatequery);
//     if($query){
//             $showAlert=true;
//             header('location:login.php');
//             exit();
//         }
//         else{
//             $showError=true;
//         header('location:signup.php');

           
//         }
//     }
    


// }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <title>password-reset</title>
  </head>
  <body>
<!-- 
<?php require 'navbar.php' ?> -->
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Email verified successfully!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>password mail not  verified yet!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }

    
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
