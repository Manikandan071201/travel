<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./login.css">
    <title>signup</title>
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
          <?php
          if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordreenter = $_POST["repassword"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if(empty($username) OR empty($email) OR empty($password) OR empty($passwordreenter)) {
              array_push($errors,"All fields are required");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              array_push($errors, "Email is not vaild");
            }
            if(strlen($password)<8) {
              array_push($errors, "password must be at least 8 charactes long"); 
            }
            if($password!==$passwordreenter) {
              array_push($errors, "password does not match");
            }
            require_once "database.php";
            $sql ="SELECT *FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount>0) {
              array_push($errors,"email already exists!");
            }
            if(count($errors)>0) {
              foreach($errors as $error) {
                echo"<div class='alert alert-danger'>$error</div>";
              }
            }else{
            
              $sql ="INSERT INTO users(name,email, password) values ( ?, ?, ? )";
              $stmt = mysqli_stmt_init($conn);
              $preparestmt = mysqli_stmt_prepare($stmt,$sql);
              if($preparestmt) {
                mysqli_stmt_bind_param($stmt,"sss",$username,$email,$passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully</div>";
                header("location: login.php");
              }else{
                die("something went wrong");
              }
            }
          }
          ?>
            <h2 class="form-head text-center">SIGN UP</h2>
        <form action="signup.php" method="post">
            <div class="form-group">
                <label class="form-text" for="username">Username:</label>
                <input type="text" class="form-control"name="username" id="username">
              </div>
              <div class="form-group">
                <label class="form-text" for="username">gmail:</label>
                <input type="text" class="form-control" name="email" id="username">
              </div>
              <div class="form-group">
                <label class="form-text" for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>
              <div class="form-group">
                <label class="form-text" for="password"> re enter Password:</label>
                <input type="password" class="form-control" name="repassword" id="password">
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="submit">SIGNUP</button>
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