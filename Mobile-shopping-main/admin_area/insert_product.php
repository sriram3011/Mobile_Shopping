<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])) {
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_specs=$_POST['product_specs'];
    $product_color=$_POST['product_color'];
    $product_emi=$_POST['product_emi'];
    $product_sales=$_POST['product_sales'];
    $product_categories=$_POST['product_categories'];
    $product_brands=$_POST['product_brands'];
    $product_delivery=$_POST['product_delivery'];
    $product_price=$_POST['product_price'];
    $price_strike=$_POST['price_strike'];
    $product_offer=$_POST['product_offer'];
    $product_about_1=$_POST['product_about_1'];
    $product_about_2=$_POST['product_about_2'];
    $product_about_3=$_POST['product_about_3'];
    $product_about_4=$_POST['product_about_4'];
    $Warranty=$_POST['Warranty'];
    $model_name=$_POST['model_name'];
    $brand_name=$_POST['brand_name'];
    $product_status='true';
    //accessing the images 
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    //accessing images tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    //checking condition
    if($product_title=='' or $description=='' or $product_keywords==''  or $product_categories=='' or $product_brands=='' 
    or $product_delivery=='' or $product_price=='' or $price_strike=='' or $product_image1=='' or $product_image2 =='' or $product_image3 ==''){
        echo "<script>alert('the field is empty,please fill the field')</script>";
        exit();
    }else {
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
    
        //insert query 
        $insert_products="insert into products (product_title,product_description,product_keyword,product_specs,product_color
        ,product_emi,product_sales,category_id,brand_id,product_delivery,product_image1,product_image2,product_image3
        ,product_about_1,product_about_2,product_about_3,product_about_4,model_name,brand_name,product_price,price_strike,product_offer,Warranty,Date,status)
        values ('$product_title','$description','$product_keywords','$product_specs','$product_color','$product_emi','$product_sales','$product_categories','$product_brands','$product_delivery','$product_image1','$product_image2',
        '$product_image3','$product_about_1','$product_about_2','$product_about_3','$product_about_4','$model_name','$brand_name','$product_price','$price_strike','$product_offer','$Warranty',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('the Product is added successful')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <link rel="stylesheet" href="style.css" class="rel">
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
    <style>
        .form-label:after {
    content:"*";
    color: red;
}
    </style>
</head>
<body class="bg-light">
    <div class="container mt-3 border">
        <h1 class="header my-4 bg-secondary m-0 p-3 text-light" id="header">Insert Product</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- product title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="product_title" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter Product description" autocomplete="off" required="required">
            </div>
   
            <!-- keyword-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter Product Keywords" autocomplete="off" required="required">
            </div>

            <!-- Select Storage -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_specs" class="form-label">Storage Varient</label>
                <input type="text" name="product_specs" id="product_specs" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter product storage" autocomplete="off">
            </div>

            <!-- select color -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_color" class="form-label">Product Color</label>
                <input type="text" name="product_color" id="product_color" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter product color" autocomplete="off">
            </div>

        <!-- product sales -->
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_sales" class="form-label">Sales</label>
                <input type="text" name="product_sales" id="product_sales" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter product highlight">
            </div>

            <!--EMI start at -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_emi" class="form-label">EMI Starts At</label>
                <input type="number" name="product_emi" id="product_emi" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter product EMI">
            </div>

            <!-- select category -->
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_categories" class="form-label">Select Categories</label>
            <select name="product_categories" id="" class="form-select bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary">
                <option value="">Select a Category</option>
                <?php
                $select_query="select * from categories";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>

        <!-- brands -->
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="product_brands" class="form-label">Select Brand</label>
            <select name="product_brands" id="" class="form-select bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary">
                <option value="">Select a brand</option>
                <?php
                $select_query="select * from brands";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $brand_title=$row['brand_title'];
                    $brand_id=$row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
        </div>


        <!-- Select Storage -->
        
        <div class="form-outline  w-50 m-auto">
        <label for="Delivery Type" class="form-label">Delivery Type</label>
        <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="product_delivery" id="inlineRadio1" value="Free Delivery is Available">
                <label class="form-check-label" for="inlineRadio1">Free Delivery Available</label>
                </div>
                <div class="form-check form-check-inline mb-4 m-auto">
                <input class="form-check-input" type="radio" name="product_delivery" id="inlineRadio2" value="Free Delivery Not Available">
                <label class="form-check-label" for="inlineRadio2">Free Delivery Not Available</label>
                </div>
            </div>

        <!-- image 1 -->
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
        
        <!-- image 2 -->
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- about the product 1 -->
            <div class="form-floating mb-4 w-50 m-auto">
         <textarea class="form-control" name="product_about_1" placeholder="Leave a comment here" id="floatingTextarea2"></textarea>
     <label for="floatingTextarea2">About the Product 1</label>
                </div>

                            <!-- about the product 2 -->
            <div class="form-floating mb-4 w-50 m-auto">
         <textarea class="form-control" name="product_about_2" placeholder="Leave a comment here" id="floatingTextarea2"></textarea>
     <label for="floatingTextarea2">About the Product 2</label>
                </div>

                            <!-- about the product 3 -->
            <div class="form-floating mb-4 w-50 m-auto">
         <textarea class="form-control" name="product_about_3" placeholder="Leave a comment here" id="floatingTextarea2"></textarea>
     <label for="floatingTextarea2">About the Product 3</label>
                </div>

                            <!-- about the product 1 -->
            <div class="form-floating mb-4 w-50 m-auto">
         <textarea class="form-control" name="product_about_4" placeholder="Leave a comment here" id="floatingTextarea2"></textarea>
     <label for="floatingTextarea2">About the Product 4</label>
                </div>
        
        <!-- Model Name-->
        <div class="form-outline mb-4 w-50 m-auto">
                <label for="model_name" class="form-label">Model Name</label>
                <input type="text" name="model_name" id="model_name" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter Model Name" autocomplete="off" required="required">
            </div>

            <!-- Brand Name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="brand_name" class="form-label">Brand Name</label>
                <input type="text" name="brand_name" id="brand_name" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter Brand Name" autocomplete="off" required="required">
            </div>



            <!-- price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="number" name="product_price" id="product_price" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter Product price" autocomplete="off" required="required">
            </div>
        
            <!-- product strike price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price_strike" class="form-label">Price Strike</label>
                <input type="text" name="price_strike" id="price_strike" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter Product Offer" autocomplete="off" required="required">
            </div> 


            <!-- product offer -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Offer Price</label>
                <input type="text" name="product_offer" id="product_offer" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter Product Offer" autocomplete="off" required="required">
            </div>

            <!-- warranty -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Warranty" class="form-label">Warranty</label>
                <input type="text" name="Warranty" id="Warranty" class="form-control bg-light border border-3 border-top-0 border-end-0 border-start-0 border border-primary" placeholder="Enter Warranty" autocomplete="off" required="required">
            </div>
        
            <!-- submit-->
            <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-primary mb-3 px-3" value="Insert Product">
        </div>

        
        </form>
    </div>
    


   <!--script link--> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>