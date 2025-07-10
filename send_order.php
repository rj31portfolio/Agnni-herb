<?php
// Set recipient email
$to = 'agniherb@gmail.com';

// Get form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';
$city = $_POST['city'] ?? '';
$state = $_POST['state'] ?? '';
$pincode = $_POST['pincode'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$productName = $_POST['productName'] ?? '';
$productPrice = $_POST['productPrice'] ?? '';

// Calculate total
$total = $productPrice * $quantity;

// Prepare email subject
$subject = "New Order: $productName";

// Prepare email body
$body = "
<html>
<head>
    <title>New Order</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>New Order Received</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <td>$productName</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>₹$productPrice</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>$quantity</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>₹$total</td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td>$name</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>$email</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>$phone</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>$address, $city, $state - $pincode</td>
        </tr>
    </table>
</body>
</html>
";

// Set headers for HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: $email" . "\r\n";

// Send email
if(mail($to, $subject, $body, $headers)) {
    echo 'success';
} else {
    echo 'error';
}
?>