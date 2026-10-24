<?php

include("config.php");

$id = $_GET['id'];
$delete ="DELETE FROM testimonials WHERE id='$id'";

$sql=mysqli_query($connection ,$delete);

if($sql){
    header("Location: Testimonials.php");
    exit();
}
else{
    echo"something went wrong";
    exit();
}


?>