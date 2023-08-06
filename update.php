<?php include('connect.php');

if(isset($_POST['update'])){
    $updateid = $_POST['update_id'];
    $updatename = $_POST['update_name'];
    $updateprice = $_POST['update_price'];
    $updateimage = $_FILES['update_image']['name'];
    $updatetempimgage = $_FILES['update_image']['tmp_name'];
    $folder = 'images/'.$updateimage;
    $query = mysqli_query($conn,"update `shop` set name='$updatename',price='$updateprice',image='$updateimage' where id=$updateid");
    if($query){
        move_uploaded_file($updatetempimgage,$folder);
        header('location:view.php?success');
    }else{
        $updatefailmsg = "Fail to update !!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="font-family:monospace">
<?php include('header.php') ?>
<?php 


if(isset($updatefailmsg)){
    echo "<div class='col-2'>
    <div class='ismesg alert alert-danger'>
    <span>$updatefailmsg</span>
    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
</div></div>";
}



?>
<section class="container">

    <?php
    
    if(isset($_GET['update'])){
        $editid = $_GET['update'];
        $query = mysqli_query($conn,"select * from `shop` where id=$editid");
        if(mysqli_num_rows($query)>0){
            $fetch = mysqli_fetch_assoc($query);
            // $row= $fetch['price'];
            // echo $row;
            ?>

<div class="d-flex justify-content-center">
<div class="card col-5 border border-success border-3">
    <div class=" ms-4">
    <form action="" enctype="multipart/form-data" class=" ms-5  "  method="post">
        <img  class="d-block m-3 rounded w-75 " src="images/<?PHP echo $fetch['image'] ?>" alt="">
        <input class="d-block m-3 form-control w-75 border border-3 border-dark" type="hidden" name="update_id" value="<?php echo $fetch['id'] ?>">
        <input class="d-block m-3 form-control w-75 border border-3 border-dark" type="text" required name="update_name"  value="<?php echo $fetch['name'] ?>">
        <input class="d-block m-3 form-control w-75 border border-3 border-dark" type="number" required name="update_price" value="<?php echo $fetch['price'] ?>">
        <input class="d-block m-3 form-control w-75 border border-3 border-dark" type="file" required name="update_image" accept="image/png,image/jpg,image/jpeg"  >
        <button  class="d-block m-3 form-control w-75 btn btn-primary" name="update" type="submit">Update</button>
        <button  class="d-block m-3 form-control w-75 btn btn-danger" name="cancel" type="reset">Cancel</button>
        </form>

    </div>
 </div>
</div>

<?php
        }
    }
    
    ?>


</section>

</body>
 
<script src="https://kit.fontawesome.com/e2397b357b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>