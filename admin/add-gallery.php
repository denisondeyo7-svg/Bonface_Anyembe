<?php

include("config.php");

$error="";

if(isset($_POST['Addbtn'])){
  $description =$_POST['description'];

  $image =$_FILES['image']['name'];

  $tmp =$_FILES['image']['tmp_name'];

  $folder="gallery/".$image;

  move_uploaded_file($tmp ,$folder);

  if(!move_uploaded_file($tmp ,$folder)){

    $error="<p style='background: rgba(216, 148, 148, 0.51);padding:6px;color: #f00f;font-size: 17px;text-align:center;'>Image upload failed</p>";

  }

  $add_to_db = "INSERT INTO gallery (image,description) VALUES
            ('$image','$description')";

  $result = mysqli_query($connection , $add_to_db);

  if($result){

    header("Location: gallery.php");

    exit();
    }
    else{
      $error="<p style='background: rgba(216, 148, 148, 0.51);padding:6px;color: #f00f;font-size: 17px;text-align:center;'>Something went wrong</p>";
    }
  
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gallery</title>
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

        <form action="" method="post"enctype="multipart/form-data">          
          <h2>Add Gallery<i class="fas fa-graduation-cap"></i></h2>

          <?php
        
              if(!empty($error)){
                echo $error;
              }
          
          
            ?>      


          <div class="input">
            <input type="file" name="image" id="image" required />
          </div>

           <div class="input">
            <textarea name="description" id="message" required /></textarea>
            <label for="description">Description <i class="fas fa-pen"></i></label>
          </div>

          <button type="submit" id="loginbtn" name="Addbtn">Add Gallery</button>
        </form>
      </div>
    </div>
    
</body>
</html>