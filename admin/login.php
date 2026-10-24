<?php
session_start();

include("config.php");

$error = "";

if (isset($_POST['loginbtn'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "<p style='background: rgba(216, 148, 148, 0.51);padding:6px;color: #f00f;font-size: 17px;text-align:center;'>Please enter both username and password.</p>";
    } else {
        
        $stmt = mysqli_prepare($connection, "SELECT username, password FROM Account WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

           
            if (password_verify($password, $row['password'])) {
                
            
                session_regenerate_id(true);

                $_SESSION['username'] = $row['username'];
                header("Location: index.php");
                exit(); 
            }
        }

       
        $error = "<p style='background: rgba(216, 148, 148, 0.51);padding:6px;color: #f00f;font-size: 17px;text-align:center;'>Invalid username or password.</p>";
        
        mysqli_stmt_close($stmt);
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | login</title>
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
          <h2>Admin Login <i class="fas fa-gear"></i></h2>

          <?php
            
              if(!empty($error)){
                echo $error;
              }
          
          
            ?>
          
          <div class="input">
            <input type="text" name="username" id="username" required />
            <label for="username">Username <i class="fas fa-user"></i></label>
          </div>

          <div class="input">
            <input type="password" name="password" id="password" required />
            <label for="password">Password <i class="fas fa-key"></i></label>
          </div>

          <div class="forgot-remember">
            <a href="Password-reset.php">Forgot password?</a>
            <a href="Register.php">No account?</a>
          </div>

          <button type="submit" id="loginbtn" name="loginbtn">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
