<?php
session_start();

// Replace with your No-IP hostname
$no_ip_hostname = 'bunokent.ddns.net';

// Get the current IP address linked to your No-IP hostname
$allowed_ip = gethostbyname($no_ip_hostname);

// Get the visitor's IP address
$user_ip = $_SERVER['REMOTE_ADDR'];

// Debugging information
echo "Resolved IP from No-IP hostname: $allowed_ip<br>";
echo "Your current IP address: $user_ip<br>";

// Check if the user is authenticated and the IP address is allowed
if (!isset($_SESSION['authenticated']) || ($user_ip !== $allowed_ip && $user_ip !== '::1' && $user_ip !== '127.0.0.1')) {
    header('Location: login.php');
    exit;
}

// Display the content if the IP is authorized
echo "Welcome, admin! Your IP: $user_ip is authorized.";
?>