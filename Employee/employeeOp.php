<?php
 require_once("../db.php");

//add Name data
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    updateData();
}

if(isset($_POST['delete'])){
    deleteData();
}



function createData(){
    $EmployeeID = textboxValue("EmployeeID");
    $Name = textboxValue("Name"); 
    $Address = textboxValue("Address"); 
    $Age = textboxValue("Age");
    $UserID = textboxValue("UserID");
    $username = textboxValue("username");
    $password = textboxValue("password");
    $Department = textboxValue("department");
    

    $resultDI  = mysqli_query($GLOBALS['conn'], "SELECT DepartmentID FROM department WHERE Department = '$Department'") or die( mysqli_error($GLOBALS['conn']));;
    $row = mysqli_fetch_assoc($resultDI);
    $DepartmentID = $row['DepartmentID'];
    

    if($EmployeeID && $Name && $Address && $Age && $UserID && $Department && $DepartmentID && $username && $password){

        $sql = "insert into employees(EmployeeID, Name, Address, Age, UserID, ScheduleID, FingerprintID, AttendanceID, DepartmentID, Status) 
                values('$EmployeeID','$Name','$Address','$Age','$UserID','','','','$DepartmentID','')";    
                
        $sql1 = "insert into users(UserID, username, password) values('$UserID', '$username', '$password')";
    
        if(mysqli_query($GLOBALS['conn'], $sql)){
            if(mysqli_query($GLOBALS['conn'], $sql1)){  
                ?> 
                <script> 
                    alert("Employee Data Enrolled!")
                </script>              
                <?php
                header("Refresh:0; url=editEmployee.php");
            }
        }
        else
        {
            echo "Error: " . $sql . $GLOBALS['conn']->error;
        }
    }
    else{
        ?> 
        <script> 
            alert("Fields can't be empty!")
        </script>              
        <?php
    }

}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['conn'], trim($_POST[$value]));

    if(empty($textbox)){
        return false;
    }
    else{
        return $textbox;
    }
}

function updateData(){
    $EmployeeID = textboxValue("EmployeeID");
    $Name = textboxValue("Name"); 
    $Address = textboxValue("Address"); 
    $Age = textboxValue("Age");
    $UserID = textboxValue("UserID");
    $username = textboxValue("username");
    $password = textboxValue("password");
    $Department = textboxValue("department");   

    $resultDI  = mysqli_query($GLOBALS['conn'], "SELECT DepartmentID FROM department WHERE Department = '$Department'") or die( mysqli_error($GLOBALS['conn']));;
    $row = mysqli_fetch_assoc($resultDI);
    $DepartmentID = $row['DepartmentID'];

    if($EmployeeID && $Name && $Address && $Age && $UserID && $Department && $DepartmentID && $username && $password){
        //EmployeeID, Name, Address, Age, UserID, ScheduleID, FingerprintID, AttendanceID, DepartmentID
            $sql = "UPDATE employees 
                    SET Name ='$Name', Address ='$Address', Age ='$Age', DepartmentID = '$DepartmentID' 
                    WHERE EmployeeID = '$EmployeeID' OR UserID = '$UserID'";

            $sql1 = "update users 
                    set UserID = '$UserID', username = '$username', password = '$password' 
                    where UserID = '$UserID'";

            if(mysqli_query($GLOBALS['conn'], $sql) or die( mysqli_error($GLOBALS['conn']))){
                if(mysqli_query($GLOBALS['conn'], $sql1) or die( mysqli_error($GLOBALS['conn']))){
                    ?> 
                    <script> 
                        alert("Employee Data Updated!")
                    </script>              
                    <?php
                    header("Refresh:0; url=editEmployee.php");
                }
                else{
                    ?> 
                <script> 
                    alert(" BUBUBU")
                </script>              
                <?php
                header("Refresh:0; url=editEmployee.php");
                }
            }
            else{
                ?> 
                <script> 
                    alert(" Can't Update Data!")
                </script>              
                <?php
                header("Refresh:0; url=editEmployee.php");
            }


    }
    else{
        ?> 
        <script> 
            alert("Select Edit Icon First!")
        </script>              
        <?php
        header("Refresh:0; url=editEmployee.php");
    }
}

function deleteData(){
    $EmployeeID = textboxValue("EmployeeID");

    $sql = "DELETE FROM employees WHERE EmployeeID = '$EmployeeID'";

    if(mysqli_query($GLOBALS['conn'], $sql)){
        ?> 
        <script> 
            alert("Employee Data Deleted!")
        </script>              
        <?php
        header("Refresh:0; url=editEmployee.php");
    }
    else{
        ?> 
        <script> 
            alert("Can't Delete Data!")
        </script>              
        <?php
        header("Refresh:0; url=editEmployee.php");
    }
    }

?>

