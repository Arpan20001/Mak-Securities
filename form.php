

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
    height: 230px;
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
<form action="login.php" method="post">
<div class="container">
    <h2 class="h2">Login</h2>
    <div class="error" id="error-message"></div>
    <div class="success" id="success-message"></div>
    <input type="text" id="username" placeholder="Username" name="user">
    <input type="password" id="password" placeholder="Password" name="pass">
    <input type="submit" class="btn" id="btn" value="Login" name="login"/>
    <div class="loader" id="loader" style="display: none;"></div>
</div>

<script>
    function login() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var errorMessage = document.getElementById('error-message');
        var successMessage = document.getElementById('success-message');
        var loader = document.getElementById('loader');

        // Simulating login process
        loader.style.display = 'block';
        setTimeout(function() {
            if (username === 'admin' && password === 'password') {
                successMessage.style.display = 'block';
                successMessage.innerText = 'Login successful!';
                errorMessage.style.display = 'none';
            } else {
                errorMessage.style.display = 'block';
                errorMessage.innerText = 'Invalid username or password';
                successMessage.style.display = 'none';
            }
            loader.style.display = 'none';
        }, 1500);
    }
</script>
</form>

</body>
</html>