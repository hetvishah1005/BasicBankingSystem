<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <meta name="description" content="Basic Banking System">
    <meta name="keywords" content="HTML, CSS, JavaScript,php">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">

    <title>
        Contact Me
    </title>
    <style>
        
    body{
     margin: 0px;
     background: url("images/ContactUs.jpg");
     background-repeat: no-repeat;
    background-size: 100% 100%;
    }

    h2,p{
      color: Coral;
      font-size: 30px;

    }
   input[type=text]{
     width: 10%;
     padding: 10px;
     border: 1px solid #ccc;
     margin-top: 6px;
     margin-bottom: 16px;
     resize: vertical;
    }

/* Style the container/contact section */
  .container {
    border-radius: 5px;
    padding: 10px;
    height: 550px;
  }

/* Create two columns that float next to eachother */
  .column {
   float: center;
   width: 100%;
   margin-top: 6px;
   padding: 0px;
  }

/* Clear floats after the columns */
  .row:after {
   content: "";
   display: table;
   clear: both;
  }

  .back{
   right: 655px;
   position: relative;
   top: 150px;
   width: 100%;
   font-size: 30px;
  }

  .footer{
    position: fixed;
    padding: 5px 5px 5px 5px;
    bottom: 0;
    width: 100%; 
    height: 45px;
    background: grey;
    color: white;
    /* margin-right: 30px; */
  }

    </style>
</head>
<body>  
    <div class="container">
    <div style="text-align:center">
      <h2>Contact Me</h2>
      <p>If any query then contact me or mail me.</p>
    </div>
    <div class="found">
    <hr>
    
    </div>
    <div class="row">
      <div class="column">
     
        <form method="post">
          <label for="fname" style="color:white; font-size: 25px;">Full Name:</label>
          <input type="text" id="fname" name="fname" value="Hetvi Shah">
          <br>
          <br>
          <label for="contact" style="color:white; font-size: 25px;">Contact Number:</label>
          <input type="contact" id="contact" name="contact" value="9574265434">
          <br>
          <br>
          <br>
          <label for="email" style="color:white; font-size: 25px;">E-Mail:</label>
          <input type="email" id="email" name="email" value="hetvishah1005@gmail.com">
        </form>
      </div>
    </div>
    <div class='back' align="right">
        <a href="BankingSystem.php"><input type='submit' id="submit" name='submit' value='Back'></a>
    </div>
   </div>
  <div class="footer">
        <h3 align="center">Copyright &copy; 2021 All Rights Are Reserved !</h3>
  </div>
</body>
</html>
