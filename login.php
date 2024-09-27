<?php
session_start();
$conn = new mysqli("localhost", "root", "system", "dc");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Capture the selected domain from the query parameter, if any
    $selectedDomain = isset($_GET['domain']) ? $_GET['domain'] : null;

    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        
        // Redirect based on the selected domain
        if ($selectedDomain === 'hardware') {
            header("Location: hardware.html");
        } elseif ($selectedDomain === 'software') {
            header("Location: Software.html");
        } elseif ($selectedDomain === 'electrical') {
            header("Location: electrical.html");
        } elseif ($selectedDomain === 'mechanical') {
            header("Location: mechanical.html");
        } elseif ($selectedDomain === 'civil') {
            header("Location: civil.html");
        } elseif ($selectedDomain === 'iot') {
            header("Location: iot.html");
        } else {
            // Default redirection if no domain is selected
            header("Location: Software.html");
        }
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
}
$conn->close();
?>
