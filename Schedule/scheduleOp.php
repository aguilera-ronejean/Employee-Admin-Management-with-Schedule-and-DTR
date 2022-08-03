<?php
 require_once("../db.php");

//add schedule data
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
    $ScheduleID = textboxValue("ScheduleID");
    $schedule = textboxValue("schedule"); 
    $startTime = textboxValue("startTime"); 
    $endTime = textboxValue("endTime");

    if($ScheduleID && $schedule && $startTime && $endTime){

        $sql = "insert into schedule(ScheduleID, schedule, startTime, endTime) values('$ScheduleID','$schedule','$startTime','$endTime')";

        if(mysqli_query($GLOBALS['conn'], $sql)){
            ?> 
            <script> 
                alert("Schedule Data Enrolled!")
            </script>              
            <?php
            header("Refresh:0; url=editSchedule.php");
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
    $ScheduleID = textboxValue("ScheduleID");
    $schedule = textboxValue("schedule");
    $startTime = textboxValue("startTime");
    $endTime = textboxValue("endTime");

    if($ScheduleID && $schedule && $startTime && $endTime){
        $sql = "UPDATE schedule SET ScheduleID ='$ScheduleID', schedule ='$schedule', startTime ='$startTime', endTime ='$endTime' WHERE ScheduleID = '$ScheduleID' OR schedule = '$schedule'";

        if(mysqli_query($GLOBALS['conn'], $sql)){
            ?> 
            <script> 
                alert("Schedule Data Updated!")
            </script>              
            <?php
            header("Refresh:0; url=editSchedule.php");
        }
        else{
            ?> 
            <script> 
                alert(" Can't Update Data!")
            </script>              
            <?php
            header("Refresh:0; url=editSchedule.php");
        }
    }
    else{
        ?> 
        <script> 
            alert("Select Edit Icon First!")
        </script>              
        <?php
        header("Refresh:0; url=editSchedule.php");
    }
}

function deleteData(){
    $ScheduleID = textboxValue("ScheduleID");

    $sql = "DELETE FROM schedule WHERE ScheduleID = '$ScheduleID'";

    if(mysqli_query($GLOBALS['conn'], $sql)){
        ?> 
        <script> 
            alert("Schedule Data Deleted!")
        </script>              
        <?php
        header("Refresh:0; url=editSchedule.php");
    }
    else{
        ?> 
        <script> 
            alert("Can't Delete Data!")
        </script>              
        <?php
        header("Refresh:0; url=editSchedule.php");
    }
    }

?>

