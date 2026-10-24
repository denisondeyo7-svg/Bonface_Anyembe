<?php
include("config.php");
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username  = trim($_POST['username']);
    $firstname = trim($_POST['firstname']);
    $lastname  = trim($_POST['lastname']);
    $password  = $_POST['password'];

    if (empty($username) || empty($password)) {
        $message = "<p style='color:red;'>Username and password are required.</p>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $image_name = null;

        if (isset($_FILES["dp"]) && $_FILES["dp"]["error"] == UPLOAD_ERR_OK) {
            $file_tmp   = $_FILES["dp"]["tmp_name"];
            $orig_name  = basename($_FILES["dp"]["name"]);
            $file_ext   = strtolower(pathinfo($orig_name, PATHINFO_EXTENSION));
            
    
            $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];
            
            // Verify MIME type using finfo
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $file_tmp);
            finfo_close($finfo);
            
            $allowed_mimes = ['image/jpeg', 'image/png', 'image/gif'];

            if (!in_array($file_ext, $allowed_exts) || !in_array($mime_type, $allowed_mimes)) {
                $message = "<p style='color:red;'>Invalid file type. Only JPG, PNG, and GIF allowed.</p>";
            } else {
                
                $image_name = bin2hex(random_bytes(16)) . "." . $file_ext;
                $folder = "../dp/" . $image_name;
                
                if (!move_uploaded_file($file_tmp, $folder)) {
                    $message = "<p style='color:red;'>Failed to upload image.</p>";
                    $image_name = null; 
                }
            }
        }

        
        if (empty($message)) {
            
            $check_stmt = mysqli_prepare($connection, "SELECT username FROM account WHERE username = ?");
            mysqli_stmt_bind_param($check_stmt, "s", $username);
            mysqli_stmt_execute($check_stmt);
            mysqli_stmt_store_result($check_stmt);

            if (mysqli_stmt_num_rows($check_stmt) > 0) {
                $message = "<p style='color:red;'>Username is already taken.</p>";
                mysqli_stmt_close($check_stmt);
            } else {
                mysqli_stmt_close($check_stmt);

                // Insert new user
                $insert_query = "INSERT INTO account (username, firstname, lastname, password, dp) VALUES (?, ?, ?, ?, ?)";
                $insert_stmt = mysqli_prepare($connection, $insert_query);
                
               
                mysqli_stmt_bind_param($insert_stmt, "sssss", $username, $firstname, $lastname, $hashed_password, $image_name);
                
                if (mysqli_stmt_execute($insert_stmt)) {
                    header("Location: login.php");
                    exit();
                } else {
                    $message = "<p style='color:red;'>Error saving account. Please try again.</p>";
                }
                mysqli_stmt_close($insert_stmt);
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Register</title>
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

        <form action="" method="post" enctype="multipart/form-data">          
          <h2>Account Creation <i class="fas fa-gear"></i></h2>

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
            <input type="text" name="firstname" id="firstname" required />
            <label for="firstname">Firstname <i class="fas fa-user"></i></label>
          </div>

          <div class="input">
            <input type="text" name="lastname" id="lastname" required />
            <label for="lastname">Lastname <i class="fas fa-user"></i></label>
          </div>

          <div class="input">
            <input type="password" name="password" id="password" required />
            <label for="password">Password <i class="fas fa-key"></i></label>
          </div>

          <div class="input">
              <small>Provide Profile Image</small> <br>

            <input type="file" name="dp" id="dp" required />
          </div>

          <button type="submit" id="loginbtn" name="regbtn">Create Account ?</button>
        </form>
      </div>
    </div>
  </body>
</html>
