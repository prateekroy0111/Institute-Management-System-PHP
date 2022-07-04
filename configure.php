<?php
    $servername="localhost";
    $db="institute_management_system";
    $dbusername="root";
    $dbpassword="";
    $cont=mysqli_connect($servername,$dbusername,$dbpassword);
    if($cont)
    {
        $db_cont=mysqli_select_db($cont,$db);
    }
    if(!$db_cont)
    {
        die ("Cannot Connect to Database". mysqli_connect_error());
    }
?>