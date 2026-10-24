<?php

include("config.php");

$id = $_GET['id'];
$delete ="DELETE FROM message_tb WHERE id='$id'";

$sql=mysqli_query($connection ,$delete);

if($sql){
    header("Location: messages.php");
    exit();
}
else{
    echo"something went wrong";
    exit();
}


?>