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
            font-size: 34px; /* Set your desired font size */
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
            vertical-align: middle; /* Add this line */
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
            <a href="profile.php">Photographers</a>
            <a href="upload_photo.php">More</a>
        </div>

        <div class="right-section">
            <!-- Logout and profile icons go here -->
            <div class="logout-profile-icons">
                <i class="material-icons" onclick="openProfile()" style="vertical-align: middle;">account_circle</i>
                <a href="#" onclick="toggleLoginLogout()" style="vertical-align: middle;"><i id="logoutIcon" class="material-icons">exit_to_app</i></a>
            </div>
        </div>
        </div>
    </header>

    <div class="container">
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
            header('Location: index.php'); // Redirect if not logged in
            exit();
        }

        $conn->close();
        ?>
    </div>

    <footer>
        &copy; 2023 Your Website. All rights reserved.
    </footer>

</body>
</html>
