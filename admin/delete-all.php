<?php

include("config.php");

$delete ="DELETE FROM message_tb";

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