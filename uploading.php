<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Upload Profile Picture</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #f8f8f8;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <header>
        <h1>Upload Profile Picture</h1>
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
        }

        $conn->close();
        ?>
    </div>

    <footer>
        &copy; 2023 Your Website. All rights reserved.
    </footer>

</body>

</html>
