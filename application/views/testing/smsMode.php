<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sms send to user</title>
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            padding: 20px 40px 20px 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 16px;
            margin-bottom: 6px;
            display: block;
        }
        input[type="text"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">


    <h2>Registration Form</h2>
    <form action="<?php echo base_url('admin/smsApi/sendRegister');?>" method="POST" id="registrationForm">
        <!-- User ID -->
        <label for="userID">User ID</label>
        <input type="text" id="userID" name="userID" required placeholder="Enter your user ID">

        <!-- Mobile Number -->
        <label for="mobileNumber">Mobile Number</label>
        <input type="tel" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" required placeholder="Enter your 10-digit mobile number">

        <!-- Password -->
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password">

        <!-- Submit Button -->
        <input type="submit" value="Register">

        <div id="errorMessage" class="error"></div>
    </form>
</div>

<script>
    // Simple client-side validation
    document.getElementById("registrationForm").onsubmit = function(e) {
        var mobileNumber = document.getElementById("mobileNumber").value;
        var userID = document.getElementById("userID").value;
        var password = document.getElementById("password").value;
        var errorMessage = "";

        // Validate mobile number (should be exactly 10 digits)
        if (mobileNumber.length !== 10 || isNaN(mobileNumber)) {
            errorMessage += "Mobile number must be 10 digits.<br>";
        }

        // Validate userID (non-empty)
        if (userID.trim() === "") {
            errorMessage += "User ID cannot be empty.<br>";
        }

        // Validate password (minimum 6 characters)
        if (password.length < 6) {
            errorMessage += "Password must be at least 6 characters long.<br>";
        }

        if (errorMessage) {
            e.preventDefault();
            document.getElementById("errorMessage").innerHTML = errorMessage;
        }
		
		
		  $.get("demo_test.asp", function(data, status){
    alert("Data: " + data + "\nStatus: " + status);
  });
		
		
    };
</script>

</body>
</html>
