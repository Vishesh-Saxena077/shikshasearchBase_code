<?php
session_start();
require_once "cores/config.php";

if(!isset($_SESSION['user_data'])){
    header("Location: login.php");
}
$sql= "SELECT * FROM blog";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_object()) {
        $data[]=$row;
    }
} else {
    echo "No results found.";
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
    <div>
        <?php
         foreach($data as $i){
             echo $i->Title ."<br>".
             $i->Introduction."<br>".
             $i->Content ."<br>".
             $i->Source."<br>".
             $i->author_fname."<br>".
             $i->author_lname."<br>".
             $i->author_email."<br>".
             $i->author_social."<hr>";
              }
        ?>
</div>

</body>
</html>

