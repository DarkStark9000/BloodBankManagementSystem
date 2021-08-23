<?php
  session_start();
  require_once('config.php');

  @$bloodtype = $_SESSION['bloodtype'];

  $disp = "SELECT acceptor_id, name, bloodtype, contact_no from acceptor where acceptor_id = '".$_SESSION['acceptor_id']."' ";
  $disp_run = mysqli_query($con, $disp);

  $rowd = mysqli_fetch_assoc($disp_run);


?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="user.css">


	<style type="text/css">
		body{
			background: #ced8ed;
		}
		p{
			font-size: 20px;
			color: #ad5d11;
			position: relative;
			float: left;
			text-align: center;
			padding: 20px;
		}
		h3
		{
			text-align: center;
			color: #000000;
			padding: 10px;
			position: relative;
		}
		table{
			position: relative;
			padding: 20px;
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      	<header class="mdl-layout__header">
        	<div class="mdl-layout__header-row">
          	<span class="mdl-layout-title">Search Result</span>
          	<div class="mdl-layout-spacer"></div>
          	
      	</div>
    	</header>
	</div>

	<br><br><br><br>

	<p>
		<?php echo "ID:	".$rowd['acceptor_id'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAME:	".$rowd['name'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BLOOD GROUP:	".$rowd['bloodtype'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTACT NO:	".$rowd['contact_no']; ?>

    </p><br>
    <br><br><br><hr style="border: 0.5px solid black;">

    <div>
    	<h3>AVAILABLE DONORS</h3>
    	<br>
    	<h4>DAS PHARMACY</h4>
    	<table align="center" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
			<tr><th>ID</th><TH>NAME</TH><th>BLOOD GROUP</th><th>AMOUNT</th></tr>

			<!-- <tr><td>XKCDM10385</td><TD>K.Paul</TD><td>AB+</td><td>5</td></tr>-->


    	<?php


    		$queryb = "Select * from basu where bloodtype = '".$bloodtype."' ";
			$queryd = "Select * from das where bloodtype = '".$bloodtype."' ";
            $queryr = "Select * from roy where bloodtype = '".$bloodtype."' ";
			$querys = "Select * from sen where bloodtype = '".$bloodtype."' ";

			$queryb_run = mysqli_query($con, $queryb);
			$queryd_run = mysqli_query($con, $queryd);
			$queryr_run = mysqli_query($con, $queryr);
			$querys_run = mysqli_query($con, $querys);

			/*$rowb = mysqli_fetch_assoc($queryb_run);
			$rowd = mysqli_fetch_assoc($queryd_run);
			$rowr = mysqli_fetch_assoc($queryr_run);
			$rows = mysqli_fetch_assoc($querys_run);*/	
		?>

		<?php while($rowb = mysqli_fetch_array($queryb_run, MYSQLI_ASSOC)) ?>
			<tr>
			<td><?echo $rowb['donor_id'];?></td>
			<td><?echo $rowb['bloodtype'];?></td>
			<td><?echo $rowb['amount'];?></td>
			</tr>

    </div>

</body>
</html>