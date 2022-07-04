<?php
    include 'configure.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
    $id=$_REQUEST['id'];
    if(!isset($id))
    {
        header("Location: manage faculty.php");
    }
    $delete_query = mysqli_query($cont,"delete from faculty_details WHERE id='$id'"); 
    header("Location: manage faculty.php");
?>