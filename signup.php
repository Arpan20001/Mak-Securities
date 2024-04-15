<?php

if(isset($_POST["login"])){
    include "connection.php";
    if($conn){
        $username= $_POST["user"];
        $email= $_POST["email"];
        $password= $_POST["pass"];
        $cnfpassword= $_POST["cnfpass"];

        if($password!=$cnfpassword){
            echo("<script>alert('Password and confirm password should be matched');</script>");
        }else{
            $idarray=array();
            $result1= mysqli_query($conn, "SELECT `id` FROM `user` WHERE 1");
            while($row= mysqli_fetch_array($result1)){

                array_push($idarray, $row["id"]);
            }
            while(TRUE){
                $letters="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $digits= "0123456789";

                $teamcode= "";

                for($i=0; $i<=2; $i++){
                    $teamcode .= $letters[rand(0, strlen($letters)-1)];
                }
                for($i=0; $i<=2; $i++){
                    $teamcode .= $digits[rand(0, strlen($digits)-1)];
                }
                if(in_array($teamcode, $idarray)){
                    continue;
                }else{
                    $query= "INSERT INTO `user`(`id`, `username`, `email`, `password`) VALUES ('$teamcode','$username','$email','$password')";
                    $result2= mysqli_query($conn, $query);
                    if($result2){
                        echo("<script>alert('Signed Up successfully');</script>");
                        header("location:./form.php");
                        die();
                    }else{
                        echo("<script>alert('Something error occured please try letter');</script>");
                        die();
                    }
                }
            }
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Particle Cursor Effect</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.1); /* Adjust the alpha value (0.0 to 1.0) to control transparency */
    padding: 50px;
    height: 350px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    overflow: hidden;
    position: relative;
    }

    h2 {
        margin-bottom: 20px;
    }

    input {
        width: calc(100% - 20px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 15px;
    }
    
    .btn {
        padding: 10px 20px;
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
        border-radius: 15px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        margin-top: -10px;
        margin-bottom: 10px;
        display: none;
    }

    .success {
        color: green;
        margin-top: -10px;
        margin-bottom: 10px;
        display: none;
    }

    .loader {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .h2{
        color: white;
    }
</style>
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>


<div id="particles-js"></div>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="assets/js/login.js"></script>
<form action="signup.php" method="post">
<div class="container">
    <h2 class="h2">Login</h2>
    <div class="error" id="error-message"></div>
    <div class="success" id="success-message"></div>
    <input type="text" id="username" placeholder="Username" name="user">
    <input type="email" id="email" placeholder="Enter your email id" name="email" required>
    <input type="password" id="password" placeholder="Password" name="pass">
    <input type="password" id="cnfpassword" placeholder="Confirm your password" name="cnfpass">
    <input type="submit" class="btn" id="btn" value="Login" name="login"/>
    <div class="loader" id="loader" style="display: none;"></div>
</div>


</form>

</body>
</html>