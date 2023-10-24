<?php
if (isset($_GET["register"])) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .error {
            color: #FF0000; /* Red for error messages */
        }
        
        .registration-form {
            background-color: #333; /* Dark gray background */
            color: #fff; /* White text color */
            padding: 20px;
            border-radius: 5px;
        }
        
        .panel-primary {
            border-color: #337ab7; /* Blue border color */
        }
        
        .panel-primary .panel-heading {
            background-color: #337ab7; /* Blue header background color */
        }
        
        .btn-primary {
            background-color: #337ab7; /* Blue button background color */
            border-color: #2e6da4; /* Slightly darker blue border color */
            color: #fff; /* White text color */
        }
    </style>
</head>
<body>
<div class="wait overlay">
    <div class="loader"></div>
</div>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand">Ecommerce Site</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
        </ul>
    </div>
</div>
<br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="signup_msg">
            <!-- Alert from signup form -->
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary registration-form">
                <div class="panel-heading text-center">Customer Registration Form</div>
                <div class="panel-body">
                    <form id="signup_form" onsubmit="return validateForm();">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="f_name">First Name</label>
                                <input type="text" id="f_name" name="f_name" class="form-control" required>
                                <span id="f_name_error" class="error"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="l_name">Last Name</label>
                                <input type="text" id="l_name" name="l_name" class="form-control" required>
                                <span id="l_name_error" class="error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                                <span id="email_error" class="error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                <span id="password_error" class="error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="repassword">Confirm Password</label>
                                <input type="password" id="repassword" name="repassword" class="form-control" required>
                                <span id="repassword_error" class="error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="mobile">Contact Number</label>
                                <input type="text" id="mobile" name="mobile" class="form-control" required>
                                <span id="mobile_error" class="error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address1">Address 1</label>
                                <input type="text" id="address1" name="address1" class="form-control" required>
                                <span id="address1_error" class="error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address2">Address 2</label>
                                <input type="text" id="address2" name="address2" class="form-control" required>
                                <span id="address2_error" class="error"></span>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <input style="width:100%;" value="Sign Up" type="submit" name="signup_button" class="btn btn-primary btn-lg">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<script>
    function validateForm() {
        const firstName = document.getElementById("f_name").value;
        const lastName = document.getElementById("l_name").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("repassword").value;
        const mobile = document.getElementById("mobile").value;
        
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        const mobilePattern = /^\d{10}$/;

        let isValid = true;

        if (firstName.trim() === "") {
            document.getElementById("f_name_error").innerText = "First Name is required";
            isValid = false;
        } else {
            document.getElementById("f_name_error").innerText = "";
        }

        if (lastName.trim() === "") {
            document.getElementById("l_name_error").innerText = "Last Name is required";
            isValid = false;
        } else {
            document.getElementById("l_name_error").innerText = "";
        }

        if (!email.match(emailPattern)) {
            document.getElementById("email_error").innerText = "Enter a valid email address";
            isValid = false;
        } else {
            document.getElementById("email_error").innerText = "";
        }

        if (password.length < 6) {
            document.getElementById("password_error").innerText = "Password must be at least 6 characters";
            isValid = false;
        } else {
            document.getElementById("password_error").innerText = "";
        }

        if (password !== confirmPassword) {
            document.getElementById("repassword_error").innerText = "Passwords do not match";
            isValid = false;
        } else {
            document.getElementById("repassword_error").innerText = "";
        }

        if (!mobile.match(mobilePattern)) {
            document.getElementById("mobile_error").innerText = "Enter a valid 10-digit mobile number";
            isValid = false;
        } else {
            document.getElementById("mobile_error").innerText = "";
        }

        return isValid;
    }
</script>
</body>
</html>
<?php
}
?>
