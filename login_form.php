<?php
  include 'connect.php';

  session_start();
  
  if(isset($_POST['submit'])){
    $email =mysqli_real_escape_string($connect, $_POST['email']);
    $pass =($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password ='$pass' ";
    
    $result = mysqli_query($connect, $select);

    if(mysqli_num_rows ($result) > 0){
      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
        $_SESSION['admin_name'] = $row['name'];
        header("location:admin_page.php");
      }
      elseif($row['user_type'] == 'user')
      {
        $_SESSION['user_name'] = $row['name'];
        header("location:user.php");
      }
      else{
        $error[] = 'Incorrect email or password';
        echo 'Incorrect email or password';
      }
    }
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
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
   <div class="form-container" style="min-height: 100vh;display: flex;align-items: center;justify-content: center;padding: 20px;padding-bottom: 60px; background:#eee;">
    <form action="" method="post" style="width:500px; padding: 20px; border-radius: 5px; box-shadow:0 5px 10px rgba(0,0,0,.1);background:#fff; text-align:center;">
        <h3 style="font-size: 30px; text-transform:uppercase; margin-bottom:10px;color:#333;">Login now</h3>
        <?php
           if(isset($error)){
            foreach($error as $error){
                echo '<span class="form_btn"> '.$error.'</span>';
            };
           };
        ?>
        <input type="email" name="email" placeholder="Input your email"style="width: 100%; padding: 10px 15px; font-size:17px; margin: 8px 0;border-radius: 5px; background:#eee">
        <input type="password" name="password" placeholder="Input your password" style="width: 100%; padding: 10px 15px; font-size:17px;border-radius: 5px; margin: 8px 0; background:#eee">
        <input type="submit" name="submit" value="Login now" class="form-btn" style="background-color:pink; color:red;text-transform:capitalize;font-size: 20px; cursor:pointer; width: 100%; padding: 10px 15px; font-size:17px;border-radius: 5px; margin: 8px 0; ">
        <p style="margin-top: 10px; font-size:20px; color:#333;">Don't have an account? <a href="register_form.php" style="color: red;"> Regiter now</a></p>
    </form>
   </div> 
</body>
</html>