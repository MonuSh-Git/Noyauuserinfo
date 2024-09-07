
<?php
print_r($_POST);
// Database configuration
$servername = "127.0.0.1:3306"; // Change if your MySQL is hosted elsewhere
$username = "u303152537_ic75Q"; // Your MySQL username
$password = "@Noyau_6_dev"; // Your MySQL password
$dbname = "u303152537_qu1wT"; // Your database name in phpMyAdmin

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and sanitize input
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $github = isset($_POST['github']) ? $_POST['github'] : '';
    $linkedin = isset($_POST['linkedin']) ? $_POST['linkedin'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $discord = isset($_POST['discord']) ? $_POST['discord'] : '';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, github, linkedin, email, phone, discord) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $github, $linkedin, $email, $phone, $discord);

    // Execute the query
    if ($stmt->execute()) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>