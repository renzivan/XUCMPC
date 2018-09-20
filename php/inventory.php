<?php

	    	
    if (isset($_POST['edit_btn'])) {
      		include('../databasus_edit.php');
      		
      		if(isset($_POST['save'])){//if the submit button is clicked

	            $editName = $_POST['edit_name'];
	            $editPrice = $_POST['edit_price'];
	            $editQuantity = $_POST['edit_quantity'];

	            $sql5 = "UPDATE product SET Product_Name = $editName, Price = $editPrice, Quantity = $editQuantity where Product_Name = $getName ";
	                             
	            if ($con->query($sql5) === TRUE) {
	                echo ("<SCRIPT LANGUAGE='JavaScript'>
	                window.location.href='databasus.php';

	                </SCRIPT>");
	            } else {
	                echo "Error: " . $sql5 . "<br>" . $con->error;
	            }
        	}

    }elseif (isset($_POST['delete_btn'])) {

    	$sql = "DELETE from product where Product_Name = '$name1' ";
                        
		if ($con->query($sql) === TRUE) {
		    echo ("<SCRIPT LANGUAGE='JavaScript'>
		        alert('".$name1."');
		    window.location.href='../databasus.php';

		    </SCRIPT>");
		} else {
		    echo "Error: " . $sql . "<br>" . $con->error;
		}

		$con->close();


    }


?>

</body>
</html>