<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.boxicons.com/3.0.6/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <style>
    #btn{
    background-color: transparent;
    border :1px solid aliceblue;
}
</style>
</head>
<body>
   
<?php
session_start();

$conn=mysqli_connect("localhost","root","root","auth_system");
if(!$conn){
die(mysqli_connect_error());

}

if(isset($_POST['login']))

    {
        $email=$_POST['email'];
        $password=$_POST['pass'];

        $query="SELECT * FROM userdata WHERE email='$email' ";
        $result=mysqli_query($conn,$query);

        if(mysqli_num_rows($result) == 1){

        //get userdata as associative arr 
        $user=mysqli_fetch_assoc($result);
        //verify entered pass against hashed pass
        if(password_verify($password,$user['password1'])){
              $_SESSION['username'] = $user['username'];
               //save username in session
        
              $msg="Login successful";
              header("Location:loginsuccess.php");
              



        }else{
             $msg="Incorrect password";

        }
 
    }else{
        $msg="Email not found";
            
    }
}


?>
 
    <div class="container">

        
           <form method="POST" action="login.php">
           
           <div class="inputbox">
            <h1>Login</h1>
            <?php

            if(!empty($msg)){
                echo "<p style='color:aliceblue;  font-weight:5px; text-align:center; margin-bottom:10px;'>$msg</p>";
            }


            ?>
            <div class="data">
                     
                
                    <input type="text" name="email" placeholder="Email"  required>
                    <i class='bxr  bx-user'></i> 
                </div>
            <div class="data">
                
                 
                    <input type="password" name="pass" placeholder="Password" required>
             <i class='bxr  bx-lock-open'></i> 
            </div>
            <button type="submit" name="login" id="btn" >Login</button>

            <div class="registerlink">
                <p>Don't have an account?   <a href="register.php" style="color:whitesmoke">   Register</a></p>

            </div>
            
            </div>
           </form>

    </div>





    
</body>
</html>