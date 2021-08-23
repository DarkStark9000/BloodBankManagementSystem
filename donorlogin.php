<?php
  session_start();
  require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="donor.css">  
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>

    <style>
    body
    {
        background: url("/img/bg.jpg") no-repeat center center fixed;
        background-size: cover;

    </style>
  
</head>
<body>
    
    <form class="login" method="post" action="donorlogin.php">
        <input name="contact_no" type="text" placeholder="Conatct Number" required>
        <input name="password" type="password" placeholder="Password" required>
        <button name="login" type="submit">Sign In</button>
      </form>
    
    <?php
            if(isset($_POST['login']))
            {
                @$contact_no=$_POST['contact_no'];
                @$password=$_POST['password'];

                $query = "select * from donor where contact_no='$contact_no' and password='$password' ";
                //echo $query;
                $query_run = mysqli_query($con,$query);
                //echo mysql_num_rows($query_run);
                if($query_run)
                {
                    if(mysqli_num_rows($query_run)>0)
                    {
                        $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
                    
                        $_SESSION['contact_no'] = $contact_no;
                        $_SESSION['password'] = $password;

                        header('location: user.php');
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
                    }
                }
                else
                {
                    echo '<script type="text/javascript">alert("Database Error")</script>';
                }
            }
            else
            {
            }
        ?>
</body>
</html>