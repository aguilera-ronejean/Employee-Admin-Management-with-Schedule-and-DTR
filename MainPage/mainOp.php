<?php  
    require_once("../db.php");

    if(isset($_POST['submit']));
        {
            timeinout();
        }

function timeinout(){


    if (isset($_POST['EmployeeID'])) {
        $EmployeeID = textboxValue('EmployeeID');
    

        if($EmployeeID){

            $time = date("H:i", strtotime("+6 HOURS"));
            $date = date("Y-m-d", strtotime("+6 HOURS"));

            $query1 = "SELECT Name FROM employees WHERE EmployeeID = '$EmployeeID'";
            $result1  = mysqli_query($GLOBALS['conn'], $query1) or die( mysqli_error($GLOBALS['conn']));;
            $row = mysqli_fetch_assoc($result1);
            $Name = $row['Name'];

            $query = "SELECT EmployeeID FROM employees WHERE EmployeeID = '$EmployeeID'";
            $result  = mysqli_query($GLOBALS['conn'], $query) or die( mysqli_error($GLOBALS['conn']));;
            $count = mysqli_num_rows($result);

            if($count > 0)
            {
                $query5 = "SELECT Status FROM employees WHERE EmployeeID = '$EmployeeID'";
                $result5  = mysqli_query($GLOBALS['conn'], $query5) or die( mysqli_error($GLOBALS['conn']));;
                $row2 = mysqli_fetch_assoc($result5);
                $Status = $row2['Status'];

 
                if($Status == '0'){

                    $queryIN = "INSERT INTO `dtr` VALUES('', '$date', '$time', '', '$EmployeeID')";

                    if(mysqli_query($GLOBALS['conn'], $queryIN) or die(mysqli_error($GLOBALS['conn'])) ){

                            $queryID = "SELECT MAX(AttendanceID) FROM dtr WHERE EmployeeID = '$EmployeeID' ";
                            $resultID  = mysqli_query($GLOBALS['conn'], $queryID) or die( mysqli_error($GLOBALS['conn']));;
                            $rowID = mysqli_fetch_assoc($resultID);
                            $AttendanceID = implode(',', $rowID);

                            $queryStatus = "UPDATE employees 
                                            SET Status = '1', AttendanceID = '$AttendanceID'
                                            WHERE EmployeeID = '$EmployeeID'";

                        if(mysqli_query($GLOBALS['conn'], $queryStatus) or die(mysqli_error($GLOBALS['conn'])) ){

                            $queryEID = "SELECT EmployeeID FROM employees WHERE EmployeeID = '$EmployeeID'";
                            $recentEID  = mysqli_query($GLOBALS['conn'], $queryEID) or die( mysqli_error($GLOBALS['conn']));;
                            $rowEID = mysqli_fetch_assoc($recentEID);
                            $resultEID = $rowEID['EmployeeID'];

                            $queryEN = "SELECT Name FROM employees WHERE EmployeeID = '$EmployeeID'";
                            $recentEN  = mysqli_query($GLOBALS['conn'], $queryEN) or die( mysqli_error($GLOBALS['conn']));;
                            $rowEN = mysqli_fetch_assoc($recentEN);
                            $resultEN = $rowEN['Name'];

                            $queryDD = "SELECT att_Date FROM dtr WHERE AttendanceID = '$AttendanceID'";
                            $recentDD  = mysqli_query($GLOBALS['conn'], $queryDD) or die( mysqli_error($GLOBALS['conn']));;
                            $rowDD = mysqli_fetch_assoc($recentDD);
                            $resultDD = $rowDD['att_Date'];

                            $queryDTI = "SELECT att_TimeIn FROM dtr WHERE AttendanceID = '$AttendanceID'";
                            $recentDTI  = mysqli_query($GLOBALS['conn'], $queryDTI) or die( mysqli_error($GLOBALS['conn']));;
                            $rowDTI = mysqli_fetch_assoc($recentDTI);
                            $resultDTI = $rowDTI['att_TimeIn'];

                            

                            $queryRecent = "insert into recent(id, EmployeeID, Name, Date, Time, Status) values('', '$resultEID', '$resultEN', '$resultDD', '$resultDTI', 'Timed-In' )";
                            
                            if(mysqli_query($GLOBALS['conn'], $queryRecent) or die(mysqli_error($GLOBALS['conn'])) ){

                                $shout = "<h3 class = 'text-muted'>".$Name." <label class = 'text-info'>at  ".date("h:i a", strtotime($time))."</label></h3>";
                                
                                ?> 
                                <script> 
                                    alert("Welcome <?php $shout; ?> ")
                                </script>              
                                <?php
                                header("Refresh:0; url=mainPage.php");
                            }
                        }
                    }
                    else
                    {
                        echo "Error: " . (mysqli_query($GLOBALS['conn'], $queryIN)) . $GLOBALS['conn']->error;
                    }

                }

                else if($Status == '1'){

                    //timeout query
                    $queryOID = "SELECT AttendanceID FROM employees WHERE EmployeeID = '$EmployeeID' ";
                    $resultOID  = mysqli_query($GLOBALS['conn'], $queryOID) or die( mysqli_error($GLOBALS['conn']));;
                    $rowOID = mysqli_fetch_assoc($resultOID);
                    $AttendanceOID = implode(',', $rowOID);

                    //timeout query for Recent table data
                    $queryID = "SELECT MAX(AttendanceID) FROM dtr WHERE EmployeeID = '$EmployeeID' ";
                    $resultID  = mysqli_query($GLOBALS['conn'], $queryID) or die( mysqli_error($GLOBALS['conn']));;
                    $rowID = mysqli_fetch_assoc($resultID);
                    $AttendanceID = implode(',', $rowID);

                    $queryOut = "UPDATE dtr 
                                SET att_TimeOut = '$time'
                                WHERE EmployeeID = '$EmployeeID' AND AttendanceID = '$AttendanceOID'";


                    $queryStatus = "UPDATE employees 
                                    SET Status = '0' , AttendanceID = '0'
                                    WHERE EmployeeID = '$EmployeeID' AND AttendanceID = '$AttendanceOID'";
                    
                    
                    if(mysqli_query($GLOBALS['conn'], $queryOut)){
                        
                        if(mysqli_query($GLOBALS['conn'], $queryStatus)){    

                            $queryEID = "SELECT EmployeeID FROM employees WHERE EmployeeID = '$EmployeeID'";
                            $recentEID  = mysqli_query($GLOBALS['conn'], $queryEID) or die( mysqli_error($GLOBALS['conn']));;
                            $rowEID = mysqli_fetch_assoc($recentEID);
                            $resultEID = $rowEID['EmployeeID'];

                            $queryEN = "SELECT Name FROM employees WHERE EmployeeID = '$EmployeeID'";
                            $recentEN  = mysqli_query($GLOBALS['conn'], $queryEN) or die( mysqli_error($GLOBALS['conn']));;
                            $rowEN = mysqli_fetch_assoc($recentEN);
                            $resultEN = $rowEN['Name'];

                            $queryDD = "SELECT att_Date FROM dtr WHERE AttendanceID = '$AttendanceID'";
                            $recentDD  = mysqli_query($GLOBALS['conn'], $queryDD) or die( mysqli_error($GLOBALS['conn']));;
                            $rowDD = mysqli_fetch_assoc($recentDD);
                            $resultDD = $rowDD['att_Date'];

                            $queryDTI = "SELECT att_TimeOut FROM dtr WHERE AttendanceID = '$AttendanceID'";
                            $recentDTI  = mysqli_query($GLOBALS['conn'], $queryDTI) or die( mysqli_error($GLOBALS['conn']));;
                            $rowDTI = mysqli_fetch_assoc($recentDTI);
                            $resultDTI = $rowDTI['att_TimeOut'];

                            

                            $queryRecent = "insert into recent(id, EmployeeID, Name, Date, Time, Status) values('', '$resultEID', '$resultEN', '$resultDD', '$resultDTI', 'Timed-Out' )";
                            
                            if(mysqli_query($GLOBALS['conn'], $queryRecent) or die(mysqli_error($GLOBALS['conn'])) ){

                                $shout = "<h3 class = 'text-muted'>".$Name." <label class = 'text-info'>at  ".date("h:i a", strtotime($time))."</label></h3>";
                                
                                ?> 
                                <script> 
                                    alert("Timed Out! <?php $shout; ?> ")
                                </script>              
                                <?php
                                header("Refresh:0; url=mainPage.php");
                            }
                        }
                    }
                    else
                    {
                        echo "Error: " . (mysqli_query($GLOBALS['conn'], $queryOut)) . $GLOBALS['conn']->error;
                        header("Refresh:0; url=mainPage.php");
                    }

                }
            }

            else{
                ?> 
                    <script> 
                        alert("Employee ID Not Found!")
                    </script>              
                <?php
                header("Refresh:0; url=mainPage.php");
            }
        }
        else{
            ?> 
                    <script> 
                        alert("Shit!")
                    </script>              
            <?php
            header("Refresh:0; url=mainPage.php");
        }  
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

?>