<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $message=$_POST['message'];
    $sql="INSERT INTO `contact`( `name`, `email`, `phone.no`, `message`) VALUES ('$name','$email','$mobile','$message')";
    $result= mysqli_query($con,$sql);
    if($result){
        //echo"data insert succesfully";
         header('location:contact.php');
    }else{
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <title>Contact us</title>
  </head>
  <body>
    <section class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white"> 
      <div class="container-fluid">
       <a class="navbar-brand" href="#"><img src="travelcults.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
       </button> 
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
             <li class="nav-item">
               <a class="nav-link" href="index.php">Home</a>
              </li>
             <li class="nav-item">
                    <a class="nav-link" href="packages.php">packages</a> 
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="themes.php">Themes</a> 
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About us</a> 
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">contact us</a> 
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" ia-expanded="false">
                      welcomes user
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="login.php">Log in</a></li>
                      <li><a class="dropdown-item" href="signup.php">sign up</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <h1>CONTACT US</h1>
      </section>
 <!----------contact us-------------------->
    <section class="location">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15546.961862295115!2d80.2026470695335!3d13.052185106275784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5266bf5a08c45f%3A0x9478e1cd7e7f1723!2sVadapalani%2C%20Chennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1676180889070!5m2!1sen!2sin" width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </section>

      <section class="contact-us">

        <div class="row">
          <div class="contact-col">
            <div>
              <i class="fa fa-home"></i>
              <span>
                <h5>Metro Road, ABC Building</h5>
                <p>Chennai, Tamilnadu, India </p>
             </span>
        </div>
        <div>
              <i class="fa fa-phone"></i>
              <span>
                <h5>+91 9360403494</h5>
                <p>Monday To Saturday 10AM TO 6PM</p>
             </span>
        </div>
        <div>
              <i class="fa fa-envelope"></i>
              <span>
                <h5>info@travelcults.com</h5>
                <p>Email Us Your Query </p>
             </span>
        </div>
      </div>
      <div class="contact-col">
        <form action="contact.php" method="post">
          <input type="text" placeholder="Enter your name" required name="name">
          <input type="email" placeholder="Enter Email Address" required name="email">
          <input type="text" placeholder="Enter phone no" required name="mobile">
          <textarea rows="8" placeholder="Message" required name="message"></textarea>
          <button type="submit" class="hero-btn red-btn" name="submit">submit</button>
          <button type="cancal" class="hero-btn red-btn">cancal</button>
          <button type="update" class="hero-btn red-btn">update</button>
        </form>
      </div>
     </div>

    </section>

    
       


       
      





























  </body>
</html>