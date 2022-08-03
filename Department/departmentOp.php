<?php
 require_once("../db.php");

//add Department data
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
    $DepartmentID = textboxValue("DepartmentID");
    $Department = textboxValue("Department"); 
    
    if($DepartmentID && $Department){

        $sql = "insert into department(DepartmentID, Department) 
                values('$DepartmentID','$Department')";    
    
        if(mysqli_query($GLOBALS['conn'], $sql)){
           
            ?> 
            <script> 
                alert("Employee Data Enrolled!")
            </script>              
            <?php
            header("Refresh:0; url=editDepartment.php");
            
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
    $DepartmentID = textboxValue("DepartmentID");
    $Department = textboxValue("Department"); 
      
    if($DepartmentID && $Department){
        
            $sql = "UPDATE department 
                    SET Department ='$Department'
                    WHERE DepartmentID = '$DepartmentID'";

    
            if(mysqli_query($GLOBALS['conn'], $sql) or die( mysqli_error($GLOBALS['conn']))){
                
                ?> 
                <script> 
                    alert("Department Data Updated!")
                </script>              
                <?php
                header("Refresh:0; url=editDepartment.php");
 
            }
            else{
                ?> 
                <script> 
                    alert(" Can't Update Data!")
                </script>              
                <?php
                header("Refresh:0; url=editDepartment.php");
            }


    }
    else{
        ?> 
        <script> 
            alert("Select Edit Icon First!")
        </script>              
        <?php
        header("Refresh:0; url=editDepartment.php");
    }
}

function deleteData(){
    $DepartmentID = textboxValue("DepartmentID");

    $sql = "DELETE FROM department WHERE DepartmentID = '$DepartmentID'";
    $sql1 = "UPDATE employees 
            SET DepartmentID = '0'
            WHERE DepartmentID = '$DepartmentID'";

    if(mysqli_query($GLOBALS['conn'], $sql)){
        if(mysqli_query($GLOBALS['conn'], $sql1)){
            ?> 
            <script> 
                alert("Employee Data Deleted!")
            </script>              
            <?php
            header("Refresh:0; url=editDepartment.php");
        }
        else{
            ?> 
            <script> 
                alert("Duh!")
            </script>              
            <?php
            header("Refresh:0; url=editDepartment.php");
        }
    }
    else{
        ?> 
        <script> 
            alert("Can't Delete Data!")
        </script>              
        <?php
        header("Refresh:0; url=editDepartment.php");
    }
    }

?>

