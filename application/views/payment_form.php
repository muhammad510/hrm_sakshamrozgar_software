<!DOCTYPE html>
<html>
<head>
    <title>PhonePe Payment</title>
</head>
<body>
    <h2>Payment Form</h2>
    <form method="POST" action="<?php echo  base_url('phonePeController/createPayment') ?>">
        <input type="number" name="amount" placeholder="Amount (₹)" required><br><br>
        <input type="text" name="order_id" placeholder="Order ID" required><br><br>
        <button type="submit">Pay Now</button>
    </form>
</body>
</html>