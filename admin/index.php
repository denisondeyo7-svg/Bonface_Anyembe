<?php
session_start();

include("config.php");

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
}
$username = $_SESSION['username'];



$letter = strtoupper(substr($username, 0 , 1));


$sql="SELECT COUNT(*) as total_messages FROM message_tb ";

$result= mysqli_query($connection, $sql);

$total_messages=0;

if($result && mysqli_num_rows($result)>0){

    $row = mysqli_fetch_assoc($result);

    $total_messages = $row['total_messages'];
}

//testimonials

$sql="SELECT COUNT(*) as all_testimonials FROM testimonials ";

$result= mysqli_query($connection, $sql);

$all_testimonials=0;

if($result && mysqli_num_rows($result)>0){

    $row = mysqli_fetch_assoc($result);

    $all_testimonials = $row['all_testimonials'];
}

//gallery
$sql="SELECT COUNT(*) as all_gallery FROM gallery ";

$result= mysqli_query($connection, $sql);

$all_gallery=0;

if($result && mysqli_num_rows($result)>0){

    $row = mysqli_fetch_assoc($result);

    $all_gallery = $row['all_gallery'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
  
    <link
      rel="stylesheet"
      href="../fontawesome-free-7.2.0-web/css/all.min.css"
    />
</head>
<body>

    <div class="admin-container">
       
        <aside class="sidebar">
            <div class="sidebar-brand">
                <i class="fa-solid fa-user-shield"></i>
                <span>AdminPanel</span>
            </div>
            <ul class="sidebar-menu-list">
                <li class="sidebar-item">
                    <a href="index.php">
                        <i class="fa-regular fa-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="messages.php">
                        <i class="fas fa-paper-plane"></i>
                        <span>Messages</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="Testimonials.php">
                        <i class="fa-regular fa-user"></i>
                        <span>Testimonials</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="gallery.php">
                        <i class="fa-solid fa-box"></i>
                        <span>Gallery</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a href="Password-reset.php">
                        <i class="fa-solid fa-gears"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="logout.php">
                        <i class="fa-solid fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>

        <main class="main-content">
           
            <header class="top-navbar">
                <h1>Welcome Back <?php echo $_SESSION['username'] ;?></h1>
                <div class="user-profile">
                    <span class="avatar"><?php echo $letter;?></span>
                </div>
            </header>

       
            <section class="heroes-container">
                <div class="hero-card empty-hero">
                    <div class="topdetails">
                        <small>Messages</small>
                        <h2><i class="fas fa-reply"></i></h2>
                    </div>
                    <div class="number">
                        <?php
                        echo "<h2>$total_messages</h2>";
                        ?>
                    </div>
                </div>

                <div class="hero-card empty-hero">
                    <div class="topdetails">
                        <small>Testimonials</small>
                        <h2><i class="fas fa-graduation-cap"></i></h2>
                    </div>
                    <div class="number">
                        <?php
                        echo "<h2>$all_testimonials</h2>";
                        ?>
                    </div>
                </div>
                
                <div class="hero-card empty-hero">
                    <div class="topdetails">
                        <small>My Gallery</small>
                        <h2><i class="fas fa-user-graduate"></i></h2>
                    </div>
                    <div class="number">
                        <?php
                        echo "<h2>$all_gallery</h2>";
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
    
    <!---<script>
        function Refresh(){
            fetch("index.php")
            .then(response =>response.text())
            .then(data=>{
                document.querySelector(".heroes-container").innerHTML = data;
            })

            .catch(error=>{
                console.log("error:",error);
            })
        }

        setInterval(Refresh, 5000);
    </script>--->
</body>
</html>
