<!DOCTYPE html>
<html>
<head>
    <title>transachistory</title>
    <style>
        td,tr{
            text-align: center;
            font-size: 20px;
            color: white;
        }
        table{
            border: 2px solid grey;
            font-weight: bold;
        }
        body{      
           margin: 0;
           background: url("images/napendra-singh-XmvQveCDsQI-unsplash.jpg");
           background-repeat: no-repeat; 
           background-size: 100%  100%;   
           height: auto;
        }
        .back{
           right: 300px;
           position: relative;
           top: -60px;
           width: 100%;
           font-size: 30px;

        }
        input[type="submit"] {
          align-items: flex-start;
          text-align: center;
          color: -internal-light-dark(black, white);
          background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
          padding: 3px 16px;
          border-width: 2px;
          border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
          font-size: 18px;
        }    
   </style>
</head>
<body>
    <div class="header">
        <h1 align="center" style="color: white "><u><b>Here Is The Transaction History</u></b></h1>
        <div class='back' align="right">
        <a href="BankingSystem.php"><input type='submit' id="submit" name='submit' value='Back'></a>
    </div>
    </div> 
<?php
// Create connection
$conn = new mysqli("localhost","root","","dataentry");
error_reporting(0);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM history";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo 
    "<table align='center' border='4' cellpadding='1' cellspacing='1'>
    <tr>
    <th>Sender_Name</th>
    <th>Recipient_Name</th>
    <th>Sender_Account_Number</th>
    <th>Recipient_Account_Number</th>
    <th>Transaction_Date</th>
    <th>Amount_Transfer</th>
    </tr>";  
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td>" .$row["SenderName"]. "</td><td>" .$row["RecipientName"].  "</td><td>"  . $row["SenderAccountNumber"] .  "</td><td>" . $row["RecipientAccountNumber"] .  "</td><td>" . $row["TransactionDate"] .  "</td><td>" . $row["AmountTransfer"] . "</td></tr>";
    }
    echo "</table>";
} 
else{
    echo "0 results";
    
}
header( "refresh:5;url=BankingSystem.php" );  

$conn->close();
?>   

</body>
</html>