
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
		<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAME:	Ashutosh Roy"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BLOOD GROUP:	A+"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTACT NO:	7404751758"?>

    </p><br>
    <br><br><br><hr style="border: 0.5px solid black;">

    <div>
    	<h3>AVAILABLE DONORS</h3>
    	<br>
    	<CENTER><h4>BASU PHARMACY</h4></CENTER>
    	<table align="center" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
			<tr><th>ID</th><TH>NAME</TH><th>BLOOD GROUP</th><th>AMOUNT</th></tr>
			<tr><td>ALPXU640810</td><TD>P.Verma
			</TD><td>A+</td><td>6</td></tr>

			
		</table>

		<CENTER><h4>DAS PHARMACY</h4></CENTER>
    	<table align="center" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp"><tr><th>ID</th><TH>NAME</TH><th>BLOOD GROUP</th><th>AMOUNT</th></tr>
    		<tr><td>PQRST02840</td><TD>T.Iqbal
			</TD><td>A+</td><td>11</td></tr>
		<tr><td>LMZUL79402</td><TD>C.Ahuja
		</TD><td>O+</td><td>14</td></tr>
		</table>

		<CENTER><h4>ROY PHARMACY</h4></CENTER>
    	<table align="center" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp"><tr><th>ID</th><TH>NAME</TH><th>BLOOD GROUP</th><th>AMOUNT</th></tr>
    		<tr><td>CBKUT28402</td><TD>R.Kumar
			</TD><td>O+</td><td>11</td></tr>
		</table>
		<BR><BR><BR><BR>

    </div>

</body>
</html>