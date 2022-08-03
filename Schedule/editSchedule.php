<?php
    include("../HeaderAdmin/headerAdmin.php");
    require_once("scheduleOp.php");
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
    <link rel = "stylesheet" href = "schedule.css">

  </head>
  <body id="centerContainer">
    
    <main>
        <div class="container">
            <br>
            <center><h1>Schedule</h1></center>
            <br>

            <div class="d-flex justify-content-center">
                <form action = "scheduleOp.php" method = "post" class ="w-50">
                    <div class = "row py-2">
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fab fa-slack"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" placeholder="ScheduleID" class = "form-control" id = "ScheduleID" name = "ScheduleID" required>
                            </div>            
                        </div>
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text"><i class="fas fa-calendar-week"></i></div>
                                </div>
                                <input type = "text" autocomplete="off" placeholder="Schedule" class = "form-control" id = "schedule" name = "schedule" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class = "row pt-2">
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-hourglass-start"></i></div>
                                </div>
                                <input type = "time" autocomplete="off" placeholder="Start Time" class = "form-control" id = "startTime" name = "startTime" required>
                            </div>            
                        </div>
                        <div class="col">
                            <div class = "input-group mb-2">
                                <div class = "input-group-prepend">
                                    <div class = "input-group-text bg-teal"><i class="fas fa-hourglass-end"></i></div>
                                </div>
                                <input type = "time" autocomplete="off" placeholder="End Time" class = "form-control" id = "endTime" name = "endTime" required>
                            </div>
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
                            <th>Schedule ID</th>
                            <th>Schedule</th>
                            <th>Start Time </th>
                            <th>End Time</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id = "tbody">
                        <?php
                                $result  = mysqli_query($conn ,'SELECT * FROM schedule');
                                while($row  = mysqli_fetch_array($result)){ ?>
                                    <tr id="<?php echo $row['ScheduleID']; ?>">
                                        <td data-id = "<?php echo $row['ScheduleID']; ?>"><?php echo $row['ScheduleID']; ?></td>
                                        <td data-id = "<?php echo $row['ScheduleID']; ?>"><?php echo $row['schedule']; ?></td>
                                        <td data-id = "<?php echo $row['ScheduleID']; ?>"><?php echo $row['startTime']; ?></td>
                                        <td data-id = "<?php echo $row['ScheduleID']; ?>"><?php echo $row['endTime']; ?></td>
                                        <td><i class = "fas fa-edit btnedit" data-id = "<?php echo $row['ScheduleID'];?>"> </i></td>
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
    
  
    <script src = "schedule.js"></script>

</body>
</html>