<?php
    include 'configure.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
    $id=$_REQUEST['id'];
    if(!isset($id))
    {
        header("Location: manage routine.php");
    }
    $delete_query = mysqli_query($cont,"delete from class_routine WHERE id='$id'"); 
    header("Location: manage routine.php");
?>