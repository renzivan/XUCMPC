<?php
   include('connection.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select * from user where ID = '$user_check' ");
   
   $row = @mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $session_id = $row['ID'];
   $session_fname = $row['Firstname'];
   $session_lname = $row['Lastname'];
   $getPrivilege = $row['Privilege'];
   //getdate and convert format
   $getDate = $row['Date_Added'];
   $getDate = date('M. ' . 'Y');
   
   /*/ on login screen, redirect to dashboard if already logged in
	if(!isset($_SESSION['login_user'])){
      header("location:index.php");
    exit;
	}
*/
   // on all screens requiring login, redirect if NOT logged in
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      exit;
   }

?>