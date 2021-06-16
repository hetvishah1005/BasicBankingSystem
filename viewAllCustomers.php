<!DOCTYPE html>
<html>
<head>
    <title>View All Customers</title>
    <style>
        body{
          margin: 0;
          background: url("images/image-4.jpg");
          background-repeat: no-repeat;
          background-size: 100% 100%;   
          height: auto;
        }
        td,tr{
          text-align: center;
          font-size: 20px;
        }
        table{
          border: 2px solid grey;
          font-weight: bold;
          text-align: center;
          width: 80%;
        }
        h2{
        
          font-weight: bold;
          text-align: center;
        }
   </style>
</head>
<body>
  <div class="container">
  <h2 align= 'center' style="font-size:40px;"><u>List Of All Customers</u></h2>
  <table class="content" align='center' border='4' cellpadding='1' cellspacing='1'>
  <tr>
  <th> id </th>
  <th>Sender_Name</th>
  <th> View_Balance </th>
  </tr>
  <?php
   error_reporting(0);
  $conn = new mysqli("localhost","root","","dataentry");
  if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
    exit();
 }
 $id = $_GET['id'];
 $sql = "select id,S_Name,Balance from users";
$result = $conn->query($sql);
//  $sql = mysqli_query($conn, "SELECT * from users where id='$id'");
 while($row = $result->fetch_assoc())
 { ?>
  <tr>
   <td><?php echo $row['id'];?></td>
   <td><?php echo $row['S_Name'];?></td>
   <td><button name='View Balance' type='submit' id='View Balance'><a href="viewSingleCustomer.php?id=<?php echo $row['id'];?>" style='text-decoration:none;'>ViewBalance</a></button></td>
  </tr>
  <?php } ?>
  </table>
  </div>
</body>    
</html>