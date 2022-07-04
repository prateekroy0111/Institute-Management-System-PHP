<?php
    include 'configure.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
    $id=$_REQUEST['id'];
    if(!isset($id))
    {
        header("Location:manage batch.php");
    }
    $query_display=mysqli_query($cont,"delete from batch_details where id='$id'");
    header("Location:manage batch.php");
?>