<?php
//include('./includes/connect.php');


//getting products
function getproducts(){
    global $con;

    //condition to check isset 
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from products order by rand() LIMIT 0,10";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $price_strike=$row['price_strike'];
            $product_offer=$row['product_offer'];
            $category_id=$row['category_id'];
            $product_delivery=$row['product_delivery'];
            $brand_id=$row['brand_id'];
            $product_specs=$row['product_specs'];
            $product_sales=$row['product_sales'];
            echo "<div class='col-md-3 mb-3 m-0 p-1'>
            <div class='card h-100 w-100 m-auto' id='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...''>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
       </div>
       <button type='button' class='col-md-8 btn btn-danger fs-6 ms-2'>$product_sales</button>
            <p class='prspecs mt-3 ms-3'>Available : $product_specs</p>
       <h5 class='product_price mt-3 ms-4 text-danger'><i class='fa-solid fa-indian-rupee-sign'></i> $product_price <span class='pricestrike text-secondary'>
       <i class='fa-solid ms-2 fa-indian-rupee-sign'></i><s>  $price_strike </s><span
       class='product_offer ms-2 text-dark'>($product_offer%offer)</span></h5>
       <p class='delivery ms-3'><i class='fa-solid fa-truck'></i> $product_delivery </p>

       <div class='card-footer bg-transparent border-0'>
       <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-primary border-0'><i class='fa-solid fa-cart-circle-check'></i>Add to cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning border-0'>View More</a>
     </div>
      </div>
      </div> ";
          }
        }
    }
}

//getting all products 
function get_all_products(){
    global $con;

    //condition
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from products order by rand()";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $price_strike=$row['price_strike'];
            $product_offer=$row['product_offer'];
            $category_id=$row['category_id'];
            $product_delivery=$row['product_delivery'];
            $brand_id=$row['brand_id'];
            $product_specs=$row['product_specs'];
            $product_sales=$row['product_sales'];
            echo "<div class='col-md-3 mb-3  p-1 m-0'>
            <div class='card h-100 w-100 m-auto' id='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...''>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
       </div>
       <button type='button' class='col-md-8 btn btn-danger fs-6 ms-2'>$product_sales</button>
            <p class='prspecs mt-3 ms-2'>Available : $product_specs</p>
       <h5 class='product_price mt-3 ms-3 text-danger'><i class='fa-solid fa-indian-rupee-sign'></i> $product_price <span class='pricestrike text-secondary'>
       <i class='fa-solid ms-2 fa-indian-rupee-sign'></i><s>  $price_strike </s><span
       class='product_offer ms-2 text-dark'>($product_offer%offer)</span></h5>
       <p class='delivery ms-3'><i class='fa-solid fa-truck'></i> $product_delivery </p>

       <div class='card-footer bg-transparent border-0'>
       <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-primary border-0'><i class='fa-solid fa-cart-circle-check'></i>Add to cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning border-0'>View More</a>
     </div>
      </div>
      </div> ";
          }
        }
    }
}

// getting unique categories
function get_unique_categories(){
    global $con;

if(isset($_GET['category'])){
    $category_id=$_GET['category'];
$select_query="select * from products where category_id=$category_id";
      $result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo "<script>alert('Sorry, This Category is Not Available')
    window.open('index.php','_self')</script>";
}

      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $price_strike=$row['price_strike'];
        $product_offer=$row['product_offer'];
        $category_id=$row['category_id'];
        $product_delivery=$row['product_delivery'];
        $brand_id=$row['brand_id'];
        $product_specs=$row['product_specs'];
        $product_sales=$row['product_sales'];
        echo "<div class='col-md-3 mb-3 ms-2 m-0'>
        <div class='card h-100 w-100 m-auto' id='card'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...''>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
   </div>
   <button type='button' class='col-md-8 btn btn-danger fs-6 ms-2'>$product_sales</button>
        <p class='prspecs mt-3 ms-2'>Available : $product_specs</p>
   <h5 class='product_price mt-3 ms-3 text-danger'><i class='fa-solid fa-indian-rupee-sign'></i> $product_price <span class='pricestrike text-secondary'>
   <i class='fa-solid ms-2 fa-indian-rupee-sign'></i><s>  $price_strike </s><span
   class='product_offer ms-2 text-dark'>($product_offer%offer)</span></h5>
   <p class='delivery ms-3'><i class='fa-solid fa-truck'></i> $product_delivery </p>

   <div class='card-footer bg-transparent border-0'>
   <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-primary border-0'><i class='fa-solid fa-cart-circle-check'></i>Add to cart</a>
   <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning border-0'>View More</a>
 </div>
  </div>
  </div> ";
      }
    }
}

// getting unique brands
function get_unique_brands(){
    global $con;

if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
$select_query="select * from products where brand_id=$brand_id";
      $result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo "<script>alert('Sorry, This Category is Not Available')
    window.open('index.php','_self')</script>";
}

      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $price_strike=$row['price_strike'];
        $product_offer=$row['product_offer'];
        $category_id=$row['category_id'];
        $product_delivery=$row['product_delivery'];
        $brand_id=$row['brand_id'];
        $product_specs=$row['product_specs'];
        $product_sales=$row['product_sales'];
        echo "<div class='col-md-3 mb-3 ms-2 m-0'>
        <div class='card h-100 w-100 m-auto' id='card'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...''>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
   </div>
   <button type='button' class='col-md-8 btn btn-danger fs-6 ms-2'>$product_sales</button>
        <p class='prspecs mt-3 ms-2'>Available : $product_specs</p>
   <h5 class='product_price mt-3 ms-3 text-danger'><i class='fa-solid fa-indian-rupee-sign'></i> $product_price <span class='pricestrike text-secondary'>
   <i class='fa-solid ms-2 fa-indian-rupee-sign'></i><s>  $price_strike </s><span
   class='product_offer ms-2 text-dark'>($product_offer%offer)</span></h5>
   <p class='delivery ms-3'><i class='fa-solid fa-truck'></i> $product_delivery </p>

   <div class='card-footer bg-transparent border-0'>
   <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-primary border-0'><i class='fa-solid fa-cart-circle-check'></i>Add to cart</a>
   <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning border-0'>View More</a>
 </div>
  </div>
  </div> ";
      }
    }
}


//displaying brand in side nav 
function getbrands(){
    global $con;  
$select_brands="select * from  brands ";
$result_brands=mysqli_query($con,$select_brands);
$row_data=mysqli_fetch_assoc($result_brands);
while($row_data=mysqli_fetch_assoc($result_brands)) {
  $brand_title=$row_data['brand_title'];
  $brand_id=$row_data['brand_id'];
  echo " <li class='nav-item'>
  <a href='index.php?brand=$brand_id' class='nav-link text-dark' id='brands'>$brand_title</a>
</li> ";
}
}

//displaying categories in side nav
function getcategories(){
    global $con;
    $select_categories="select * from categories ";
$result_categories=mysqli_query($con,$select_categories);
while($row_data=mysqli_fetch_assoc($result_categories)) {
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
  echo " <li class='nav-item'>
  <a href='index.php?category=$category_id' class='nav-link text-dark' id='brands'>$category_title</a>
</li> ";
}
}

// searching products

function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
    $search_query="select * from products where product_keyword like '%$search_data_value%'";
          $result_query=mysqli_query($con,$search_query);
          $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
    echo "<h2 class='text-center text-danger mt-3'>No result found!</h2>";
}
          while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $price_strike=$row['price_strike'];
            $product_offer=$row['product_offer'];
            $category_id=$row['category_id'];
            $product_delivery=$row['product_delivery'];
            $brand_id=$row['brand_id'];
            $product_specs=$row['product_specs'];
            $product_sales=$row['product_sales'];
            echo "
            <div class='col-md-3 mb-3 p-1 m-0'>
            <div class='card h-100 w-100 m-auto' id='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...''>
            <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
       </div>
       <button type='button' class='col-md-8 btn btn-danger fs-6 ms-2'>$product_sales</button>
            <p class='prspecs mt-3 ms-2'>Available : $product_specs</p>
       <h5 class='product_price mt-3 ms-3 text-danger'><i class='fa-solid fa-indian-rupee-sign'></i> $product_price <span class='pricestrike text-secondary'>
       <i class='fa-solid ms-2 fa-indian-rupee-sign'></i><s>  $price_strike </s><span
       class='product_offer ms-2 text-dark'>($product_offer%offer)</span></h5>
       <p class='delivery ms-3'><i class='fa-solid fa-truck'></i> $product_delivery </p>

       <div class='card-footer bg-transparent border-0'>
       <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-primary border-0'><i class='fa-solid fa-cart-circle-check'></i>Add to cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning border-0'>View More</a>
     </div>
      </div>
      </div>  ";
          }
        }
    }

    //view details function 
    function view_product(){
        global $con;

 //condition to check isset 
 if(isset($_GET['product_id'])){
 if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
$select_query="select * from products where product_id=$product_id";
      $result_query=mysqli_query($con,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_image2=$row['product_image2'];
        $product_price=$row['product_price'];
        $price_strike=$row['price_strike'];
        $product_offer=$row['product_offer'];
        $category_id=$row['category_id'];
        $product_delivery=$row['product_delivery'];
        $brand_id=$row['brand_id'];
        $product_specs=$row['product_specs'];
        $product_sales=$row['product_sales'];
        $product_about_1=$row['product_about_1'];
        $product_about_2=$row['product_about_2'];
        $product_about_3=$row['product_about_3'];
        $product_about_4=$row['product_about_4'];
        $model_name=$row['model_name'];
        $brand_name=$row['brand_name'];
        $product_image3=$row['product_image3'];
        $product_color=$row['product_color'];
        $product_emi=$row['product_emi'];
        $Warranty=$row['Warranty'];
        echo "
        <h5 class='ms-5 m-3 category text-secondary'>Product Result  :</h5>
        <div class='col-md-5 '>
        <div class='ms-3  border-0 bg-light '>
        <img src='./admin_area/product_images/$product_image1' class='view_images bg-white ms-4' alt='...''>
        <h5 class='brand_models mt-5 ms-3'>Related Images</h5>
        <div class='d-flex mt-4 ms-2'>
        <img src='./admin_area/product_images/$product_image3' id='view_reated_image' class='card-img-to bg-light ' alt='...''>
        <img src='./admin_area/product_images/$product_image2' id='view_reated_image' class='card-img-to bg-light mx-3' alt='...''>
</div>
</div>       
</div>
                <div class='col-md-7'>
                <div class='row '>
                <div class='col-md-12 ms-2'>
                <h5 class='card-title text-center' id='product_title'>$product_title</h5>
                <hr class='ms-3 mt-4 mx auto'>
            <div class='col-md-10 ms-5 bg-light m-2 mt-4'>
            <table class='table ms-2'>
            <tbody>
            <tr class=''>
              <td class='brand_models border-0 p-0'> Model name  :</td>
              <td class='brand_body border-0 p-0'>$model_name </td>
            </tr>
            <tr>
            <td class='brand_models border-0 p-0'> Brand  :</td>
            <td class='brand_body border-0 p-0'>$brand_name </td>
            </tr>
            <tr>
            <td class='brand_models border-0 p-0'> color  :</td>
            <td class='brand_body border-0 p-0'>$product_color  </td>
            </tr>
            <tr>
            <td class='brand_models border-0 p-0'> Memory Available  :</td>
            <td class='brand_body border-0 p-0'>$product_specs </td>
            </tr>
            </tbody>
            </table><hr>
             <h5 class='price mt-4 ms-3'>Price :<span class='price1 text-danger'> ₹$product_price</span> 
            <span class='offer'><i class='fa-solid fa-tag ms-1'></i>($product_offer% offer)</span>
            </h5>
            <p class='mrp ms-3'>MRP : ₹ <del>$price_strike</del></p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-warning col-md-4 ms-2'>Add to cart</a>
            <a href='index.php' class='btn btn-danger col-md-4 ms-2'>Buy</a>
            <div>
    </div>
    </div>
    <div class='col-md-12'>

    <div class='accordion' id='accordionPanelsStayOpenExample'>
  <div class='accordion-item bg-light border-0'>
    <h2 class='accordion-header bg-light border-0' id='panelsStayOpen-headingOne'>
      <button class='accordion-button bg-light text-dark' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapseOne' aria-expanded='true' aria-controls='panelsStayOpen-collapseOne'>
        Inclusive of all taxes
      </button>
    </h2>
    <div id='panelsStayOpen-collapseOne' class='accordion-collapse collapse show' aria-labelledby='panelsStayOpen-headingOne'>
      <div class='accordion-body'>
    <p class='EMI-1'><span class='emi'>EMI </span> starts at ₹$product_emi No Cost EMI available</p>
    <div class='button-view bg-light  border border-2'>
    <button type='button' class='btn btn-outline-primary ms-4 m-2 mt-4' id='available'><i class='fa-solid fa-truck text-dark me-1'></i>Pay on Delivery</button>
    <button type='button' class='btn btn-outline-warning text-dark m-2 mt-4' id='available'><i class='fa-solid fa-arrow-right-arrow-left text-dark me-1'></i>7 Day Replacement</button>
    <button type='button' class='btn btn-outline-secondary m-2 mt-4' id='available'><i class='fa-solid fa-calendar text-dark me-1'></i>$Warranty Year Warranty</button>
    </div>  
    </div>
    </div>
  </div>
  <div class='accordion-item border-0'>
    <h2 class='accordion-header' id='panelsStayOpen-headingTwo'>
      <button class='accordion-button collapsed bg-light text-dark' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapseTwo' aria-expanded='true' aria-controls='panelsStayOpen-collapseTwo'>
        About this Product
      </button>
    </h2>
    <div id='panelsStayOpen-collapseTwo' class='accordion-collapse collapse show bg-light' aria-labelledby='panelsStayOpen-headingTwo'>
      <div class='accordion-body'>
        <p class='product_about_1 m-0'><i class='fa-solid fa-tags'></i> $product_about_1</p>
        <p class='product_about_1 m-0'><i class='fa-solid fa-tags'></i> $product_about_2</p>
        <p class='product_about_1 m-0'><i class='fa-solid fa-tags'></i> $product_about_3</p>
        <p class='product_about_1 m-0'><i class='fa-solid fa-tags'></i> $product_about_4</p>
      </div>
    </div>
  </div>
</div>
    </div>
</div></div>
</div>";
      }
    }
}
}    }

// get ip fuction

//<img src='./admin_area/product_images/$product_image2' class='card-img-to bg-light' alt='...''>
//<img src='./admin_area/product_images/$product_image3' class='card-img-to' alt='...''>-->

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 

//cart function 

function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="select * from cart_details where ip_address='$get_ip_add' and
     product_id=$get_product_id";
     $result_query=mysqli_query($con,$select_query);
     $num_of_rows=mysqli_num_rows($result_query);
     if($num_of_rows>0){
        echo"<script> alert('this Item is already in cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
     }else{
        $insert_query="insert into cart_details (product_id,ip_address,quantity) values
        ($get_product_id,'$get_ip_add',0)";
        $result_query=mysqli_query($con,$insert_query);
        echo" <script> alert('Item is added to cart')</script>";
        echo "<script>window.open('index.php','_self')</script>";
     }

  }
}
// function to get card item number

function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $select_query="select * from cart_details where ip_address='$get_ip_add'";
     $result_query=mysqli_query($con,$select_query);
     $count_cart_items=mysqli_num_rows($result_query);
     }else{
      global $con;
      $get_ip_add = getIPAddress();
      $select_query="select * from cart_details where ip_address='$get_ip_add'";
       $result_query=mysqli_query($con,$select_query);
       $count_cart_items=mysqli_num_rows($result_query);
     }
     echo $count_cart_items;
    }

//getting first nav bar 
function first_nav_mobile(){
  global $con;
 $select_query = "select * from categories where category_id = 10";
 $result_query=mysqli_query($con,$select_query);
 while($row_data=mysqli_fetch_assoc($result_query)) {
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
  echo "
  <a href='index.php?category=$category_id' class='nav-link text-dark p-0 m-0' id='nav_top'><h4 class='header10 p-0 m-0'>$category_title</h4></a>
   ";
    }
  }

  //getting second nav bar 
  function second_nav_headset() {
    global $con;
    $select_query="select * from categories where category_id = 1";
    $result_query=mysqli_query($con,$select_query);
    while($row_data=mysqli_fetch_assoc($result_query)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo " <a href='index.php?category=$category_id' class='nav-link text-dark ms-0' id='nav_top'><h4 class='header10 ms-0'>$category_title</h4></a>
      ";
    }
  }

  //getting third nav bar 
  function third_nav_airpods() {
    global $con;
    $select_query="select * from categories where category_id = 2";
    $result_query=mysqli_query($con,$select_query);
    while($row_data=mysqli_fetch_assoc($result_query)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo " <a href='index.php?category=$category_id' class='nav-link text-dark ms-0' id='nav_top'><h4 class=' header10 ms-0'>$category_title</h4></a>
      ";
    }
  }

  //getting fourth nav bar 
  function fourth_nav_smartwatch() {
    global $con;
    $select_query="select * from categories where category_id = 3";
    $result_query=mysqli_query($con,$select_query);
    while($row_data=mysqli_fetch_assoc($result_query)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo " <a href='index.php?category=$category_id' class='nav-link text-dark ms-0' id='nav_top'><h4 class='header10 ms-0'>$category_title</h4></a>
      ";
    }
  }

  //getting fifth nav bar 
  function fifth_nav_portable_charger() {
    global $con;
    $select_query="select * from categories where category_id = 6";
    $result_query=mysqli_query($con,$select_query);
    while($row_data=mysqli_fetch_assoc($result_query)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo " <a href='index.php?category=$category_id' class='nav-link text-dark ms-2' id='nav_top'><h4 class=' header10 ms-0'>charger</h4></a>
      ";
    }
  }
  //getting sixth nav bar 
  function sixth_nav_cases() {
    global $con;
    $select_query="select * from categories where category_id = 4";
    $result_query=mysqli_query($con,$select_query);
    while($row_data=mysqli_fetch_assoc($result_query)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo " <a href='index.php?category=$category_id' class='nav-link text-dark ms-2' id='nav_top'><h4 class='header10 ms-0'>Cases</h4></a>
      ";
    }
  }

  //total price show in cart
  function total_price() {
    global $con;
    $get_ip_add= getIPAddress();
    $total_price=0;
    $cart_query="select * from cart_details where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result_query)){
      $product_id=$row['product_id'];
      $select_product="select * from products where product_id='$product_id'";
      $result=mysqli_query($con,$select_product);
      while($row_product_price=mysqli_fetch_array($result)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
      }
    }
    echo $total_price;
  }
 //related products in cart function

 function cart_related(){
  global $con;
  //condition to check isset 
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
$select_query="select * from products order by rand() LIMIT 0,4";
      $result_query=mysqli_query($con,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $price_strike=$row['price_strike'];
        $product_offer=$row['product_offer'];
        $category_id=$row['category_id'];
        $product_delivery=$row['product_delivery'];
        $brand_id=$row['brand_id'];
        $product_specs=$row['product_specs'];
        $product_sales=$row['product_sales'];
        $model_name=$row['model_name'];
        $brand_name=$row['brand_name'];
        echo " 
        <div class='col-md-3 ms-4 mb-2'>
        <img src='admin_area/product_images/$product_image1' class='releted_images1'>
        <h5 class='product_name ms-3'>$model_name</h5>
        <h5 class='product_name text-danger ms-4'>₹ $product_price.00</h5>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-warning rounded-pill ms-2'>
        <i class='fa-solid fa-cart-circle-check'></i>Add to cart</a>
        </div>
        ";

 }}
}
 }

 //banner for the front page index.php
//banner 1
 function banner1() {
  global $con;
  $select_query="select * from banner";
  $result_query=mysqli_query($con,$select_query);
  while($row_data=mysqli_fetch_assoc($result_query)){
    $product_image1=$row_data['product_image1'];
    $product_image2=$row_data['product_image2'];
    $product_image3=$row_data['product_image3'];
    echo"
    <img src='admin_area/product_images/$product_image1' class='banner_images d-block w-100 ' alt='...'>
    ";
  }
 }
 
 //banner-2
 function banner2() {
  global $con;
  $select_query="select * from banner";
  $result_query=mysqli_query($con,$select_query);
  while($row_data=mysqli_fetch_assoc($result_query)){
    $product_image1=$row_data['product_image1'];
    $product_image2=$row_data['product_image2'];
    $product_image3=$row_data['product_image3'];
    echo"
    <img src='admin_area/product_images/$product_image2' class='banner_images d-block w-100' alt='...'>
    ";
  }
 }

 //banner-3
 function banner3() {
  global $con;
  $select_query="select * from banner";
  $result_query=mysqli_query($con,$select_query);
  while($row_data=mysqli_fetch_assoc($result_query)){
    $product_image1=$row_data['product_image1'];
    $product_image2=$row_data['product_image2'];
    $product_image3=$row_data['product_image3'];
    echo"
    <img src='admin_area/product_images/$product_image3' class='banner_images d-block w-100' alt='...'>
    ";
  }
 }
 

  ?>