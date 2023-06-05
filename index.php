<?php
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password  = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connected to this database faild due to".mysqli_connect_error());
    }
    //echo "Sucessfully connected to the database..."


    // collecting post variables... 
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `php_tripapp`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name','$age','$gender','$email','$phone','$desc', current_timestamp())";
    //echo $sql;

    if($con->query($sql) == true) /* "->" = object operator*/{
        echo "sucessfully inserted..";
    }else{
        echo "Error: $sql <br> $con->error";
    }
    $con->close(); // used to close the connection...
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>myForm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="travell icon">
    <div class="container">
        <h3>Welcome to my trip form</h3>
        <p>Enter yourn deatils to confirm your participations in the trip</p>
        <p class="submitMsg">Thanks for submitting this from</p>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any information here"></textarea>
            <button class="btn">submit</button>
            <button class="btn">Reset</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>