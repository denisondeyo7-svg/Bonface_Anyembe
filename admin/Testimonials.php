<?php

session_start();

include("config.php");

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
}
$username = $_SESSION['username'];


$sql="SELECT * FROM testimonials ORDER BY id DESC";

$result= mysqli_query($connection, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials</title>
    <link rel="stylesheet" href="admin.css" />
    <link
      rel="stylesheet"
      href="../fontawesome-free-7.2.0-web/css/all.min.css"
    />
</head>
<body> 

    <div class="mentors" id="testimonials">
        <div class="message-buttons">
        <a href="index.php">
        <button id="backbtn" title="Go back">
            <i class="fas fa-arrow-left"></i>Go back
        </button>
        </a>

        <a href="AddTestimonial.php">
        <button id="addtestimonialbtn" name="delete"title="Add new">
            Add Testimonials    <i class="fas fa-plus"></i>
        </button>
        </a>
    </div>
            <br /><br /><br />
            <h1>Testimonials</h1>

            <small>What people Say</small>
            <br />
            <div class="mentors_wrapper">
                <?php

                if($result && mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){?>

                        <div class="mentors_card">
                            <div class="mentor-top">
                                <div class="avatar_image_container">
                                    <img src="../reviews/<?php echo $row['image'];?>" alt="Testimonials image" />

                                </div>
                                <a href="delete-testimonial.php?id=<?php echo $row['id'];?>" title="delete">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                            <h3 class="mentor_name"><?php echo $row['firstname'];?>  <?php echo $row['lastname'];?></h3>
                            <small class="role">
                            <?php echo $row['position'];?>
                            </small>
                            <br />
                            <i class="fas fa-quote-left"></i>
                            <p class="comment">
                            <?php echo $row['message'];?>
                            </p>
                            <i class="fas fa-quote-right"></i>

                            
                        </div>
                        
                        <?php
                    }
                    
                }else{
                    echo"No testimonials found in db ,you can add them .";
                    exit();
                }
                ?>
            </div>
        </div>
        </div>
    </div>

<script>
    function refreshMessages() {
        fetch("index.php")
            .then(response => response.text())
            .then(data => {
                document.querySelector(".mentors_wrapper").innerHTML = data;
            })
            .catch(error => console.error("Refresh failed:", error));
    }

    setInterval(refreshMessages, 5000);
</script>
</body>
</html>