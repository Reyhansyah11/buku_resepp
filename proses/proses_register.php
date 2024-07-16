<?php
include '../db/koneksi.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    // Validate input
    if (empty($user_name) || empty($password) || empty($repeat_password)) {
        echo "<script>alert('All fields are required.'); window.location.href='register.php';</script>";
        exit; // Prevent further execution
    } elseif ($password !== $repeat_password) {
        echo "<script>alert('password do not match'); window.location.href='register.php';</script>";
        exit; // Prevent further execution
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO user (user_name, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user_name, $password);
  // Execute the statement
  if ($stmt->execute()) {
    // Redirect to index.php with success message
    echo "<script>alert('Registration successful. Redirecting to home page.'); window.location.href='../index.php';</script>";
    exit; // Prevent further execution
} else {
    // Redirect back to register.php with error message
    echo "<script>alert('Registration failed. Please try again.'); window.location.href='register.php';</script>";
    exit; // Prevent further execution
}

// Close the statement
$stmt->close();

    }
}

// Close the connection
$conn->close();
