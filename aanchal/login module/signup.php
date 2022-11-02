  <?php

  $showAlert=false;
  $showerror=false; 
if($_SERVER ["REQUEST_METHOD"]=="POST")
  {
    
  include'partials/_dbconnect.php';
  $username=$_POST["username"];
  $password=$_POST["password"];
  $ConfirmPassword=$_POST["ConfirmPassword"];
  $exists=false;
 if(($password==$ConfirmPassword) && $exists==false){
  $sql="INSERT INTO  users (username, password, dt) VALUES ('$username', '$password', current_timestamp())";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    $showAlert=true;
  }
} 
else{
    $showerror="passwords do not match";
}
}   
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Signup</title>
  </head>
  <body>
    <?php require 'partials/_nav.php'?>
    <?php
      if($showAlert)
      {
  
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
';
}

if($showerror)
      {
  
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '.$showerror.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> 
    ';
}
?>
    <div class="container">
      <h1 class="text-center">
        Signup to our WebPage
      </h1>
   <form action="/loginsys/signup.php" method="post">
  <div class="form-group" >
    <label for="username" >username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="password" >password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="ConfirmPassword">ConfirmPassword</label>
    <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword">
  </div>
<button type="submit" class="btn btn-primary">signup</button>
 
  
</form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>