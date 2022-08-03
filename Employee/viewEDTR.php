<?php
    
    include("../HeaderAdmin/headerAdmin.php");
    require_once("../db.php");
    
    

    $output = '';

    if(isset($_POST['btn-search'])){
        $search = $_POST['search'];

        $queryD = "SELECT Department FROM department WHERE Department LIKE '%$search%'";
        $resultD = mysqli_query($GLOBALS['conn'], $queryD);
        $rowD = mysqli_fetch_array($resultD);
        $strD = $rowD['Department'];

        if($search != ''){

            if(mysqli_num_rows($resultD) != 0){

                
                $queryD  = mysqli_query($GLOBALS['conn'], "SELECT DepartmentID FROM department WHERE Department = '$strD'") or die( mysqli_error($GLOBALS['conn']));;
                $rowD = mysqli_fetch_array($queryD);
                $resultD = $rowD['DepartmentID'];

                $query = "SELECT EmployeeID, Name , DepartmentID FROM employees WHERE DepartmentID = '$resultD'";
                $result = mysqli_query($GLOBALS['conn'], $query);

                if(mysqli_num_rows($result) == 0){

                    $query = "SELECT EmployeeID, Name , DepartmentID FROM employees";
                    $search = "";
                }
            }
            else{
                $query = "SELECT EmployeeID, Name , DepartmentID FROM employees WHERE Name LIKE '%$search%' OR EmployeeID LIKE '%$search%'";
                $result = mysqli_query($GLOBALS['conn'], $query);

                if(mysqli_num_rows($result) == 0){
                    ?> 
                    <script> 
                        alert("No Data Found!")
                    </script>              
                    <?php

                    $query = "SELECT EmployeeID, Name , DepartmentID FROM employees";
                    $search = "";
                }
            }
        }
            

        else{
            $query = "SELECT EmployeeID, Name , DepartmentID FROM employees";
            $search = "";
        }
 
        
    }
    else{
        $query = "SELECT EmployeeID, Name , DepartmentID FROM employees";
        $search = "";
    }
    
    $result  = mysqli_query($conn ,$query) or die( mysqli_error($conn));;

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
    <link rel = "stylesheet" href = "dtr.css">

  </head>
    <body id="centerContainer">

        <main>
                <div class="container">
                    <br />
                    <h2 align="center">Daily Time Record</h2><br />

                    <form action = "viewEDTR.php" method = "post">
                        
                    <input type = "text" autocomplete="off" placeholder="Enter Values" class = "form-control" name = "search" id = "search" value = "<?php echo $search; ?>">
                        <br>
                        <center><button width="200" name = "btn-search" dat-toggle='tooltip' data-placement = 'bottom' title = 'Search' class = "btn btn-success" id = "btn-search">   <i class="fas fa-search light"> Search</i></button>   </center>
                        <br>
                        <br>
                    </form>

                        <table class = "table table-stripped" id = "table-data">
                            
                            <thead class = "thread-dark">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Name</th>     
                                    <th>Department</th>
                                    <th>View DTR</th>
                        
                                </tr>
                            </thead>
                            <tbody id = "tbody">
                                <?php   
                                        
                                                
                                        while($row  = mysqli_fetch_array($result)){ ?>
                                            <tr>

                                                <td><?php echo $row['EmployeeID']; ?></td>
                                                <td><?php echo $row['Name']; ?></td>
                                                <td><?php $row['DepartmentID']; 
                                                
                                                if($row['DepartmentID'] != 0){
                                                    $temp = $row['DepartmentID'];
                                                    $resultDI  = mysqli_query($GLOBALS['conn'], "SELECT Department FROM department WHERE DepartmentID = '$temp'") or die( mysqli_error($GLOBALS['conn']));;
                                                    $row1 = mysqli_fetch_assoc($resultDI);
                                                    $str = implode(',', $row1);
                                                    echo $str; // Selects Department Name by using DepartmentID and prints Department Name
                                                }
        
                                                
                                                ?></td>
                                                
                                                    <form method="post" action="viewPageDTR.php">
                                                        <td><button onclick = "window.location.href = 'viewPageDTR.php';" class="btn btn-warning" name="dtr" value= "<?php echo $row['EmployeeID'] ?>" dat-toggle='tooltip' data-placement = 'bottom' title = '<?php echo $row['EmployeeID'] ?>' >DTR</button></td></td>
                                                    </form>
                                            </tr>
                                        <?php }
                                    ?>    
                            </tbody>
                        </table>
                    


                    
    
                    
            </div>
        </main>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script>
            function loadData(id) {
                $.ajax({
                    url: "dtrOp.php",
                    method: "POST",
                    data: {get_data: 1, id: id},
                    success: function (response) {
                        console.log(response);

                        var html = "";

                        // Displaying city
                        html += "<div class='row'>";
                            html += "<div class='col-md-6'>City</div>";
                            html += "<div class='col-md-6'>" + response.EmployeeID + "</div>";
                        html += "</div>";

                        // And now assign this HTML layout in pop-up body
                        $("#modal-body").html(html);

                        // And finally you can this function to show the pop-up/dialog
                        $("#myModal").modal();  
                                        }
                                    });
                                }

        </script>
        

    </body>
</html>




    