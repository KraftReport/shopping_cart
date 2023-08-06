<?php

include('connect.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View product</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="font-family:monospace">

<?php include('header.php') ?>


<div class="container">
<?php 

if(isset($_GET['success'])){
    echo "<div class='col-2'>
    <div class='ismesg alert alert-primary'>
    <span>Updat successfully !</span>
    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
</div></div>";
}

if(isset($_GET['deleted'])){
    echo "<div class='col-2'>
    <div class='ismesg alert alert-danger'>
    <span>Delete success !</span>
    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
</div></div>";
}

 



?>
    <section class="diaplay_products mt-3">
     
          

                <?php
                
                $query= mysqli_query($conn,"select * from `shop`");
                $num=1;
                if(mysqli_num_rows($query)>0){
                    
                    echo " <table class='table table-striped table-bordered table-hover  '>
                            <thead class= 'table-success'>
                          <tr class='bg-success'>
                          <th class >NO</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Action</th>
                          </tr>
                        </thead>";
   
                while ($row= mysqli_fetch_assoc($query)){
                    
                 
             ?>
   

             <tbody>
                <td><?php echo $num ?></<td>
                <td class="d-flex justify-content-center"><img class="   "  style="width: 200px; height: 120px; object-fit: cover;" src="images/<?php echo $row['image'];?>" alt=""></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['price']?></td>
                <td >
                    <a  class="text-danger" href="delete.php?delete=<?php echo $row['id']; ?>" class="deletebtn" onclick="return confirm('Are you sure to delete this product?');"><i class="fas fa-trash"></i></a>
                    <a class="text-success" href="update.php?update=<?php echo $row['id']; ?>" class="editbtn"><i class="fas fa-edit"></i></a>
                </td>
            </tbody>
          
                   
              <?php 
            $num++;
                }


                }else{
                    echo '<h2>Empty!! Add some product ?</h2>';
                }

                ?>
       
        </table>
    </section>
</div>
    
</body>
 
<script src="https://kit.fontawesome.com/e2397b357b.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>