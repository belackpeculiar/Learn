<?php
  include 'connect.php';

  session_start();
  
  if(isset($_POST['submit'])){
    $email =mysqli_real_escape_string($connect, $_POST['email']);
    $pass =md5($_POST['password']);

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="form-container">
    <form action="" method="post">
        <h1>Login now</h1>
        <?php
           if(isset($error)){
            foreach($error as $error){
                echo '<span class="form_btn"> '.$error.'</span>';
            };
           };
        ?>
        <input type="email" name="email" placeholder="Input your email">
        <input type="password" name="password" placeholder="Input your password">
        <input type="submit" name="submit" value="Login now" class="form-btn">
        <p>Don't have an account? <a href="register_form.php">Regiter Now</a></p>
    </form>
   </div> 
</body>
</html>