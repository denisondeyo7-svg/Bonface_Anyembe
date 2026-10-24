<?php


session_start();

include("config.php");

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
}
$username = $_SESSION['username'];


$sql="SELECT * FROM gallery ORDER BY id DESC";

$result= mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="admin.css" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-7.2.0-web/css/all.min.css"
    />
</head>
<body>
    <div class="messages-wrapper">

      <div class="message-buttons">
        <a href="index.php">
          <button id="backbtn" title="Go back">
            <i class="fas fa-arrow-left"></i>Go back
          </button>
        </a>

        <a href="add-gallery.php">
          <button id="addtestimonialbtn" name="delete"title="Add gallery">
            Add Gallery<i class="fas fa-plus"></i>
          </button>
        </a>
      </div>
      <br><br><br><br>
      <div class="gallery-container">
        <?php
          if($result && mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){?>
              <div class="gallery-image-box">
                  <div class="gallery-image">
                      <img src="gallery/<?php echo $row['image'];?>" alt="image here">
                  </div>
                  <div class="description">
                      <p><?php echo $row['description'];?></p>
                  </div>
                  <div class="actions">
                        <a href="delete-gallery.php?my_id=<?php echo $row['id'];?>"id="delete">
                          Delete this gallery <i class="fas fa-trash"></i>
                      </a>

                      <a href="edit-gallery.php?my_id=<?php echo $row['id'];?>"id="edit">
                        Edit this Post <i class="fas fa-edit"></i>
                      </a>
                  </div>
                  
              </div>
            <?php
            }
          }else{
            echo"You have no gallery";
          }?>
      </div>
    </div>
</body>
</html>