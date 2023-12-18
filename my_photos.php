<?php
// Include the database connection
include 'db.php'; // Make sure to include the database connection

session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Fetch user's uploaded photos from the gallery
    $sql = "SELECT * FROM gallery WHERE username = '$username'";
    $result = $conn->query($sql);

    // Display photos
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display photo details
            echo '<div class="photo">';
            echo '<img src="' . $row['image_path'] . '" alt="Uploaded Photo">';
            echo '<p>' . $row['description'] . '</p>';

            // Add a form for deleting the photo
            echo '<form action="delete_photo.php" method="post">';
            echo '<input type="hidden" name="photo_id" value="' . $row['id'] . '">';
            echo '<button type="submit" name="delete">Delete</button>';
            echo '</form>';

            echo '</div>';
        }
    } else {
        echo '<p>No photos uploaded yet.</p>';
    }

    // Include a link to go back to the home page
    echo '<a href="index.php">Back to Home</a>';

} else {
    header('Location: index.php'); // Redirect if not logged in
    exit();
}

$conn->close();
?>
