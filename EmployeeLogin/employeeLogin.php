<?php 
 
 include("../HeaderMain/headerMain.php"); 
 include("../db.php");

  
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $queryU = mysqli_query($conn, "SELECT username from users WHERE username = '$username'") or die( mysqli_error($GLOBALS['conn']));
        $rowU = mysqli_fetch_array($queryU);
        $resultU = $rowU['username'];
        
        $queryP = mysqli_query($conn, "SELECT password from users WHERE password = '$password'") or die( mysqli_error($GLOBALS['conn']));
        $rowP = mysqli_fetch_array($queryP);
        $resultP = $rowP['password'];

        if(mysqli_num_rows($queryU) != 0 && mysqli_num_rows($queryP))
        {
            if($resultU == $username && $resultP == $password){

            ?> 
            <script> 
                alert("Welcome User!") 
                location.href = '../EmployeeLogin/employeeLogin.php';
            </script> 
            
            <?php
            }

            else{
                ?> <script> alert("Invalid Username/Password") </script> <?php
                //Invalid Login
            }

        } 
        
        else {
            ?> <script> alert("Invalid Username/Password") </script> <?php
            //Invalid Login
        }
    }

     

?>

<html> 
    <link rel= "stylesheet" href="employeeLogin.css"> 
    <body>
        <div class = "modal-dialog text-center">
            <div class = "col-sm-12 main-section">
                <div class = "modal-content">
                    <br>
                    <strong><h3>EMPLOYEE</h3></strong>
                    <div class = "col-12 user-img">

                        <img src = "../img/face.png">
                        

                    </div>

                    <form class = "col-12"  action="employeeLogin.php" method = "post">
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


