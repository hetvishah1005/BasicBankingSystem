<?php
// include 'update.php';
error_reporting(0);
$conn = new mysqli("localhost","root","","dataentry");
if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
}

if (isset($_POST["submit"])) {
    $Sender_Name = $_POST["SenderName"];
    $Recipient_Name = $_POST["RecipientName"];
    $Sender_Account_Number = $_POST["SenderAccountNumber"];
    $Recipient_Account_Number = $_POST["RecipientAccountNumber"];
    $Transaction_Date = $_POST["TransactionDate"];
    $Amount_Transfer = $_POST["AmountTransfer"];

    $sql = "INSERT INTO history (SenderName, RecipientName, SenderAccountNumber,RecipientAccountNumber,TransactionDate,AmountTransfer)
    VALUES ('$Sender_Name', '$Recipient_Name', '$Sender_Account_Number','$Recipient_Account_Number','$Transaction_Date','$Amount_Transfer')";
   
    $Sender_Sql = "select * from users where S_Name = '$Sender_Name' ";
    $Sender_Result = $conn->query($Sender_Sql);
    $Sender_Data = $Sender_Result->fetch_object();
    $Sender_Balance = $Sender_Data->Balance;


    $Recipient_Sql = "select * from users where S_Name = '$Recipient_Name'";
    $Recipient_Result = $conn->query($Recipient_Sql);
    $Recipient_Data = $Recipient_Result->fetch_object();
    $Recipient_Balance = $Recipient_Data->Balance;

    if($Amount_Transfer < 0){
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  
        echo '</script>';
        header( "refresh:1 ;url=BankingSystem.php" );
    }
    else if ($Sender_Balance < $Amount_Transfer){
        echo '<script type="text/javascript">';
        echo ' alert("alert box insufficient balance")';  
        echo '</script>';
        header( "refresh:1 ;url=BankingSystem.php" );
    }
    else if($Amount_Transfer < $Sender_Balance){
        // deducting amount from sender's account
    $newbalance = $Sender_Data->Balance - $Amount_Transfer;
    $sql = "UPDATE users set Balance=$newbalance where S_Name = '$Sender_Name'";
    mysqli_query($conn,$sql);
          
    // adding amount to reciever's account
    $newbalance = $Recipient_Data->Balance + $Amount_Transfer;
    $sql = "UPDATE users set Balance=$newbalance where S_Name = '$Recipient_Name'";
    mysqli_query($conn,$sql);
    

    $Sender_Name = $Sender_Data->S_Name;
    $Recipient_Name = $Recipient_Data->S_Name;
    $sql = "INSERT INTO history(`SenderName`, `RecipientName`, `SenderAccountNumber`,`RecipientAccountNumber`,`TransactionDate`, `AmountTransfer`) VALUES ('$Sender_Name',' $Recipient_Name','$Sender_Account_Number','$Recipient_Account_Number','$Transaction_Date','$Amount_Transfer')";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "<script> alert('Transaction Successful');
              </script>";
        
       }
       header( "refresh:1 ;url=transachistory.php" ); 
    }    
    
    else{
        echo '<script type="text/javascript">';
        echo ' alert("Code Didnot Run Transfer Error")';  
        echo '</script>';
        header( "refresh:1 ;url=BankingSystem.php" ); 
    }
    
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fund Transfer</title>
    <link rel="stylesheet" type="text/css" href="transferfunds.css">
</head>
<body>
    <div class="header" >
        <h1 align="center">Here You Can Perform Your Transactions</h1>
    </div>
    <div class="content"style="background-color:lightblue;">
        <form method="post">
        <table  align='center' style="padding:100px; background-color:lightblue;"> 
            <tr>
                <td> Sender Name </td>
                <td><input type="text" id="SenderName" name="SenderName" value="" required></td>
            </tr>
            <tr>
                <td> Recipient Name</td>
                <td><input type="text" id="RecipientName" name="RecipientName" value="" required> </td>
            </tr>
            <tr>
                <td> Sender Account Number </td>
                <td><input type="text" id="SenderAccountNumber" name="SenderAccountNumber" value="" required></td>
            </tr>
            <tr>
                <td> Recipient Account Number</td>
                <td><input type="text" id="RecipientAccountNumber" name="RecipientAccountNumber" value="" required></td>
            </tr>
            <tr>
            <td> Transaction Date </td>
                <td><input type="date" id="TransactionDate" name="TransactionDate" value="" required ></td>
            </tr>
            <tr>
                  <td>Amount Transfer</td>
                  <td><input type="number" id="AmountTransfer" name="AmountTransfer" value="" required></td>
            </tr> 
            <tr>
                <td colspan= '2' align='center'><input type="submit" id="submit" name="submit" value="Fund Transfer"></td>
            </tr>         
        </table>
        </form>
    </div>
    <div class="footer">
        <h3 align="center">Copyright &copy; 2021 All Rights Are Reserved !</h3>
    </div>
</body>
</html>