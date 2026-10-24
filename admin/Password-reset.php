<?php
include("config.php");
$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username  = trim($_POST['username']);
    $password = $_POST['new_password']; 

    if (empty($username) || empty($password)) {
        $message = "<p style='background: rgba(216, 148, 148, 0.51);padding:6px;color: red;font-size: 17px;text-align:center;'>Both username and new password are required.</p>";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE account SET password = ? WHERE username = ?";
        $stmt  = mysqli_prepare($connection, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $hashed_password, $username);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $message = "<p style='background: rgba(148, 216, 153, 0.51);padding:6px;color: green;font-size: 17px;text-align:center;'>Password updated successfully!</p>";
            } else {
                $message = "<p style='background: rgba(216, 148, 148, 0.51);padding:6px;color: red;font-size: 17px;text-align:center;'>Account not found or password unchanged.</p>";
            }

            mysqli_stmt_close($stmt);
        } else {
            $message = "<p style='background: rgba(216, 148, 148, 0.51);padding:6px;color: red;font-size: 17px;text-align:center;'>Database error. Please try again later.</p>";
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Password Reset</title>
    <link rel="stylesheet" href="admin.css" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-7.2.0-web/css/all.min.css"
    />
  </head>
  <body>
    <div class="form">
      <div class="form-wrapper">
        <div class="formimage">
          <img
            src="../EkUDtrEetjn_KWMEdN_v6bH66z6qoAUb5-ruR02vtZSr-OaE4av2jkfn0KKOptvXpK9tBS3sqcNkDx4AhSqqZrFZuMfsJIj-jfp4SH3QCBnXeWLgAAPOuhNC9bp5OE_alIYIG2lm_IxIJmIXjKXaqk22SfJd9rixq1SDFwgJbQl2NoptJWwNaG.jpg"
            alt=""
          />
        </div>

        <form action="" method="post">          
          <h2>Password Reset <i class="fas fa-key"></i></h2>

          <?php
           
            if(!empty($message)){
              echo $message;
            }
          ?>

          <div class="input">
            
            <input type="text" name="username" id="username" required />
            <label for="username">Username <i class="fas fa-user"></i></label>
          </div>

          <div class="input">
            <input type="password" name="new_password" id="new_password" required />
            <label for="new_password">Password <i class="fas fa-key"></i></label>
          </div>

          <button type="submit" id="loginbtn" name="loginbtn">Reset Password</button>
        </form>
      </div>
    </div>
  </body>
</html>
