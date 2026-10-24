<?php

include("config.php");

if(isset($_POST['admin'])){
    $username = $_POST['username'];
    $password=$_POST['password'];


    $hashpass= password_hash($password ,PASSWORD_DEFAULT);


    $sql = "INSERT INTO Account (username , password) VALUES('$username' ,'$hashpass')";

    $results = mysqli_query($connection ,$sql);

    if($results){
        echo "Account Created";
        exit();
    }
    else{
        echo"Failed to create an account";
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text"name="username">
    <input type="password"name="password">
    <button type="submit"name="admin">Send to Db</button>
    </form>
</body>
</html>