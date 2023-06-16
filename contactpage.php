<?php
$servername="localhost"; 
$username="root"; 
$password="";
$dbname="student management"; 
$conn= new mysqli($servername,$username,$password,$dbname); 
if($conn->connect_error){ 
    die("connection failed:".$conn->connect_error); 
}


$nameErr=$emailErr=$numberErr="";
$name=$email=$number="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    if (empty($_POST['name'])) {
        $nameErr=" Name is required";
    } else{
        $name=$_POST['name'];
    }
    if (!preg_match("/^[a-z A-Z]*$/",$name)) {
        $nameErr="Only alphabets allowed";
    }

    if (empty($_POST['email'])) {
        $emailErr="Email is required";
    } else{
        $email=$_POST['email'];
    }

    if(empty($_POST['number'])){
        $numberErr="Number is required";
    }else {
        $number=$_POST['number'];
        if(!preg_match("/^[0-9]*$/",$number)){
            $numberErr="only Mobile Number is required";
    
        }
        if (strlen($number)!=10) {
            $numberErr= "Number 10 digits only";
        }
    }

    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>geetfashioncontact</title>
    <link rel="website icon" type="png" href="geetlogo2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styleinphp2.css">
    <link rel="stylesheet" href="homepage.css">
</head>
 <body>

    <style>
        .error{
            color: red;
        }

        .insert_sucess{
            background-color: green;
            padding: 3px;
            color: white;
            border-radius: 3px;
        }

        .geetcontact{
            background-image: url(contactimg.jpg);
            width: 100%;
            height: 650px;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .navbar{
            background-color: white;
        }
    </style>

    <div class="geetcontact">

<!-- <img class="geetcontact" src="contactimg.jpg" alt=""> -->

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="http://127.0.0.1:5500/geetfashionhomepage.html">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="http://localhost/php/geetfashionimage/geet_f_contact.php">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://127.0.0.1:5500/about.html" target="_blank">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Fashion</a>
            </li>
            
          </ul>
          <form class="d-flex" role="search">
            <li class="profile">
                <a class="" href="http://127.0.0.1:5500/profile.html" target="_blank"><img src="profilelogo.png" alt="profilelogo" class="profilelogo"></a>
            </li>
            <li class="profile">
                <a class="" href="https://www.instagram.com/govindmahawar8634/" target="_blank"><img src="instagramlogo.jpg" alt="instagramlogo" class="profilelogo"></a>
            </li>
            <li class="profile">
                <a href="https://www.facebook.com/govindmahawar8634" target="_blank"><img src="f.png" alt="facebook" class="profilelogo"></a>
            </li>
            <li class="profile">
            <img src="daynightlogo.png" alt="daynightlogo" class="profilelogo"></a>
            </li>
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>


    <!-- <img class="profileimg" src="contactimg.jpg" alt=""> -->
    <div>
        <div class="contactdiv"><br><br>
            <h1 class="contacthead">CONTACT</h1><hr>
            <p class="contacthead">We'd <span class="conta-heart">&#9825;</span> to help!</p>
            <p class="contacthead">Dear customer. How can we assist you</p>
        </div>

        <div class="divform">
        <form method="POST">

                <input class="fname" name="name" type="text" placeholder="*Full Name" value="<?=isset($_POST['name'])?$_POST['name']:"";?>">
                <span class="error">*<?php echo $nameErr;?></span>
                <br>

                <input type="email"  name="email" placeholder="*Email" value="<?=isset($_POST['email'])?$_POST['email']:"";?>">
                <span class="error">*<?php echo $emailErr;?></span>
                <br>

                <input type="number" name="number" placeholder="number" value="<?=isset($_POST['number'])?$_POST['number']:"";?>">
                <span class="error">*<?php echo $numberErr;?></span>
                <br>

                <input type="submit" value="Send" class="submit">
            </form>


    <?php
    if(empty($nameErr) && empty($emailErr)&& empty($numberErr)){
        if(!empty($_POST)){
            $sql= "INSERT INTO geetfcontact(name,email,number)VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['number']."')"; 
            //    print_r($_POST);die;
            if($conn->query($sql)==true){
                echo'<span class="insert_sucess">Send Successfully</span>'; 
            } else {
                echo "error".$sql.$conn->connect_error; 
            } 
        }
    }
    ?>
    </div>



        <div class="infodiv">
            <p><img class="locationpng" src="locationpng.png" alt="locationpng"><a style="margin-left: 100px;" href="https://www.google.com/maps/place/26%C2%B048'47.6%22N+75%C2%B047'16.7%22E/@26.8132125,75.7873101,18z/data=!3m1!4b1!4m6!3m5!1s0x0:0x85c2ca5189574a2c!7e2!8m2!3d26.813211!4d75.7879758" target="_blank" > 
                &nbsp; Geet Fashion </a></p>
              <p><img class="locationpng" src="callpng.png" alt="callpng"><a style="margin-left: 100px;" href="tel:+919079657643">+919079657643</a></p>
              <p><img class="locationpng" src="emailpng.png" alt="emailpng">
                  <a style="margin-left: 100px;" href="mailto:mahawargovind191@gmail.com">mahawargovind191@gmail.com</a></p>
              </p><hr>
              <div class="info-cont">
              <p><a href="https://www.facebook.com/govindmahawar8634" target="_blank"><img class="facebooklogo" src="f.png" alt="facebooklogo"></a>
              <a href="https://www.linkedin.com/in/govindmahawar8634/" target="_blank"><img class="facebooklogo" src="linkedpng.png" alt="facebooklogo"></a>
              <a href=""><img class="facebooklogo" src="twitterlogo.jpg" alt="twitterlogo"></a>
              <a href=""><img class="facebooklogo" src="googlepng.png" alt="twitterlogo"></a>
              <a href="https://www.instagram.com/govindmahawar8634/" target="_blank"><img class="facebooklogo" src="instagramlogo.jpg" alt="instagramlogo"></a>
              </p>

        <p class="final">Geet fashion is on Thumbtack</p>
        </div>
        </div>
    </div>
    </div>
    
</body>
</html>
