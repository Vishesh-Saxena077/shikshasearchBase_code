<?php
session_start();
require_once "cores/config.php";
$current_timestamp = date("Y-m-d H:i:s");


if(isset($_POST['regist'])){

    if($_POST['password'] == $_POST['cpassword']){

    $insert_data=[
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'timestamp' => $current_timestamp 

    ];

    $cols= implode(',',array_keys($insert_data));
    $val= implode("','",array_values($insert_data));

    $sql= "INSERT INTO login ($cols) VALUES ('$val')";

    $insert= $connection -> query($sql);

    if($insert){
        echo "success";
    }else{
        echo "invalid credentials";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">sign up to our website</h1>
         <!---registration form -->
         <form method="post" action="#">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <br>
            <div class="form-group">
                <label for="cpassword">confirm password</label>
                <input type="password" id="cpassword" name="cpassword">
            </div>
            <input type="submit" name="regist" id="regist" value="Sign Up">
        </form>

    </div>
    
</body>
</html>