<?php include('../includes/connect.php');
      include('../functions/common_function.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
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
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center mt-2">SIGN UP</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
            <form action="" method="post" encrypt="multipart/form-data">
            <!--Username -->    
            <div class="form-outline mb-2">
                    <label for="user_username" class="form-label">Username :</label>
                    <input type="text" id="user_username" class="form-control" name="user_username"
                     placeholder="Enter your Username" autocomplete="off" required="required"/>
                </div>

                <!--Email field -->
                <div class="form-outline mb-2">
                    <label for="user_email" class="form-label">Email :</label>
                    <input type="email" id="user_email" class="form-control" name="user_email"
                     placeholder="Enter your Email" autocomplete="off" required="required"/>
                </div>

                <!--password -->
                <div class="form-outline mb-2">
                    <label for="user_password" class="form-label">Password :</label>
                    <input type="password" id="user_password" class="form-control" name="user_password"
                     placeholder="Enter your password" autocomplete="off" required="required"/>
                </div>
                
                <!--confirm password -->
                <div class="form-outline mb-2">
                    <label for="conf_user_password" class="form-label">Confirm Password :</label>
                    <input type="password" id="conf_user_password" class="form-control" name="conf_user_password"
                     placeholder="confirm password" autocomplete="off" required="required"/>
                </div>

                <!--address-->
                <div class="form-outline mb-2">
                    <label for="user_address" class="form-label">Address:</label>
                    <input type="text" id="user_address" class="form-control" name="user_address"
                     placeholder="Enter your Address" autocomplete="off" required="required"/>
                </div>
                
                <!--contact -->
                <div class="form-outline mb-2">
                    <label for="user_contact" class="form-label">Contact:</label>
                    <input type="text" id="user_contact" class="form-control" name="user_contact"
                     placeholder="contact No" autocomplete="off" required="required"/>
                </div>
        <div class="text-center">
            <input type="submit" value="Register" class="btn btn-primary py-2 px-3 w-100" name="user_register">
            <p class="mt-2 fw-bold">Already have an account? <a href="user_login.php" class="text-danger">Sign in</a></p>
        </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
<!--syntax for php -->
<?php 
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();

    //select query
    $select_query="select * from `user_detail` where username='$user_username' or
     user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo"<script>alert('username or Email is already exists')</script>";
    }else if($user_password!=$conf_user_password){
        echo"<script>alert('password does not match')</script>";
    }
    
    
    else{
        $insert_query="insert into `user_detail`(username,user_email,user_password,user_ip,
        user_address,user_mobile)values('$user_username','$user_email','$hash_password',
        '$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);
         echo "<script>alert('Data is added successfully')</script>";
    }
//selecting cart items
$select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
    $_session['username']=$user_username;
    echo "<script>alert('you have item in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}else{
    echo "<script>window.open('../index.php','_self')</script>";
}
}

?>