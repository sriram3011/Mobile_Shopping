<?php
include('includes/connect.php');
include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mobile shopping</title>
    <link rel="stylesheet" href="style.css">
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
</head>
<body class="">
    <!--navbar-->
    <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
  <span class="navbar-brand mb-0 h1"><img src="images/smartphone.png" class="logo"></span>
  <span class="navbar-brand mb-0 h1" id="name">ZONE</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item" id="navlist">
          <a class="nav-link"  href="index.php"><button class="btn btn-primary">Home</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php"><button class="btn btn-primary">Product</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php"><button class="btn btn-primary">Register</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><button class="btn btn-primary">Contact us</button></a>
        </li>
        <li class="nav-item float-end">
          <a class="nav-link" href="card.php"><button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i><sup class=" cart_number m-1"><?php cart_item(); ?></sup></button</a>
        </li>
</a>
      </ul>
    </div>
  </div>
</nav>

<!-- card table -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <h3 class="shopping_cart mt-3">Shopping Cart</h3>
        <table class="table">
            
                <!-- php code display dynamic data -->
                <?php
                global $con;
                $get_ip_add= getIPAddress();
                $total_price=0;
                $cart_query="select * from cart_details where ip_address='$get_ip_add'";
                $result_query=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result_query);
                if($result_count>0){
                    echo "<thead>
                    <tr>
                        <th class='thead'>Product Image</th>
                        <th class='thead'>Product Name</th>
                        <th class='thead'>Price</th>
                    </tr>
                </thead>
                <tbody>";

                while($row=mysqli_fetch_array($result_query)){
                  $product_id=$row['product_id'];
                  $select_product="select * from products where product_id='$product_id'";
                  $result=mysqli_query($con,$select_product);
                  while($row_product_price=mysqli_fetch_array($result)){
                    $product_price=array($row_product_price['product_price']);
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image=$row_product_price['product_image1'];
                    $product_specs=$row_product_price['product_specs'];
                    $product_color=$row_product_price['product_color'];
                    $product_values=array_sum($product_price);
                    $total_price+=$product_values;
                  ?>
                <tr>
                    <td><img src="./admin_area/product_images/<?php echo $product_image ?>" alt="images" class="cart_img"></td>
                    <td class="title1 col-md-8"><?php echo $product_title ?>
                    <p class="title2 m-0 mt-3"><i class="fa-solid fa-tag me-1"></i>Storage : <?php echo $product_specs?></p>
                    <p class="title2 m-0"><i class="fa-solid fa-tag me-1"></i>color : <?php echo $product_color ?></p>
                    <input type="checkbox" name="removeitem[]" value="<?php 
                    echo $product_id ?>"><label for="" class="checklist1 mx-1">check list</label>
                    <div class="d-flex">
                    <div class="col-sm-2 mt-1">
                    <input type="number" class="form-control" name="qty" placeholder="Quantity" aria-label="First name">
                </div>
                   
                
                <?php
                 $get_ip_add= getIPAddress();
                 if(isset($_POST['update_cart'])){
                    $quantities=$_POST['qty'];
                    $update_cart="update cart_details set quantity=$quantities where ip_address=
                    '$get_ip_add'";
                    $result_product=mysqli_query($con,$update_cart);
                    $total_price=$total_price*$quantities;
                 }
                
                ?>
                    <!--<button class="btn btn-outline-primary  mx-2">Update</button>-->
                    <input type="submit" value="Update" class="btn btn-outline-primary  mx-2"
                     name="update_cart">
                   <!-- <button class="btn btn-outline-danger ">Remove</button> -->
                   <input type="submit" value="Remove" class="btn btn-outline-danger  mx-2"
                     name="remove_cart">
                </td>
                  </div>
                    <td class="price1"> ₹ <?php echo $price_table ?></td>
                    <td>
                </td>
                </tr>
    

                  <?php }}} 
                  else{
                    echo "
                    <div class='container3 d-flex mx-5 col-md-12'>
                    <img src='images/icons/money.png' class='emptyimage ms-5'>
                    <h2 class='text-danger text-center mt-5'>Cart is Empty!</h2>
                    </div>";  
                } 
                  ?>
            </tbody>
        </table>
        <!-- sub total -->
    </div>
</div>
<div class="buttonbtn mb-3 d-flex">
    <?php
    $get_ip_add= getIPAddress();
    $cart_query="select * from cart_details where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$cart_query);
    $result_count=mysqli_num_rows($result_query);
    if($result_count>0){
    echo "<input type='submit' value='Continue Shopping' class='btn btn-info mx-2'
     name='continue_shopping'>
    <a href='user_area/checkout.php' class='btn btn-warning'>Checkout</a>
    <h4 class='subtotal px-3'>subtotal: <strong class='text-danger'> ₹  $total_price /-</strong></h4>";
    }else {
        echo "
        <div>
        <input type='submit' value='Continue Shopping' class='btn btn-info '
        name='continue_shopping'>
        </div>
        ";
    }
    if(isset($_POST['continue_shopping'])){
        echo "<script>window.open('index.php','_self')</script>";
    }
    ?>
        
</div>
</form>

<!-- function to remove -->
<?php
function remove_cart_item () {
global $con;
if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query="delete from cart_details where product_id=$remove_id";
        $run_delete=mysqli_query($con,$delete_query);
        if($run_delete){
            echo "<script>window.open('card.php','_self')</script>";
        }
    }
}
}
echo $remove_item=remove_cart_item();
?>

<div class="container col-md-12">
    <div class="card-body">
        <h5>Related Products</h5>
        <div class="rows col-md-12 d-flex">
                <?php cart_related(); ?>     
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</div>


<!-- footer section -->
<div class="col-lg-12 footer bg-primary p-3 text-center position-relative bottom-0 start-0">
    <p >All right observed @- Designed by Mohamed Fareedh-2022</p>
</div>
   <!--script link--> 
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>