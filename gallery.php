<?php


include("admin/config.php");


$sql="SELECT * FROM gallery ORDER BY id DESC";

$result= mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="fontawesome-free-7.2.0-web/css/all.min.css"
    />
</head>
<body>
    <div class="messages-wrapper">
<h1 style='color: #000;'>My Gallery</h1>
    <button id="backbtn" onClick='history.back()'><i class="fas fa-undo"></i>Go back</button>
      
      <br><br>
      <div class="gallery-container">
        <?php
          if($result && mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){?>
              <div class="gallery-image-box">
                  <div class="gallery-image">
                      <img src="admin/gallery/<?php echo $row['image'];?>" alt="image here">
                  </div>
                  <div class="description">
                      <p><?php echo $row['description'];?></p>
                  </div>
                  
                  
              </div>
            <?php
            }
          }else{
            echo"You have no gallery";
          }?>
      </div>
      <br><br>
      <footer>
          <br /><br />
          <p>You can find me by clicking the following channels:</p>
          <div class="socials-contacts">
            <a href="https://www.facebook.com/Bonface-Anyembe/" target="_blank"
              ><i class="fab fa-facebook"></i
            ></a>
            <a href="https://wa.me/254717242345?text=hello%20Bonface%20can%20we%20discuss%20something%20%3F" target="_blank"
             target="_blank"><i class="fab fa-whatsapp"></i
            ></a>
            <a href="https://www.instagram.com/anyembe2002" target="_blank"
              ><i class="fab fa-instagram"></i
            ></a>

            <a href="https://x.com/sawangabon" target="_blank"
              ><i class="fab fa-x-twitter"></i
            ></a>

            <a href="tel:+254717242345"><i class="fas fa-phone"></i></a>
          </div>

          <div class="mainfooter">
            <div class="advice">
              <h2>Legal Advice</h2>
              <p>
                Explore essential areas of Kenyan law and understand your
                rights, responsibilities, and available legal remedies. Our goal
                is to make legal information accessible, promote awareness, and
                empower individuals to make informed decisions.
              </p>
            </div>
            <div class="links">
              <h2>Quick Links</h2>
              <nav>
                <a href="#home">Home </a>
                <a href="#about">About </a>
                <a href="#testimonials">Testimonials </a>
                <a href="#services">Services </a>
                <a href="#Contact">Contact </a>
                <a href="gallery.php">Gallery </a>
                <a href="#Contact">Contact </a>
                <a href="admin/login.php">Admin Login </a>
              </nav>
            </div>

            <div class="mission">
              <h2>Mission</h2>
              <p>
                To pursue excellence in legal education and develop the
                knowledge, integrity, and advocacy skills necessary to promote
                justice, protect human rights, uphold the rule of law, and use
                legal knowledge to create meaningful and positive change in
                society.
              </p>
            </div>

            <div class="vision">
              <h2>Vision</h2>
              <p>
                To become an ethical and competent legal professional committed
                to protecting rights, promoting justice, and serving society
                through the law.
              </p>
            </div>
          </div>

          <div class="subfooter">
            <small>&copy Bonface Anyembe | All rights reserved</small>
          </div>
        </footer>
    </div>
</body>
</html>