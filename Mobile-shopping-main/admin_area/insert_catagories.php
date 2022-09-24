<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title=$_POST['cat_title'];
  //select data from the databases
  $select_query="select * from categories where category_title='$category_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('$category_title is already exist , Please Change The Category')</script>";
  }else{
  $insert_query="insert into categories (category_title) values ('$category_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script> alert('$category_title is added successfully')</script>";
  }
}}
?>

<h1 class="text-center">Insert Categories</h1>
<form action="" method="post" class="mb-0">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-primary" id="basic-addon1 bg-info"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert_catagories" name="cat_title" aria-label="categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-50 mb-2 m-auto ">
<input type="submit" class="form-control bg-success text-light" value="Insert Categories" name="insert_cat" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">
</div>
</form>