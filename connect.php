<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    echo "🔹 PHP is running<br>";
    echo "🔹 Received Data:<br>";
    echo "Fullname: $fullname<br>";
    echo "Email: $email<br>";
    echo "Password: $password<br>";
    echo "Confirm: $confirm_password<br>";

    // Connect to database
    $conn = new mysqli("localhost", "root", "", "smartshop_db");
    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    } else {
        echo "✅ Database connected successfully<br>";
    }

    // Insert data
    $sql = "INSERT INTO registration (fullname, email, password, confirm_password)
            VALUES ('$fullname', '$email', '$password', '$confirm_password')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Registration Successful!";
    } else {
        echo "❌ Error inserting data: " . $conn->error;
    }

    $conn->close();
}
?>
