<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style1.css">
    <title>OTP Based Login</title>
</head>

<body>
    <h1>Login to Access the Inventory System</h1>
    <div class="container email-container">
        <h2>Enter Email</h2>
        <form action="" class="form email-form">
            <input type="email" name="email" id="email" placeholder="Enter Email...">
            <span class="email-error"></span>
            <button class="btn email-submit">Send OTP</button>
        </form>
    </div>

    <div class="container otp-container">
        <h2>Enter OTP</h2>
        <form action="" method="POST" class="form otp-form">
            <input type="number" name="otp" id="otp" placeholder="Enter OTP...">
            <span class="otp-error"></span>
            <button class="btn otp-submit">Login</button>
        </form>
    </div>
    <script src="JS/script.js"></script>

</body>

</html>