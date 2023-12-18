<?php
// Include the database connection
include 'db.php'; // Make sure to include the database connection

// Ensure $username is defined
if (!isset($username)) {
    // You might fetch the username from the session or wherever appropriate
    // For example, if it's stored in the session, you can uncomment the line below
    // session_start();
    // $username = $_SESSION['username'];
    // Adjust this based on your application's logic
    echo '<p class="error">Username is not defined.</p>';
    exit();
}

// Fetch user's uploaded photos from the gallery
$sql = "SELECT * FROM gallery WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<h2>Your Uploaded Photos</h2>';
    
    while ($row = $result->fetch_assoc()) {
        $photoId = $row['id'];
        $photoPath = $row['image_path'];
        $description = $row['description'];
        
        echo '<div class="photo">
                <img src="' . $photoPath . '" alt="Uploaded Photo">
                <p>' . $description . '</p>
                <form action="delete_photo.php" method="post">
                    <input type="hidden" name="photo_id" value="' . $photoId . '">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </div>';
    }
} else {
    echo '<p>No photos uploaded yet.</p>';
}
?>
