<?php

include("config.php");

$id = $_GET['my_id'];
$delete ="DELETE FROM gallery WHERE id='$id'";

$sql=mysqli_query($connection ,$delete);

if($sql){
    header("Location: gallery.php");
    exit();
}
else{
    echo"something went wrong";
    exit();
}


?>