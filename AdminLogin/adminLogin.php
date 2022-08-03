<?php 
 
 include("../HeaderMain/headerMain.php"); 
 include("../db.php");
 
    
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "admin" && $password == "password")
        {
            ?> 
            <script> 
                alert("Welcome Admin!") 
                location.href = '../Employee/editEmployee.php';
            </script> 
            
            <?php

        } else {
            ?> <script> alert("Invalid Username/Password") </script> <?php
            //Invalid Login
        }
    }

     

?>

 
<html>
    <link rel= "stylesheet" href="adminLogin.css">  
    <body>
        <div class = "modal-dialog text-center">
            <div class = "col-sm-12 main-section">
                <div class = "modal-content">
                    <br>
                    <strong><h3>ADMIN</h3></strong>
                    <div class = "col-12 user-img">

                        <img src = "../img/face.png">
                        

                    </div>

                    <form class = "col-12"  action="adminLogin.php" method = "post">
                        <div class = "form-group">
                            <input type = "text" class = "form-control" placeholder = "Enter Username" name="username" id="username" required>
                        </div>
                        <div class = "form-group">
                            <input type = "password" class = "form-control" placeholder = "Enter Password" name="password" id="password" required>
                        </div>
                        
                        <button type = "submit" name = "submit" id = "submit" class = "btn"> <i class = "fas fa-sign-in-alt"></i>Login</button>
                        
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>


