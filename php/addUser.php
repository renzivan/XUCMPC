<?php

      include('connection.php');
      //start register or insert user
    $load = $_POST['reg_load'];
    $reg_date1 = date("Y-m-d");
    if($_POST['reg_load'] == NULL){
        $load = 0;
    }    
    $sql = "INSERT INTO user (ID, Password, Firstname, Lastname, Middle_Initial, Suffix, Load_Balance, Total_Load, Date_Added, Privilege, Status) VALUES 
            ('$_POST[reg_idno]' ,'$_POST[reg_password]', '$_POST[reg_fname]', '$_POST[reg_lname]', '$_POST[reg_mname]','$_POST[reg_suffix]','$load','$load', '$reg_date1', '$_POST[reg_type]', 'Active')";
                        
if ($con->query($sql) === TRUE) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Success!')
    window.location.href='../register.php';axq
    </SCRIPT>");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();


       
       
    ?>