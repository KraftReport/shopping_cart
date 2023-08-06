<?php
include('connect.php');

if(isset($_GET['delete'])){
    $deleteid = $_GET['delete'];
    $query = mysqli_query($conn,"delete from `shop` where id=$deleteid")or die('error fail to delete');
    if($query){
        header('location:view.php?deleted');
    }else{
        echo "error fail to delete";
        header('location:view.php');
    }
}

?>