<?php
session_start(); // Ensure session is started
include 'db.php'; // Include the database connection

// Fetch profiles with role set to "work"
$sql = "SELECT username, name, surname, profile_picture FROM users WHERE role = 'work'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
    <title>Your Website</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }

        .left-section {
            flex: 1;
            font-size: 34px;
            margin-left: 20px;
        }

        .middle-section {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .right-section {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #fff;
            margin: 0 10px;
            padding: 10px;
            cursor: pointer;
        }

        .logout-profile-icons {
            display: flex;
            align-items: center;
        }

        .logout-profile-icons i {
            font-size: 24px;
            margin-left: 10px;
            cursor: pointer;
            vertical-align: middle;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .profile-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Center the profile cards */
    gap: 20px;
    padding: 20px;
    background-color: black;
    max-width: 980px; /* Set your desired max-width */
    margin: 50px auto; /* Center the container */
}

/* Adjust profile-card width */
.profile-card {
    width: calc(20% - 20px); /* Adjust width based on 7 profiles in a row with 20px gap */
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
    margin-bottom: 20px;
    background-color: gray; /* Background color for profile cards */
}

/* New styles to align the next row to the left */
.profile-container:nth-child(odd) {
    justify-content: flex-start;
}

/* New styles to align the first profile-card in odd rows to the left */
.profile-container:nth-child(odd) .profile-card:nth-child(1) {
    margin-left: 0;
}

        .profile-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .profile-card h2 {
            color: #333;
            margin: 0;
        }

        .profile-card .username {
            color: #666;
            margin: 0; /* Fixed to remove extra margin */
        }

        .current-user-profile {
        background-color: #3498db;
        color: #fff;
    }

            /* Media query for responsiveness */
            @media (max-width: 980px) {
            .profile-card {
                width: calc(25% - 20px); /* Adjust width for smaller screens */
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="left-section">
            Frame Quest
        </div>

        <div class="middle-section">
            <!-- Your navigation links go here -->
            <a href="index.php">Home</a>
            <a href="gallery.php">Gallery</a>
            <a href="profiles.php">Photographers</a>
            <a href="upload_photo.php">More</a>
        </div>

        <div class="right-section">
            <!-- Logout and profile icons go here -->
            <div class="logout-profile-icons">
                <i class="material-icons" onclick="openProfile()">account_circle</i>
                <a href="login.php" onclick="toggleLoginLogout()"><i id="logoutIcon" class="material-icons">exit_to_app</i></a>
            </div>
        </div>
    </header>

    <div class="profile-container">
        <?php
        if ($result->num_rows > 0) {
            $currentUser = $_SESSION['username'] ?? null; // Get the current user from the session

            while ($row = $result->fetch_assoc()) {
                $username = $row['username'];
                $name = $row['name'];
                $surname = $row['surname'];
                $profilePicture = $row['profile_picture'];
                $profileClass = ($username === $currentUser) ? 'current-user-profile' : '';

                echo '<div class="profile-card ' . $profileClass . '">
                        <img src="' . ($profilePicture ? $profilePicture : 'https://cdn-icons-png.flaticon.com/512/1946/1946429.png') . '" alt="Profile Picture" class="profile-img">
                        <h2>' . $name . ' ' . $surname . '</h2>
                      </div>';
            }
        } else {
            echo '<p class="error">No user profiles found with the role "work".</p>';
        }

        $conn->close();
        ?>
    </div>

    <footer>
        &copy; 2023 Your Website. All rights reserved.
    </footer>

</body>

</html>
