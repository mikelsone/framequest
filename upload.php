<?php
include 'db.php'; // Make sure to include the database connection

session_start();

if (isset($_SESSION['username']) && isset($_FILES['file'])) {
    $username = $_SESSION['username'];
    
    // Define the target directory for uploads
    $targetDir = "uploads/";

    // Create the target directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Get the file name and generate a unique name
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir . $username . "_" . $fileName;

    // Check if the file is an image
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    if (getimagesize($_FILES['file']['tmp_name']) === false) {
        echo '<p class="error">Invalid file format. Please upload an image.</p>';
    } else {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            // Update the user's profile picture in the database
            $sql = "UPDATE users SET profile_picture = '$targetFilePath' WHERE username = '$username'";
            if ($conn->query($sql) === TRUE) {
                echo '<p class="success">Profile picture uploaded successfully.</p>';
            } else {
                echo '<p class="error">Error updating profile picture in the database.</p>';
            }
        } else {
            echo '<p class="error">Error uploading file. Please try again.</p>';
        }
    }
} else {

}

$conn->close();
?>
