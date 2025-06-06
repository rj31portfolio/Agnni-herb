<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email content
    $to = "agniherb@gmail.com"; // Your Gmail
    $subject = "New Lead form Submitted by $name";
    $body = "Name: $name\n";
    $body .= "Phone: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to show thank you popup
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?submitted=true");
        exit();
    } else {
        echo "Sorry, email failed to send.";
    }
}
?>
