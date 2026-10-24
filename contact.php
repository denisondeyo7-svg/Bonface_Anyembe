<?php

include("admin/config.php");

$message = "";

$error = "";


if($_SERVER['REQUEST_METHOD'] =="POST"){

  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $number=$_POST['number'];
  $message=$_POST['message'];


  $Sql = "INSERT INTO message_tb (firstname,lastname,number,message)
          VALUES('$firstname','$lastname','$number','$message')";


  $result = mysqli_query($connection , $Sql);

  if(!$result){
    $error = "<p style='border-radius: 10px;background: #fff;padding:10px;color: #f00f;font-size: 18px;'>Something went wrong</p>";
  }
  else{
    $message="<p style='border-radius: 10px;background: #fff;padding:10px;color: rgb(6, 102, 19);font-size: 18px;'>$firstname , your message has been sent successfully</p>";
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seek</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="fontawesome-free-7.2.0-web/css/all.min.css" />
  </head>
  <body>
    <div class="contact" id="Contact">
      <br /><br />
      <h1>Want Legal Advice/Guidance ?</h1>
      <div class="contact-container">
        <div class="contact-card">
          <small>Looking for something special ?:</small>
          <div class="details">
            <p>
              Email :
              <a href="mailto:anyembe2002@gmail.com"
                ><i class="fas fa-envelope"></i
              ></a>
            </p>
          </div>
          <div class="social-links">
            <p>You can find me by clicking the following channels:</p>
            <div class="socials-contacts">
              <a
                href="https://www.facebook.com/Bonface-Anyembe/"
                target="_blank"
                ><i class="fab fa-facebook"></i
              ></a>
              <a
                href="https://wa.me/254717242345?text=hello%20Bonface%20can%20we%20discuss%20something%20%3F"
                target="_blank"
                ><i class="fab fa-whatsapp"></i
              ></a>
              <a href="https://www.instagram.com/anyembe2002" target="_blank"
                ><i class="fab fa-instagram"></i
              ></a>

              <a href="https://x.com/sawangabon" target="_blank"
                ><i class="fab fa-x-twitter"></i
              ></a>

              <a href="tel:+254717242345"><i class="fas fa-phone"></i></a>
            </div>
          </div>
        </div>

        <div class="form">
          <h2>Send your Message</h2>

          <form action="" method="post">
            <?php
              if(!empty($message)){
                echo $message;
              }
              if(!empty($error)){
                echo $error;
              }
            ?>
            <div class="input">
              <label for="firstname">Firstname</label>
              <input type="text" name="firstname" id="firstname" required />
            </div>

            <div class="input">
              <label for="lastname">Lastname</label>
              <input type="text" name="lastname" id="lastname" required />
            </div>

            <div class="input">
              <label for="number">Number</label>
              <input type="tel" name="number" id="number" required />
            </div>

            <div class="input">
              <label for="message">Message</label>
              <textarea name="message" id="message" required></textarea>
            </div>

            <div class="agree">
              <input type="checkbox" name="check" id="check" required />
              <p>
                I agree that my details wil be used only to respond to this
                inquiry. No information is shared with third parties
              </p>
            </div>

            <button type="submit">
              Send Message <i class="fas fa-paper-plane"></i>
            </button>
          </form>
        </div>
      </div>

      <br /><br />
      <footer>
        <br />
        <p>You can find me by clicking the following channels:</p>
        <div class="socials-contacts">
          <a href="https://www.facebook.com/Bonface-Anyembe/" target="_blank"
            ><i class="fab fa-facebook"></i
          ></a>
          <a
            href="https://wa.me/254717242345?text=hello%20Bonface%20can%20we%20discuss%20something%20%3F"
            target="_blank"
            ><i class="fab fa-whatsapp"></i
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
              Explore essential areas of Kenyan law and understand your rights,
              responsibilities, and available legal remedies. Our goal is to
              make legal information accessible, promote awareness, and empower
              individuals to make informed decisions.
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
              To pursue excellence in legal education and develop the knowledge,
              integrity, and advocacy skills necessary to promote justice,
              protect human rights, uphold the rule of law, and use legal
              knowledge to create meaningful and positive change in society.
            </p>
          </div>

          <div class="vision">
            <h2>Vision</h2>
            <p>
              To become an ethical and competent legal professional committed to
              protecting rights, promoting justice, and serving society through
              the law.
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
