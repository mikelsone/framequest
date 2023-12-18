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

        .upload-section {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 80vh;
            margin: 20px;
        }

        form {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        .preview-container {
            max-width: 400px;
            margin: 20px 0;
        }

        .preview-img {
            max-width: 100%;
            height: auto;
        }

        .success,
        .error {
            margin-top: 15px;
            font-weight: bold;
            text-align: center;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
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
            <a href="profile2.php">Photographers</a>
            <a href="upload_photo.php">More</a>
        </div>

        <div class="right-section">
            <!-- Logout and profile icons go here -->
            <div class="logout-profile-icons">
                <i class="material-icons" onclick="openProfile()">account_circle</i>
                <a href="#" onclick="toggleLoginLogout()"><i id="logoutIcon" class="material-icons">exit_to_app</i></a>
            </div>
        </div>
    </header>

    <div class="upload-section">
        <?php
        include 'db.php'; // Make sure to include the database connection

        session_start();

        $errorMessage = ''; // Initialize an empty error message
        $successMessage = ''; // Initialize an empty success message

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
                $errorMessage = 'Invalid file format. Please upload an image.';
            } else {
                // Move the uploaded file to the target directory
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                    // Update the user's profile picture in the database
                    $sql = "UPDATE users SET profile_picture = '$targetFilePath' WHERE username = '$username'";
                    if ($conn->query($sql) === TRUE) {
                        $successMessage = 'Profile picture uploaded successfully.';
                    } else {
                        $errorMessage = 'Error updating profile picture in the database.';
                    }
                } else {
                    $errorMessage = 'Error uploading file. Please try again.';
                }
            }
        }

        $conn->close();
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <!-- Your file upload form fields here -->
            <label for="file">Choose a file:</label>
            <input type="file" name="file" id="file" onchange="previewImage()" />

            <div class="preview-container">
                <img id="previewImg" class="preview-img" alt="Image Preview" style="display: none;">
            </div>
            <input type="submit" name="submit" value="Upload" />
        </form>

        <!-- Display success or error message if exists -->
        <?php if (!empty($successMessage)): ?>
            <p class="success"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <?php if (!empty($errorMessage)): ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>

    <footer>
        &copy; 2023 Your Website. All rights reserved.
    </footer>

    <script>
        function previewImage() {
            const input = document.getElementById('file');
            const preview = document.getElementById('previewImg');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        }
    </script>

</body>

</html>
