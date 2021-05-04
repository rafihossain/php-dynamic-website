<?php session_start();
    require_once('functions/function.php');
    
    $id = $_GET['d'];
    $del = "delete from web_rafi where id='$id' ";
    if(mysqli_query($con,$del)){
        header('Location:user-all.php?d='.$id);
    }else{
        echo "data not delete";
    }
?>