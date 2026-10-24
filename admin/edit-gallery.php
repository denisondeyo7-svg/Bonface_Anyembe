<?php

include("config.php");

$select="SELECT * FROM gallery ";

$sql =mysqli_query($connection,$select);

if($sql && mysqli_num_rows($sql)>0){
    $row=mysqli_fetch_assoc($sql);
}


$id = $_GET['my_id'];

if(isset($_POST['editbtn'])){

  $description =$_POST['description'];

  $image =$_FILES['image']['name'];

  $tmp =$_FILES['image']['tmp_name'];

  $folder="gallery/".$image;

  move_uploaded_file($tmp ,$folder);

  if(!move_uploaded_file($tmp ,$folder)){

    $error="<p style='background: rgba(216, 148, 148, 0.51);padding:6px;color: #f00f;font-size: 17px;text-align:center;'>Image upload failed</p>";

  }

  $edit = "UPDATE gallery SET description ='$description', image='$image'WHERE id='$id'";

  $results=mysqli_query($connection ,$edit);

  if($results){
    header("Location: gallery.php");
    exit();
  }

  else{
    echo"something went wrong";
    exit();
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
          <h2>Edit Gallery<i class="fas fa-graduation-cap"></i></h2>

          <?php
        
              if(!empty($error)){
                echo $error;
              }
          
          
            ?>
            
           <img src="gallery/<?php echo $row['image'];?>" id="edit-image"alt="image">

          <div class="input">
            <input type="file" name="image" id="image" required />
          </div>

           <div class="input">
            <textarea name="description" id="message" required /><?php echo $row['description'];?></textarea>
            
          </div>

          <button type="submit" id="loginbtn" name="editbtn">Commit Changes</button>
        </form>
      </div>
    </div>
    
</body>
</html>