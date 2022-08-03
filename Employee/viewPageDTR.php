<?php
    include("../db.php");
     $EmployeeID = $_POST['dtr']; 
?>

<html lang="en";

    <head>
        
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        
        
        <link rel= "stylesheet" href="viewPageDTR.css">
    </head>
</html>

<body>
    <div class="container">
        <table class = "table table-bordered " id = "table-data">
                <br />
                    <?php
                        $query = "SELECT Name from employees WHERE EmployeeID = '$EmployeeID'";
                        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
                        $row  = mysqli_fetch_array($result);
                        $Name = $row['Name'];
                    ?>
                <h3 align="center"><?php echo $Name ?> Daily Time Record</h3>
                
                <center><button onclick = "window.location.href = 'viewEDTR.php';" class="btn btn-success" name="back" >Back</button></center><br>
            <thead class = "thread-dark">
                <tr>
                    <th>Employee ID</th>
                    <th>Date</th>     
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody id = "tbody">
                <?php
                            
                        $query = "SELECT EmployeeID, att_Date, att_TimeIn, att_TimeOut from dtr WHERE EmployeeID = '$EmployeeID' ORDER BY att_Date desc";
                        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
                                
                        while($row  = mysqli_fetch_array($result)){ ?>
                            <tr> 
                                <td>    <?php echo $row['EmployeeID']; ?>   </td>
                                <td>    <?php echo $row['att_Date']; ?>     </td>
                                <td>    <?php echo $row['att_TimeIn']; ?>   </td>
                                <td>    <?php echo $row['att_TimeOut']; ?>  </td>                       
                            </tr>
                        <?php 
                        }
                        ?>    
            </tbody>
        </table>
    </div>
</body>