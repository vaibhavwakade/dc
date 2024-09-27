<?php
// Database connection parameters
$host = 'localhost';    // Change if needed
$dbname = 'dc';  // Your database name
$username = 'root';      // Your MySQL username
$password = 'system';  // Your MySQL password

// Create a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // SQL query to insert the form data into the contact table
    $sql = "INSERT INTO contact (name, email, phone, subject, message) 
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    // Execute the query and check if it's successful
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Thank you for contacting us! Your message has been submitted.</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            animation: slideIn 1s ease-in-out;
        }
        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .form-group {
            margin-bottom: 15px;
            animation: grow 1s ease-in-out;
        }
        @keyframes grow {
            0% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
            }
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        input:focus, textarea:focus {
            border-color: #5cb85c;
            box-shadow: 0px 0px 5px rgba(92, 184, 92, 0.5);
            animation: bounce 0.5s ease-in-out;
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        textarea {
            resize: vertical;
            height: 150px;
        }
        button {
            width: 100%;
            background-color: #5cb85c;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            animation: buttonFadeIn 2s ease-in-out;
        }
        @keyframes buttonFadeIn {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        button:hover {
            background-color: #4cae4c;
            transform: scale(1.05);
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Contact Us</h2>
    <form method="post" action="contact.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
