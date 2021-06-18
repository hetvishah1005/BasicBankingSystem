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
        .navbar {
          overflow: hidden;
          background-color: #333; 
          height: 75px;  
        }

        #logo{
          margin: 0cm 40cm 0cm 0cm;
          position : relative;
          top:20px;
        }

        .navbar a {
          float:right;
          font-size: 25px;
          color: white;
          text-align: center;
          padding: 0px 10px 60px 10px;
          text-decoration: none;
        }
  
        .subnav  {  
          border: none;
          color: white;
          padding: 0px 10px 50px 10px;
          background-color: inherit;
          float: right;
        }

         .subnavbtn { 
           font-size: 16px;  
           border: none;
           color: white;
           padding: 5px 10px 51px 20px;
           background-color: inherit;
         }

        .navbar a:hover, .subnav:hover .subnavbtn {
          background-color:darksalmon;
        }
  
       .subnav-content {
         display: none;
         float:right;
         position:absolute;
         left:0px;
         background-color: darksalmon;
         width: 100%;
         z-index: 1;
         height: 30px;
         margin-top: -44px;
       }
  
         .subnav-content a {
          float: right;
          padding: 4.5px; 
          font-size: 18px;
          float: right;
          color: white;
          text-decoration: none;
        }
  
        .subnav-content a:hover {
          background-color: #eee;
          color: black;
        }
  
        .subnav:hover .subnav-content {
           display: block;
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
  <div class="navbar">
            <div id = "logo">
                <img style="display:inline; "src="images/icon.png" alt="">
            </div>
              <a href="contactme.php" style="font-size: 22px; margin-top: -5px; margin-right: 60px;"><b>Contact Me</b></a> 
              <div class="subnav">
                <button class="subnavbtn" style="font-size: 22px; margin-top: -20px; margin-right: 60px;"><b> Home </b></button>
                <div class="subnav-content"  style="margin-top: -50px;">
                <b><a href="viewAllCustomers.php">View All Customers</a></b>
                <b><a href="transferfunds.php">Transfer Funds</a></b>
                <b><a href="transachistory.php">Transaction History</a></b>
              </div>
            </div> 
        </div>
  <table class="content" class="content" align='center' border='3' cellpadding='1' cellspacing='1'><br>
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