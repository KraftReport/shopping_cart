<?php 

include('connect.php');
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $folder = 'images/'.$image;

    $query = mysqli_query($conn,"insert into `shop` (name,price,image) values ('$name','$price','$image')")or die('error insert ');
    if( $name!==null && $name!=="" && $price!==null && $price!=="" &&   $image!==null && $image!=="" ){
        move_uploaded_file($temp,$folder);
            
        $ismesg='insert successful';
    }else{



          $iemesg='error insert';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <style>
        body .container section h3{
            margin-left: 450px;
            margin-top: 60px;
        }
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="font-family:monospace">


<?php include('header.php'); ?>



<div class="container">


    <?php 

    if(isset($ismesg)){
        echo "
        <div class='col-2'>
        <div class='ismesg alert alert-primary'>
        <span>$ismesg</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
    </div></div>
       ";
    }

    if(isset($iemesg)){
        echo "<div class='col-2'>
        <div class='ismesg alert alert-danger'>
        <span>$iemesg</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
    </div></div>";
    }

    

    ?>

    <section>
  
        <h3 class="text-success   "><i class="fa-solid fa-cart-plus"></i> Add Products</h3>
        <form action="" class="add_product flex-column mt-3 offset-4 row" method="post" enctype="multipart/form-data">
            <input style="font-family:monospace" name="name" type="text" placeholder="product name"  class="w-50 input_field  my-2  form-control ">
            <input style="font-family:monospace" name="price" type="number" placeholder="product price" class="w-50 input_field  my-2  form-control">
            <input style="font-family:monospace" name="image" type="file" placeholder="product image" accept=" image/png,image/jpg,image/jpeg" class="w-50 input_field  my-2  form-control">
            <input style="font-family:monospace" name="submit" type="submit" class="w-50 bg-success text-light submit_btn  my-2  form-control" value="add product">
        </form>
    </section>
</div>
 
</body>
 
<script src="https://kit.fontawesome.com/e2397b357b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>