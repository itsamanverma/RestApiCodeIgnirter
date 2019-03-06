<html>
<head>
<?php include("layouts/headers.html"); ?>
<title>Register</title>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>jquery/formvalidation.js"></script>
</head>
 
<body>
<!-- <?php echo form_open('validation/register',array('id'=>'regform','method'=>'post'));?> -->
<form id="regform" method="POST"> 
        <h2>Registration Form</h2>
        <div class="container">
 
            <label for="fname"><b>First Name</b></label>
            <div class="error" id="fnameerror"></div>
            <input type="text" placeholder="Enter First Name" id="fname" name="fname">
 
            
            <label for="lname"><b>Last Name</b></label>
            <div class="error" id="lnameerror"></div>
            <input type="text" placeholder="Enter Last Name" id="lname" name="lname">
 
            <label for="email"><b>Email</b></label>
            <div class="error" id="emailerror"></div>
            <input type="email" placeholder="Enter Email" id="email" name="email">
 
            <label for="password"><b>Password</b></label>
            <div class="error" id="passworderror"></div>
            <input type="password" placeholder="Enter Password" id="password" name="password">
 
            <label for="rpassword"><b>Reapeat Password</b></label>
            <div class="error" id="rpassworderror"></div>
            <input type="password" placeholder="Enter Password Again" id="rpassword" name="rpassword">
 
            <!-- <?php echo form_submit(['id'=>'register']) ?> -->
            <button id="register" type="submit" onclick="regvalidate()">Register</button>
            
        </div>  
    </form>
</body>
 
</html>