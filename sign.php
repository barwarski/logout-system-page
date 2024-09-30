<!-- 29:07-->
<!--Bootstrap um Front-End zu vereinfachen oder für nicht experten  --> 
<?php // action methhod post
  $succes = 0;
  $user = 0;

  if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = $_POST['input-username'];
    $password = $_POST['input-password'];

    // if no password submitted then no save in the datrabsae 
    if($password==""){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>password please!</strong> no password submitted.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }else{
      $sql="SELECT * FROM `registration` WHERE username='$username'";
      $result=mysqli_query(mysql: $con,query: $sql); //true= user existiert schon, false=neuer user erstellt in der datenbank
      if($result){
        $num=mysqli_num_rows($result);
        if($num> 0){
          //echo"User already exists";
          $user = 1;
        }else{
            $sql = "INSERT INTO `registration` (username,password) VALUES ('$username','$password') ";
            // push/insert all to database
            $result = mysqli_query($con, $sql);

            if($result){
              //echo "Sign up successfully";
              $succes=1;
            }else{
              die(mysqli_error($con));
            }
        }
      }
    }
  }
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

<?php
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oh no sorry!</strong> User already exists.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
?>
<?php
  if($succes){
    echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Succesfully signed up!</h4>
  <p>cool!</p>
  <hr>
  <p class="mb-0">start.</p>
</div>';
  }
?>

    <h1 class="text-center p-1"> Sign up page</h1>
    <div class="container mt-5"> <!-- mt-5 is a bootstrap class-->
<!--template https://getbootstrap.com/docs/4.3/components/forms/ -->
      <form action="sign.php" method="post">
        <div class="form-group p-2">
            <label for="exampleInputEmail1">User name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter User" name="input-username">
        </div>
        <div class="form-group p-2">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" name="input-password">
        </div>
        <button type="submit" class="btn btn-primary w-100 p-1">Sign up</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>