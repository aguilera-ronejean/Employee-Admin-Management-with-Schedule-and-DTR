<?php
    include("../headerAdmin.php");
    require_once("departmentOp.php");
    
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
    <link rel = "stylesheet" href = "department.css">

  </head>
  <body id="centerContainer">
    
    <main>
        <div class="container">
            <br>
            <center><h1>Department</h1></center>
            <br>

            <div class="d-flex justify-content-center">
                <form action = "departmentOp.php" method = "post" class ="w-50">
                    <div class = "row py-2">
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-id-card"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" class = "form-control" id = "DepartmentID" name = "DepartmentID" value = "<?php echo $id = round(hexdec( uniqid())*0.00000035); ?>" readonly dat-toggle='tooltip' data-placement = 'bottom' title = 'Department ID' readonly>
                            </div>            
                        </div>
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text"><i class="fas fa-signature"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" placeholder="Department Name" class = "form-control" id = "Department" name = "Department" required>
                            </div>
                        </div>
                    </div>
     
                    </div>   
                    
                    <div class = "d-flex justify-content-center">
                        <button name = "create" dat-toggle='tooltip' data-placement = 'bottom' title = 'Create' class = "btn btn-success" id = "btn-create"><i class="fas fa-plus"></i></button>
                        <button name = "update" dat-toggle='tooltip' data-placement = 'bottom' title = 'Update' class = "btn btn-primary" id = "btn-update"><i class="fas fa-pen-alt"></i></button>
                        <button name = "delete" dat-toggle='tooltip' data-placement = 'bottom' title = 'Delete' class = "btn btn-danger" id = "btn-delete"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </form>          
            

            <!-- Boostrap Table -->
            <div class = "d-flex table-data">
                <table class = "table table-stripped">
                    <thead class = "thread-dark">
                        <tr>
                            <th>Department ID</th>
                            <th>Department</th>
                            <th>No. Of Employees</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id = "tbody">
                        <?php
                                
                                $result  = mysqli_query($conn , 'SELECT * FROM department') or die( mysqli_error($conn));;
                                
                               
                                while($row  = mysqli_fetch_array($result)){ ?>
                                    <tr id="<?php echo $row['DepartmentID']; ?>">
                                        <td data-id = "<?php echo $row['DepartmentID']; ?>"><?php echo $row['DepartmentID']; ?></td>
                                        <td data-id = "<?php echo $row['DepartmentID']; ?>"><?php echo $row['Department']; ?></td>
                                        <td><?php 

                                            $row['DepartmentID'];
                                            $departmentID = $row['DepartmentID']; 

                                            if($departmentID){
                                                $sql = "SELECT COUNT(DepartmentID) AS NumDep FROM employees WHERE DepartmentID = '$departmentID';";
                                                $result1 = mysqli_query($conn, $sql);
                                                $number_of_department = 0;

                                                if ($row1 = mysqli_fetch_assoc($result1)) {
                                                    $number_of_department = $row1['NumDep'];
                                                    echo $number_of_department;
                                                }
                                                
                                            }
                                        ?> </td>
                                        <td><i class = "fas fa-edit btnedit" data-id = "<?php echo $row['DepartmentID'];?>"> </i></td>
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
    
  
    <script src = "department.js"></script>

</body>
</html>




    