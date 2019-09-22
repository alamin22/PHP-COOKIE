<?php

include("connection.php");

/*if(isset($_COOKIE["email"]))
{
 header("location:index.php");
}*/

$message = '';

if(isset($_POST["login"]))
{
  $email=$_POST['email'];
  $password=$_POST['password'];


  $query = "SELECT * FROM login WHERE email=? and password=?";
  $statement = $DB->prepare($query);
  $arr=array($email, $password);
  $statement->execute($arr);
  $result = $statement->fetchAll();
  $count = count( $result);
  echo $count;

  if($count > 0)
  {
   foreach($result as $row)
   {
    if($_POST["password"]==$row["password"])
    {
     setcookie("email", $row["email"], time()+3600);
     header("location:index.php");
    }
    else
    {
     $message = '<div class="alert alert-danger">Wrong Password</div>';
    }
   }
  }

}


?>

<!DOCTYPE html>
<html>
 <head>
  <title>Login With Cookies</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Login With Cookies In PHP</h2>
   <br />
   <div class="panel panel-default">

    <div class="panel-heading">Login Page</div>
    <div class="panel-body">
     <span><?php echo $message; ?></span>
     <form method="post">
      <div class="form-group">
       <label>User Email</label>
       <input type="text" name="email" id="email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="password" id="password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
      </div>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>