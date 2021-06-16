<!DOCTYPE html>
<html>
<head>
    <title>View Single Customer</title>
    <style>
        body{
          margin: 0;
          background-image: url("images/image-3.jpg"); 
          background-size: 100% ;
          background-color: lightgrey;
          height: auto;
          text-align: center;
        }

        .back{
           right: 300px;
           position: relative;
           top: -60px;
           width: 100%;
           font-size: 30px;
        }
  
        td,tr{
          text-align: center;
          font-size: 20px;
        }
        table{
          background-color: lightgrey;
          border: 2px solid grey;
          font-weight: bold;
          text-align: center;
          width: 80%;
        }
        .footer{
          position: fixed;
          padding: 5px 5px 0px 5px;
          bottom: 0;
          width: 100%; 
          height: 50px;
          background: grey;
         }
      
   </style>

</head>
<body>
  <div class="container">
  <table class="content" class="content" align='center' border='3' cellpadding='1' cellspacing='1'>
  <h2 class="text-center" style="color : white; text-align: center"><u>User Details</u></h2>
  <h2 class="text-center" style="color : white; text-align: center">Here You Can See Your Details</h2>
  <div class='back' align="right">
        <a href="BankingSystem.php"><b><input type='submit' id="submit" name='submit' value='Back'></b></a>
  </div>
  <tr>
  <th> Id </th>
  <th>Sender_Name</th>
  <th>Sender_Account_Number</th>
  <th> View_Balance </th>
  </tr>
  <?php
  
  $conn = new mysqli("localhost","root","","dataentry");
  if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
 }
 $id = $_GET['id'];
 $sql = "select * from users where id = '$id'";
$result = $conn->query($sql);
 while($row = $result->fetch_assoc())
 {
  ?>
  <tr>
   <td><?php echo $row['id'];?></td>
   <td><?php echo $row['S_Name'];?></td>
   <td><?php echo $row['SenderAccountNumber'];?></td>
   <td><?php echo $row['Balance'];?></td>
  </tr>
 
  <?php } ?>
  </table>
  </div>
  <div class="footer">
        <h3 align="center">Copyright &copy; 2021 All Rights Are Reserved !</h3>
  </div>
 
</body>    
</html>