<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];
  //select data from the databases
  $select_query="select * from brands where brand_title='$brand_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('$brand_title is already exist , Please Change The Brand')</script>";
  }else{
  $insert_query="insert into brands (brand_title) values ('$brand_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script> alert('$brand_title is added successfully')</script>";
  }
}}
?>
<h1 class="text-center">Insert Brands</h1>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-primary" id="basic-addon1 bg-info"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" placeholder="Insert_Brand" name="brand_title" aria-label="brand" aria-describedby="basic-addon1">
</div>
<div class="input-group w-50 mb-2 m-auto">
<input type="submit" class="form-control bg-success text-light" value="Insert Brand" name="insert_brand" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">
</div>
</form>