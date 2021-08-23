<?php
  session_start();
  require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
  <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/TweenLite.min.js'></script>
  <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/EasePack.min.js'></script>
  <link rel="stylesheet" href="animated-sticky-header.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/demo.js'></script>
  <link rel="stylesheet" href="header.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  select {
  width: 60%;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #edd79a;
  }

  body {
    
  font-family: Arial, Helvetica, sans-serif;
  background-color:black;
  position: center;
  }

  * {
      box-sizing: border-box;
  }

/* Add padding to containers */
  .container {
  padding: 16px;
  background-color: white;
  }

/* Full-width input fields */
  input[type=text], input[type=password], input[type=email], input[type=date],input[type=number] {
  width: 60%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #edd79a;

  }

  input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=date]:focus,input[type=number]:focus {
  background-color: #d9c180;
  outline: none;
  }

/* Overwrite default styles of hr */
  hr {
    border: 1px solid #d49fd0;
    margin-bottom: 20px;
  }

/* Set a style for the submit button */
  .register {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
  text-align:center;
  }

  .register:hover {
  opacity: 1;
  }

/* Add a blue text color to links */
  a {
  color: dodgerblue;
  }

/* Set a grey background color and center the text of the "sign in" section */
  .signinbtn {
  background-color: #347aeb;
  text-align: center;
  padding: 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;
  }
  </style>
  <title>Registration form</title>
  </head>
  <body>

<form action="registration.php" method="POST">
  <div class="container">
    <div class="container demo">
      <div class="content">
       <div class="w3-container w3-center">
         <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <h1 class="main-title">Registration</h1>
         </div>
      </div>
   </div>
   </div>

    <p>Please fill in this form to create an account.</p>

    <hr>
    <center>
    <label for="fname"><b>Full name</b></label><br>
    <input type="text" placeholder="Enter first name" name="name" required>
    <br>
    <b>Select your gender</b>
    <br>
    <input type="radio" name="gender" value="M" id="option-1">
    <label for="option-1">M</label>
    <input type="radio" name="gender" value="F" id="option-2">
    <label for="option-2">F</label>
    <br><br>
    <b>Enter Date Of Birth in (YYYY-MM-DD)</b><br>
    <input type="date" name="dob" placeholder="YYYY-MM-DD" min="1940-01-01" max="2004-12-31" placeholder="Enter Date Of Birth" required>
    <br>
    <label name = "contact_no" for="no"><b>Contact number</b></label><br>
    <input type="text" placeholder="Enter your contact number" name="contact_no" required>
    <br>
    <label for="question"><b>Select your bood group</b>:</label>
    <br>
    <select name="bloodtype" id="search_categories">
      <option value="0" selection disabled>Select your blood group:</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>
       <br><br>
    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" autocomplete="on" required>
    <br>
    <label for="psw"><b>Confirm Password</b></label><br>
    <input type="password" placeholder="Enter Password again" name="cpassword" autocomplete="on" required>
    <br><br>
    <p>      
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button name = "register" type="submit" class="register">Register</button>
  </div>
  </form>
  </center>

  <div class="container signin">
    <p align="center">Already have an account?<br><a href="donorlogin.php"><button type="submit" class="signinbtn" color=blue>Sign in</button></a></p>
  </div>



<?php
      if(isset($_POST['register']))
      {
        @$name=$_POST['name'];
        @$gender=$_POST['gender'];
        @$dob=$_POST['dob'];
        @$contact_no=$_POST['contact_no'];
        @$password=$_POST['password'];
        @$cpassword=$_POST['cpassword'];
        @$bloodtype=$_POST['bloodtype'];
        @$rarity = "NR";


        function get_random_string($size) {
            $size = intval($size);
            if ($size == 0) {
                return NULL;
            }
            $charSet = "ABCHEFGHJKMNPQRSTUVWXYZ0123456789";
            $len = strlen($charSet);
            $str = '';
            $i = 0;
            while (strlen($str) < $size) {
              $num = rand(0, ($len-1));
              $tmp = substr($charSet, $num, 1);
              $str = $str . $tmp;
              $i++;
            }
            return $str;
        }

        $donor_id = get_random_string(10);
        

        if($password==$cpassword)
        {
          $query = "select * from donor where contact_no = '$contact_no'";
          
          $query_run = mysqli_query($con,$query);

          if($query_run)
          {
            if(mysqli_num_rows($query_run)>0)
            {
              echo '<script type="text/javascript">alert("This Phone Number Already exists!! Please try another Number. If you are a returning User Please LOGIN.")</script>';
            }
            else
            {
              $query = "insert into donor values('$donor_id', '$name', '$gender', '$dob', '$contact_no', '$password', '$bloodtype', '$rarity')";
              $query_run = mysqli_query($con,$query);
              if($query_run)
              {
                echo '<script type="text/javascript">alert("Registration Succesful! Welcome")</script>';
                echo "<script> location.href='donorlogin.php'; </script>";
              }
              else
              {
                echo '<p class="bg-danger msg-block">Registration Unsuccessful. Please Try Later</p>';
              }
            }
          }
          else
          {
            echo '<script type="text/javascript">alert("DB error")</script>';
          }
        }
        else
        {
          echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
        }
        
      }
      else
      {
      }
    ?>


</body>
</html>
