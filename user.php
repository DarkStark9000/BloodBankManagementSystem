<!--Well the most things work and it doesn't look like shit. Okay. I need to figure out a way to make the Doante button work! -->

<?php
  session_start();
  require_once('config.php');

  $don = "SELECT donor_id, name, bloodtype from donor where contact_no = '".$_SESSION['contact_no']."' ";
  $result = mysqli_query($con, $don);

  $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="user.css">
</head>

<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">User Profile</span>
          <div class="mdl-layout-spacer"></div>
          <nav class="mdl-navigation mdl-layout--large-screen-only" action='user.php' method='POST'>
         
			<form action="user.php" method="POST"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="delete">DELETE ACCOUNT</button>
			</form>
			&emsp;&emsp;&emsp;&emsp;
			<a href="logout.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent logout" name="logout" >LOGOUT</button></a>
          
          </nav>
        </div>
      </header>

	<div class="card-container">
		<div class="upper-container">
			<div class="image-container">
				<img src="/img/profile.png" />
			</div>
		</div>

		<div class="lower-container">
			<div>
				<h3>Welcome <?php echo $row['name']; ?></h3>
				<h4><?php echo $row['donor_id']."<br><br>Blood Type: ".$row['bloodtype']; ?></h4>
			</div>

			<div>
			<br>
				<form action="user.php" method="POST">
				<label for="question"><b>Enter Your Choice of Organisation</b></label><br>
				<select name="organisation" id="question">
        			<option value="1">Basu Pharma</option>
        			<option value="2">Das Pharma</option>
        			<option value="3">Roy Pharma</option>
        			<option value="4">Sen Pharma</option>
    			</select>
    			<br><br><br>
				<button name="donate" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit">DONATE</button>
				</form>
			</div>
		</div>
	</div>

	<?php

		@$donor_id = $row['donor_id'];
		@$bloodtype = $row['bloodtype'];
		@$org = $_POST['organisation'];
		@$amount = 1;

      	if(isset($_POST['donate']))
      	{
       		echo '<script type="text/javascript">alert("Succesfully Donated Blood by getting a Physical Appointment")</script>';
     	}

      	if(isset($_POST['delete']))
      	{
        	$del = "DELETE FROM donor where donor_id = '".$id."' ";
        	$delrun = mysqli_query($con, $del);

       		echo '<script type="text/javascript">alert("Account Deleted. Logging Out.")</script>';
       		header('Location: donorlogin.php');

        	session_destroy();
     	}

   ?>

</body>
</html>