<?php
session_start();
$conn = new mysqli("localhost", "root", "system", "dc");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: Software.html");
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
}
$conn->close();
?>
