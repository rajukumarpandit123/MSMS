<?php

    include 'Connect.php';

    $SalesId = $_POST["SalesId"];
    $Date = $_POST["Date"];
    $CustomerId = $_POST["CustomerId"];
    $Mode = $_POST["Mode"];
    $TotalAmount = $_POST["TotalAmount"];
    $PayAmount = $_POST["PayAmount"];
    $DuesAmount = $_POST["DuesAmount"];
    $ItemName = $_POST["ItemName"];
    $BatchNo = $_POST["BatchNo"];
    $Quantity = $_POST["Quantity"];
    $Rate = $_POST["Rate"];
    $ActualAmt = $_POST["ActualAmt"];
    $SGSTRate = $_POST["SGSTP"];
    $SGSTAmount = $_POST["SGST"];
    $CGSTRate = $_POST["CGSTP"];
    $CGSTAmount = $_POST["CGST"];
    $Amount = $_POST["Amount"];
    $Discount = $_POST["Discount"];

    $sql = "INSERT INTO sales(Sales_ID,Date,Customer_Id,Mode,Total_Amount,Pay_Amount,Dues_Amount)
    VALUES('$SalesId','$Date','$CustomerId','$Mode','$TotalAmount','$PayAmount','$DuesAmount')";

    if($con->query($sql)===TRUE){

        $sql = "INSERT INTO salesItem(Sales_ID,Item_Name,Batch_No,Quantity,Rate,Discount,Actual_Amount,Amount,SGSTRate,SGSTAmount,CGSTRate,CGSTAmount) 
        VALUES('$SalesId','$ItemName','$BatchNo','$Quantity','$Rate','$Discount','$ActualAmt','$Amount','$SGSTRate','$SGSTAmount','$CGSTRate','$CGSTAmount')";

        if($con->query($sql)===TRUE){

            echo"<script>alert('New data inserted Successfully')</script>";
            echo "<script>window.location.href='Sales.php'</script>";
        } else {

            echo $con->error;

        }
        
    } else {

        echo $con->error;
        
    }
    $con->close();
?>