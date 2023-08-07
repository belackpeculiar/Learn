<?php
  @include 'connect.php';
  session_start();

  if(!isset( $_SESSION["admin_name"])){
    header("location:login_form.php");
  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amin_page</title>
    <style>
        *{
      font-family: sans-serif;
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
      outline: none;
      border: none;
      text-decoration: none;}
    </style>
</head>
<body>
    <div class="container" style="min-height: 100vh;display: flex;align-items: center;justify-content: center;padding: 20px;padding-bottom: 60px;">
        <div class="content" style="text-align: center;">
            <h3 style="font-size: 30px;color: #333;">Hi,<span style="background-color: red; color: #fff; border-radius: 5px; padding: 8px; ">admin</span></h3>
            <h1 style="font-size: 50px; color:#333; ">Welcome  <span style="color: red;"><?php echo   $_SESSION['admin_name']?></span></h1>
            <p style="font-size: 25px; margin-bottom:20px">This is the admin page</p>
            <a href="login_form.php" class="btn" style="display: inline-block;padding:10px; font-size:20px; background:#333; color:#fff; margin:5px;">Login</a>
            <a href="register_form.php" class="btn" style="display: inline-block;padding:10px; font-size:20px; background:#333; color:#fff; margin:5px;">Register</a>
            <a href="logout.php" class="btn" style="display: inline-block;padding:10px; font-size:20px; background:#333; color:#fff; margin:5px;">Logout</a>
        </div>
    </div>

</body>
</html>