<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--font awsome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">

    <style>
        body {
            overflow-x:hidden;
            background-image:url('../images/banner/rm222batch2-mind-03.jpg');
        } 
    </style>
</head>
<body>
    <div class="container-fluid my-4">
        <h2 class="sign-up text-center mt-2">SIGN UP</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-10 col-xl-4 border border-2 m-3 p-5 bg-light mt-1">
            <form action="" method="post">
            
            <!--Username -->    
            <div class="form-outline mb-2">
                    <label for="user_username" class="form-label">Username :</label>
                    <input type="text" id="user_username" class="form-control" name="user_username"
                     placeholder="Enter your Username" autocomplete="off" required="required"/>
                </div>

                <!--password -->
                <div class="form-outline mb-2">
                    <label for="user_password" class="form-label">Password :</label>
                    <input type="password" id="user_password" class="form-control" name="user_password"
                     placeholder="Enter your password" autocomplete="off" required="required"/>
                </div>
                

        <div class="text-center">
            <input type="submit" value="Login" class="btn btn-primary mt-2 py-2 px-3 w-100"
             name="user_login">
            <p class="mt-2 fw-bold">Don't have an account? <a href="user_registration.php" class="text-danger">Sign up</a></p>
        </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="select * from `user_detail` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    //cart items
    $select_query_cart="select * from `cart_details` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        if(password_verify($user_password,$row_data['user_password'])){
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo"<script>alert('Login successfull')</script>";
                echo"<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo"<script>alert('Login successfull')</script>";
                echo"<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo"<script>alert('username & password is wrong please verify it')</script>";
        }
    }else {
        echo"<script>alert('username & password is wrong please verify it')</script>";
    }
}
?>