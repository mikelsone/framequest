<?php
// Include the database connection
include 'db.php';

session_start();

// Check if the user is logged in
if (isset($_SESSION['username']) && isset($_POST['delete']) && isset($_POST['photo_id'])) {
    $username = $_SESSION['username'];
    $photoId = $_POST['photo_id'];

    // Fetch the photo details to get the image path
    $sql = "SELECT * FROM gallery WHERE id = '$photoId' AND username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Delete the photo from the server
        unlink($row['image_path']);

        // Delete the photo from the database
        $deleteSql = "DELETE FROM gallery WHERE id = '$photoId'";
        if ($conn->query($deleteSql) === TRUE) {
            echo '<p class="success">Photo deleted successfully.</p>';
        } else {
            echo '<p class="error">Error deleting photo from the database: ' . $conn->error . '</p>';
        }
    } else {
        echo '<p class="error">Invalid photo or permission denied.</p>';
    }

} else {
    header('Location: index.php'); // Redirect if not logged in or invalid request
    exit();
}

$conn->close();
?>
