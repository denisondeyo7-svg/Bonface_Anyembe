<?php

session_start();

include("config.php");

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
}
$username = $_SESSION['username'];


$sql="SELECT * FROM message_tb  ORDER BY id DESC";

$result= mysqli_query($connection, $sql);









?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Messages</title>
    <link rel="stylesheet" href="admin.css" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-7.2.0-web/css/all.min.css"
    />
  </head>
  <body>
    <div class="messages-wrapper">
      <h1>Messages</h1>
      <div class="message-buttons">
        <a href="index.php">
          <button id="backbtn" title="Go back">
            <i class="fas fa-arrow-left"></i>Go back
          </button>
        </a>

        <a href="delete-all.php">
          <button id="backbtn" name="delete"title="Delete all">
            Delete all<i class="fas fa-trash"></i>
          </button>
        </a>
      </div>
<br><br><br>
      <?php
        if($result && mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){?>
            <?php
              $letter1= strtoupper(substr($row['firstname'],0,1));
              $letter2= strtoupper(substr($row['lastname'],0,1));
            ?>

            <div class="message-card">
              <div class="message-avatar"><?php echo $letter1;?><?php echo $letter2;?></div>
              <div class="message-body">
                <div class="message-header">
                  <span class="message-sender"><?php echo $row['firstname'];?><?php echo $row['lastname'];?></span>
                  <span class="message-time"><?php echo $row['time'];?></span>
                </div>
                <p class="message-text">
                  <?php echo $row['message'];?>
                </p>
              </div>

              <a href="deletemessage.php?id=<?php echo $row['id'];?>">
                <button class="message-delete-btn" title="Delete message">
                  <i class="fas fa-times"></i>
                </button>
              </a>
            </div>
          
        
        
        
          <?php
          }
        }else{
          echo"You have no messages from database";
        }
      ?>
      
    </div>


    <script>
    function refreshMessages() {
        fetch("messages.php")
            .then(response => response.text())
            .then(data => {
                document.querySelector(".messages-wrapper").innerHTML = data;
            })
            .catch(error => console.error("Refresh failed:", error));
    }

    setInterval(refreshMessages, 5000);
</script>
</body>
</html>
