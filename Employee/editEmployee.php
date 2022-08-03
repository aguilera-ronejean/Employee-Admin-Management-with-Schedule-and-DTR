<?php
    include("../HeaderAdmin/headerAdmin.php");
    require_once("employeeOp.php");
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/7d061db318.js" crossorigin="anonymous"></script>
    

    <!-- Custom Style Sheet -->
    <link rel = "stylesheet" href = "employee.css">

  </head>
  <body id="centerContainer">
    
    <main>
        <div class="container">
            <br>
            <center><h1>Employee</h1></center>
            <br>

            <div class="d-flex justify-content-center">
                <form action = "employeeOp.php" method = "post" class ="w-50">
                    <div class = "row py-2">
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-id-card"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" placeholder="EmployeeID" class = "form-control" id = "EmployeeID" name = "EmployeeID" value = "<?php echo $id = round(hexdec( uniqid())*0.0000005); ?>" readonly dat-toggle='tooltip' data-placement = 'bottom' title = 'Employee ID'>
                            </div>            
                        </div>
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text"><i class="fas fa-signature"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" placeholder="Employee Name" class = "form-control" id = "Name" name = "Name" required>
                            </div>
                        </div>
                    </div>

                    <div class = "pt-2">
                        
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-map-marker-alt"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" placeholder="Address" class = "form-control" id = "Address" name = "Address" required>
                            </div>            
                        
                    </div>     
                    
                    <div class = "row pt-2">
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-sort-numeric-up-alt"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" placeholder="Age" class = "form-control" id = "Age" name = "Age" required>
                            </div>            
                        </div>
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-id-card"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" placeholder="UserID" class = "form-control" id = "UserID" name = "UserID" value = "<?php echo $id = round(hexdec( uniqid())*0.0000015); ?>" readonly dat-toggle='tooltip' data-placement = 'bottom' title = 'User ID' readonly>
                            </div>
                        </div>
                    </div> 
                    
                    <div class = "row pt-2">
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-user-tag"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" placeholder="Username" class = "form-control" id = "username" name = "username" required>
                            </div>            
                        </div>
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-key"></i></div>
                                </div>
                                <input type = "password" autocomplete="off" placeholder="Password" class = "form-control" id = "password" name = "password" required>
                                    
                            </div>
                        </div>
                    </div>  

                    <div class = "pt-2">
                        
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-landmark"></i></div>
                                </div>
                                <?php
                                    echo '<select id = "department" name = "department" required>
                                    <option>-------------------------------------------Department-------------------------------------------------</option>';
                                     
                                    $sql = "SELECT Department FROM department";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    echo '<option>'.$row['Department'].'</option>';
                                    }    
                                    echo '</select>';
                                ?>
                                
                            </div>            
                        
                    </div>

                    
                    
                    <div class = "d-flex justify-content-center">
                        <button name = "create" dat-toggle='tooltip' data-placement = 'bottom' title = 'Create' class = "btn btn-success" id = "btn-create"><i class="fas fa-plus"></i></button>
                        <button name = "update" dat-toggle='tooltip' data-placement = 'bottom' title = 'Update' class = "btn btn-primary" id = "btn-update"><i class="fas fa-pen-alt"></i></button>
                        <button name = "delete" dat-toggle='tooltip' data-placement = 'bottom' title = 'Delete' class = "btn btn-danger" id = "btn-delete"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </form>          
            </div>

            <!-- Boostrap Table -->
            <div class = "d-flex table-data">
                <table class = "table table-stripped">
                    <thead class = "thread-dark">
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>Department</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id = "tbody">
                        <?php
                                
                                $result  = mysqli_query($conn , 'SELECT EmployeeID,Name,Address,Age, UserID, DepartmentID FROM employees') or die( mysqli_error($conn));;
                                
                               
                                while($row  = mysqli_fetch_array($result)){ ?>
                                    <tr id="<?php echo $row['EmployeeID']; ?>">
                                        <td data-id = "<?php echo $row['EmployeeID']; ?>"><?php echo $row['EmployeeID']; ?></td>
                                        <td data-id = "<?php echo $row['EmployeeID']; ?>"><?php echo $row['Name']; ?></td>
                                        <td data-id = "<?php echo $row['EmployeeID']; ?>"><?php echo $row['Address']; ?></td>
                                        <td data-id = "<?php echo $row['EmployeeID']; ?>"><?php echo $row['Age']; ?></td>
                                        <td data-id = "<?php echo $row['EmployeeID']; ?>" style="display:none"> <?php echo $row['UserID']; ?></td>
                                        <td data-id = "<?php echo $row['EmployeeID']; ?>" style="display:none"> <?php $row['UserID']; 

                                            if($row['UserID']){
                                                $temp = $row['UserID'];
                                                $resultU  = mysqli_query($GLOBALS['conn'], "SELECT username FROM users WHERE UserID = '$temp'") or die( mysqli_error($GLOBALS['conn']));;
                                                $row1 = mysqli_fetch_assoc($resultU);
                                                $str = implode(',', $row1);
                                                echo $str; //print username hiddenly 
                                                
                                            }
                                        ?> </td>

                                        <td data-id = "<?php echo $row['EmployeeID']; ?>" style="display:none"> <?php $row['UserID']; 

                                            if($row['UserID']){
                                                $temp = $row['UserID'];
                                                $resultP  = mysqli_query($GLOBALS['conn'], "SELECT password FROM users WHERE UserID = '$temp'") or die( mysqli_error($GLOBALS['conn']));;
                                                $row1 = mysqli_fetch_assoc($resultP);
                                                $str = implode(',', $row1);
                                                echo $str; //print password hiddenly
                                            
                                        }
                                        ?> </td>

                                        <td data-id = "<?php echo $row['EmployeeID']; ?>"><?php $row['DepartmentID'];
                                        
                                        if($row['DepartmentID'] != 0){
                                            $temp = $row['DepartmentID'];
                                            $resultDI  = mysqli_query($GLOBALS['conn'], "SELECT Department FROM department WHERE DepartmentID = '$temp'") or die( mysqli_error($GLOBALS['conn']));;
                                            $row1 = mysqli_fetch_assoc($resultDI);
                                            $str = implode(',', $row1);
                                            echo $str; // Selects Department Name by using DepartmentID and prints Department Name
                                        }

                                        else{
                                            echo 'No Department';
                                        }
                                            

                                        ; ?></td>
                                        <td><i class = "fas fa-edit btnedit" data-id = "<?php echo $row['EmployeeID'];?>"> </i></td>
                                    </tr>
                                <?php }
                            ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  
    <script src = "employee.js">
        
    </script>

    

</body>
</html>




    