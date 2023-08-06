<?php

include('connect.php');
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="font-family:monospace">

<?php include('header.php') ?>

<div class="container">
    <section class="products">
    <h1 class="text-success   ">  Let's shop </h1>
        <!-- <h1>Let's shop</h1> -->


    <div class="card" style="width: 15rem;">
  <div class="card-body">
  <form action="" method="post" class="d-flex justify-content-center">
    <div class="pro_container d-flex">
            <div class="edit-form">
            <img src="images/download (3).jpg" alt="">
            <h3>Pizza</h3>
            <div class="price">1000</div>
            <input type="hidden" name="name">
            <input type="hidden" name="price">
            <input type="hidden" name="image">
            <input type="submit" class="btn btn-success" name="add" value="Add to cart"> <i class="fa-solid fa-plus  text-danger"></i>
            </div>
        </div>
    </form>
  </div>
</div>
    </section>
</div>
    
</body>
<script src="https://kit.fontawesome.com/e2397b357b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>