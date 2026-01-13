<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://cdn.boxicons.com/3.0.6/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        
           <form method="POST">
           
           <div class="inputbox">
            <h1 style>You have successfully login<br>
                
                 Welcome to Dashboard<br>
                
            </h1>
             
            <button type="submit" name="logout" id="btn"  style="background-color:transparent ">Logout</button>
            
            </button>
            
            
            </div>
           </form>

    </div>
    </body>
</html>


<?php

session_start();

$logout=$_SESSION['logout'];

if(isset($logout)){
    session_unset();
    session_destroy();


header("Location:login.php");// to redirect to new php page
exit();//this will make out of webpage blank browser


}





?>
