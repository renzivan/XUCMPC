<!DOCTYPE html>

<?php
include('php/session.php');

//get privilege
if($getPrivilege==0){
    header("location: index2.php");
}elseif($getPrivilege==1){
    header("location: cashier.php");
}elseif($getPrivilege==2){

}

$user_id = $_POST['user_id'];
$user_status = $_POST['user_status'];
$change_status = '';
if($user_status == 'Active'){
	$change_status = 'Inactive';
}
else
{
	$change_status = 'Active';
}
//end renz
if (isset($_POST['delete_btn'])) {

      $sql = "DELETE from product where ID = '$user_id' ";
                        
    if ($con->query($sql) === TRUE) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            alert('".$user_id." has been deleted');
        window.location.href='inventory.php';

        </SCRIPT>");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();


}
if (isset($_POST['edit_btn'])) {

    $sql = "UPDATE user SET Status='$change_status' WHERE ID='$user_id'";
                        
    if ($con->query($sql) === TRUE) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            alert('".$user_id." has change its status');
        window.location.href='user_list.php';
        </SCRIPT>");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();


}
?>