<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.boxicons.com/3.0.6/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
  

<?php


$conn=mysqli_connect("localhost","root","root","auth_system");
if(!$conn){
    die(mysqli_connect_error());

}

$msg="";//for success or error msg

if(isset($_POST['submit']))
{
$username=$_POST['username'];
$email=strtolower($_POST['email']);
$password=$_POST['pass'];

$hashed_password=password_hash($password,PASSWORD_DEFAULT);

$check = "SELECT * FROM userdata WHERE email='$email' ";//mistake was quotes"-->

$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) == 0) {
    $query = "INSERT INTO userdata (username, email, password1) VALUES ('$username','$email','$hashed_password')";
        if (mysqli_query($conn, $query)) {
            $msg = "Registration successful! You can now login.";
        } else {
            $msg = "Registration failed!";
        }
        
    } else {
        $msg = "Email already registered!";
    
    }


 



}






?>

  <div class="container">

        
           
            <form method="POST">
           <div class="inputbox">
            <h1>Register New User</h1>
            <?php
              if (!empty($msg)) {
                echo "<p style='color: aliceblue;  font-weight:5px; text-align:center; margin-bottom:10px;'>$msg</p>";
            }
            ?>
         
             <div class="data">
                     
                
                    <input type="text" name="username" placeholder="Username" required><!--required if user click submit without filling then form will not submit and msg is shown please fill-->
                    <i class='bxr  bx-user'></i> 
                </div>
            <div class="data">
                     
                
                    <input type="text" name="email" placeholder="Email" required >
                   <i class='bxr  bx-envelope-open'></i> 
                </div>
            <div class="data">
                
                 
                    <input type="password" name="pass" placeholder="Password" required>
             <i class='bxr  bx-lock-open'></i> 
            </div>
            <div class="btn">
                

            <button  id="submit" type="submit" style="background:transparent"  name="submit">Submit</button>
               
            <button type="reset" id="reset" style="background:transparent">Reset</button>
             
             </div>

             <div>
                
               <a href="login.php" id="loginnowbtn">Login Now</a>
            
                </div>
               
            
            
            
            </div>
           </form>

    </div>

</body>
</html>