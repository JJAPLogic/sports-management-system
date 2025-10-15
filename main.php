<?php
include 'src/Server/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <header>
        <img src="src/Assets/images/Logo/umdc.png" alt="">
        <p>University Of Mindanao Digos College</p>
    </header>
    <div class="contentContainer">
        <h1>SPORTS MONITORING SYSTEM</h1>
        <h2>Athlete Monitoring Made Easier</h2>
        <p>Elevate your sports program with a smart monitoring system designed for champions. Manage athlete profiles, performance stats, and achievements all in one platform built to inspire progress and success.</p>
    </div>
    <div class="formContainer">
        <div class="loginFormContainer">
            <div class="txtHolder">
                <h2>Admin Login</h2>
            </div>

            <form id="loginForm">
                <p id="response" style="color: red;"></p>
                <input type="text" class="usernameInput" name="username" placeholder="Username" required>
                <input type="password" class="passwordInput" name="password" placeholder="Password" required>
                <button class="submit">Login</button>
                <a href="">Forgot Password</a>
            </form>
            <div class="footer">
                <p style="text-align: center; font-family: 'Poppins', sans-serif; font-size: 14px; color: #800000;">
                    Made possible by <strong>Dexter Angel</strong>, <strong>Cali Juntilia</strong>, and <strong>Reynch
                        Payan</strong>.
                </p>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e){
            e.preventDefault();
            const formData = new FormData(this);
            fetch('src/Server/Authentication.php', {
                method: 'POST',
                body: formData
            })
            .then(response=>response.text())
            .then(data=>{
                document.getElementById('response').innerHTML = data;
                if(data == "Success"){
                    window.location.href = "src/pages/dashboard.html";
                }else{
                    console.log("Nigga");
                }
            })
            .catch(Error=>{
                console.log(Error);
                
            })
        });
    </script>
</body>

</html>