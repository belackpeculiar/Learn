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
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="form-container">
    <form action="" method="post">
        <h1>Register now</h1>
        <?php
           if(isset($error)){
            foreach($error as $error){
                echo '<span class="form_error"> '.$error.'</span>';
            };
           };
        ?>
        <input type="text" name="name" placeholder="Input your name">
        <input type="email" name="email" placeholder="Input your email">
        <input type="password" name="password" placeholder="Input your password">
        <input type="cpassword" name="cpassword" placeholder="check your password">
        <select name="user_type">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" name="submit" value="register now" class="form-btn" style="background-color:pink; color:red;text-transform:capitalize;font-size: 20px; cursor:pointer; width: 100%; padding: 10px 15px; font-size:17px;border-radius: 5px; margin: 8px 0; ">
        <p>Already have an account? <a href="login_form.php"> Login Now</a></p>
    </form>
   </div> 
</body>
</html>