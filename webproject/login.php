<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./login.css">
    <title>Login</title>
    <script>
      function myFunction()
      {
        var x = document.getElementById("password");  
                              
        if (x.type === "password") 
        {
          x.type = "text";
        }
         else
          {
          x.type = "password";
        }
      }
      </script>
  </head>
  <body>
    <header>
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
    </header>
    <main>
        <div class="form-container">
            <h2 class="form-head text-center">LOGIN</h2>
        <form method="post" action="login.php">
        <?php
      if(isset($_POST["login"])){
        $gmail=$_POST["gmail"];
        $password=$_POST["password"];
        require_once "database.php";
        $sql="SELECT * FROM users WHERE email='$gmail'";
        $result= mysqli_query($conn,$sql);
        $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($user){
          if(password_verify($password, $user["password"])){
            session_start();
            $_SESSION["user"]="yes";
            header("location: index.php");
            die();
          }
          else{
            echo"<div class='alert alert-danger'>password dose not match </div>";
          }
        }else{
          echo"<div class='alert alert-danger'>gmail dose not match </div>";
        }
          }
           ?>
            <div class="form-group">
                <label class="form-text" for="username">gmail:</label>
                <input type="text" name="gmail" class="form-control" id="username" >
              </div>
              <div class="form-group">
                <label class="form-text" for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
                <input type="checkbox"  style=margin-left:90px;margin-top:15px; onclick="myFunction()"><b class="col" style=color:white;>Show Password</b>
              </div>
              <button type="submit" name="login" class="btn btn-primary btn-block">LOGIN</button>
          </form>
        </div>
    </main>
    <footer>
        <h2 class="text-center footer-text">@copyrights to mani</h2>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>