<?php
    include("../HeaderMain/headerMain.php");
    include("mainOp.php");
?>

<html>  
    <link rel = "stylesheet" href = "mainPage.css">
    <body>
        <div class = "modal-dialog text-center">
            <div class = "col-sm-12 main-section">
                <div class = "modal-content">
                    <br>
                    <strong><h3>TIME IN/OUT</h3></strong>
                    <br>
                    

                    <form class = "col-12"  action="mainOp.php" method = "post">
                        <div class = "form-group">
                            <input type = "text" autocomplete="off" placeholder="Enter Employee ID" class = "form-control" id = "EmployeeID" name = "EmployeeID">    
                        </div>

                        
                        <button type = "submit" name = "submit" id = "submit" class = "btn">Submit</button>
                            
                        
                    </form>
                      
                </div>
            </div>
        </div>

        <div class="container">
            <br>
            <center><strong><h4>Recent Time In/Out</h4></strong></center>
            <div class = "d-flex table-data">
                
                    <table class = "table table-stripped">
                        
                        <thead class = "thread-dark">
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>     
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody id = "tbody">
                            <?php
                                    
                                    $result  = mysqli_query($conn , 'SELECT EmployeeID, Name, Date, Time, Status FROM recent ORDER BY id desc') or die( mysqli_error($conn));;
                                    
                                
                                    while($row  = mysqli_fetch_array($result)){ ?>
                                        <tr>

                                            <td><?php echo $row['EmployeeID']; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['Date']; ?></td>
                                            <td><?php echo $row['Time']; ?></td>
                                            <td><?php echo $row['Status']; ?></td>

                                        </tr>
                                    <?php }
                                ?>    
                        </tbody>
                    </table>
                </div>
        </div>
    </body>
</html>