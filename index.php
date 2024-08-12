<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch image paths from the database
$sql = "SELECT image_path FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $imagePath = $row['image_path'];

        // Display the image using an HTML <img> tag
        echo '<img src="' . $imagePath . '" alt="Image" style="max-width: 100%; height: auto;">';
    }
} else {
    echo "No images found.";
}

// Close the database connection
$conn->close();
?>
