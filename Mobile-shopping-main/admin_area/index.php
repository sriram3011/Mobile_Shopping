<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
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
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
<style>
.admin-image {
    object-fit:contain;
    width:100px;   
}
</style>

</head>
<body>
    

<!-- navbars first child -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
        <span><img src="../images/smartphone.png" alt="" class="logo">
        <span class="navbar-brand mb-0 h1" id="name">ZOYA</span></span>
        <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link text-light"><i class="fa-solid fa-user"></i> Welcome Guest</a>
                </li>
            </ul>
        </div>
</nav>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-light p-1">
                <div>
                    <a href="#"><center><img src="../images/man.png" alt="" class="admin-image" id="admin-image"></center></a>
                    <p class="text-dark" id="admin-name">Admin Name</p>
                </div>
                <div class="button text-center">
<button class="btn btn-primary"><a href="insert_product.php" class="nav-link text-light  my-1" id="view"><img src="../images/check-mark.png" alt="" class="check"> Insert Product</a></button>
<button class="btn btn-primary"><a href="" class="nav-link text-light my-1" id="view"><img src="../images/check-mark.png" alt="" class="check">View Product</a></button>
<button class="btn btn-primary"><a href="index.php?insert_catagories" class="nav-link text-light my-1" id="view"><img src="../images/check-mark.png" alt="" class="check">Insert Categories</a></button>    
<button class="btn btn-primary"><a href="" class="nav-link text-light my-1" id="view"><img src="../images/check-mark.png" alt="" class="check">View Catagories</a></button>
<button class="btn btn-primary"><a href="index.php?insert_brands" class="nav-link text-light my-1" id="view"><img src="../images/check-mark.png" alt="" class="check">Insert Brand</a></button>
<button class="btn btn-primary"><a href="" class="nav-link text-light my-1" id="view"><img src="../images/check-mark.png" alt="" class="check">View Brand</a></button>
<button class="btn btn-primary"><a href="" class="nav-link text-light my-1" id="view"><img src="../images/check-mark.png" alt="" class="check">All Order</a></button>
<button class="btn btn-primary"><a href="" class="nav-link text-light my-1" id="view"><img src="../images/check-mark.png" alt="" class="check">All Payment</a></button>
<button class="btn btn-primary"><a href="" class="nav-link text-light my-1" id="view"><img src="../images/check-mark.png" alt="" class="check">List User</a></button>
<button class="btn btn-primary mt-2"><a href="banner.php" class="nav-link text-light my-1" id="view"><img src="../images/check-mark.png" alt="" class="check">Add Banner</a></button>
<button class="btn btn-danger mt-2"><a href="" class="nav-link text-light my-1 " id="view"><img src="../images/logout.png" alt="" class="check">Logout</a></button>
    </div>
            </div>
        </div>
    </div>

    <!--fourth chid-->
    <div class="container my-3">
    <div class="card-body">
        <?php
        if(isset($_GET['insert_catagories'])){
            include('insert_catagories.php');
        }
        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }
        ?>
        </div>
    </div>





<!-- footer section -->
<div class="bg-primary p-3 text-center footer">
    <p class="text-light">All right observed @- Designed by Mohamed Fareedh-2022</p>
</div>

    <!--script link--> 
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>