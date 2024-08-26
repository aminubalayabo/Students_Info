<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>School Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        input {
            margin: 10px 0;
            padding: 5px;
        }
        #loginMessage {
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <img src="source/logo.jpg" alt="School Logo" />
    <hr/>
    <div id="loginMessage"></div>
    <form id="loginForm" onsubmit="return loginValidate();">
        <input type="text" id="myid" name="myid" placeholder="your id" autofocus required /><br/>
        <input type="password" id="mypassword" name="mypassword" placeholder="your password" required /><br/>
        <input type="submit" value="Login" />
    </form>

    <script>
        // Simulating the PHP login code check
        function getLoginCode() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('login') || '1';
        }

        function setLoginMessage() {
            const loginCode = getLoginCode();
            const messageElement = document.getElementById('loginMessage');
            
            if (loginCode === "false") {
                messageElement.textContent = "Wrong Credentials !";
                messageElement.style.color = "red";
            } else {
                messageElement.textContent = "Please Login !";
                messageElement.style.color = "green";
            }
        }

        function loginValidate() {
            const id = document.getElementById('myid').value;
            const password = document.getElementById('mypassword').value;

            if (id.trim() === '' || password.trim() === '') {
                alert('Please enter both ID and password.');
                return false;
            }

            // Here you would typically send the data to a server for verification
            // For this example, we'll just simulate a login attempt
            const success = Math.random() < 0.5; // 50% chance of success
            
            if (success) {
                alert('Login successful!');
                return true;
            } else {
                alert('Login failed. Please try again.');
                window.location.href = '?login=false';
                return false;
            }
        }

        // Set login message when the page loads
        window.onload = setLoginMessage;
    </script>
</body>
</html>
