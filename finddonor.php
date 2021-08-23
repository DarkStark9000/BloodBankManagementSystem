<?php
  session_start();
  require_once('config.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="finddonor.css">  
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find donor</title>

    <style>
    body
    {
        background: url("/img/bg2.jpg") no-repeat center fixed;
        background-size: 100%;

    </style>
  

</head>
<body>
   
    <form class="login" action="finddonor.php" method="POST">
        <input type="text" placeholder="Enter your Name" name="name" required>
        <select name="bloodtype" id="question">
            <option selection disabled>Select your blood group:</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>
        <select name="gender" id="question" required>
            <option value="0">Select your gender:</option>
            <option value="M">M</option>
            <option value="F">F</option>
        </select>
        <input type="text" placeholder="Enter your contact number" name="contact_no" required>
        <button  name = "finddonor" type="submit" style="color: yellow;">Find donor</button>
    </form>

        <?php
            if(isset($_POST['finddonor']))
            {
                @$name=$_POST['name'];
                @$gender=$_POST['gender'];
                @$bloodtype=$_POST['bloodtype'];
                @$contact_no=$_POST['contact_no'];


                function get_random_string($size) {
                    $size = intval($size);
                    if ($size == 0) {
                        return NULL;
                    }
                    $charSet = "0123456789ABCHEFGHJKMNPQRSTUVWXYZ";
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

                header('location: searchresult1.php');

                $acceptor_id = get_random_string(10);

                $queryb = "Select * from basu where bloodtype = '$bloodtype'";                                           //basu pharma
                $queryd = "Select * from das where bloodtype = '$bloodtype'";                                            //das pharma
                $queryr = "Select * from roy where bloodtype = '$bloodtype'";
                $querys = "Select * from sen where bloodtype = '$bloodtype'";


                $queryb_run = mysqli_query($con, $queryb);
                $queryd_run = mysqli_query($con, $queryd);
                $queryr_run = mysqli_query($con, $queryr);
                $querys_run = mysqli_query($con, $querys);

                if($queryb_run or $queryd_run or $queryr_run or $querys_run)
                {
                    if((mysqli_num_rows($queryb_run)>0) or (mysqli_num_rows($queryd_run)>0) or (mysqli_num_rows($queryr_run)>0) or (mysqli_num_rows($querys_run)>0))
                    {
                        
                        $queryin = "insert into acceptor values('$acceptor_id', '$name', '$gender', '$bloodtype', '$contact_no')";
                        $queryin_run = mysqli_query($con, $queryin);

                        if($queryin_run)
                        {
                            echo '<script type="text/javascript"> alert("Client Info Saved Succesfully. Redirecting ... ") </script>';

                            //$row = mysqli_fetch_assoc($query_run);
                    
                            /*$_SESSION['contact_no'] = $contact_no;
                            $_SESSION['name'] = $name;*/

                            $_SESSION['bloodtype'] = $bloodtype;
                            $_SESSION['acceptor_id'] = $acceptor_id;

                            header('location: searchresult.php');
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("SORRY!! NO MATCHES FOUND. WE DEEPLY REGRET IT BUT AT THIS MOMENT WE ARE HELPLESS")</script>';
                    }
                }
                else
                {
                    echo '<script type="text/javascript">alert("Database Error")</script>';
                }
/*
                while ($row = mysqli_fetch_assoc($query_run))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['donor_id']; ?></td> 
                        <td><?php echo $row['bloodtype']; ?></td> 
                        <td><?php echo $row['amount']; ?></td> 
                    </tr>
                    <?php
                }*/

            }
        ?>
      
</body>
</html>