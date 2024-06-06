<?php
session_start();
require_once "cores/config.php";

$err1 = "";
if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $pass = mysqli_real_escape_string($connection,$_POST['password']);
    $sql = "SELECT * FROM login WHERE username = '$username' AND password='$pass'";
    $exec = mysqli_query($connection,$sql);
    $count = mysqli_num_rows($exec);
    if($count)
    {
        $result = $exec->fetch_assoc();
        


            if($pass === $result['password'])
            {
                $_SESSION['user_data'] = $result;
                try{
                    if($_SESSION['user_data']){
                    header("Refresh:1,url=index.php");
                    }
                } catch(Exception $ex) {
                    echo $ex->getMessage();
                }
            } else {
                $err1 = "<span style='color:red'>Password did'nt Matched</span>";
            }
        } else {
            $err1 = "<span style='color:red'>No Email-Id Found</span>";
        }
    }
    // $result = mysqli_fetch_assoc($exec);
    // echo $count.$result;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
        <fieldset>
            <legend><h1>Login</h1></legend>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            <br>
            <br>
            <label for="password">Password</label>
            <input type="text" name="password" id="password" required>
            <br>
            <?php echo $err1; ?><br>
            <input type="submit" name="login" id="login" value="login">
        </fieldset>
    </form>   
</body>
</html>