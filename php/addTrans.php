<?php

      include('session.php');
      //start register or insert user
    $trans_date = date("m/d/Y");
    $name = $_POST['trans_name'];
    $quantity = $_POST['trans_qty'];
    $price = $_POST['trans_price'];
    $subtotal = $price * $quantity;
    $name_query = mysqli_query($con,"select ID from product where Product_Name = '$name' ");
    $name_result = mysqli_fetch_assoc($name_query);

    //$selectAll = "SELECT Name, ID from transaction where ID='$user_check' ";
    $name_query1 = mysqli_query($con,"select pro.Product_Name as Name, trans.Quantity as quantity, trans.Subtotal as sub from transaction as trans 
                    INNER JOIN product as pro ON trans.Name = pro.ID where trans.ID='$user_check' AND pro.Product_Name = '$name'");
    $name_result1 = mysqli_fetch_assoc($name_query1);
    
    if($name == $name_result1['Name']){
        $addQuantity = $quantity + $name_result1['quantity'];
        $addSubtotal = $subtotal + $name_result1['sub'];
        $sql = "UPDATE transaction SET Quantity = $addQuantity, Subtotal = $addSubtotal where Name = ".$name_result['ID']." ";

    }else{
        
        $sql = "INSERT INTO transaction (ID, Name, Price, Quantity, Subtotal, Date_Added) VALUES 
            ('$user_check', '".$name_result['ID']."' ,'$price', '$quantity','$subtotal','$trans_date')";

    }
    //$sql = "DELETE from transaction";
                            
    if ($con->query($sql) === TRUE) {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='../cashier.php';

        </SCRIPT>");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

$con->close();


       
       
    ?>