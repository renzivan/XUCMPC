<?php
      include('session.php');
      //start register or insert user
    
    $id_number = "";
    $trans_date = date("m/d/Y");
    $check_id = mysqli_query($con,"select ID from user where ID = '".$_POST['cardholder_id']."' ");
//----------------------------cancel transaction----------------------------------------------------------------------------   
    if(isset($_POST['cancel_trans']))
    {
      $sql3 = "DELETE from transaction WHERE ID = '$user_check' ";
      if ($con->query($sql3) === TRUE) 
	  {
         echo("<SCRIPT LANGUAGE='JavaScript'>           
         window.location.href='../cashier.php';
         </SCRIPT>");
      }else 
	  {
         echo "Error: " . $sql3 . "<br>" . $con->error;
      }
    }else
	{
      if($check_result = mysqli_fetch_assoc($check_id))
      {


                       $id_number = $_POST['cardholder_id'];


                        
            //----------------------------save changes----------------------------------------------------------------------------        
                       $store_total2 =  $_SESSION['$store_total'];
                       $user_load_query = mysqli_query($con,"SELECT Load_Balance from user where ID = '$id_number'"); 
                       $user_load_result = mysqli_fetch_assoc($user_load_query);
                       if ($user_load_result['Load_Balance'] >= $store_total2)
                       {
                            $payment_query2 = mysqli_query($con,"select * from transaction where ID = '$user_check' ");
                            $sql2 = "DELETE from transaction WHERE ID = '$user_check' ";
                            while ($data = @mysqli_fetch_array($payment_query2,MYSQLI_ASSOC))
                            {

                                $sql = "INSERT INTO transaction_history (FK_ID, Product_Name, Date_added, Quantity, Load_Cost) VALUES 
                                        ('$id_number', '".$data['Name']."', '$trans_date','".$data['Quantity']."','".$data['Subtotal']."')";
                                $sql_data = mysqli_query($con,$sql);

                            }
                                             
                                                
                            if ($con->query($sql2) === TRUE) {
                                //deduct load after transaction
                                
                                $deduct_query = mysqli_query($con,"update user set Load_Balance = Load_Balance - $store_total2 where ID = '$id_number' ");
                                
                            }
                            else 
                            {
                                echo "Error: " . $sql2 . "<br>" . $con->error;
                            } 

                            echo ("<SCRIPT LANGUAGE='JavaScript'>
                            window.alert('Success!')
                            window.location.href='../cashier.php';
                            </SCRIPT>");
                    
                            
                       }
                       else
                       {
                            echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Insufficient Load!')
                                window.location.href='../cashier.php';
                                </SCRIPT>");
                       }        
      }else
	  {
         echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Error! ID number not found or inactive')
                window.location.href='../cashier.php';
				$(window).load(function(){        
				$('#modal-default').modal('show');
				}); 
				</SCRIPT>");    
      }

    }


$con->close();


       
       
    ?>