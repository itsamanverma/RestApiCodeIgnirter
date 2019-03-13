<!DOCTYPE html>
<html>
<head>
<?php include "layouts/headers.html"?>
<script type = "text/javascript" src = "<?php echo base_url(); ?>jquery/main.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<title>Login</title>
</head>
<body>
    <form class="reg">
        <h2>Login Form</h2>
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <div class="error" id="fnameerror"></div>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <div class="error" id="passworderror"></div>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button id="login" type="button" onclick="loginvalidate()">Login</button>
        </div>
    </form>

<div>OR<button class = "button button2"type="button" onclick="location.href='<?php echo base_url(); ?>users/register'">Register</button>
</div>
</body>

</html>
