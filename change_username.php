<?php
// Include the database connection
include 'db.php';

session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newUsername = $_POST['new_username'];

        // Validate and update the username in the database
        if (!empty($newUsername)) {
            $updateSql = "UPDATE users SET username = '$newUsername' WHERE username = '$username'";
            if ($conn->query($updateSql) === TRUE) {
                // Update the session variable with the new username
                $_SESSION['username'] = $newUsername;
                echo '<p class="success">Username changed successfully.</p>';
            } else {
                echo '<p class="error">Error updating username: ' . $conn->error . '</p>';
            }
        } else {
            echo '<p class="error">New username cannot be empty.</p>';
        }
    }

    // Display the form
    echo '<form action="change_username.php" method="post">';
    echo '<label for="new_username">New Username:</label>';
    echo '<input type="text" name="new_username" required>';
    echo '<button type="submit" name="submit">Change Username</button>';
    echo '</form>';

    // Include a link to go back to the home page
    echo '<a href="index.php">Back to Home</a>';

} else {
    header('Location: index.php'); // Redirect if not logged in
    exit();
}

$conn->close();
?>
