<!DOCTYPE html>

<?php
//renz. prevent other users to visit this page
include('php/session.php');

/*
$sql1 = "SELECT * FROM user WHERE Username = '$user_check'";
$result1 = @mysqli_query($con,$sql1);
$row1 = @mysqli_fetch_array($result1,MYSQLI_ASSOC);

$count = @mysqli_num_rows($result1);
*/

//get privilege
if($getPrivilege==0){
    header("location: index2.php");
}elseif($getPrivilege==1){
    header("location: cashier.php");
}elseif($getPrivilege==2){

}
$product_id = $_POST['trans_id'];
$product_name = $_POST['trans_name'];
$product_price = $_POST['trans_price'];
$product_qty = $_POST['trans_qty'];    //prevent end

//end renz
if (isset($_POST['delete_btn'])) {

      $sql = "DELETE from product where ID = '$product_id' ";
                        
    if ($con->query($sql) === TRUE) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            alert('".$product_id." has been deleted');
        window.location.href='inventory.php';

        </SCRIPT>");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();


}
if (isset($_POST['edit_btn'])) {

    $sql = "UPDATE product SET Product_Name='$product_name', Price='$product_price', Quantity='$product_qty' 
            WHERE ID='$product_id'";
                        
    if ($con->query($sql) === TRUE) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            alert('".$product_id." has been updated');
        window.location.href='inventory.php';

        </SCRIPT>");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();


}
?>