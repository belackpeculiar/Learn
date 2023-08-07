<?php
  include 'connect.php';
  
  if(isset($_POST['submit'])){
    $name =mysqli_real_escape_string($connect, $_POST['name']);
    $email =mysqli_real_escape_string($connect, $_POST['email']);
    $pass =md5($_POST['password']);
    $cpass =md5($_POST['cpassword']);
    $user_type =$_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password ='$pass' ";
    
    $result = mysqli_query($connect, $select);

    if(mysqli_num_rows ($result) > 0){
        $error[] = 'user already exit';
    }
    else{
        if($pass != $cpass){
            $error[] = 'Password do not match';
        }
        else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUE =('$name','$email','$pass',$user_type)";
            mysqli_query($connect, $insert);
            header("location:login_form.php");
        }
    }
  };
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
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
        <h3 style="font-size: 30px; text-transform:uppercase; margin-bottom:10px;color:#333;">Register now</h3>
        <?php
           if(isset($error)){
            foreach($error as $error){
                echo '<span class="form_btn"> '.$error.'</span>';
            };
           };
        ?>
        <input type="text" name="name" placeholder="Input your name" style="width: 100%; padding: 10px 15px; font-size:17px; margin: 8px 0;border-radius: 5px; background:#eee">
        <input type="email" name="email" placeholder="Input your email"style="width: 100%; padding: 10px 15px; font-size:17px; margin: 8px 0;border-radius: 5px; background:#eee">
        <input type="password" name="password" placeholder="Input your password" style="width: 100%; padding: 10px 15px; font-size:17px;border-radius: 5px; margin: 8px 0; background:#eee">
        <input type="cpassword" name="cpassword" placeholder="check your password" style="width: 100%; padding: 10px 15px; font-size:17px;border-radius: 5px; margin: 8px 0; background:#eee">
        <select name="user_type" style="width: 100%; padding: 10px 15px; font-size:17px; margin: 8px 0; background:#eee; border-radius: 5px;">
            <option value="user" style="background: #fff;">User</option>
            <option value="admin" style="background: #fff;">Admin</option>
        </select>
        <input type="submit" name="submit" value="register now" class="form-btn" style="background-color:pink; color:red;text-transform:capitalize;font-size: 20px; cursor:pointer; width: 100%; padding: 10px 15px; font-size:17px;border-radius: 5px; margin: 8px 0; ">
        <p style="margin-top: 10px; font-size:20px; color:#333;">Already have an account? <a href="login_form.php" style="color: red;"> Login now</a></p>
    </form>
   </div> 
</body>
</html>